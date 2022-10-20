@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')
@section('search')

<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" id="search" class="form-control bg-light border-5 small rounded-5" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
        </div>
    </div>
</form>

@endsection
@if(session()->has('success'))

<div class="mt-3 col-md-4 text-center alert alert-success fade show" role="alert">
    {{ session('success')}}
</div>
@endif
<div class="container-fluid">
    <div class="row ">

        <div class="col-sm-12 text-end">
            <a href="/tambah-rekam-medis" class="nav-link"><i class="fa-solid fa-notes-medical"></i> Buat rekam medis</a></h3>
        </div>
    </div>

<div class="card shadow mb-5">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Daftar Rekam Medis</p>
    </div>
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Nama User</th>
                        <th>Tanggal Periksa</th>
                        <th style="padding-left: 45px">Aksi</th>

                    </tr>
                </thead>
                <tbody id="old">
                @php $j = 0 @endphp
                    <tr>
                        @foreach ($rekam as $item)
                        @php $j++ @endphp
                        <td style="padding-left: 15px">{{ $j }}</td>
                        <td>{{ $item->nama_pasien}}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <th>{{ $item->tgl_periksa->format('d-m-Y') }}</th> --}}
                        <td>{{ date('d M Y', strtotime($item->tgl_periksa))}}</td>
                        <td style="padding-left: 32px">
                            <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#edit_rekam_medis{{ $item->id_rekam_medis }}"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#hapus_rekam_medis{{ $item->id_rekam_medis }}"><i class="fa-solid fa-trash-can"></i></button>

                        </td>
                        <div>
                            <div class="modal fade" id="hapus_rekam_medis{{ $item->id_rekam_medis }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="hapus_rekam_medis{{ $item->id_rekam_medis }}">Hapus Rekam Medis</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/hapus-rekam-medis" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{{ $item->id_rekam_medis }}">
                                            <strong>Apakah anda yakin untuk menghapus?</strong>
                                        </div>
                                        <div class="modal-footer">
                                                <div class="col-4 ">
                                                    <button type="submit" class="btn bg-danger text-white col">Ya yakin</button>
                                                   </div>
                                                   <div class="col-4">
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak jadi </button>
                                                   </div>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div>
                            <form action="/edit-rekam-medis" method="POST">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $item->id_rekam_medis }}">
                                <div class="modal fade" id="edit_rekam_medis{{ $item->id_rekam_medis }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Nama Pasien</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <input type="text" name="nama_pasien" class="form-control col-sm-10" value="{{ $item->nama_pasien }}" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Tekanan Darah</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <input type="text" name="tekanan_darah" class="form-control col-sm-10" value="{{ $item->tekanan_darah }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="row mt-3">
                                                <div class="col-sm-5"><strong>Nama Penyakit</strong></div>
                                            </div>
                                            <div class="row">
                                                <input type="text" name="nama_penyakit" class="form-control col-sm-10" value="{{ $item->nama_penyakit }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="row mt-3">
                                                <div class="col-sm-5"><strong>Kadar Asam Urat</strong></div>
                                            </div>
                                            <div class="row">
                                                <input type="number" name="kadar_asam_urat" class="form-control col-sm-10" value="{{ $item->kadar_asam_urat }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="row mt-3">
                                                <div class="col-sm-5"><strong>Tanggal Periksa</strong></div>
                                            </div>
                                            <div class="row">
                                                <input type="text" name="tgl_periksa" class="form-control col-sm-10" value="{{ $item->tgl_periksa}}" onclick="(this.type='date')">
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="row mt-3">
                                                <div class="col-sm-5"><strong>Kadar gula darah</strong></div>
                                            </div>
                                            <div class="row">
                                                <input type="number" name="kadar_gula_darah" class="form-control col-sm-10" value="{{ $item->kadar_gula_darah }}">
                                            </div>
                                        </div>

                                        </div>

                                        <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="row mt-3">
                                                <div class="col-sm-5"><strong>Alergi Makanan</strong></div>
                                            </div>
                                            <div class="row">
                                                <input type="text" name="alergi_makanan" class="form-control col-sm-10" value="{{ $item->alergi_makanan}}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="row mt-3">
                                                <div class="col-sm-5"><strong>kadar kolesterol</strong></div>
                                            </div>
                                            <div class="row">
                                                <input type="number" name="kadar_kolesterol" class="form-control col-sm-10" value="{{ $item->kadar_kolesterol}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="row mt-3">
                                                <div class="col-sm-5"><strong>Keterangan</strong></div>
                                            </div>
                                            <div class="row">
                                                <textarea  class="form-control col-sm-10" name="keterangan">{{ $item->keterangan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center ">
                                        <div class="col-5 mt-5">
                                            <button class="btn btn-primary col-lg-10" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </tr>

                        @endforeach

                    </tbody>
                <tbody id="new">

                </tbody>

            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
            </div>
            <div class="col-md-6">
                {{ $rekam->links() }}
            </div>
        </div>
    </div>
</div>

{{-- end of container --}}
</div>
<script type="text/javascript">
    $('#search').on('keyup',function () {
       $value=$(this).val();
       if($value){
        $('#old').hide();
        $('.pagination').hide();
       }else{
        $('#old').show();
        $('.pagination').show();
       }
       $.ajax({
        type:'get',
        url:'{{ URL::to('cari-rekam-medis')}}',
        data:{'data': $value},
        success:function(data){
            $('#new').html(data);
            console.log(data);
        }
       });
    })
    </script>

@endsection
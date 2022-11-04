@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebardokter')
@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" id="search" class="form-control bg-light border-1 small rounded-3" placeholder="Pencarian untuk..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
        </div>
    </div>
</form>
@endsection

@section('searchm')
<li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                <input type="searchm" id="searchm" class="form-control bg-light border-0 small" placeholder="Pencarian untuk..." aria-label="Search" aria-describedby="basic-addon2">
            </div>
        </form>
    </div>
</li>
@endsection

<div class="container-fluid">
    @if(session()->has('success'))

    <div class="mt-3 col-md-4 text-center alert alert-dismissible alert-success fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row ">

        <div class="col-sm-12 text-end">
            <a href="/tambah-rekam-medis-dokter" class="nav-link"><i class="fa-solid fa-notes-medical"></i> Buat rekam medis</a></h3>
        </div>
    </div>

<div class="card shadow mb-5">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Daftar Rekam Medis</p>
    </div>
    <div class="card-body">
        <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table" id="dataTable">
                <thead>

                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pasien</th>
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Tanggal Periksa</th>
                        <th class="text-center">Aksi</th>

                    </tr>
                </thead>
                <tbody id="old">
                @php $j = 0 @endphp
                    <tr>
                        @foreach ($rekam as $item)
                        @php $j++ @endphp
                        <td class="text-center">{{ $j }}</td>
                        <td class="text-center">{{ $item->nama_pasien}}</td>
                        <td class="text-center">{{ $item->user->name }}</td>
                        {{-- <th>{{ $item->tgl_periksa->format('d-m-Y') }}</th> --}}
                        <td class="text-center">{{ date('d M Y', strtotime($item->tgl_periksa))}}</td>
                        <td class="text-center">
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
                            <div>
                            <div class="modal fade" id="edit_rekam_medis{{ $item->id_rekam_medis }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
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
                                                            <div class="col-sm-12">
                                                                <input type="text" name="nama_pasien" class="form-control col-sm-12" value="{{ $item->nama_pasien }}" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Usia</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="usia" class="form-control col-sm-12" value="{{ $item->usia }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Nama Penyakit</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="nama_penyakit" class="form-control col-sm-12" value="{{ $item->nama_penyakit }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Kadar Asam Urat</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="number" name="kadar_asam_urat" class="form-control col-sm-12" value="{{ $item->kadar_asam_urat }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Tanggal Periksa</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="tgl_periksa" class="form-control col-sm-12" value="{{ $item->tgl_periksa}}" onclick="(this.type='date')">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Kadar gula darah</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="number" name="kadar_gula_darah" class="form-control col-sm-12" value="{{ $item->kadar_gula_darah }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Alergi Makanan</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="alergi_makanan" class="form-control col-sm-12" value="{{ $item->alergi_makanan}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>kadar kolesterol</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="number" name="kadar_kolesterol" class="form-control col-sm-12" value="{{ $item->kadar_kolesterol}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Kadar Gula Darah</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="kadar_gula_darah" class="form-control col-sm-12" value="{{ $item->kadar_gula_darah}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-10"><strong>Keterangan</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <textarea  class="form-control col-sm-12" name="keterangan">{{ $item->keterangan }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        <div class="row d-flex justify-content-center">
                                            <div class="col-7 col-md-5 col-xl-5 mb-3 mt-3">
                                                <button type="submit" class="btn bg-primary text-white col">Simpan Perubahan</button>
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
        <tbody id="new"></tbody>

        </table>


        </div>
        <div class="row">
            <div class="col-md-5 align-self-center">
            </div>
            <div class="col-md-5">
                <nav class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        {{ $rekam->links() }}
                    </ul>
                </nav>
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
        url:'{{ URL::to('cari-rekam-medis-dokter')}}',
        data:{'data': $value},
        success:function(data){
            $('#new').html(data);

        }
       });
    })
    </script>
<script type="text/javascript">
    $('#searchm').on('keyup',function () {
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
        url:'{{ URL::to('cari-rekam-medis-dokter')}}',
        data:{'data': $value},
        success:function(data){
            $('#new').html(data);
            console.log(data);
        }
       });
    })
    </script>

@endsection
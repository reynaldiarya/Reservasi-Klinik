@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebar')
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
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Riwayat Pemeriksaan</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Pasien</th>
                            <th class="text-center">Tanggal Periksa</th>
                            <th class="text-center">Dokter</th>

                        </tr>
                    </thead>
                        <tbody id="alldata">
                        @php $j = 0 @endphp
                        <tr>
                            @foreach ($rekam as $item)
                            @php $j++ @endphp
                            <td class="text-center">{{ $j }}</td>
                            <td class="text-center">{{ $item->nama_pasien}}</td>
                            {{-- <th>{{ $item->tgl_periksa->format('d-m-Y') }}</th> --}}
                            <td class="text-center">{{ date('d M Y', strtotime($item->tgl_periksa))}}</td>
                            <td class="text-center">dr Rey</td>
                            {{-- <td style="padding-left: 32px"><button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id_rekam_medis }}"><i class="bi bi-eye-fill"></i></button>
                                <div class="modal fade" id="exampleModal{{ $item->id_rekam_medis }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"><strong>Keterangan</strong></h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mb-4">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Nama Pasien</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->nama_pasien }}</p>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Tekanan Darah</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->tekanan_darah }}</p>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Nama Penyakit</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->nama_penyakit }}</p>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Kadar Asam Urat</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->kadar_asam_urat }}</p>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Tanggal Periksa</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ date('d M Y', strtotime($item->tgl_periksa))}}</p>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Kadar gula darah</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->kadar_gula_darah }}</p>
                                                </div>
                                            </div>

                                            </div>

                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Alergi Makanan</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->alergi_makanan }}</p>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>kadar kolesterol</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->kadar_kolesterol }}</p>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-10"><strong>Keterangan</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-10">{{ $item->keterangan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </td>

                    </tr>

                            @endforeach
                    </tbody>
                    <tbody id="konten">

                    </tbody>

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
</div>
<script type="text/javascript">
    $('#search').on('keyup',function () {
       $value=$(this).val();
       if($value){
        $('#alldata').hide();
        $('.pagination').hide();
       }else{
        $('#alldata').show();
        $('.pagination').show();
   }
       $.ajax({
        type:'get',
        url:'{{ URL::to('cari-rekam-pasien')}}',
        data:{'data': $value},
        success:function(data){
            $('#konten').html(data);


        }
       });
    })
    </script>
<script type="text/javascript">
    $('#searchm').on('keyup',function () {
       $value=$(this).val();
       if($value){
        $('#alldata').hide();
        $('.pagination').hide();
       }else{
        $('#alldata').show();
        $('.pagination').show();
   }
       $.ajax({
        type:'get',
        url:'{{ URL::to('cari-rekam-pasien')}}',
        data:{'data': $value},
        success:function(data){
            $('#konten').html(data);


        }
       });
    })
    </script>
@endsection
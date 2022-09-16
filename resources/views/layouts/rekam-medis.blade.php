@extends('maintemplatedashboard')
@include('partials.sidebar')
@section('content')
@isset($id_rekam)
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3><strong>
                Keterangan
            </strong>
                </h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5"><strong>Nama Pasien</strong></div>
            <div class="col-sm-5"><strong>Nama Penyakit</strong></div>
        </div>
        @foreach($id_rekam as $item)
        <div class="row">
            
            <p class="card-text col-sm-5">{{ $item->nama_pasien }}</p>
            <p class="card-text col-sm-5">{{ $item->nama_penyakit }}</p>
        </div>
        <div class="row">
            <div class="col-sm-5"><strong>Tanggal Periksa</strong></div>
        </div>
        <div class="row">
            <p class="card-text col-sm-5">{{ date('d M Y', strtotime($item->tgl_periksa))}}</p>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5"><strong>Keterangan</strong></div>
        </div>
        <div class="row">
            <p class="card-text col-sm-5">{{ $item->keterangan }}</p>
        </div>
        @endforeach
        <a href="/rekam-medis" class="btn btn-primary mt-3">kembali</a>
    </div>
    </div>
</div>
    @else
<div class="container-fluid">
    <h3 class="text-dark mb-4">Riwayat Reservasi</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Reservasi</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div> 
                <div class="col-md-6">
                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Nama Pasien</th>
                            <th>tanggal periksa</th>
                            <th>keterangan</th>
                           
                        </tr>@php $j = 0 @endphp
                        <tr>
                            @foreach ($rekam as $item)
                            @php $j++ @endphp
                            <th>{{ $j }}</th>
                            <th>{{ $item->nama_penyakit }}</th>
                            <th>{{ $item->nama_pasien}}</th>
                            {{-- <th>{{ $item->tgl_periksa->format('d-m-Y') }}</th> --}}
                            <th>{{ date('d M Y', strtotime($item->tgl_periksa))}}</th>
                            <th><form action="" method="post">@csrf<button class="btn py-auto" type="submit"><i class="bi bi-eye-fill"></i></button>
                            <input type="hidden" name="id_rekam" value="{{ $item->id_rekam_medis }}"></form></th>
                        </tr>
                            @endforeach  
                    </thead>
                    <tbody>
                      
                    </tbody>
                    
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endisset
@endsection
@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebar')
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
            <div class="col-sm-5"><strong>Alergi Makanan</strong></div>
        </div>
        <div class="row">
            <p class="card-text col-sm-5">{{ date('d M Y', strtotime($item->tgl_periksa))}}</p>
            <p class="card-text col-sm-5">{{ $item->alergi_makanan }}</p>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5"><strong>Tekanan Darah</strong></div>
            <div class="col-sm-5"><strong>Kadar Asam Urat</strong></div>
        </div>
        <div class="row">
            <p class="card-text col-sm-5">{{ $item->tekanan_darah }}</p>
            <p class="card-text col-sm-5">{{ $item->kadar_asam_urat }}</p>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5"><strong>Kadar gula darah</strong></div>
            <div class="col-sm-5"><strong>kadar kolesterol</strong></div>
        </div>
        <div class="row">
            <p class="card-text col-sm-5">{{ $item->kadar_gula_darah }}</p>
            <p class="card-text col-sm-5">{{ $item->kadar_kolesterol }}</p>
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
    <h3 class="text-dark mb-4">Rekam Medis</h3>
    <div class="card shadow">
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
                            <th>Nama Penyakit</th>
                            <th>Tanggal Periksa</th>
                            <th>Keterangan</th>
                           
                        </tr>@php $j = 0 @endphp
                        <tr>
                            @foreach ($rekam as $item)
                            @php $j++ @endphp
                            <td>{{ $j }}</td>
                            <td>{{ $item->nama_pasien}}</td>
                            <td>{{ $item->nama_penyakit }}</td>
                            {{-- <th>{{ $item->tgl_periksa->format('d-m-Y') }}</th> --}}
                            <td>{{ date('d M Y', strtotime($item->tgl_periksa))}}</td>
                            <td><form action="" method="post">@csrf<button class="btn py-auto" type="submit"><i class="bi bi-eye-fill"></i></button>
                            <input type="hidden" name="id_rekam" value="{{ $item->id_rekam_medis }}"></form></td>
                        </tr>
                            @endforeach  
                    </thead>
                    <tbody>
                      
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
</div>

@endisset
@endsection
@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebar')
<div class="container-fluid">
    <div class="card shadow pb-4">
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
                            <td style="padding-left: 15px">{{ $j }}</td>
                            <td>{{ $item->nama_pasien}}</td>
                            <td>{{ $item->nama_penyakit }}</td>
                            {{-- <th>{{ $item->tgl_periksa->format('d-m-Y') }}</th> --}}
                            <td>{{ date('d M Y', strtotime($item->tgl_periksa))}}</td>
                            <td style="padding-left: 32px"><button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id_rekam_medis }}"><i class="bi bi-eye-fill"></i></button>
                                <div class="modal fade" id="exampleModal{{ $item->id_rekam_medis }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-scrollable">
                                        <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-5"><strong>Nama Pasien</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->nama_pasien }}</p>
                                                </div>
                                            </div>
                                    
                                            <div class="col-12 col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-5"><strong>Tekanan Darah</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->tekanan_darah }}</p>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-5"><strong>Nama Penyakit</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->nama_penyakit }}</p>
                                                </div>
                                            </div>
                                    
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-5"><strong>Kadar Asam Urat</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->kadar_asam_urat }}</p>
                                                </div>
                                            </div>
                                            </div>
                                    
                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-5"><strong>Tanggal Periksa</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ date('d M Y', strtotime($item->tgl_periksa))}}</p>
                                                </div>
                                            </div>
                                    
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-5"><strong>Kadar gula darah</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->kadar_gula_darah }}</p>
                                                </div>
                                            </div>
                                    
                                            </div>
                                    
                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-5"><strong>Alergi Makanan</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->alergi_makanan }}</p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-5"><strong>kadar kolesterol</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->kadar_kolesterol }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    
                                            <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="row mt-3">
                                                    <div class="col-sm-5"><strong>Keterangan</strong></div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text col-sm-5">{{ $item->keterangan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                        
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

@endsection
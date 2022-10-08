
@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')
@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

@endsection
<div class="container-fluid">
    <div class="row d-flex justify-content-between">
        <div class="col-sm-5 d-flex justify-content-start">
        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#buatrekammedis"><i class="bi bi-calendar-plus"></i> Buat Rekam Medis</a></h3>
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="buatrekammedis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog-scrollable modal-dialog ">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">
    <p class="text-primary m-0 fw-bold">Buat Rekam Medis</p>
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/tambah-rekam-medis" method="POST">
            @csrf
        <div class="row">
            <div class="col-sm-5">Nama User</div>
            <div class="col-lg-6">
   

                {{-- <input required class="form-control form-control-sm" type="text" name="nama_user" value="{{ old('nama_user') }}"  placeholder="{{ __('Nama Akun') }}" > --}}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Nama Pasien</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="text" name="nama_pasien" value="{{ old('nama_pasien') }}"  placeholder="{{ __('Nama Pasien ') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Tanggal Periksa</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="text" name="tgl_periksa"  placeholder="{{ __('Tanggal periksa') }}" onmouseover="(this.type='date')" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Nama Penyakit</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="text" name="nama_penyakit" value="{{ old('nama_penyakit') }}"  placeholder="{{ __('Nama Penyakit') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Kadar Gula Darah</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="number" name="kadar_gula_darah" value="{{ old('kadar_gula_darah') }}"  placeholder="{{ __('Kadar Gula Darah') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Kadar Kolesterol</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="number" name="kadar_kolesterol" value="{{ old('kadar_kolesterol') }}"  placeholder="{{ __('Kadar Kolesterol') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Kadar Asam Urat</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="number" name="kadar_asam_urat" value="{{ old('kadar_asam_urat') }}"  placeholder="{{ __('Kadar Asam Urat') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Tekanan Darah</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="text" name="tekanan_darah" value="{{ old('tekanan_darah') }}"  placeholder="{{ __('Tekanan Darah') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Alergi Makanan</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="text" name="alergi_makanan" value="{{ old('alergi_makanan') }}"  placeholder="{{ __('Alergi Makanan') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Keterangan</div>
            <div class="col-lg-5">
                <input required class="form-control form-control-sm" type="text" name="keterangan" value="{{ old('keterangan') }}"  placeholder="{{ __('Keterangan Tambahan') }}" >
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">

        <div class="col-7 col-md-5 col-xl-3 mb-3">
            <button type="submit" class="btn bg-primary text-white col">Submit</button>
        </form>
        </div>
    </div>
    
  </div>
</div>
</div>
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
                        <th>Aksi</th>

                    </tr>@php $j = 0 @endphp
                    <tr>
                        @foreach ($rekam as $item)
                        @php $j++ @endphp
                        <td style="padding-left: 15px">{{ $j }}</td>
                        <td>{{ $item->nama_pasien}}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <th>{{ $item->tgl_periksa->format('d-m-Y') }}</th> --}}
                        <td>{{ date('d M Y', strtotime($item->tgl_periksa))}}</td>
                        <td style="padding-left: 32px"><button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#edit_rekam_medis{{ $item->id_rekam_medis }}"><i class="bi bi-pencil-square"></i></button> </td>
                        <div>
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
                        </div>
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
{{-- end of container --}}
</div>
@endsection

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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="card shadow">
  
    <div class="card-header">
      <h5 class="modal-title" id="exampleModalLabel">
    <p class="text-primary m-0 fw-bold">Buat Rekam Medis</p>
      </h5>
    </div>
    <div class="modal-body">
        <form action="/tambah-rekam-medis" method="POST">
            @csrf
        <div class="row">
            <div class="col-sm-5">Nama User</div>
            <div class="col-sm-5">
                <select name="nama_user" class='js-example-basic-single form-control form-control-sm '>
                    <option  selected></option>
                    @foreach($pasien as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endforeach
                </select> 
                @error('nama_user')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
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
                <input required class="form-control form-control-sm" type="text" value="{{ old('tgl_periksa') }}" name="tgl_periksa"  placeholder="{{ __('Tanggal periksa') }}" onclick="(this.type='date')" >
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
                <input  class="form-control form-control-sm" type="number" name="kadar_gula_darah" value="{{ old('kadar_gula_darah') }}"  placeholder="{{ __('Kadar Gula Darah') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Kadar Kolesterol</div>
            <div class="col-lg-5">
                <input  class="form-control form-control-sm" type="number" name="kadar_kolesterol" value="{{ old('kadar_kolesterol') }}"  placeholder="{{ __('Kadar Kolesterol') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Kadar Asam Urat</div>
            <div class="col-lg-5">
                <input  class="form-control form-control-sm" type="number" name="kadar_asam_urat" value="{{ old('kadar_asam_urat') }}"  placeholder="{{ __('Kadar Asam Urat') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Tekanan Darah</div>
            <div class="col-lg-5">
                <input  class="form-control form-control-sm" type="text" name="tekanan_darah" value="{{ old('tekanan_darah') }}"  placeholder="{{ __('Tekanan Darah') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Alergi Makanan</div>
            <div class="col-lg-5">
                <input  class="form-control form-control-sm" type="text" name="alergi_makanan" value="{{ old('alergi_makanan') }}"  placeholder="{{ __('Alergi Makanan') }}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-5">Keterangan</div>
            <div class="col-lg-5">
                <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample1" placeholder="Masukkan Keterangan" name="keterangan" rows="4">{{ old('keterangan') }}</textarea>
                  </div>
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
<a href="/kelola-rekam-medis" class="btn col-1 btn-primary mt-5">
    Kembali
</a>
</div>
<script type="text/javascript">
// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    
    
    </script>
    
@endsection
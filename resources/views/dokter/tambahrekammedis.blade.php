@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebardokter')


<div class="container">

<div class="card shadow">

    <div class="card-header">
      <h5 class="modal-title" id="exampleModalLabel">
    <p class="text-primary m-0 fw-bold">Buat Rekam Medis</p>
      </h5>
    </div>
    <div class="modal-body">
        <form action="/tambah-rekam-medis-dokter" method="POST">
            @csrf
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Nama User</div>
            <div class="col-lg-7">
                <select name="nama_user" required class='form-control form-control-lg js-example-basic-single'>
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
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Nama Pasien</div>
            <div class="col-lg-7">
                <input required class="form-control form-control-sm" type="text" name="nama_pasien" value="{{ old('nama_pasien') }}"  placeholder="{{ __('Nama Pasien ') }}" >

            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Usia</div>
            <div class="col-lg-7">
                <input required class="form-control form-control-sm" type="number" min="0"  name="usia" value="{{ old('usia') }}"  placeholder="{{ __('Masukkan Usia ') }}" >

            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Tanggal Periksa</div>
            <div class="col-lg-7">
                <input required class="form-control form-control-sm" type="text" value="{{ old('tgl_periksa') }}" name="tgl_periksa"  placeholder="{{ __('Tanggal periksa') }}" onclick="(this.type='date')" >
            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Nama Penyakit</div>
            <div class="col-lg-7">
                <input required class="form-control form-control-sm" type="text" name="nama_penyakit" value="{{ old('nama_penyakit') }}"  placeholder="{{ __('Nama Penyakit') }}" >
            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Kadar Gula Darah</div>
            <div class="col-lg-7">
                <input  class="form-control form-control-sm" type="number" name="kadar_gula_darah" value="{{ old('kadar_gula_darah') }}"  placeholder="{{ __('Kadar Gula Darah') }}" >
            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Kadar Kolesterol</div>
            <div class="col-lg-7">
                <input  class="form-control form-control-sm" type="number" name="kadar_kolesterol" value="{{ old('kadar_kolesterol') }}"  placeholder="{{ __('Kadar Kolesterol') }}" >
            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Kadar Asam Urat</div>
            <div class="col-lg-7">
                <input  class="form-control form-control-sm" type="number" name="kadar_asam_urat" value="{{ old('kadar_asam_urat') }}"  placeholder="{{ __('Kadar Asam Urat') }}" >
            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Tekanan Darah</div>
            <div class="col-lg-7">
                <input  class="form-control form-control-sm" type="text" name="tekanan_darah" value="{{ old('tekanan_darah') }}"  placeholder="{{ __('Tekanan Darah') }}" >
            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Alergi Makanan</div>
            <div class="col-lg-7">
                <input  class="form-control form-control-sm" type="text" name="alergi_makanan" value="{{ old('alergi_makanan') }}"  placeholder="{{ __('Alergi Makanan') }}" >
            </div>
        </div>
        <div class="row mt-3 d-flex align-items-center justify-content-between">
            <div class="col-sm-5">Keterangan</div>
            <div class="col-lg-7">
                <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample1" placeholder="Masukkan Keterangan" name="keterangan" rows="4">{{ old('keterangan') }}</textarea>
                  </div>
            </div>
        </div>

    </div>
    <div class="row d-flex justify-content-center">

        <div class="col-7 col-md-5 col-xl-3 mb-3">
            <button type="submit" class="btn bg-primary text-white col">Kirim</button>
        </form>
        </div>
    </div>


</div>
<a href="/kelola-rekam-medis" class="btn col-5 col-md-2 btn-primary mt-5 mb-5">
    Kembali
</a>
</div>

<script type="text/javascript">

// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.js-example-basic-single').select2({
        theme: "bootstrap",
    });
});


    </script>

@endsection

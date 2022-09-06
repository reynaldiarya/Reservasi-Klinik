@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="ms-5 col-sm-4">
      <h2 class="text-center mb-4">Register</h2>
      <form>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label">Nama Pasien</label>
            <input type="text" id="formnama" class="form-control" placeholder="Nama Pasien" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label">Tanggal Lahir Pasien</label>
            <input type="date" id="formtgllahir" class="form-control" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label">Alamat Pasien</label>
            <input type="text" id="formalamat" class="form-control" placeholder="Alamat Pasien" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label">No HP Pasien</label>
            <input type="number" id="formnohp" class="form-control" placeholder="No HP Pasien" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label">Email</label>
            <input type="email" id="formemail" class="form-control" placeholder="Email" />
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label">Password</label>
            <input type="password" id="formpass" class="form-control" placeholder="Password" />
        </div>
      
        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4">Daftar</button>
      
        <!-- Register buttons -->
        <div class="text-center">
          <p>Sudah menjadi member? <a href="/login">Masuk</a></p>
        </div>
      </form>
    </div>

   
  </div>
</div>
@endsection
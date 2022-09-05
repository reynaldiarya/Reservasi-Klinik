@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="ms-5 col-sm-4">
      <h2 class="text-center mb-4">Register</h2>
      <form>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Nama Pasien</label>
            <input type="text" id="form2Example1" class="form-control" placeholder="Nama Pasien" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Tanggal Lahir Pasien</label>
            <input type="date" id="form2Example1" class="form-control" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Alamat Pasien</label>
            <input type="text" id="form2Example1" class="form-control" placeholder="Alamat Pasien" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">No HP Pasien</label>
            <input type="number" id="form2Example1" class="form-control" placeholder="No HP Pasien" />
          </div>
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email Address</label>
            <input type="email" id="form2Example1" class="form-control" placeholder="Email Address" />
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" class="form-control" placeholder="Password" />
        </div>
      
        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4">Register</button>
      
        <!-- Register buttons -->
        <div class="text-center">
          <p>Sudah menjadi member? <a href="/login">Login</a></p>
        </div>
      </form>
    </div>

   
  </div>
</div>
@endsection
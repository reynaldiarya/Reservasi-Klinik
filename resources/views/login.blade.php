@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center ">
    <div class="ms-5 col-sm-4">
      <div class="d-flex justify-content-center">

        <img src="img/logo.png" class="mb-3" width="50">
      </div>
      <div class="justify-content-center ">
        
          <form>
            {{-- email input --}}
            <div class="input-group mt-3 mb-3">
              <input type="text" class="form-control" placeholder="Username" aria-label="username" aria-describedby="basic-addon2">
              <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
            </div>
            <!-- Password input -->
            <div class="input-group mt-3 mb-3">
              <input type="text" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon2">
              <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
            </div>
          
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex ">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                  <label class="form-check-label" for="form2Example31">ingat saya </label>
                </div>
              </div>
          
              <div class="col"> 
                <!-- Simple link -->
                {{-- <a href="#!">Forgot password?</a> --}}
              </div>
            </div>
          
            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4">Masuk</button>
          
            <!-- Register buttons -->
            <div class="text-center">
              <p>Belum punya akun? <a href="/register">Daftar</a></p>
              
            </div>
          </form>
        </div>
    </div>

   
  </div>
</div>
@endsection
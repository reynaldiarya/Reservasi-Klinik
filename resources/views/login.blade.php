@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="ms-5 col-sm-4">
      <h2 class="text-center mb-4">Login</h2>
      <form>
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
        <button type="button" class="btn btn-primary btn-block mb-4">Masuk</button>
      
        <!-- Register buttons -->
        <div class="text-center">
          <p>Belum menjadi member? <a href="/register">Daftar</a></p>
        </div>
      </form>
    </div>

   
  </div>
</div>
@endsection
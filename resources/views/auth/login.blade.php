@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="ms-5 col-sm-4">
      <h2 class="text-center mb-4">Login</h2>
      {{-- @if ($errors->any())
      <div class="alert alert-danger border-left-danger" role="alert">
          <ul class="pl-4 my-2">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif --}}
      <form method="POST" action="/login" class="user">
        @csrf

        <div class="form-group mb-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control form-control-user " name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
        </div>

     

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Login') }}
            </button>
        </div>

    </form>

 


        <div class="text-center">
            <a class="small" href="/register">Create an Account!</a>
        </div>
    </div>

   
  </div>
</div>
@endsection
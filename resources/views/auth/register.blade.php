@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="ms-5 col-sm-4">
      <h2 class="text-center mb-4">Register</h2>
      @if ($errors->any())
      <div class="alert alert-danger border-left-danger" role="alert">
          <ul class="pl-4 my-2">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif

      <form method="POST" action="{{ route('register') }}" class="user">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group mb-4">
            <label class="form-label">Nama Pasien</label>
            <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Nama Pasien') }}" value="{{ old('Nama Pasien') }}" required autofocus>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Tanggal Lahir Pasien</label>
            <input type="date" class="form-control form-control-user" name="birthday" placeholder="{{ __('Tanggal Lahir Pasien') }}" value="{{ old('Tanggal Lahir Pasien') }}" required>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Alamat Pasien</label>
            <input type="text" class="form-control form-control-user" name="address" placeholder="{{ __('Alamat Pasien') }}" value="{{ old('Alamat Pasien') }}" required>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">No Hp Pasien</label>
            <input type="number" class="form-control form-control-user" name="telp" placeholder="{{ __('No Hp Pasien') }}" value="{{ old('No Hp Pasien') }}" required>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('Email') }}" value="{{ old('Email') }}" required>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Password Confirmation</label>
            <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Register') }}
            </button>
        </div>
    </form>

    <div class="text-center">
            <a class="small" href="{{ route('login') }}">
                {{ __('Already have an account? Login!') }}
            </a>
        </div>
    </div>

   
  </div>
</div>
@endsection
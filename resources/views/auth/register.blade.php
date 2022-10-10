@extends('maintemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <h2 class="text-center mb-4">Register</h2>
      {{-- @if ($errors->any())
      <div class="alert alert-danger border-left-danger" role="alert">
          <ul class="pl-4 my-2">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif --}}

      <form method="POST" action="/register" class="user">
        @csrf

        <div class="form-group mb-4">
            <label class="form-label">Nama Pasien</label>
            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Nama Pasien') }}" value="{{ old('name') }}" >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Tanggal Lahir Pasien</label>
            <input type="text" class="form-control form-control-user @error('birthday') is-invalid @enderror" name="birthday" placeholder="{{ __('Tanggal Lahir Pasien') }}" value="{{ old('birthday') }}" onmouseenter="(this.type='date')" >
            @error('birthday')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Alamat Pasien</label>
            <input type="text" class="form-control form-control-user @error('address') is-invalid @enderror" name="address" placeholder="{{ __('Alamat Pasien') }}" value="{{ old('address') }}" >
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">No Hp Pasien</label>
            <input type="text " class="form-control form-control-user @error('telp') is-invalid @enderror" name="telp" placeholder="{{ __('No Hp Pasien') }}" value="{{ old('telp') }}" >
            @error('telp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Email</label>
            <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" >
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" >
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('Konfirmasi Password') }}" >
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Register
            </button>
        </div>
    </form>

    <div class="text-center">
            <a class="small" href="/login">
                Sudah memiliki akun? Login!
            </a>
        </div>
    </div>

  </div>
</div>
@endsection
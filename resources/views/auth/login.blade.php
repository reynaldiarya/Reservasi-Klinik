@extends('maintemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <h2 class="text-center mb-4">Login</h2>
      @isset($registberhasil)
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Akun berhasil dibuat silahkan login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endisset
      @if(session()->has('salah'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('salah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

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
            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email') }}" value="
            @if(isset($email))
                {{ $email }}
                @endif
                @if(session()->has('email'))
                {{ session('email') }}
                @else

                {{ old('email') }}
            @endif " autofocus>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                <i class="bi bi-box-arrow-right"></i> Login
            </button>
        </div>

    </form>
        <div class="text-center">
            <a class="small" href="/register">Buat sebuah akun!</a>
        </div>
    </div>
  </div>
</div>
@endsection
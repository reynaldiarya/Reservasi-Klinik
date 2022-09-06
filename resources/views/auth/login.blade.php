@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="ms-5 col-sm-4">
      <h2 class="text-center mb-4">Login</h2>
      @if ($errors->any())
      <div class="alert alert-danger border-left-danger" role="alert">
          <ul class="pl-4 my-2">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <form method="POST" action="{{ route('login') }}" class="user">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group mb-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group mb-2">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
        </div>

        <div class="form-group mb-3">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Login') }}
            </button>
        </div>

    </form>

    @if (Route::has('password.request'))
        <div class="text-center">
            <a class="small" href="{{ route('password.request') }}">
                {{ __('Forgot Password?') }}
            </a>
        </div>
    @endif

    @if (Route::has('register'))
        <div class="text-center">
            <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
        </div>
    @endif
    </div>

   
  </div>
</div>
@endsection
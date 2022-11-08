@extends('maintemplate')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-4">
      <h2 class="text-center mb-4">Lupa Password</h2>
      @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
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

      <form method="POST" action="/lupa-password" class="user">
        @csrf
        <div class="form-group mb-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('Email') }}" autofocus>
            @if ($errors->has('email'))
                <span class="text-danger">Email tidak ditemukan</span>
            @endif
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary btn-user btn-block">
               Atur Ulang Kata Sandi
            </button>
        </div>

    </form>
        <div class="text-center">
            <a class="small" href="/login">Login</a>
        </div>
    </div>
  </div>
</div>
@endsection
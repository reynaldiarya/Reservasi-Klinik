@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')

<body id="page-top">
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4">
                    <figure class="rounded-circle avatar avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ strtoupper(Auth::user()->name[0]) }}"></figure>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">{{  Auth::user()->fullName }}</h5>
                                <p>Staff</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Akun Saya</h6>
                </div>
                @if(session()->has('success'))
                <div class="mt-3 ms-5 col-9 col-sm-10 col-xl-10 alert alert-success fade show" role="alert">
                    {{ session('success')}}
                </div>
                @endif
                <div class="card-body">

                    <form method="POST" action="/profile-update-staff" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Nama<span class="small text-danger"> *</span></label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="birthday">Tanggal Lahir<span class="small text-danger"> *</span></label>
                                        <input type="date" id="birthday" class="form-control" name="birthday" placeholder="hh/bb/tttt" value="{{ old('birthday', Auth::user()->birthday) }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="address">Alamat<span class="small text-danger"> *</span></label>
                                        <input type="text" id="address" class="form-control" name="address" placeholder="Address" value="{{ old('address', Auth::user()->address) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="telp">No Handphone<span class="small text-danger"> *</span></label>
                                        <input type="integer" id="telp" class="form-control" name="telp" placeholder="08" value="{{ old('telp', Auth::user()->telp) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Alamat Email<span class="small text-danger"> *</span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="email@gmail.com" value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="current_password">Password Sekarang</label>
                                        <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Password Sekarang">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">Password Baru</label>
                                        <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Konfirmasi Password</label>
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection

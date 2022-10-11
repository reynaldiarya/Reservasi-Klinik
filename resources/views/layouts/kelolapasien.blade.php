@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')
@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" id="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

@endsection

<div class="container-fluid">
    @if(session()->has('success'))
    <div class="mt-3 col-md-4 text-center alert alert-success fade show" role="alert">
        {{ session('success')}}
    </div>

    @endif
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Pasien</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table " id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Aksi</th>

                        </thead>
                        <tbody>
                    @php $j = 0 @endphp
                        <tr>
                            @foreach ($user as $item)
                            @php $j++ @endphp
                            <td>{{ $j }}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ date('d M Y', strtotime($item->birthday))}}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telp }}</td>
                            <td><button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Edit Data Pasien</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                    <div class="modal-body">
                                        <form action="/profile-update-pasien" method="POST">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="name">Nama<span class="small text-danger"> *</span></label>
                                                        <input type="text" required id="name" class="form-control" name="name" placeholder="Name" value="{{ $item->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="birthday">Tanggal Lahir<span class="small text-danger"> *</span></label>
                                                        <input type="date" id="birthday" required class="form-control" name="birthday" placeholder="hh/bb/tttt" value="{{ $item->birthday }}">
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="address">Alamat<span class="small text-danger"> *</span></label>
                                                            <input type="text" id="address" required class="form-control" name="address" placeholder="Address" value="{{ $item->address }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="telp">No Handphone<span class="small text-danger"> *</span></label>
                                                            <input type="integer" id="telp" required class="form-control" name="telp" placeholder="08" value="{{ $item->telp }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex justify-content-center">

                                                    <div class="col-7 col-md-5 col-xl-5 mb-3">
                                                        <button type="submit" class="btn bg-primary text-white col">Simpan Perubahan</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
            <div class="row">
                <div class="col-md-5 align-self-center">
                </div>
                <div class="col-md-5">
                    <nav class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            {{ $user->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
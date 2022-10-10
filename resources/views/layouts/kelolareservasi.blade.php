<link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">

@extends('maintemplatedashboard')
@extends('partials.sidebarstaff')
@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endsection
@section('content')

<div class="container-fluid">
    
    @if(session()->has('success'))
    <div class="mt-3 ms-5 col-9 col-sm-10 col-xl-10 alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="card shadow pb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Reservasi</p>
        </div>
        <div class="card-body">
        <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table " id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Reservasi</th>
                        <th>Keluhan</th>
                        <th>No Antrian</th>
                        <th >Status Hadir</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $i=1;
                    @endphp
                    @foreach($reservasi as $item)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $item->nama_pasien }}
                        </td>
                        <td>
                            {{ $item->tgl_reservasi }}
                        </td>
                        <td>
                            {{ $item->keluhan }}
                        </td>
                        <td>{{ $item->no_antrian }}</td>
                        <td>
                            <form action="edit-reservasi" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id_reservasi }}">
                                <input type="hidden" name="tgl" value="{{ $item->tgl_reservasi }}">
                                <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected value="{{ $item->status_hadir }}">
                                        @if( $item->status_hadir ==0)
                                        Belum Hadir
                                        @endif
                                        @if( $item->status_hadir ==1)
                                        Hadir
                                        @endif
                                        @if( $item->status_hadir==2)
                                        Tidak Hadir
                                        @endif</option>
                                    <option value="1">Hadir</option>
                                    <option value="2">Tidak Hadir</option>
                                </select>
                                <button title="Simpan" type="submit" class="btn btn-primary"><i class="bi bi-save2"></i></button>

                            </form>

                        </td>
                <td>
                    <a class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#hapusjadwal{{ $item->id_reservasi }}" ><i class="bi bi-trash-fill"></i></a>
                </td>
                <div>
                    <div class="modal fade" id="hapusjadwal{{ $item->id_reservasi }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Reservasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/hapus-reservasi" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                <input type="hidden" name="tgl" value="{{ $item->tgl_reservasi }}">

                                        <input type="hidden" name="id" value="{{ $item->id_reservasi }}">
                                        <strong>Apakah anda yakin untuk menghapus?</strong>
                                    </div>
                                        <div class="modal-footer">
                                            <div class="col-4 ">
                                                <button type="submit" class="btn bg-danger text-white col">Ya yakin</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak jadi </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </thead>

        </table>

    </div>
    <div class="row">
        <div class="col-md-6 align-self-center">
        </div>
        <div class="col-md-6">
            {{ $reservasi->links() }}
        </div>
    </div>
    <div>
</div>
</div>

@endsection
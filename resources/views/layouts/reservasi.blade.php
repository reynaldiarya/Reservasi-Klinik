@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebar')
<div class="container-fluid">

    @if(session()->has('salah'))
    <div class="alert alert-danger col-md-6 alert-dismissible fade show" role="alert">
        {{ session('salah')}}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session()->has('reservasiBerhasil'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('reservasiBerhasil')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row ">

        <div class="col-sm-12 text-end">
            <a  data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link"><i class="fa-solid fa-calendar-plus"></i> Buat reservasi</a></h3>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Reservasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/reservasi" method="POST">
                @csrf
                <div class="row d-flex align-items-center justify-content-between">
                <div class="col-5">Nama Pasien</div>
                <div class="col-lg-7">
                    <input required class="form-control form-control-sm" type="text" name="namaPasien"  @if (session()->has('namaPasien') )value= "{{ session('namaPasien') }}" @endif id="nama" placeholder="Nama Pasien"></div>
            </div>
            <div class="row mt-3 d-flex align-items-center justify-content-between">
                <div class="col-5">Tanggal Reservasi</div>
                <div class="col-lg-7">
                    <input required class="form-control form-control-sm" type="text" name="tglReservasi"  placeholder="{{ __('Tanggal Reservasi') }}" onmouseover="(this.type='date')" >
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-5">Keluhan</div>
                <div class="col-lg-7v">
                    <textarea required class="form-control form-control-sm" name="keluhan" placeholder="Masukan Keluhan Anda">{{ session('keluhan') }}</textarea>
                </div>
            </div>
            <div class="row d-flex justify-content-center">

                <div class="col-7 col-md-5 col-xl-3 mt-3">
                    <button type="submit" class="btn bg-primary text-white col">Submit</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Reservasi</p>
        </div>
        {{-- <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                        <option value="10" selected="">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                </div>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table " id="dataTable">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Reservasi</th>
                            <th>Keluhan</th>
                            <th>No Antrian</th>
                            <th>Status Hadir</th>

                        </tr>
                    </thead>
                    <tbody> @php $no = 0; @endphp
                        @foreach ($reservasi as $item)
                        <tr>
                            @php $no++ @endphp
                            <td>{{ $no }}</td>
                            <td>{{ $item->nama_pasien }}</td>
                            <td>{{  date('d M Y', strtotime($item->tgl_reservasi)) }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td>{{ $item->no_antrian }}</td>
                            @if ($item->status_hadir ==0 )
                            <td>Belum Hadir</td>
                            @endif
                            @if ($item->status_hadir ==1)
                            <td>Hadir</td>
                            @endif
                            @if ($item->status_hadir ==2)
                            <td>Tidak Hadir</td>
                            @endif



                        </div>
                    </div>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div>
            <div class="row">
                <div class="col-md-5 align-self-center">
                </div>
                <div class="col-md-5">
                    <nav class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            {{ $reservasi->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
</div>
</div>
@endsection
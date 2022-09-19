@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebar')
@isset($create)
<div class="container-fluid">
    @if(session()->has('salah'))
    <div class="alert alert-danger col-sm-4" role="alert">
      {{ session('salah')}}
    </div>
    @endif
<div class="card">
    <div class="card-header">
   <h1>Form Reservasi</h1>
    </div>
    <div class="card-body">
        <form action="/create-reservasi" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-3" ><label for="nama">Nama Pasien</label></div>
            <div class="col-lg-5"><input required class="form-control form-control-sm" type="text" name="namaPasien"  @if (session()->has('namaPasien') )value= "{{ session('namaPasien') }}" @endif id="nama" placeholder="nama pasien"></div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-3">Tanggal Reservasi</div>
            <div class="col-sm-5">
                <input type="text" name="tglReservasi" class="form-control form-control-user"  placeholder="{{ __('Tanggal Lahir Pasien') }}" onmouseover="(this.type='date')" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-3" > <label for="nama">Keluhan</label></div>
        <div class="col-lg-5"><div class="form-floating">
            <textarea required name="keluhan" class="form-control" placeholder="Masukan keluhan and" id="floatingTextarea2"  style="height: 100px"></textarea>
            <label value = "tes" for="floatingTextarea2">Masukan keluhan anda</label>
          </div></div>
    </div>
    </div>
    <div class="row">
        
        <div class="col">
            <button type="submit" class="btn bg-primary text-white col-sm-2">Submit</button>
        </form>
        </div>
    </div>
</div>
<a href="/reservasi"  class="btn bg-primary text-white mt-4">Kembali</a>


</div>
    @else
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5">
            <h3 class="text-dark mb-4">Reservasi 
            </div>
            <div class="col-lg-5">
                
        <a href="/create-reservasi" class="btn "><i class="bi bi-calendar-plus"></i> Buat reservasi</a></h3>
    </div>
</div>

    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Reservasi</p>
        </div>
        <div class="card-body">
            <div class="row">
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
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
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
                            <td>No Antrian</td>
                            <td>Status Hadir</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
@endsection
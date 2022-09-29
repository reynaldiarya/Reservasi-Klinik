@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebarstaff')

<div class="container-fluid">
    @if(session()->has('success'))

    <div class="mt-3 ms-5 col-9 col-sm-10 col-xl-10 alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row d-flex justify-content-between">
        <div class="col-sm-5 d-flex justify-content-start">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#buatjadwal"><i class="bi bi-calendar-plus"></i> Buat jadwal</a></h3>
        </div>
    </div>
<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="buatjadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
        <p class="text-primary m-0 fw-bold">Buat Jadwal</p>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/makejadwal" method="POST">
                @csrf
            <div class="row">
                <div class="col-sm-3">Tanggal Jadwal</div>
                <div class="col-lg-5">
                    <input required class="form-control form-control-sm" type="text" name="tglReservasi"  placeholder="{{ __('Tanggal Jadwal') }}" onmouseover="(this.type='date')" >
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">Jam Masuk</div>
                <div class="col-lg-5">
                    <input required class="form-control form-control-sm" type="text" name="jamMasuk"  placeholder="{{ __('Jam Masuk') }}" onmouseover="(this.type='time')" >
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">Jam Pulang</div>
                <div class="col-lg-5">
                    <input required class="form-control form-control-sm" type="text" name="jamKeluar"  placeholder="{{ __('Jam Pulang') }}" onmouseover="(this.type='time')" >
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">Max Pasien</div>
                <div class="col-lg-5">
                    <input required class="form-control form-control-sm" type="number" min="0" name="maxPasien"  placeholder="{{ __('Jumlah Maximal Pasien') }}"  >
                </div>
            </div>
        
        </div>
        <div class="row d-flex justify-content-center">
    
            <div class="col-7 col-md-5 col-xl-3 mb-3">
                <button type="submit" class="btn bg-primary text-white col">Submit</button>
            </form>
            </div>
        </div>
        
      </div>
    </div>
  </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Jadwal</p>
        </div>
 
            <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table " id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Status Masuk</th>
                            <th>Jumlah Max Pasien</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody> @php $no = 0; @endphp
                        @foreach ($jadwal as $item)
                        <tr>
                            @php $no++ @endphp
                            <td>{{ $no }}</td>
                            <td>{{  date('d M Y', strtotime($item->tgl_jadwal)) }}</td>
                            <td>{{ $item->jam_masuk }}</td>
                            <td>{{ $item->jam_pulang }}</td>
                            @if ($item->status_masuk ==0 )
                            <td>Hadir</td>
                            @endif
                            @if ($item->status_masuk ==1)
                            <td>Tidak Hadir</td>
                            @endif
                            <td>{{ $item->jumlah_maxpasien }}</td>
                            <td>
                                <a class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#editjadwal" ><i class="bi bi-pencil-square"></i></a>
                           <div class="modal fade" id="editjadwal" tabindex="-1"  aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      {{ $item->tgl_jadwal }}
                                    </div>
                                   
                                  </div>
                                </div>
                              </div>
                        </td>
                        <td>
                            <i class="bi bi-trash-fill"></i>
                            </td>
                           

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end me-5 dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            {{ $jadwal->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
</div>

@endsection
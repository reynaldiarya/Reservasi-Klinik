@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')
@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" id="search" class="form-control bg-light border-1 small rounded-5" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          
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
    @error('tgl_jadwal')
    <div class="mt-3 ms-5 col-9 col-sm-10 col-xl-10 alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @enderror

    <div class="row ">

        <div class="col-sm-12 text-end">
            <a  data-bs-toggle="modal" data-bs-target="#buatjadwal" class="nav-link"><i class="fa-solid fa-calendar-plus"></i> Buat jadwal</a></h3>
        </div>
    </div>
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="buatjadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Jadwal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/tambah-jadwal" method="POST">
                @csrf
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-5">Tanggal Jadwal</div>
                <div class="col-lg-7">
                    <input required class="form-control form-control-sm" type="text" name="tgl_jadwal"  placeholder="{{ __('Tanggal Jadwal') }}" onmouseover="(this.type='date')" >
                </div>
            </div>
            <div class="row mt-3 d-flex align-items-center justify-content-between">
                <div class="col-5">Jam Masuk</div>
                <div class="col-lg-7">
                    <input required class="form-control form-control-sm" type="text" name="jam_masuk" value="{{ old('jam_masuk') }}"  placeholder="{{ __('Jam Masuk') }}" onmouseover="(this.type='time')" >
                </div>
            </div>
            <div class="row mt-3 d-flex align-items-center justify-content-between">
                <div class="col-5">Jam Pulang</div>
                <div class="col-lg-7">
                    <input required class="form-control form-control-sm" type="text" name="jam_pulang" value="{{ old('jam_pulang') }}"  placeholder="{{ __('Jam Pulang') }}" onmouseover="(this.type='time')" >
                </div>
            </div>
            <div class="row mt-3 d-flex align-items-center justify-content-between">
                <div class="col-5">Max Pasien</div>
                <div class="col-lg-7">
                    <input required class="form-control form-control-sm" type="number" min="0" name="max_pasien" value="{{ old('max_pasien') }}" placeholder="{{ __('Jumlah Maximal Pasien') }}"  >
                </div>
            </div>

        </div>
        <div class="row d-flex justify-content-center">

            <div class="col-7 col-md-5 col-xl-5 mb-4">
                <button type="submit" class="btn bg-primary text-white col">Simpan Perubahan</button>
            </form>
            </div>
        </div>

      </div>
    </div>
  </div>
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Jadwal</p>
        </div>
        <div class="card-body">

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
                            <th style="padding-left: 32px">Aksi</th>

                        </tr>
                    </thead>
                    <tbody id="alldata" > @php $no = 0; @endphp
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
                                <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#editjadwal{{ $item->id_jadwal }}" ><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#hapusjadwal{{ $item->id_jadwal }}" ><i class="fa-solid fa-trash-can"></i></button>

                        </td>
                    <div>
                        <div class="modal fade" id="hapusjadwal{{ $item->id_jadwal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/hapus-jadwal" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{ $item->id_jadwal }}">
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
                        <div class="modal fade" id="editjadwal{{ $item->id_jadwal }}" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="editjadwal{{ $item->id_jadwal }}">Edit Jadwal</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="/edit-jadwal" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id_jadwal }}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="tgl">Tanggal<span class="small text-danger"> *</span></label>
                                                <input type="date" required id="tgl" class="form-control" name="tgl_jadwal"  value="{{ $item->tgl_jadwal}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="status">Status Masuk<span class="small text-danger"> *</span></label>
                                                <select  name ="status" class="form-select" aria-label="Default select example">
                                                    <option value="{{ $item->status_masuk }}" selected>@if ($item->status_masuk == 0 )
                                                        Hadir
                                                        @else
                                                        Tidak Hadir
                                                        @endif</option>
                                                    <option value="0">Hadir</option>
                                                    <option value="1">Tidak Hadir</option>
                                                  </select>
                                                </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="jam_masuk">Jam Masuk<span class="small text-danger"> *</span></label>
                                                    <input type="time" id="jam_masuk" required class="form-control" name="jam_masuk" value="{{ $item->jam_masuk }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="jam_pulang">Jam Pulang<span class="small text-danger"> *</span></label>
                                                    <input type="time" id="jam_pulang" required class="form-control" name="jam_pulang"  value="{{ $item->jam_pulang }}">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="Max Pasien">Max Pasien<span class="small text-danger"> *</span></label>
                                                    <input type="number" min="0" id="Max Pasien" required class="form-control" name="jumlah_maxpasien" value="{{ $item->jumlah_maxpasien }}">
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

                                </div>

                              </div>
                            </div>
                          </div>

                        </tr>
                        @endforeach
                    </tbody>
                    <tbody id="konten"></tbody>

                </table>
            </div>
            <div class="row">
                <div class="col-md-5 align-self-center">
                </div>
                <div class="col-md-5">
                    <nav class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            {{ $jadwal->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
</div>
<script type="text/javascript">
$('#search').on('keyup',function () {
   $value=$(this).val();
   if($value){
    $('#alldata').hide();
    $('.pagination').hide();
}else{
    $('#alldata').show();
    $('.pagination').show();
}
   $.ajax({
    type:'get',
    url:'{{ URL::to('cari-jadwal')}}',
    data:{'cari-jadwal': $value},
    success:function(data){
        $('#konten').html(data);
        
        
    }
   });
})
</script>

@endsection
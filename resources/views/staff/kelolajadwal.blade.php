@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')
@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" id="search" class="form-control bg-light border-1 small rounded-3" placeholder="Pencarian untuk..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
        </div>
    </div>
</form>
@endsection

@section('searchm')
<li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                <input type="searchm" id="searchm" class="form-control bg-light border-0 small" placeholder="Pencarian untuk..." aria-label="Search" aria-describedby="basic-addon2">
            </div>
        </form>
    </div>
</li>
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
                    <input required class="form-control form-control-sm" type="text" name="tgl_jadwal" min="{{ date('Y-m-d') }}" placeholder="{{ __('Tanggal Jadwal') }}" onmouseover="(this.type='date')" >
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
            <div class="row mb-2 ">
                <div class="col-md-2">

                        <form action="/kelola-jadwal" method="post">
                            @csrf
                    <select name="filter"  class="form-select" aria-label=".form-select-sm example">
                        <option value="" >Pilih Bulan</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>


                </div>
               <div class="col-md-2">
                   <select name="year"  class="form-select" aria-label=".form-select-sm example">
                    <option  selected value="2022">Pilih Tahun</option>
                    <option  value="2022">2022</option>

                    <option  value="2023">2023</option>
                   </select>

                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

            </form>
            </div>
            <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Jam Masuk</th>
                            <th class="text-center">Jam Pulang</th>
                            <th class="text-center">Status Masuk</th>
                            <th class="text-center">Jumlah Pasien</th>
                            <th class="text-center">Aksi</th>

                        </tr>

                    </thead>
                    <tbody id="alldata" > @php $no = 0; @endphp
                        @foreach ($jadwal as $item)
                        <tr>
                            @php $no++ @endphp
                            <td class="text-center">{{ $no }}</td>
                            <td class="text-center">{{  date('d M Y', strtotime($item->tgl_jadwal)) }}</td>
                            <td class="text-center">{{ $item->jam_masuk }}</td>
                            <td class="text-center">{{ $item->jam_pulang }}</td>
                            @if ($item->status_masuk == 0 )
                            <td class="text-center">Tidak Hadir</td>
                            @endif
                            @if ($item->status_masuk == 1)
                            <td class="text-center">Hadir</td>
                            @endif
                            <td class="text-center">{{ $item->jumlah_pasien_hari_ini }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#editjadwal{{ $item->id_jadwal }}" ><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-sm py-auto" data-bs-toggle="modal" data-bs-target="#hapusjadwal{{ $item->id_jadwal }}" ><i class="fa-solid fa-trash-can"></i></button>

                        </td>
                    <div>
                        <div class="modal fade" id="hapusjadwal{{ $item->id_jadwal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title"  id="hapus_jadwal{{ $item->id_jadwal }}">Hapus Jadwal</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin untuk menghapus?</p>
                                </div>
                                <form action="/hapus-jadwal" method="POST">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $item->id_jadwal }}">
                                    <div class="modal-footer d-flex justify-content-center">
                                        <div class="col-4 text-center">
                                            <button type="submit" class="btn bg-danger text-white col-6">Ya</button>
                                           </div>
                                           <div class="col-4 text-center">
                                               <button type="button" class="btn btn-secondary col-6" data-bs-dismiss="modal">Tidak</button>
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
                                                        Tidak Hadir
                                                        @else
                                                        Hadir
                                                        @endif</option>
                                                    <option value="0">Tidak Hadir</option>
                                                    <option value="1">Hadir</option>
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
<script type="text/javascript">
    $('#searchm').on('keyup',function () {
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
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
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Reservasi</p>
        </div>
        <div class="card-body">
            <form action="/kelola-reservasi" method="post">
                @csrf
              <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-2">
                        <input type="text" name="tanggal" class="form-control" placeholder="Pilih Tanggal"  onmouseover="(this.type='date')" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div >
                </div>
              </div>
            </form>
            <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pasien</th>
                        <th class="text-center">Tanggal Reservasi</th>
                        <th class="text-center">Keluhan</th>
                        <th class="text-center">No Antrian</th>
                        <th class="text-center">Status Hadir</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody id="old">
                    @php
                        $i=1;
                        @endphp
                    @foreach($reservasi as $item)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $i++ }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $item->nama_pasien }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $item->tgl_reservasi }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $item->keluhan }}
                        </td>
                        <td class="align-middle text-center">{{ $item->no_antrian }}</td>
                        <td class="align-middle">
                            <form action="edit-reservasi" class="my-0" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id_reservasi }}">
                                <input type="hidden" name="tgl" value="{{ $item->tgl_reservasi }}">
                                <div class="row">
                                    <div class="col-lg-8">
                                <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected value="{{ $item->status_hadir }}">
                                        @if( $item->status_hadir == 0)
                                        Tidak Hadir
                                        @endif
                                        @if( $item->status_hadir == 1)
                                        Hadir
                                        @endif
                                    </option>
                                    <option value="0">Tidak Hadir</option>
                                    <option value="1">Hadir</option>
                                </select>
                                    </div>
                                <div class="col">
                                <button title="Simpan" type="submit" class="btn py-auto btn-primary"><i class="bi bi-save2"></i></button>
                                </div>
                                </div>
                            </form>

                        </td>

            </tr>
            @endforeach


        </tbody>
        <tbody id="new"></tbody>

        </table>

    </div>
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
<script type="text/javascript">
$('#search').on('keyup',function () {
   $value=$(this).val();
   if($value){
    $('#old').hide();
    $('.pagination').hide();
   }else{
    $('#old').show();
    $('.pagination').show();
   }
   $.ajax({
    type:'get',
    url:'{{ URL::to('cari-reservasi')}}',
    data:{'data': $value},
    success:function(data){
        $('#new').html(data);
    }
   });
})
</script>
<script type="text/javascript">
    $('#searchm').on('keyup',function () {
       $value=$(this).val();
       if($value){
        $('#old').hide();
        $('.pagination').hide();
       }else{
        $('#old').show();
        $('.pagination').show();
       }
       $.ajax({
        type:'get',
        url:'{{ URL::to('cari-reservasi')}}',
        data:{'data': $value},
        success:function(data){
            $('#new').html(data);
        }
       });
    })
    </script>

@endsection
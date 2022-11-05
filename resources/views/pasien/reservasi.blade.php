@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebar')
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

    @if(session()->has('salah'))
    <div class="mt-3 col-md-4 text-center alert alert-danger fade show" role="alert">
        {{ session('salah')}}
      </div>
    @endif

    @if(session()->has('Success'))
    <div class="mt-3 col-md-4 text-center alert alert-success fade show" role="alert">
        {{ session('Success')}}
    </div>

    @endif

    <div class="row ">

        <div class="col-sm-12 text-end">
        </div>
    </div>

<!-- Modal -->

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

                        </tr>
                    </thead>
                    <tbody id="alldata"> @php $no = 0; @endphp
                        @foreach ($reservasi as $item)
                        <tr>
                            @php $no++ @endphp
                            <td class="text-center">{{ $no }}</td>
                            <td class="text-center">{{ $item->nama_pasien }}</td>
                            <td class="text-center">{{  date('d M Y', strtotime($item->tgl_reservasi)) }}</td>
                            <td class="text-center">{{ $item->keluhan }}</td>
                            <td class="text-center">{{ $item->no_antrian }}</td>
                            @if ($item->status_hadir ==0 )
                            <td class="text-center">Belum Hadir</td>
                            @endif
                            @if ($item->status_hadir ==1)
                            <td class="text-center">Hadir</td>
                            @endif
                            @if ($item->status_hadir ==2)
                            <td class="text-center">Tidak Hadir</td>
                            @endif



                        </div>
                    </div>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody id="konten"></tbody>
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
        url:'{{ URL::to('cari-reservasi-pasien')}}',
        data:{'data': $value},
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
        url:'{{ URL::to('cari-reservasi-pasien')}}',
        data:{'data': $value},
        success:function(data){
            $('#konten').html(data);


        }
       });
    })
    </script>
@endsection
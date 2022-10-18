@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')
@section('search')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" id="search" class="form-control bg-light border-3 small rounded-5" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
    
        </div>
    </div>
</form>
@endsection
@section('content')

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
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody id="old">
                    @php
                        $i=1;
                        @endphp
                    @foreach($reservasi as $item)
                    <tr>
                        <td class="align-middle">
                            {{ $i++ }}
                        </td>
                        <td class="align-middle">
                            {{ $item->nama_pasien }}
                        </td>
                        <td class="align-middle">
                            {{ $item->tgl_reservasi }}
                        </td>
                        <td class="align-middle">
                            {{ $item->keluhan }}
                        </td>
                        <td class="align-middle">{{ $item->no_antrian }}</td>
                        <td>
                            <form action="edit-reservasi" class="my-0" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id_reservasi }}">
                                <input type="hidden" name="tgl" value="{{ $item->tgl_reservasi }}">
                                <div class="row">
                                    <div class="col">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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


@endsection
@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebardokter')
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

    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Jadwal</p>
        </div>
        <div class="card-body">
            <div class="row mb-2 ">
                <div class="col-md-2">

                        <form action="/lihat-jadwal" method="post">
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
                        <th class="text-center">Jumlah Tersedia</th>
                    </tr>
                </thead>

                <tbody id="old" > @php $no = 0; @endphp
                    @foreach ($jadwal as $item)
                    <tr >
                        @php $no++ @endphp
                        <td class="text-center">{{ $no }}</td>
                        <td class="text-center" id="date" month = "{{ date('m', strtotime($item->tgl_jadwal)) }}" year="{{ date('Y', strtotime($item->tgl_jadwal)) }}">{{  date('d M Y', strtotime($item->tgl_jadwal)) }}</td>
                        <td class="text-center">{{ $item->jam_masuk }}</td>
                        <td class="text-center">{{ $item->jam_pulang }}</td>
                        @if ($item->status_masuk == 0 )
                        <td class="text-center">Tidak Hadir</td>
                        @endif
                        @if ($item->status_masuk == 1)
                        <td class="text-center">Hadir</td>
                        @endif
                       <td class="text-center">{{ $item->jumlah_maxpasien }}</td>

                        @endforeach

                </tbody>


                <tbody id="new">

                </tbody>
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
        $('#old').hide();
        $('.pagination').hide();
       }else{
        $('#old').show();
        $('.pagination').show();
       }
       $.ajax({
        type:'get',
        url:'{{ URL::to('cari-jadwal-dokter')}}',
        data:{'cari-jadwal': $value},
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
            url:'{{ URL::to('cari-jadwal-dokter')}}',
            data:{'cari-jadwal': $value},
            success:function(data){
                $('#new').html(data);
            }
           });
        })
        </script>

@endsection
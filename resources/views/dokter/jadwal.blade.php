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
<div class="card shadow">
        <div class="card-header"><h5 class="text-primary m-0 fw-bold">Jadwal</h5></div>
        <div class="card-body">
            <table class="table border-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th >Tanggal</th>
                        <th >Jam Masuk</th>
                        <th >Jam Pulang</th>
                        <th >Status Masuk</th>
                        <th>Jumlah Tersedia</th>
                    </tr>
                </thead>

                <tbody id="old" > @php $no = 0; @endphp
                    @foreach ($jadwal as $item)
                    <tr >
                        @php $no++ @endphp
                        <td class="">{{ $no }}</td>
                        <td class="">{{  date('d M Y', strtotime($item->tgl_jadwal)) }}</td>
                        <td class="">{{ $item->jam_masuk }}</td>
                        <td class="">{{ $item->jam_pulang }}</td>
                        @if ($item->status_masuk ==0 )
                        <td class="">Hadir</td>
                        @endif
                        @if ($item->status_masuk ==1)
                        <td class="">Tidak Hadir</td>
                        @endif
                       <td>{{ $item->jumlah_maxpasien }}</td>

                        @endforeach
                </tbody>
                <tbody id="new">

                </tbody>
            </table>
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
            console.log(data);
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
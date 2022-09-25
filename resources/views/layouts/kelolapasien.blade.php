@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebarstaff')
@isset($editpasien)
<div class="container-fluid">
    <div class="card-shadow">
    <h3 class="text-dark mb-4"><a class="nav-item" href="/pasien"><i class="bi bi-arrow-left-short"></i></a> Edit Pasien</h3>
     
    
        <form action="/profile-update-pasien" method="POST">
            @csrf
            @foreach($editpasien as $item)
            <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group focused">
                            <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                            <input type="text" required id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', $item->name) }}">
                    </div>
                </div>
            <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-control-label" for="birthday">Birthday<span class="small text-danger">*</span></label>
                        <input type="date" id="birthday" required class="form-control" name="birthday" placeholder="hh/bb/tttt" value="{{ old('birthday',$item->birthday) }}">
                    </div>
                </div>
          

            
            <div class="row">
                <div class="col-lg-11">
                    <div class="form-group">
                        <label class="form-control-label" for="address">Address<span class="small text-danger">*</span></label>
                        <input type="text" id="address" required class="form-control" name="address" placeholder="Address" value="{{ old('address',$item->address) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-11">
                    <div class="form-group">
                        <label class="form-control-label" for="telp">Phone number<span class="small text-danger">*</span></label>
                        <input type="integer" id="telp" required class="form-control" name="telp" placeholder="08" value="{{ old('telp',$item->telp) }}">
                    </div>
                </div>
            </div>
            
         
           
            @endforeach
            
            <!-- Button -->
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    
    
</div>

</div>




@else
<div class="container-fluid">
    @if(session()->has('success'))
    <div class="mt-3 ms-5 col-9 col-sm-10 col-xl-10 alert alert-success fade show" role="alert">
        {{ session('success')}}
    </div>
    @endif
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Daftar Pasien</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                           
                        </tr>@php $j = 0 @endphp
                        <tr>
                            @foreach ($user as $item)
                            @php $j++ @endphp
                            <td>{{ $j }}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ date('d M Y', strtotime($item->birthday))}}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telp }}</td>
                            <td><form action="/pasien" method="post">@csrf<button class="btn py-auto" type="submit"><i class="bi bi-pencil-square"></i></button>
                            <input type="hidden" name="id" value="{{ $item->id }}"></form></td>
                        </tr>
                            @endforeach  
                    </thead>
                    <tbody>
                      
                    </tbody>
                    
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                </div>
                <div class="col-md-6">
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
@endsection
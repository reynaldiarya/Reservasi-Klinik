@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebarstaff')


<div class="container-fluid">
    @if(session()->has('success'))
    <div class="mt-3 ms-5 col-9 alert alert-dismissible alert-success fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('success')}}
    </div>

    @endif
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary h4 m-0 fw-bold">Daftar Pasien</p>
        </div>
       
            <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table " id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                            
                        </thead>
                        <tbody>
                    @php $j = 0 @endphp
                        <tr>
                            @foreach ($user as $item)
                            @php $j++ @endphp
                            <td>{{ $j }}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ date('d M Y', strtotime($item->birthday))}}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telp }}</td>
                            <td><button class="btn py-auto" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Edit data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                    <div class="modal-body">
                                        <form action="/profile-update-pasien" method="POST">
                                            @csrf
                                         
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                                        <input type="text" required id="name" class="form-control" name="name" placeholder="Name" value="{{ $item->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="birthday">Birthday<span class="small text-danger">*</span></label>
                                                        <input type="date" id="birthday" required class="form-control" name="birthday" placeholder="hh/bb/tttt" value="{{ $item->birthday }}">
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="address">Address<span class="small text-danger">*</span></label>
                                                            <input type="text" id="address" required class="form-control" name="address" placeholder="Address" value="{{ $item->address }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="telp">Phone number<span class="small text-danger">*</span></label>
                                                            <input type="integer" id="telp" required class="form-control" name="telp" placeholder="08" value="{{ $item->telp }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-md-5 mt-3">
                                                <button type="submit" class="btn bg-primary text-white col">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
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
                    {{ $user->links() }}
                </div>
            </div>
        
    </div>
</div>
@endsection
@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebar')

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
                        <th>Aksi</th>
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
                       <td>
                        @if ($item->jumlah_maxpasien<1)
                         <i title="Tidak tersedia" class="bi bi-x-circle-fill justify-content-center text-danger"></i>
                    @else

                    <a  title="Buat Reservasi" data-bs-toggle="modal" data-bs-target="#buat-jadwal{{ $no }}" class="nav-link"><i class="fa-solid fa-calendar-plus"></i></a></h3>
                    <div class="modal fade" id="buat-jadwal{{ $no }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Buat Reservasi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/reservasi" method="POST">
                                    @csrf
                                    <input type="hidden"  name="tglReservasi"  value="{{ $item->tgl_jadwal }}">
                                    <input type="hidden" name="idJadwal" value="{{ $item->id_jadwal }}">
                                    <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-5">Nama Pasien</div>
                                    <div class="col-lg-7">
                                        <input required class="form-control form-control-sm" type="text" name="namaPasien"  @if (session()->has('namaPasien') )value= "{{ session('namaPasien') }}" @endif id="nama" placeholder="Nama Pasien"></div>
                                </div>
                                <div class="row mt-3 d-flex align-items-center justify-content-between">
                                    <div class="col-5">Tanggal Periksa</div>
                                    <div class="col-lg-7">
                                        <input required class="form-control form-control-sm"  value="{{ $item->tgl_jadwal }}"  type="text" placeholder="{{ __('Tanggal Reservasi') }}" disabled>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-5">Keluhan</div>
                                    <div class="col-lg-7v">
                                        <textarea required class="form-control form-control-sm" name="keluhan" placeholder="Masukan Keluhan Anda">{{ session('keluhan') }}</textarea>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">

                                    <div class="col-7 col-md-5 col-xl-3 mt-3">
                                        <button type="submit" class="btn bg-primary text-white col">Kirim</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                            @endif
                       </td>

                        @endforeach
                </tbody>
                <tbody id="new">

                </tbody>
            </table>
            </div>
            </div>



@endsection
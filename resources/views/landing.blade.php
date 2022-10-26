@extends('maintemplate')
@section('content')
<div class="container mt-auto d-flex align-items-center" style="height: 570px">
  <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">
    <div class="col-12 col-md-6 col-xl-6 mx-auto my-4">
      <h1 class="fontcusblue">
        dr Reynaldi siap melayani kebutuhan percintaan anda 24/7
        </h1>
        <h5 class="fontcusgrey">dr Reynaldi adalah seorang dokter tampan dan suka membantu masalah percintaan anda</h5>
    </div>
    <div class="col-12 col-md-6 col-xl-6 mx-auto my-4 d-flex justify-content-center">
      <img  class ="d-block img-fluid" src="img/landingimage.png" width="400" alt="">
    </div>
  </div>
</div>

<div class="container d-flex justify-content-center align-items-center" id="cekjadwal" style="height: 300px">
  <div class="row d-flex justify-content-center">
    <h4 class="fontcusblue text-center my-3">Ingin Reservasi?</h4>

     <form class="d-flex justify-content-center" style="width: 300px" action="/" method="post">
      @csrf
      <div class="form-group col-10 col-xl-12 ">
        <input required=""  name= "tgl" type="text" class="form-control" placeholder="Masukkan Tanggal" min="{{  date('Y-m-d') }}"  onclick="(this.type='date')" />
      </div>
      <div class="col-md-auto ms-2">
        <button class="btn border-dark" type="submit" name="submit" > <i class="fa fa-search "></i></button>
      </div>
     </form>
    <div class="container col-9">
     @isset($jumlahjadwal)
    @if ($jumlahjadwal > 0)
    <div class="alert alert-success col-lg-12 mt-4 text-center" role="alert">
     Jadwal {{ $tgl_jadwal }} ditemukan. ingin melakukan reservasi? <a href="/reservasi">klik disini</a>
    </div>
    @else
    <div class="alert alert-danger col-lg-12 mt-4 text-center" role="alert">
      Jadwal {{ $tgl_jadwal }} tidak ditemukan
    </div>
    @endif
@endisset
    </div>
    </div>
  </div>


    <div class="container py-4 py-xl-5" id="tentangkami" style="height:100%">
      <div class="col-12 col-md-8 col-xl-6 text-center mx-auto my-4">
        <h2 class="fontcusblue">Tentang Kami</h2>
      </div>
      <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">
          <div class="col p-4"><img async class="rounded img-fluid" src="/img/ab2.jpg"></div>
          <div class="col d-flex flex-column justify-content-center p-4">
              <div class="text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                  <div>
                      <h3>Apa yang Kami Lakukan?</h3>
                      <p>dr Reynaldi berdiri di Jl Gubeng Kertajaya pada bulan Februari 2022. Saat ini kami terus bertumbuh demi melayani Kesehatan Hati Keluarga Indonesia.
                      </p>
                      <p>
                        <i class="fa-solid fa-check"></i> Menyembuhkan luka hati
                      </p>
                      <p>
                        <i class="fa-solid fa-check"></i> Memberikan tips bagi yang putus cinta
                      </p>
                      <p>
                        <i class="fa-solid fa-check"></i> Pencarian hati yang cocok
                      </p>
                      <p>Kami akan memberikan solusi mengenai permasalahan hati Anda, mulai dari ditinggal nikah, ditinggal kabur, punya pacar dua, terjebak friendzone, doi tidak peka, gebetan sudah punya pacar dan lain sebagainya. Bersama kami, hati Anda akan kami amankan dengan menyegel hati Anda agar tidak memikirkan mantan Anda.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

    <div class="position-relative py-4 py-xl-5" id="hubungikami">
      <div class="container position-relative">
          <div class="row mb-5">
              <div class="col-12 col-md-8 col-xl-6 text-center mx-auto">
                  <h2 class="fontcusblue">Hubungi Kami</h2>
                  <p class="w-lg-50">Jangan ragu untuk menghubungi kami. Kami akan membalas Anda dengan sangat responsive.</p>
              </div>
          </div>
          <div class="row d-flex justify-content-center">
              <div class="col-12 col-md-8 col-xl-6">
                  <div class="d-flex flex-column justify-content-center align-items-start h-100">
                      <div class="d-flex align-items-center p-3">
                        <i class="fa-solid fa-phone"></i>
                          <div class="px-2">
                              <h6 class="mb-0">Telepon</h6>
                              <p class="mb-0">+62 811 222 333</p>
                          </div>
                      </div>
                      <div class="d-flex align-items-center p-3">
                        <i class="fa-solid fa-envelope"></i>
                          <div class="px-2">
                              <h6 class="mb-0">Email</h6>
                              <p class="mb-0">info@drrey.com</p>
                          </div>
                      </div>
                      <div class="d-flex align-items-center p-3">
                        <i class="fa-solid fa-map"></i>
                          <div class="px-2">
                              <h6 class="mb-0">Alamat</h6>
                              <p class="mb-0">Jl Gubeng Kertajaya No 12, Gubeng, Surabaya, Indonesia 12345</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-md-8 col-xl-4">
                  <div>
                      <form class="p-3 p-xl-4" action="/hubungi-mail">
                          <div class="mb-3"><input class="form-control" type="text" id="name" name="name" placeholder="Nama"></div>
                          <div class="mb-3"><input class="form-control" type="email" id="email" name="email" placeholder="Email"></div>
                          <div class="mb-3"><textarea class="form-control" id="message" name="message" rows="6" placeholder="Pesan"></textarea></div>
                          <div><button class="btn btn-primary d-block w-100" type="submit">Kirim</button></div>
                      </form>
                  </div>
                  @if(session()->has('success'))

                    <div class="text-center alert alert-success fade show" role="alert">
                        {{ session('success')}}
                    </div>
                  @endif
              </div>
          </div>
      </div>
    </div>

@endsection
@extends('maintemplate')
@section('content')
<div class="container d-flex align-items-center" style="height: 570px">
  <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">
    <div class="col-md-8 col-xl-6 mx-auto my-4">
      <h1 class="fontcusblue">
        dr Reynaldi siap melayani kebutuhan percintaan anda 24/7
        </h1>
        <h5 class="fontcusgrey">dr Reynaldi adalah seorang dokter tampan dan suka membantu masalah percintaan anda</h5>
    </div>
    <div class="col-md-8 col-xl-6 mx-auto my-4 d-flex justify-content-center">
      <img  class ="d-block rounded-circle" src="img/drRey.jpeg" width="300" alt="">
    </div>
  </div>
</div>


  <div class="container d-flex justify-content-center align-items-center py-4 py-xl-5" id="cekjadwal" style="height: 300px">
    <div class="row d-flex justify-content-center">
    <h4 class="fontcusblue text-center my-3">Ingin Reservasi?</h4>

     <form class="d-flex justify-content-center" style="width: 400px" action="/" method="post">
      @csrf
      <div class="form-group col-xl-12 col-8">
        <input required=""  name= "tgl" type="text" class="form-control" placeholder="Masukkan Tanggal" onclick="(this.type='date')" />
      </div>
      <div class="col-md-auto ms-2">
        <button class="btn border-dark" type="submit" name="submit" > <i class="fa fa-search "></i></button>
      </div>
     </form>
    <div class="container col-9">
     @isset($jumlahjadwal)
    @if ($jumlahjadwal > 0)
    <div class="alert alert-success col-lg-9 mt-4 text-center" role="alert">
     Jadwal {{ $tgl_jadwal }} ditemukan. ingin melakukan reservasi? <a href="/create-reservasi">klik disini</a>
    </div>
    @else
    <div class="alert alert-danger ccol-lg-9 mt-4 text-center" role="alert">
      Jadwal {{ $tgl_jadwal }} tidak ditemukan
    </div>
    @endif
@endisset
    </div>
    </div>
  </div>


    <div class="container py-4 py-xl-5" id="aboutus">
      <div class="col-md-8 col-xl-6 text-center mx-auto my-4">
        <h2 class="fontcusblue">Tentang Kami</h2>
      </div>
      <div class="row row-cols-1 row-cols-md-2">
          <div class="col p-4"><img class="rounded img-fluid" src="https://identsoft.ambitiousit.net/assets/images/ab2.jpg"></div>
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

    <div class="position-relative py-4 py-xl-5" id="contactus">
      <div class="container position-relative">
          <div class="row mb-5">
              <div class="col-md-8 col-xl-6 text-center mx-auto">
                  <h2 class="fontcusblue">Contact us</h2>
                  <p class="w-lg-50">Jangan ragu untuk menghubungi kami. Kami akan membalas Anda dengan sangat responsive.</p>
              </div>
          </div>
          <div class="row d-flex justify-content-center">
              <div class="col-md-6 col-lg-6 col-xl-6">
                  <div class="d-flex flex-column justify-content-center align-items-start h-100">
                      <div class="d-flex align-items-center p-3">
                        <i class="fa-solid fa-phone"></i>
                          <div class="px-2">
                              <h6 class="mb-0">Phone</h6>
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
                              <h6 class="mb-0">Location</h6>
                              <p class="mb-0">Jl Gubeng Kertajaya No 12, Gubeng, Surabaya, Indonesia 12345</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 col-lg-5 col-xl-4">
                  <div>
                      <form class="p-3 p-xl-4" method="post">
                          <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name" placeholder="Name"></div>
                          <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email" placeholder="Email"></div>
                          <div class="mb-3"><textarea class="form-control" id="message-1" name="message" rows="6" placeholder="Message"></textarea></div>
                          <div><button class="btn btn-primary d-block w-100" type="submit">Send </button></div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection
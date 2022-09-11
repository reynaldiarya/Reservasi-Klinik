@extends('maintemplate')
@section('content')
<div class="container d-flex align-items-center" style="height: 570px">
  <div class="row d-flex align-items-center">
    <div class="col">
      <h1 class="fontcusblue">
        dr Reynaldi siap melayani kebutuhan percintaan anda 24/7
        </h1>
        <h4 class="fontcusgrey">dr Reynaldi Arya Bavista adalah seorang dokter tampan dan suka membantu masalah percintaan anda</h4>
    </div>
    <div class="col d-flex justify-content-center">
      <img  class ="d-block rounded-circle" src="img/drRey.jpeg" width="300" alt="">
    </div>
  </div>
</div>    


  <div class="container d-flex justify-content-center align-items-center" style="height: 300px">
    <div class="row d-flex justify-content-center">
    <h4 class="fontcusblue text-center my-3" id="cekjadwal">Ingin Reservasi?</h4>
    
     <form class="d-flex justify-content-center" style="width: 450px" action="/" method="post">
      @csrf
      <div class="form-group col-8">
        <input required=""  name= "tgl" type="text" class="form-control" placeholder="Masukkan Tanggal" onclick="(this.type='date')" />
      </div>
      <div class="col-md-auto mx-3">
        <button class="btn border-dark" type="submit" name="submit" > <i class="fa fa-search "></i></button>
      </div>
     </form>
    <div class="container col-9"> 
     @isset($jumlahjadwal)
    @if ($jumlahjadwal > 0)
    <div class="alert alert-success col-lg-9 mt-4 text-center" role="alert">
     Jadwal {{ $tgl_jadwal }} ditemukan. ingin melakukan reservasi? <a href="/login">klik disini</a>
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
   
 
    <div class="container my-5">

      <div class="section-title" style="height: 75px">
        <h2 id="aboutus" class="text-center fontcusblue">Tentang Kami</h2>
      </div>

      <div class="row">
        <div class="col-lg-5 mb-5 ">
          <img style="width: 500px" src="https://identsoft.ambitiousit.net/assets/images/ab2.jpg" alt="">
        </div>
        <div class="col-lg-7 pt-4 pt-lg-0">
          <h3 class="fontcusgrey">Apa yang Kami Lakukan?</h3>
          <p class="text-black-50">
            dr Reynaldi berdiri di Jl Gubeng Kertajaya pada bulan Februari 2022. Saat ini kami terus bertumbuh demi melayani Kesehatan Hati Keluarga Indonesia.
          </p>
          <p class=" text-black-50">
            <i class="fa-solid fa-check"></i> Menyembuhkan luka hati
          </p>
          <p class=" text-black-50">
            <i class="fa-solid fa-check"></i> Memberikan tips bagi yang putus cinta
          </p>
          <p class=" text-black-50">
            <i class="fa-solid fa-check"></i> Pencarian hati yang cocok
          </p>
          <p class=" text-black-50">
            Kami akan memberikan solusi mengenai permasalahan hati Anda, mulai dari ditinggal nikah, ditinggal kabur, punya pacar dua dan lain sebagainya.
            Bersama kami, hati Anda akan kami amankan dengan menyegel hati Anda agar tidak memikirkan mantan Anda.
            Silahkan untuk bergabung dengan dr Reynaldi
          </p>
          </div>
        </div>
      </div>
    </div>

@endsection
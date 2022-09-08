@extends('mainTemplate')
@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <h1 class="fontcusblue">
        dr Reynaldi siap melayani kebutuhan percintaan anda 24/7
        </h1>
        <h4 class="fontcusgrey">dr Reynaldi Arya Bavista adalah seorang dokter tampan dan suka membantu masalah percintaan anda</h4>
    </div>
    <div class="ms-5 col">
      <img  class ="d-block m-auto rounded-circle" src="img/drRey.jpeg" width="300" alt="">
    </div>
  </div>
</div>    


  <div class="container d-flex justify-content-center my-5">
    <div class="row mt-lg-4 d-flex justify-content-center">
    <h4 class="fontcusblue text-center" id="cekjadwal">Cek Jadwal</h4>
    
     <form class="row mt-lg-4 d-flex justify-content-center" action="/" method="post">
      @csrf
      <div class="form-group col-8">
        <input required=""  name= "tgl" type="text" class="form-control" placeholder="Masukkan Tanggal" onclick="(this.type='date')" />
      </div>
      <div class="col-md-auto">
        <button class="btn border-dark" type="submit" name="submit" > <i class="fa fa-search "></i></button>
      </div>
     </form>
    <div class="container col-9"> 
     @isset($jumlahjadwal)
    @if ($jumlahjadwal > 0)
    <div class="alert alert-success mt-4 text-center" role="alert">
     Jadwal ditemukan. Ingin melakukan reservasi? <a href="/login">klik di sini</a>
    </div>
    @else
    <div class="alert alert-danger mt-4 text-center" role="alert">
      jadwal tidak ditemukan
    </div>
    @endif
 
@endisset
    </div>
    </div>
  </div>
   
 
    <div class="container mt-5">

      <div class="section-title">
        <h2 id="aboutus" class="text-center fontcusblue">About Us</h2>
        <p class="text-black-50">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="https://identsoft.ambitiousit.net/assets/images/ab2.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3 class="fontcusblue">Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
          <p class="fst-italic text-black-50">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <p class=" text-black-50">
            <i class="fa-solid fa-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
          <p class=" text-black-50">
            <i class="fa-solid fa-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
          </p>
          <p class=" text-black-50">
            <i class="fa-solid fa-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. 
          </p>
          <p class=" text-black-50">
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
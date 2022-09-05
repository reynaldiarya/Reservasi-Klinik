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
 
    <div class="row mt-5  ">
      <h4 class=" fontcusblue" id="cekJadwal">Cek Jadwal</h4>
     <form class="row" action="" method="post">
      <div class="form-group col-4">
        <input required="" type="text" class="form-control" placeholder="Date" onfocus="(this.type='date')"/>
      </div>
      <div class="col ">
        <button class="btn border-dark" type="submit" name="submit" > <i class="fa fa-search "></i></button>
      </div>
     </form>
    </div>
   
  </div>
  <div class="row mt-5" id="aboutUS">
    <div class="container">

      <div class="section-title">
        <h2 class="text-center">About Us</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="https://identsoft.ambitiousit.net/assets/images/ab2.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <p>
            <i class="fa-solid fa-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
          <p>
            <i class="fa-solid fa-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
          </p>
          <p>
            <i class="fa-solid fa-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. 
          </p>
          <p>
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
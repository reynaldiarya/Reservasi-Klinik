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
<div class="col-xl-6">
  <h1 class="fontcusblue">Tentang Kami</h1>
  <p class=" text-black-50">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, temporibus laboriosam odit sint amet aperiam explicabo mollitia, rerum quas dolorum hic ullam necessitatibus repellendus accusantium dignissimos ad quam magnam tenetur!</p>
  <img src="https://identsoft.ambitiousit.net/assets/images/ab2.jpg" class="d-block m-sm-0" width="450" height="200" alt="">

</div>
<div class="col-xl-5">

  <div class="row  mt-3  ">
    <div class="col-md-2 content4-right-icon">
    </div>
    <div  >
      <h6><a class="fontcusblue text-decoration-none">Judul Layanan</a></h6>
      <p class=" text-black-50">Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing elit.</p>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-2 content4-right-icon">
    </div>
    <div  >
      <h6><a class="text-decoration-none">Judul Layanan</a></h6>
      
      <p class=" text-black-50">Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing elit.</p>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-2 content4-right-icon">
    </div>
    <div  >
      <h6><a class="fontcusblue text-decoration-none">Judul Layanan</a></h6>
      <p class=" text-black-50">Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing elit.</p>
    </div>
  </div>
 
</div>
  </div>
</div>

@endsection
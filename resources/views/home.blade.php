@extends('mainTemplate')
@section('content')
<div class="container mt-5 ">
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
</div>

@endsection
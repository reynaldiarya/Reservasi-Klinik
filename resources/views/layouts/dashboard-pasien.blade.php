@extends('maintemplate')
@section('content')
@include('partials.sidebar')
<div class="container">
    <div class="row">
        <div class="card ms-5 col mt-5 col-lg-5">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <button type="button" class="btn btn-primary">Button</button>
    </div>
</div>

<div class="card ms-5 col mt-5 col-lg-5">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <button type="button" class="btn btn-primary">Button</button>
    </div>
</div>
    </div>
</div>
@endsection
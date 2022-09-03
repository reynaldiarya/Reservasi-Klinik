@extends('mainTemplate')
@section('content')
    <div class="container mt-auto">
        <div class="row justify-content-lg-center">
        <div class=" mt-5 col-sm-5">
        <div class=" d-flex justify-content-center">

            <img src="img/logo.png" class="mb-4 justify-content-sm-center" width="50">
        </div>
        
      <!-- Name input -->
      <div class="form-outline mb-4 ">
        <input type="text" id="registerName" placeholder="Email" class="form-control" />
      </div>

      <!-- Username input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" placeholder="Password" class="form-control" />
      </div>
    
      <!-- Repeat Password input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" placeholder="Ulangi Password" class="form-control" />
      </div>

 

   
      <!-- Checkbox -->
      <div class="form-check d-flex justify-content-center mb-4 row">
        <div class="col">
            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
              aria-describedby="registerCheckHelpText" />
            <label class="form-check-label" for="registerCheck">
              saya menyetujui syarat dan ketentuan yang berlaku
            </label>

        </div>
        <div class="col"> 
            <p>Sudah punya akun? <a href="/Login">Login</a></p>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-3">Daftar</button>
    </form>
  </div>
</div>
<!-- Pills content -->
        </div>
        </div>
    </div>
@endsection
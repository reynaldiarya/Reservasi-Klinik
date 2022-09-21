<!doctype html>
<html lang="en">

<head>
  <title>{{ $title }}</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css" integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body >
 
    
<div class="container mt-5 ">
  <div class="row justify-content-center">
    <div class="col-sm-6 col-lg-5 col-xl-4 ">
      <h2 class="text-center mb-4">Login</h2>
     
      @if(session()->has('salah'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('salah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      
      <form method="POST" action="/login-staff" class="user">
        @csrf
        <div class="form-group mb-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email') }}" value="
            @if(isset($email))
                {{ $email }}
                @endif
                @if(session()->has('email'))
                {{ session('email') }}
                @else

                {{ old('email') }}
            @endif " autofocus>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2 justify-content-center">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                <i class="bi bi-box-arrow-right"></i> Login
            </button>
        </div>

    </form>
        
    </div>
  </div>
</div>

<footer>
  <!-- place footer here -->
  
      
<!-- Footer -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js" integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>

</html>
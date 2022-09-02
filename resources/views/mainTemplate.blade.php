<!doctype html>
<html lang="en">

<head>
  <title>{{ $halaman }}</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-transparent ">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="" width="30">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/about">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about#cekJadwal">Reservasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="#foott">Contact Us</a>
          </li>
        
        </ul>
          <button class="btn btn-outline-info bg-light" type="submit"><a class="nav-link" href="/login">Login</a> </button>
      </div>
    </div>
  </nav>
  </header>
  <main >
  @yield('content')
  </main>
  <footer>
    <!-- place footer here -->
   <!-- Footer -->
<footer class="text-center text-lg-start bg-dar text-muted mt-5">
  <!-- Section: Social media -->
  <section class="container d-flex justify-content-center justify-content-lg-between p-4 border-bottom px-4">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span id="foott">Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-whatsapp"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      {{-- <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a> --}}
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      {{-- <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a> --}}
      {{-- <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a> --}}
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        
        <div class="col-md-3 col-lg-4 col-xl-1 mx-0 mb-4">
        <a class="navbar-brand" href="#">
          <img src="img/logo.png" alt="" width="100">
        </a>
        </div>

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>dr. Reynaldi
          </h6>
          <p>
            Jl Gubeng Kertajaya No 12, Gubeng, Surabaya, Indonesia 12345
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Links
          </h6>
          <p>
            <a href="/login" class="text-reset">Login</a>
          </p>
          <p>
            <a href="/register" class="text-reset">Register</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact Us</h6>
          <p><i class="fas fa-home me-3"></i> Jl Gubeng Kertajaya No 12, Gubeng, Surabaya</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@drrey.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 62 811 222 333</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        
        </script>
      

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
</body>

</html>
<nav class="navbar  navbar-expand-lg navbar-light bg-transparent ">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img async src="img/logo.png" alt="" width="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/#cekjadwal">Reservasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="/#tentangkami">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="/#hubungikami">Hubungi Kami</a>
          </li>

        </ul>
        @auth
        @if (Auth()->user()->level == 0)
            <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="bi bi-person-fill ms-1"> </i>{{ strtoupper(auth()->user()->name) }}</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                  {{-- <li><a class="dropdown-item" href="#">Setting</a></li> --}}
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>

                </ul>
              </li>
            </ul>
            @endif
        @if (Auth()->user()->level == 1)
            <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="bi bi-person-fill ms-1"> </i>{{ strtoupper(auth()->user()->name) }}</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard-staff">Dashboard</a></li>
                  {{-- <li><a class="dropdown-item" href="#">Setting</a></li> --}}
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>

                </ul>
              </li>
            </ul>
            @endif
       @else
        <button class="btn mx-1 btn-outline-info bg-light" type="submit"><a class="nav-link" href="/login">Login</a> </button>
        <button class="btn mx-1 btn-outline-info bg-light" type="submit"><a class="nav-link" href="/register">Register</a> </button>
      @endauth

      </div>
    </div>
  </nav>
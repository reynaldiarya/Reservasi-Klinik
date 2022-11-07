@extends('maintemplatedashboard')
@section('content')
@extends('partials.sidebarstaff')
<style>
    .chart-container {
      width: 50%;
      height: 50%;
      margin: auto;
    }
  </style>
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">


                <div class="container-fluid" style="background: var(--bs-blue);padding: 25px;color: rgb(255, 255, 255);">
                    <h2>Selamat Datang!</h2>
                    <p style="margin: 0px;">Hai {{ strtoupper(Auth()->user()->name) }}, selamat datang di halaman Dashboard dr Reynaldi</p>
                    <p style="margin: 0px;">Silahkan klik menu pilihan yang ada dibagian kiri.</p>
                </div>
                <div class="container-fluid">
                    <div class="row mt-4">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Reservasi = </span>{{ date('d-M-Y') }}</div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $countreservasitoday }}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        {{-- <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Rekam Medis</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">{{ $countallrekammedis }}</div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-notes-medical fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Pasien</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">{{ $countallpasien }}</div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-user-injured fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>jadwal = </span>{{ date('M') }}</div>
                                            <div class="text-dark fw-bold h5 mb-0">{{ $countjadwalmonthly }}</div>
                                        </div>
                                        <div class="col-auto"><i class="fa-regular fa-calendar-days fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="container">
                <div class="col-md-5">
                    <a class="nav-link" data-bs-toggle="collapse" href="#reservasiBulanan" role="button" aria-expanded="false" aria-controls="reservasiBulanan">
                       Reservasi Bulanan<i class="bi bi-arrow-down-short"></i>
                      </a>
               
                </div>
               
                
                <div class="collapse" id="reservasiBulanan">
                        <div class="card  px-4 py-4" >
                        <canvas id="chart"></canvas>
                </div>
              </div>
              
        </div>
            <footer class="mt-5 bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Kelompok 12 SI UA </span></div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal-->


    <script>
        const labels = [
          'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember',
        ];

        const data = {
          labels: labels,
          datasets: [{
            label: 'Reservasi Bulanan Tahun : '+{{ date('Y') }},
            backgroundColor: 'rgb(13, 110, 253)',
            borderColor: 'rgb(13, 110, 253)',
            data: [{{ $countAllReservasi[1] }},{{ $countAllReservasi[2] }},{{ $countAllReservasi[3] }},{{ $countAllReservasi[4] }},{{ $countAllReservasi[5] }},{{ $countAllReservasi[6] }},{{ $countAllReservasi[7] }},{{ $countAllReservasi[8] }},{{ $countAllReservasi[9] }},{{ $countAllReservasi[10] }},{{ $countAllReservasi[11] }},{{ $countAllReservasi[12] }},],
          }]
        };

        const config = {
          type: 'line',
          data: data,
          options: {}
        };
      </script>
      <script>
        const chart = new Chart(
          document.getElementById('chart'),
          config
        );
      </script>

@endsection
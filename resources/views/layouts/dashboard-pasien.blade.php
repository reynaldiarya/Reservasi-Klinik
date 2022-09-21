@extends('maintemplatedashboard')
@section('content')
@include('partials.sidebar')
<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                         
    
                <div class="container-fluid" style="background: var(--bs-blue);padding: 25px;color: rgb(255, 255, 255);">
                    <h2>Selamat Datang!</h2>
                    <p style="margin: 0px;">Hai {{ strtoupper(Auth()->user()->name) }}, selamat datang di halaman Dashboard dr Reynaldi</p>
                    <p style="margin: 0px;">Silahkan klik menu pilihan yang ada dibagian kiri.</p>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Kelompok 12 SI UA 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- Logout Modal-->
    
</body>

@endsection
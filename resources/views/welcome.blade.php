<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/Medicio/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/themes/Medicio/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Pengumuman List</title>
    <style>
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center sticky-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class="bi bi-clock"></i> Senin-Jumat, 08.00-16.00
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone"></i> Hubungi Kami +1 5589 55488 55
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="sticky-top">
        <div class="container d-flex align-items-center">
            <h3 class="logo me-auto">ERALITABMAS</h3>
            <a href="#appointment"><span class="d-none d-md-inline btn btn-outline-dark">HOME</span></a>
            <a href="/login" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login</span></a>
        </div>
    </header><!-- End Header -->

    <div class="container" style="min-height: calc(100vh - 500px); margin-top: 3rem;">
        <h1 class="vw-bold mb-4">Pengumuman</h1>
        <div class="flex-column">
            @foreach ($pengumuman as $item)
                <div class="mb-4 w-100">
                    <div class="card h-100 border-0 p-3" style="box-shadow: 3px 3px 10px 0px rgba(0, 0, 0, 0.1); border-radius: 1rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <!-- <a href="{{ route('pengumuman.show', $item->id) }}" class="btn btn-primary">Details</a> -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ======= Footer ======= -->

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>LPPM STMIK ELRAHMA YOGYAKARTA</h3>
                            <p>
                                Jl. Sisingamangaraja 76 <br>
                                Mergangsan-Brontokusuman-Yogyakarta<br><br>
                                <strong>Phone:</strong> +62 274 377982<br>
                                <strong>Email:</strong> lp2m@stmikelrahma.ac.id<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>
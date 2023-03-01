<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pembayaran SPP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/') }}front/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('/') }}front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/') }}front/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: OnePage - v4.10.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="/siswa"><img src="{{ asset('/') }}images/logo.png" alt=""
                        style="max-width: 50px"><span class="ms-3">Pembayaran SPP</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/siswa">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                          Profile
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                          <a class="dropdown-item" href="#">{{ Auth::user()->kelas->nama_kelas }} {{ Auth::user()->kelas->jurusan }}</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="/siswa/profile/{{ Auth::user()->id }}">Ubah Password</a>
                        </div>
                      </li>
                    <li>
                        <a class="nav-link"title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="btn btn-secondary">Logout</span></a>
                    </li>
            
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    
    <!-- ======= Hero Section ======= -->
    @yield('content')
   <!-- End Hero -->
  
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <img src="{{ asset('/') }}images/logo.png" alt="" style="max-width: 100px">
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Pembayaran SPP</h3>
                        <p>
                            Website Ini Dibuat<br>
                            Untuk UKK SMK N 1 Bantul<br>
                            <strong>SRI CAHYA PUTRA</strong>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Pembayaran Spp</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
                    by <a href="https://instagram.com/_yoxsz">_yoxsz</a>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/') }}front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('/') }}front/vendor/aos/aos.js"></script>
    <script src="{{ asset('/') }}front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('/') }}front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/') }}front/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('/') }}front/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/') }}front/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>

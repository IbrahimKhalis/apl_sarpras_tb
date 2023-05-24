{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Schoolio</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        .btn-primary-self {
            background-color: #009cea;
        }

    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.html"><span>Schoolio</span></a></h1>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{ route('index') }}#hero">Home</a></li>
                    <li class=""><a href="{{ route('about') }}#fitur">About Us</a></li>
                    <li class=""><a href="{{ route('faq') }}#fitur">FAQ</a></li>
                    <li class=""><a href="{{ route('login') }}"
                            class="btn btn-primary-self text-white">{{ Auth::user() ? 'Dashboard' : 'Sign In' }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="bg-gray-500 ">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h1>Schoolio is very easy for school payment management</h1>
                        <h2>Schoolio has features that are very helpful in managing school payments</h2>
                        <a href="{{ route('login') }}" class="btn-get-started">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="fitur" class="services ">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Service</h2>
                    <p>The features in schoolio are very helpful in paying for school including:</p>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
                        <div class="icon-box icon-box-pink">
                            <div class="icon"><i class='bx bxs-upvote'></i></div>
                            <h4 class="title"><a href="">Upgrade Class</a></h4>
                            <p class="description">In scoolio there is a class upgrade feature which is very useful for
                                long
                                term use</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box icon-box-cyan">
                            <div class="icon"><i class='bx bxs-group'></i></div>
                            <h4 class="title"><a href="">Easy user management</a></h4>
                            <p class="description">In schoolio there are features that are very supportive for user
                                management</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class='bx bxs-file-pdf'></i></div>
                            <h4 class="title"><a href="">Export PDF</a></h4>
                            <p class="description">In schoolio there is an export feature for payments that have
                                occurred in
                                PDF form</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class='bx bxs-layout'></i></div>
                            <h4 class="title"><a href="">Attractive design</a></h4>
                            <p class="description">Schoolio uses a very good UI design, so it's very pleasant to use</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>CodingRafi</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html> --}}

@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/landingpage.css') }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="text-header">
            <h2>Home</h2>
            <h1>Semua Informasi Tentang Sarpras</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi ut id tempora accusantium quis sed
                natus saepe maxime libero iste. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa
                cumque, labore quas provident debitis vitae possimus doloremque tenetur neque odit. Lorem ipsum
                dolor sit, amet consectetur adipisicing elit. Qui, dolorem? lorem doler adisipet master.</p>
            <div class="button-faq">
                <a class="btn" href="#konten">Lihat lebih banyak<div class="bx bx-chevron-down"></div></a>
            </div>
        </div>
        <div class="image-bian">
            <img src="{{ asset('assets/img/landing-1.jpg') }}" style="border-radius: 20px" alt="">
        </div>
    </div>
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg"
        class="transition duration-300 ease-in-out delay-150">
        <style>
            .path-0 {
                animation: pathAnim-0 4s;
                animation-timing-function: linear;
                animation-iteration-count: infinite;
            }

            @keyframes pathAnim-0 {
                0% {
                    d: path("M 0,400 C 0,400 0,133 0,133 C 92.08205128205125,142.62051282051283 184.1641025641025,152.24102564102563 253,149 C 321.8358974358975,145.75897435897437 367.4256410256411,129.65641025641025 450,120 C 532.5743589743589,110.34358974358975 652.1333333333332,107.13333333333331 746,100 C 839.8666666666668,92.86666666666669 908.0410256410257,81.81025641025641 983,97 C 1057.9589743589743,112.18974358974359 1139.702564102564,153.62564102564102 1217,164 C 1294.297435897436,174.37435897435898 1367.148717948718,153.6871794871795 1440,133 C 1440,133 1440,400 1440,400 Z");
                }

                25% {
                    d: path("M 0,400 C 0,400 0,133 0,133 C 51.84102564102565,134.3025641025641 103.6820512820513,135.6051282051282 198,133 C 292.3179487179487,130.3948717948718 429.11282051282046,123.88205128205126 518,122 C 606.8871794871795,120.11794871794874 647.8666666666667,122.8666666666667 711,124 C 774.1333333333333,125.1333333333333 859.4205128205131,124.65128205128204 942,134 C 1024.579487179487,143.34871794871796 1104.451282051282,162.52820512820512 1187,164 C 1269.548717948718,165.47179487179488 1354.774358974359,149.23589743589744 1440,133 C 1440,133 1440,400 1440,400 Z");
                }

                50% {
                    d: path("M 0,400 C 0,400 0,133 0,133 C 82.14871794871792,134.15128205128207 164.29743589743583,135.3025641025641 234,132 C 303.70256410256417,128.6974358974359 360.9589743589744,120.94102564102565 448,122 C 535.0410256410256,123.05897435897435 651.8666666666666,132.93333333333334 734,124 C 816.1333333333334,115.06666666666666 863.5743589743591,87.325641025641 930,98 C 996.4256410256409,108.674358974359 1081.8358974358973,157.7641025641026 1170,170 C 1258.1641025641027,182.2358974358974 1349.0820512820515,157.6179487179487 1440,133 C 1440,133 1440,400 1440,400 Z");
                }

                75% {
                    d: path("M 0,400 C 0,400 0,133 0,133 C 103.52564102564105,120.49230769230769 207.0512820512821,107.98461538461538 279,109 C 350.9487179487179,110.01538461538462 391.3205128205128,124.55384615384617 470,131 C 548.6794871794872,137.44615384615383 665.6666666666667,135.79999999999998 753,127 C 840.3333333333333,118.20000000000002 898.0128205128206,102.24615384615386 962,99 C 1025.9871794871794,95.75384615384614 1096.2820512820513,105.21538461538462 1177,113 C 1257.7179487179487,120.78461538461538 1348.8589743589744,126.8923076923077 1440,133 C 1440,133 1440,400 1440,400 Z");
                }

                100% {
                    d: path("M 0,400 C 0,400 0,133 0,133 C 92.08205128205125,142.62051282051283 184.1641025641025,152.24102564102563 253,149 C 321.8358974358975,145.75897435897437 367.4256410256411,129.65641025641025 450,120 C 532.5743589743589,110.34358974358975 652.1333333333332,107.13333333333331 746,100 C 839.8666666666668,92.86666666666669 908.0410256410257,81.81025641025641 983,97 C 1057.9589743589743,112.18974358974359 1139.702564102564,153.62564102564102 1217,164 C 1294.297435897436,174.37435897435898 1367.148717948718,153.6871794871795 1440,133 C 1440,133 1440,400 1440,400 Z");
                }
            }

        </style>
        <path
            d="M 0,400 C 0,400 0,133 0,133 C 92.08205128205125,142.62051282051283 184.1641025641025,152.24102564102563 253,149 C 321.8358974358975,145.75897435897437 367.4256410256411,129.65641025641025 450,120 C 532.5743589743589,110.34358974358975 652.1333333333332,107.13333333333331 746,100 C 839.8666666666668,92.86666666666669 908.0410256410257,81.81025641025641 983,97 C 1057.9589743589743,112.18974358974359 1139.702564102564,153.62564102564102 1217,164 C 1294.297435897436,174.37435897435898 1367.148717948718,153.6871794871795 1440,133 C 1440,133 1440,400 1440,400 Z"
            stroke="none" stroke-width="0" fill="#1c438c" fill-opacity="0.53"
            class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)">
        </path>
        <style>
            .path-1 {
                animation: pathAnim-1 4s;
                animation-timing-function: linear;
                animation-iteration-count: infinite;
            }

            @keyframes pathAnim-1 {
                0% {
                    d: path("M 0,400 C 0,400 0,266 0,266 C 69.46923076923076,252.27179487179487 138.93846153846152,238.54358974358973 216,253 C 293.0615384615385,267.45641025641027 377.71538461538466,310.0974358974359 467,305 C 556.2846153846153,299.9025641025641 650.2,247.06666666666663 743,233 C 835.8,218.93333333333337 927.4846153846152,243.63589743589745 1002,268 C 1076.5153846153848,292.36410256410255 1133.8615384615384,316.3897435897436 1204,316 C 1274.1384615384616,315.6102564102564 1357.0692307692307,290.8051282051282 1440,266 C 1440,266 1440,400 1440,400 Z");
                }

                25% {
                    d: path("M 0,400 C 0,400 0,266 0,266 C 84.26153846153849,264.05641025641023 168.52307692307699,262.1128205128205 241,256 C 313.476923076923,249.88717948717948 374.1692307692307,239.60512820512818 447,240 C 519.8307692307693,240.39487179487182 604.8000000000001,251.46666666666664 681,264 C 757.1999999999999,276.53333333333336 824.6307692307691,290.5282051282051 918,291 C 1011.3692307692309,291.4717948717949 1130.676923076923,278.42051282051284 1222,272 C 1313.323076923077,265.57948717948716 1376.6615384615384,265.7897435897436 1440,266 C 1440,266 1440,400 1440,400 Z");
                }

                50% {
                    d: path("M 0,400 C 0,400 0,266 0,266 C 98.48461538461538,241.13333333333333 196.96923076923076,216.26666666666668 267,223 C 337.03076923076924,229.73333333333332 378.60769230769233,268.06666666666666 451,277 C 523.3923076923077,285.93333333333334 626.6,265.4666666666667 726,254 C 825.4,242.53333333333333 920.9923076923076,240.0666666666667 997,236 C 1073.0076923076924,231.9333333333333 1129.4307692307693,226.26666666666668 1200,231 C 1270.5692307692307,235.73333333333332 1355.2846153846153,250.86666666666667 1440,266 C 1440,266 1440,400 1440,400 Z");
                }

                75% {
                    d: path("M 0,400 C 0,400 0,266 0,266 C 73.59487179487178,243.45384615384614 147.18974358974356,220.9076923076923 223,223 C 298.81025641025644,225.0923076923077 376.83589743589744,251.82307692307694 457,267 C 537.1641025641026,282.17692307692306 619.4666666666667,285.8 698,285 C 776.5333333333333,284.2 851.2974358974359,278.9769230769231 925,282 C 998.7025641025641,285.0230769230769 1071.3435897435897,296.2923076923077 1157,295 C 1242.6564102564103,293.7076923076923 1341.3282051282051,279.8538461538461 1440,266 C 1440,266 1440,400 1440,400 Z");
                }

                100% {
                    d: path("M 0,400 C 0,400 0,266 0,266 C 69.46923076923076,252.27179487179487 138.93846153846152,238.54358974358973 216,253 C 293.0615384615385,267.45641025641027 377.71538461538466,310.0974358974359 467,305 C 556.2846153846153,299.9025641025641 650.2,247.06666666666663 743,233 C 835.8,218.93333333333337 927.4846153846152,243.63589743589745 1002,268 C 1076.5153846153848,292.36410256410255 1133.8615384615384,316.3897435897436 1204,316 C 1274.1384615384616,315.6102564102564 1357.0692307692307,290.8051282051282 1440,266 C 1440,266 1440,400 1440,400 Z");
                }
            }

        </style>
        <path
            d="M 0,400 C 0,400 0,266 0,266 C 69.46923076923076,252.27179487179487 138.93846153846152,238.54358974358973 216,253 C 293.0615384615385,267.45641025641027 377.71538461538466,310.0974358974359 467,305 C 556.2846153846153,299.9025641025641 650.2,247.06666666666663 743,233 C 835.8,218.93333333333337 927.4846153846152,243.63589743589745 1002,268 C 1076.5153846153848,292.36410256410255 1133.8615384615384,316.3897435897436 1204,316 C 1274.1384615384616,315.6102564102564 1357.0692307692307,290.8051282051282 1440,266 C 1440,266 1440,400 1440,400 Z"
            stroke="none" stroke-width="0" fill="#1c438c" fill-opacity="1"
            class="transition-all duration-300 ease-in-out delay-150 path-1" transform="rotate(-180 720 200)">
        </path>
    </svg>
    <div class="content-landing">
        <div class="content-1">
            <div class="img-content">
                <img src="{{ asset('assets/img/content-1.jpg') }}" alt="">
            </div>
            <div class="text-content">
                <ul>
                    <li>
                        <h1 class="subjudul">Mulai Dengan Sarpras</h1>
                    </li>
                    <li>
                        <p>Kami menghadirkan solusi modern dan intuitif untuk pengelolaan sarana prasarana di sekolah Anda. Dengan fitur-fitur yang lengkap dan mudah digunakan, Sarpras akan menjadi sahabat Anda dalam mengatur segala kebutuhan sekolah Anda.</p>
                    </li>
                    <li>
                        <ul>
                            <li><i class="bx bxs-check-circle"></i>Advance System</li>
                            <li><i class="bx bxs-check-circle"></i>Easy Acces</li>
                            <li><i class="bx bxs-check-circle"></i>Fully Integrated</li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <div class="content-2">
            <div class="text-content">
                <ul>
                    <li>
                        <h1 class="subjudul">Apa Itu Sarpras ?</h1>
                    </li>
                    <li>
                        <p>Sarpras adalah singkatan dari Sarana dan Prasarana, yang merujuk pada segala fasilitas dan
                            infrastruktur yang diperlukan dalam sebuah institusi atau organisasi, seperti gedung,
                            peralatan, mesin, dan lain sebagainya. Pada situs web Sarpras Taruna Bhakti ini, memberikan informasi dan pelayanan terkait dengan manajemen, pemeliharaan, dan peminjaman fasilitas dan
                            infrastruktur tersebut.</p>
                    </li>
                    <li><div class="more-button">
                      <a class="btn-more" href="">Lihat lebih banyak<div class="bx bx-chevron-down"></div></a>
                  </div></li>
                </ul>
            </div>
            <div class="img-content">
                <img src="{{ asset('assets/img/landing-2.jpg') }}" alt="">
            </div>
        </div>
        <div class="content-3">
          <div class="img-content">
            <img src="{{ asset('assets/img/landing-1.jpg') }}" alt="">
          </div>
          <div class="text-content">
            <ul>
                <li>
                    <h1 class="subjudul">Kelola Dengan Situs</h1>
                </li>
                <li>
                    <p>Dengan Adanya Situs Sarana Prasarana (Sarpras) ini, Anda semua dapat melakukan pengelolaan Barang dan ruangan dengan mudah menggunakan situs ini yang bisa dijangkau oleh semua orang</p>
                </li>
                <li><div class="more-button">
                  <a class="btn-more" href="">Lihat lebih banyak<div class="bx bx-chevron-down"></div></a>
              </div></li>
            </ul>
          </div>
        </div>
        <div class="content-4">
          <div class="text-content">
              <ul>
                  <li>
                      <h1 class="subjudul">Peminjaman dengan Online</h1>
                  </li>
                  <li>
                      <p>Dengan Adanya Situs Sarana Prasarana (Sarpras) ini, Anda semua dapat melakukan peminjaman yang dilakukan secara online yang mana lebih praktis untuk dilakukan kapanpun dan dimana saja</p>
                  </li>
                  <li><div class="more-button">
                    <a class="btn-more" href="">Lihat lebih banyak<div class="bx bx-chevron-down"></div></a>
                </div></li>
              </ul>
          </div>
          <div class="img-content">
              <img src="{{ asset('assets/img/landing-1.jpg') }}" alt="">
          </div>
      </div>
    </div>

</main>
@endsection

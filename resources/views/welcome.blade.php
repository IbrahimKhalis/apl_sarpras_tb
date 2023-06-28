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
    <script src="assets/js /main.js"></script>

</body>

</html> --}}

@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/landingpage.css') }}">
@endsection

@section('content')
<main>
    <div class="containers">
        <div class="text-header">
            <h1>Semua Informasi Tentang Alat/Barang Dalam Situs</h1>
            <p>Situs ini membantu anda untuk memudahkan dalam Mengatur/Mengelola Pemasukan dan Pengeluaran Barang yang terjadi di lingkungan sekolah</p>
            <div class="button-faq">
              <a class="btn" href="#more" onclick="links()">Lihat lebih banyak<div class="bx bx-chevron-down"></div></a>
            </div>
        </div>
        <div class="image-bian">
            <img src="{{ asset('assets/img/dashboard-sarpras.png') }}" style="border-radius: 20px; border: solid 10px white" alt="">
        </div>
    </div>
    <div class="wave-bottom" style="rotate: 180deg">
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
                        d: path("M 0,400 C 0,400 0,133 0,133 C 67.77990430622009,133.1531100478469 135.55980861244018,133.3062200956938 235,145 C 334.4401913875598,156.6937799043062 465.54066985645943,179.92822966507177 585,179 C 704.4593301435406,178.07177033492823 812.2775119617223,152.98086124401914 897,149 C 981.7224880382777,145.01913875598086 1043.3492822966507,162.14832535885168 1130,163 C 1216.6507177033493,163.85167464114832 1328.3253588516745,148.42583732057415 1440,133 C 1440,133 1440,400 1440,400 Z");
                    }

                    25% {
                        d: path("M 0,400 C 0,400 0,133 0,133 C 112.29665071770336,117.56459330143541 224.59330143540672,102.12918660287082 319,116 C 413.4066985645933,129.87081339712918 489.92344497607655,173.04784688995215 584,177 C 678.0765550239234,180.95215311004785 789.712918660287,145.6794258373206 892,143 C 994.287081339713,140.3205741626794 1087.2248803827752,170.23444976076556 1177,174 C 1266.7751196172248,177.76555023923444 1353.3875598086124,155.38277511961724 1440,133 C 1440,133 1440,400 1440,400 Z");
                    }

                    50% {
                        d: path("M 0,400 C 0,400 0,133 0,133 C 92.59330143540669,118.93301435406698 185.18660287081337,104.86602870813397 284,106 C 382.8133971291866,107.13397129186603 487.8468899521531,123.46889952153111 589,134 C 690.1531100478469,144.5311004784689 787.4258373205743,149.25837320574163 881,137 C 974.5741626794257,124.74162679425837 1064.4497607655503,95.49760765550239 1157,92 C 1249.5502392344497,88.50239234449761 1344.7751196172248,110.7511961722488 1440,133 C 1440,133 1440,400 1440,400 Z");
                    }

                    75% {
                        d: path("M 0,400 C 0,400 0,133 0,133 C 100.7751196172249,136.3205741626794 201.5502392344498,139.64114832535884 286,127 C 370.4497607655502,114.35885167464116 438.57416267942574,85.75598086124403 532,99 C 625.4258373205743,112.24401913875597 744.1531100478471,167.33492822966508 857,165 C 969.8468899521529,162.66507177033492 1076.8133971291866,102.90430622009569 1173,88 C 1269.1866028708134,73.09569377990431 1354.5933014354068,103.04784688995215 1440,133 C 1440,133 1440,400 1440,400 Z");
                    }

                    100% {
                        d: path("M 0,400 C 0,400 0,133 0,133 C 67.77990430622009,133.1531100478469 135.55980861244018,133.3062200956938 235,145 C 334.4401913875598,156.6937799043062 465.54066985645943,179.92822966507177 585,179 C 704.4593301435406,178.07177033492823 812.2775119617223,152.98086124401914 897,149 C 981.7224880382777,145.01913875598086 1043.3492822966507,162.14832535885168 1130,163 C 1216.6507177033493,163.85167464114832 1328.3253588516745,148.42583732057415 1440,133 C 1440,133 1440,400 1440,400 Z");
                    }
                }
            </style>
            <path
                d="M 0,400 C 0,400 0,133 0,133 C 67.77990430622009,133.1531100478469 135.55980861244018,133.3062200956938 235,145 C 334.4401913875598,156.6937799043062 465.54066985645943,179.92822966507177 585,179 C 704.4593301435406,178.07177033492823 812.2775119617223,152.98086124401914 897,149 C 981.7224880382777,145.01913875598086 1043.3492822966507,162.14832535885168 1130,163 C 1216.6507177033493,163.85167464114832 1328.3253588516745,148.42583732057415 1440,133 C 1440,133 1440,400 1440,400 Z"
                stroke="none" stroke-width="0" fill="#1c438c" fill-opacity="0.53"
                class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
            <style>
                .path-1 {
                    animation: pathAnim-1 4s;
                    animation-timing-function: linear;
                    animation-iteration-count: infinite;
                }

                @keyframes pathAnim-1 {
                    0% {
                        d: path("M 0,400 C 0,400 0,266 0,266 C 78.23923444976077,252.43062200956936 156.47846889952154,238.86124401913872 263,242 C 369.52153110047846,245.13875598086128 504.32535885167465,264.9856459330144 599,258 C 693.6746411483253,251.01435406698562 748.22009569378,217.19617224880383 826,216 C 903.77990430622,214.80382775119617 1004.7942583732058,246.22966507177034 1111,260 C 1217.2057416267942,273.77033492822966 1328.6028708133972,269.88516746411483 1440,266 C 1440,266 1440,400 1440,400 Z");
                    }

                    25% {
                        d: path("M 0,400 C 0,400 0,266 0,266 C 106.50717703349281,279.4928229665072 213.01435406698562,292.9856459330144 307,284 C 400.9856459330144,275.0143540669856 482.4497607655503,243.55023923444975 570,245 C 657.5502392344497,246.44976076555025 751.1866028708134,280.8133971291866 862,280 C 972.8133971291866,279.1866028708134 1100.8038277511962,243.19617224880383 1200,235 C 1299.1961722488038,226.80382775119617 1369.598086124402,246.4019138755981 1440,266 C 1440,266 1440,400 1440,400 Z");
                    }

                    50% {
                        d: path("M 0,400 C 0,400 0,266 0,266 C 85.16746411483251,248.9090909090909 170.33492822966502,231.8181818181818 274,228 C 377.665071770335,224.1818181818182 499.82775119617224,233.63636363636363 605,254 C 710.1722488038278,274.3636363636364 798.354066985646,305.6363636363636 892,295 C 985.645933014354,284.3636363636364 1084.755980861244,231.81818181818184 1177,220 C 1269.244019138756,208.18181818181816 1354.622009569378,237.09090909090907 1440,266 C 1440,266 1440,400 1440,400 Z");
                    }

                    75% {
                        d: path("M 0,400 C 0,400 0,266 0,266 C 109.29186602870817,269.86602870813397 218.58373205741634,273.73205741626793 314,258 C 409.41626794258366,242.26794258373207 490.956937799043,206.93779904306223 581,217 C 671.043062200957,227.06220095693777 769.5885167464115,282.5167464114832 860,283 C 950.4114832535885,283.4832535885168 1032.688995215311,228.9952153110048 1128,217 C 1223.311004784689,205.0047846889952 1331.6555023923445,235.5023923444976 1440,266 C 1440,266 1440,400 1440,400 Z");
                    }

                    100% {
                        d: path("M 0,400 C 0,400 0,266 0,266 C 78.23923444976077,252.43062200956936 156.47846889952154,238.86124401913872 263,242 C 369.52153110047846,245.13875598086128 504.32535885167465,264.9856459330144 599,258 C 693.6746411483253,251.01435406698562 748.22009569378,217.19617224880383 826,216 C 903.77990430622,214.80382775119617 1004.7942583732058,246.22966507177034 1111,260 C 1217.2057416267942,273.77033492822966 1328.6028708133972,269.88516746411483 1440,266 C 1440,266 1440,400 1440,400 Z");
                    }
                }
            </style>
            <path
                d="M 0,400 C 0,400 0,266 0,266 C 78.23923444976077,252.43062200956936 156.47846889952154,238.86124401913872 263,242 C 369.52153110047846,245.13875598086128 504.32535885167465,264.9856459330144 599,258 C 693.6746411483253,251.01435406698562 748.22009569378,217.19617224880383 826,216 C 903.77990430622,214.80382775119617 1004.7942583732058,246.22966507177034 1111,260 C 1217.2057416267942,273.77033492822966 1328.6028708133972,269.88516746411483 1440,266 C 1440,266 1440,400 1440,400 Z"
                stroke="none" stroke-width="0" fill="#1c438c" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
        </svg>
    </div>
    <div class="content-landing" id="more">
        <div class="content-1">
            <div class="img-content">
                <img src="{{ asset('assets/img/content-1.jpg') }}" alt="" style="">
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
                <img src="{{ asset('assets/img/sarpras-info.jpg') }}" alt="">
            </div>
        </div>
        <div class="content-3">
          <div class="img-content">
            <img src="{{ asset('assets/img/dashboard-sarpras.png') }}" alt="">
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
              <img src="{{ asset('assets/img/dashboard-mobile-sarpras.png') }}" alt="">
          </div>
      </div>
    </div>
    {{-- <div class="faq">
        <div class="faq-title">
            <h1>FAQ</h1>
        </div>
        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer" type="checkbox" /><label class="faq-drawer__title1" for="faq-drawer"> Apa itu aplikasi sarpras di sekolah?</label>
            <div class="faq-drawer__content-wrapper">
              <div class="faq-drawer__content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                </p>
              </div>
            </div>
          </div>
          
          <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-2" type="checkbox" /><label class="faq-drawer__title" for="faq-drawer-2">Apa saja fitur yang tersedia dalam aplikasi sarpras di sekolah?</label>
            <div class="faq-drawer__content-wrapper">
              <div class="faq-drawer__content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                </p>
              </div>
            </div>
          </div>
          
          <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-3" type="checkbox" /><label class="faq-drawer__title" for="faq-drawer-3">Apa manfaat menggunakan aplikasi sarpras di sekolah?</label>
            <div class="faq-drawer__content-wrapper">
              <div class="faq-drawer__content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.            
                </p>
              </div>
            </div>
          </div>
          <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-4" type="checkbox" /><label class="faq-drawer__title" for="faq-drawer-4"> Apa kendala yang dapat dihadapi dalam penggunaan aplikasi sarpras di sekolah?</label>
            <div class="faq-drawer__content-wrapper">
              <div class="faq-drawer__content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.            
                </p>
              </div>
            </div>
          </div>
          <li><div class="more-button" style="width: 200px; align-items: center; justify-content: center; margin-top: 50px">
            <a class="btn-more" href="{{ route('faq') }}">Lihat lebih banyak<div class="bx bx-chevron-down"></div></a>
        </div></li>
    </div> --}}
    
</main>
@endsection

<?php 
    include 'authentication.php';
    checkLogin(); // Call the function to check if the user is logged in

    include "includes/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>User Homepage - FurryTect</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename"><span style="color: aqua;">FURRY</span>TECT</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#report-incident">Report Incident</a></li>
                    <li><a href="#mypets">My Pets</a></li>
                    <li><a href="#awareness">Awareness</a></li>
                    <li><a href="#resources">Resources</a></li>
                    <!-- <li class="dropdown"><a href="#"><span>Account</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="#contact">Contact</a></li> -->
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <!-- Profile Dropdown -->
                <a href="#" class="twitter" data-bs-toggle="dropdown"><i class="bi bi-person"></i></a>
                <!-- End Profile Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $_SESSION['user']['user_name'] ?></h6>
                        <span><?= $_SESSION['user']['user_email']?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="\FurryTect/user-logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul><!-- End Profile Dropdown Items -->

                <a href="#" class="facebook"><i class="bi bi-info"></i></a>
                <a href="#" class="instagram"><i class="bi bi-facebook"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-twitter-x"></i></a>
            </div>

        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div class="container text-center">
                <div class="row justify-content-center" data-aos="zoom-out">
                    <div class="col-lg-8">
                        <a href="index" class="hero-logo" data-aos="zoom-in"><img src="assets/img/apple-touch-icon.png"
                                alt></a>
                        <h2>Welcome!</h2>
                        <p>It's nice to see you back,<span style="color: aqua;">
                                <?= $_SESSION['user']['user_name']?></span>.</p>
                        <!-- <a href="#about" class="btn-get-started">Get Started</a> -->
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 content">
                        <h3>Voluptatem dignissimos provident</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</span>
                            </li>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>Duis aute irure dolor in reprehenderit in voluptate
                                    velit.</span>
                            </li>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate trideta
                                    storacalaperda mastiro dolore eu fugiat nulla
                                    pariatur.</span>
                            </li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                            aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->


        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Services</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/cards-1.jpg" alt="" class="img-fluid" />
                            <div class="card-body">
                                <h3>
                                    <a href="#" class="stretched-link">Report Pet-related Incidents</a>
                                </h3>
                                <div class="card-content">
                                    <p>
                                        Quickly and easily report lost, found, or injured pets to help keep our furry
                                        friends safe in the community. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <img src="assets/img/cards-2.jpg" alt="" class="img-fluid" />
                            <div class="card-body">
                                <h3>
                                    <a href="#" class="stretched-link">Registration of Pets</a>
                                </h3>
                                <div class="card-content">
                                    <p>
                                        Register your pets online to ensure they are up-to-date on vaccinations and
                                        securely tagged, keeping them protected at all times.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <img src="assets/img/cards-3.jpg" alt="" class="img-fluid" />
                            <div class="card-body">
                                <h3>
                                    <a href="#" class="stretched-link">Pet Awareness</a>
                                </h3>
                                <div class="card-content">
                                    <p>
                                        Stay informed with our pet awareness resources, offering tips on pet care, local
                                        events, and important health updates to ensure your pets live their best lives.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Item -->
                </div>
            </div>
        </section>
        <!-- /Featured Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">
            <div class="container">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-9 text-center text-xl-start">
                        <h3>Call To Action</h3>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="col-xl-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Call To Action</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Call To Action Section -->

        <!-- Services Section -->
        <section id="services" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Lorem Ipsum</a>
                                </h4>
                                <p class="description">
                                    Voluptatum deleniti atque corrupti quos dolores et quas
                                    molestias excepturi sint occaecati cupiditate non provident
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-card-checklist"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Dolor Sitema</a>
                                </h4>
                                <p class="description">
                                    Minim veniam, quis nostrud exercitation ullamco laboris nisi
                                    ut aliquip ex ea commodo consequat tarad limino ata
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Sed ut perspiciatis</a>
                                </h4>
                                <p class="description">
                                    Duis aute irure dolor in reprehenderit in voluptate velit
                                    esse cillum dolore eu fugiat nulla pariatur
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-binoculars"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Magni Dolores</a>
                                </h4>
                                <p class="description">
                                    Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-brightness-high"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Nemo Enim</a>
                                </h4>
                                <p class="description">
                                    At vero eos et accusamus et iusto odio dignissimos ducimus
                                    qui blanditiis praesentium voluptatum deleniti atque
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Eiusmod Tempor</a>
                                </h4>
                                <p class="description">
                                    Et harum quidem rerum facilis est et expedita distinctio.
                                    Nam libero tempore, cum soluta nobis est eligendi
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Frequently Asked Questions</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                                <div class="faq-content">
                                    <p>
                                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna
                                        id volutpat lacus laoreet non curabitur gravida. Venenatis
                                        lectus magna fringilla urna porttitor rhoncus dolor purus
                                        non.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                            <!-- End Faq item-->

                            <div class="faq-item">
                                <h3>
                                    Feugiat scelerisque varius morbi enim nunc faucibus a
                                    pellentesque?
                                </h3>
                                <div class="faq-content">
                                    <p>
                                        Dolor sit amet consectetur adipiscing elit pellentesque
                                        habitant morbi. Id interdum velit laoreet id donec
                                        ultrices. Fringilla phasellus faucibus scelerisque
                                        eleifend donec pretium. Est pellentesque elit ullamcorper
                                        dignissim. Mauris ultrices eros in cursus turpis massa
                                        tincidunt dui.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                            <!-- End Faq item-->

                            <div class="faq-item">
                                <h3>
                                    Dolor sit amet consectetur adipiscing elit pellentesque?
                                </h3>
                                <div class="faq-content">
                                    <p>
                                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices
                                        sagittis orci. Faucibus pulvinar elementum integer enim.
                                        Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                        tellus pellentesque eu tincidunt. Lectus urna duis
                                        convallis convallis tellus. Urna molestie at elementum eu
                                        facilisis sed odio morbi quis
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                            <!-- End Faq item-->
                        </div>
                    </div>
                    <!-- End Faq Column-->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-container">
                            <div class="faq-item">
                                <h3>
                                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                                </h3>
                                <div class="faq-content">
                                    <p>
                                        Dolor sit amet consectetur adipiscing elit pellentesque
                                        habitant morbi. Id interdum velit laoreet id donec
                                        ultrices. Fringilla phasellus faucibus scelerisque
                                        eleifend donec pretium. Est pellentesque elit ullamcorper
                                        dignissim. Mauris ultrices eros in cursus turpis massa
                                        tincidunt dui.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                            <!-- End Faq item-->

                            <div class="faq-item">
                                <h3>
                                    Tempus quam pellentesque nec nam aliquam sem et tortor
                                    consequat?
                                </h3>
                                <div class="faq-content">
                                    <p>
                                        Molestie a iaculis at erat pellentesque adipiscing
                                        commodo. Dignissim suspendisse in est ante in. Nunc vel
                                        risus commodo viverra maecenas accumsan. Sit amet nisl
                                        suscipit adipiscing bibendum est. Purus gravida quis
                                        blandit turpis cursus in
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                            <!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                                <div class="faq-content">
                                    <p>
                                        Enim ea facilis quaerat voluptas quidem et dolorem. Quis
                                        et consequatur non sed in suscipit sequi. Distinctio ipsam
                                        dolore et.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                            <!-- End Faq item-->
                        </div>
                    </div>
                    <!-- End Faq Column-->
                </div>
            </div>
        </section>
        <!-- /Faq Section -->

        <!-- Team Section -->
        <section id="team" class="team section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->
            <div class="site-section slider-team-wrap">
                <div class="container">
                    <div class="slider-nav d-flex justify-content-end mb-3">
                        <a href="#" class="js-prev js-custom-prev"><i class="bi bi-arrow-left-short"></i></a>
                        <a href="#" class="js-next js-custom-next"><i class="bi bi-arrow-right-short"></i></a>
                    </div>

                    <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
                        <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "1",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "navigation": {
                                "nextEl": ".js-custom-next",
                                "prevEl": ".js-custom-prev"
                            },
                            "breakpoints": {
                                "640": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 30
                                },
                                "768": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 30
                                },
                                "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 30
                                }
                            }
                        }
                        </script>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/team/team-1.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Jeremy</span> Walker</a>
                                    </h3>
                                    <span class="d-block position">CEO, Founder, Atty.</span>
                                    <p>
                                        Separated they live in. Separated they live in
                                        Bookmarksgrove right at the coast of the Semantics, a
                                        large language ocean.
                                    </p>
                                    <p class="mb-0">
                                        <a href="#" class="more dark">Learn More <span
                                                class="bi bi-arrow-right-short"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/team/team-2.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Lawson</span> Arnold</a>
                                    </h3>
                                    <span class="d-block position">CEO, Founder, Atty.</span>
                                    <p>
                                        Separated they live in. Separated they live in
                                        Bookmarksgrove right at the coast of the Semantics, a
                                        large language ocean.
                                    </p>
                                    <p class="mb-0">
                                        <a href="#" class="more dark">Learn More <span
                                                class="bi bi-arrow-right-short"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/team/team-3.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Patrik</span> White</a>
                                    </h3>
                                    <span class="d-block position">CEO, Founder, Atty.</span>
                                    <p>
                                        Separated they live in. Separated they live in
                                        Bookmarksgrove right at the coast of the Semantics, a
                                        large language ocean.
                                    </p>
                                    <p class="mb-0">
                                        <a href="#" class="more dark">Learn More <span
                                                class="bi bi-arrow-right-short"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/team/team-4.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Kathryn</span> Ryan</a>
                                    </h3>
                                    <span class="d-block position">CEO, Founder, Atty.</span>
                                    <p>
                                        Separated they live in. Separated they live in
                                        Bookmarksgrove right at the coast of the Semantics, a
                                        large language ocean.
                                    </p>
                                    <p class="mb-0">
                                        <a href="#" class="more dark">Learn More <span
                                                class="bi bi-arrow-right-short"></span></a>
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="swiper-slide"></div> -->
                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </div>
        </section>
        <!-- /Team Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                    <iframe style="border: 0; width: 100%; height: 270px"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                        frameborder="0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- End Google Maps -->

                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                            </div>
                        </div>
                        <!-- End Info Item -->
                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="" />
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="" />
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="" />
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                        required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">
                                        Your message has been sent. Thank you!
                                    </div>

                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->
                </div>
            </div>
        </section>
        <!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>
                            Subscribe to our newsletter and receive the latest news about
                            our products and services!
                        </p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form">
                                <input type="email" name="email" /><input type="submit" value="Subscribe" />
                            </div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">
                                Your subscription request has been sent. Thank you!
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">Knight</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3">
                            <strong>Phone:</strong> <span>+1 5589 55488 55</span>
                        </p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">About us</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">Services</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Terms of service</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">Web Design</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Web Development</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Product Management</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">Marketing</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>
                        Cras fermentum odio eu feugiat lide par naso tierra videa magna
                        derita valies
                    </p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>
                © <span>Copyright</span>
                <strong class="px-1 sitename">Knight</strong>
                <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
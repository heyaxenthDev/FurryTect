<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FurryTect - Animal Vaccination and Dog Tagging</title>
    <meta content name="description">
    <meta content name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <?php
  if (isset($_SESSION['status_text'])) {
  ?>
    <script type="text/javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    Toast.fire({
        background: '#1cbb9d',
        color: '#fff',
        icon: '<?php echo $_SESSION['status_code']; ?>',
        title: '<?php echo $_SESSION['status_text']; ?>'
    });
    </script>
    <?php
    unset($_SESSION['status_text']);
  }
  ?>
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
                    <li><a href="report-incident">Report Incident</a></li>
                    <li><a href="my-pets">My Pets</a></li>
                    <!-- <li><a href="awareness">Awareness</a></li> -->
                    <li><a href="resources">Resources</a></li>
                    <!-- <li><a href="user-login#login">Login</a></li>
                    <li><a href="user-login#register">Register</a></li> -->
                    <!-- <li><a href="#mypets">My Pets</a></li>
                    <li><a href="#community">Community</a></li>
                    <li><a href="#resources">Resources</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Account</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </li> -->
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="login-admin" class="twitter"><i class="bi bi-person"></i></a>
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
                        <h2><span style="color: aqua;">FURRY</span>TECT</h2>
                        <p>Animal Vaccination and Dogtagging</p>
                        <a href="#featured-services" class="btn-get-started">Get Started</a>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About FURRYTECT</h2>
                <p>
                    Welcome to FURRYTECT! We are dedicated to creating a safer and more connected community for pet
                    owners and their furry friends. Established in 2025, our mission is to streamline the registration
                    and care of pets while fostering responsible pet ownership.
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="FURRYTECT" />
                    </div>
                    <div class="col-lg-6 content">
                        <h3>Our Commitment to Pet Safety</h3>
                        <p class="fst-italic small">
                            At FURRYTECT, we understand the importance of keeping pets safe and healthy. Our
                            user-friendly platform allows pet owners to register their animals easily, manage
                            vaccination records, and report concerns regarding animal welfare. We believe that by
                            working together, we can enhance the well-being of pets and strengthen our community bonds.
                        </p>
                        <h4>DOG TAGGING</h4>
                        <ul>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>✓ Legal Ownership: A dog tag serves as proof that the dog belongs to a specific
                                    person, useful in ownership disputes.</span>
                            </li>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>✓ Licensing: In the Municipality of Tibiao, dogs are required to be licensed. The
                                    tag shows that the dog is registered.</span>
                            </li>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>✓ Emergency Situations: A dog tag ensures that anyone assisting the animal can
                                    easily contact the owner.</span>
                            </li>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>✓ Return of Strays: Tag information helps shelters contact owners, prioritizing
                                    tagged dogs for rehoming.</span>
                            </li>
                        </ul>

                        <h4>VACCINATION</h4>
                        <ul>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>✓ Prevention of Disease: Vaccinations protect pets from serious and fatal diseases
                                    like rabies and distemper.</span>
                            </li>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>✓ Public Health: Vaccinations protect both pets and humans from zoonotic diseases
                                    like rabies.</span>
                            </li>
                            <li>
                                <i class="bi bi-check2-all"></i>
                                <span>✓ Community Safety: Vaccinating pets helps prevent the spread of diseases in the
                                    community.</span>
                            </li>
                        </ul>

                        <p>
                            Both dog tagging and vaccinations are crucial for responsible pet ownership. Together, they
                            ensure the safety and well-being of our beloved pets while strengthening our community ties.
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
                <!-- <p>
                    Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                    consectetur velit
                </p> -->
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/cards-1.jpg" alt="" class="img-fluid" />
                            <div class="card-body">
                                <h3>
                                    <a href="report-incident" class="stretched-link">Complaints and Concerns
                                        Reporting</a>
                                </h3>
                                <div class="card-content">
                                    <p>
                                        Our platform enables users to report animal-related issues, such as stray
                                        animals or neglect, Dog bites, and accidents. Your reports help us address
                                        concerns promptly and improve community safety.</p>
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
                                    <a href="registration" class="stretched-link">Registration of Pets</a>
                                </h3>
                                <div class="card-content">
                                    <p>
                                        Easily register your pets with our simple online form. Keep all important
                                        information in one place, ensuring quick access to your pet’s details whenever
                                        needed.
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
                                    <a href="my-pets" class="stretched-link">Vaccination Tracking</a>
                                </h3>
                                <div class="card-content">
                                    <p>
                                        Keep track of your pet’s vaccination history with our easy-to-use system.
                                        Receive reminders for upcoming vaccinations to ensure your pet stays healthy and
                                        up-to-date.
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
                        <h3>Join FURRYTECT</h3>
                        <!-- <p>
                            today and help us create a safer and more compassionate environment for pets and their
                            owners!
                        </p> -->
                    </div>
                    <div class="col-xl-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Click Here</a>
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
                                <i class="bx bxl-baidu"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Pet Registration</a>
                                </h4>
                                <p class="description">
                                    Easily register your pets with our simple online form. Keep all important
                                    information in one place, ensuring quick access to your pet’s details whenever
                                    needed.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-person-check"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Owner Information
                                        Management</a>
                                </h4>
                                <p class="description">
                                    Update and manage your contact information and your pet’s records effortlessly. Stay
                                    connected and informed about your pet’s needs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-bell-fill"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Complaints and Concerns
                                        Reporting</a>
                                </h4>
                                <p class="description">
                                    Our platform enables users to report animal-related issues, such as stray animals or
                                    neglect, dog bites, and accidents. Your reports help us address concerns promptly
                                    and improve community safety.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-tag"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Dog Tagging Services</a>
                                </h4>
                                <p class="description">
                                    Receive personalized dog tags with your pet’s registration information. This ensures
                                    your pet can be identified quickly if they go missing.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-shield-check"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="service-details.html" class="stretched-link">Vaccination Tracking</a>
                                </h4>
                                <p class="description">
                                    Keep track of your pet’s vaccination history with our easy-to-use system. Receive
                                    reminders for upcoming vaccinations to ensure your pet stays healthy and up-to-date.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                </div>
            </div>
        </section>
        <!-- /Services Section -->

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
                                        <img src="assets/img/FurryTeam/team-1.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Haydee</span> S. Dalumpines</a>
                                    </h3>
                                    <span class="d-block position">Municipal Agriculturist</span>


                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/FurryTeam/team-2.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Serrayah</span> F. Santillan</a>
                                    </h3>
                                    <span class="d-block position">HVCDP Coordinator</span>


                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/FurryTeam/team-3.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Candido</span> L. Belarmino</a>
                                    </h3>
                                    <span class="d-block position">Livestock Coordinator</span>


                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/FurryTeam/team-4.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Jessie</span> G. Benito</a>
                                    </h3>
                                    <span class="d-block position">Rice/RCM Coordinator</span>


                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/FurryTeam/team-5.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Helen Grace</span> L. Punsalan</a>
                                    </h3>
                                    <span class="d-block position">Corn/Casava/RBO Coordinator</span>


                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team">
                                    <div class="pic">
                                        <img src="assets/img/FurryTeam/team-6.jpg" alt="Image" class="img-fluid" />
                                    </div>
                                    <h3 clas="">
                                        <a href="#"><span class="">Myra</span> M. Delos Reyes</a>
                                    </h3>
                                    <span class="d-block position">Fisheries</span>


                                </div>
                            </div>

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
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d122.0721107!3d10.6768504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bfb92ef3d1194d%3A0xd30e35d5a73d47f1!2sPoblacion%2C%20Tibiao%2C%20Antique%2C%20Philippines!5e0!3m2!1sen!2sus!4v1694973215673!5m2!1sen!2sus"
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
                                <p>Poblacion, Tibiao, Antique</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+63 9267 128 814</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>FurryTectTibiao@gmail.com</p>
                            </div>
                        </div>
                        <!-- End Info Item -->
                    </div>

                    <div class="col-lg-8">
                        <form action="forms/send_contact.php" method="post" class="email-form" data-aos="fade-up"
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
                                    <button type="submit" name="sendQuery">Send Message</button>
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

    <?php 
    include 'includes/footer.php';
   ?>
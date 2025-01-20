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

            <?php 
            include 'includes/index-nav.php';
            ?>

            <div class="header-social-links">
                <a href="login-admin" class="twitter"><i class="bi bi-person"></i></a>
                <a href="#" class="facebook"><i class="bi bi-info"></i></a>
                <a href="#" class="instagram"><i class="bi bi-facebook"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-twitter-x"></i></a>
            </div>

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title custom-image-background">
            <div class="container">
                <h1>Veterinary Clinics and Shelters</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li><a href="resources">Resources</a></li>
                        <li class="current">Veterinary Clinics and Shelters</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Northcoast Veterinery Clinic</h2>
                <p>
                    Northcoast Veterinery Clinic is a friendly stop for your pets needs, because your pet matters.
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>Rizal Ave., Purok 4 Poblacion, Tibiao, Antique</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+63 981 766 3903</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>northcoastvetclinic@gmail.com</p>
                            </div>
                        </div>
                        <!-- End Info Item -->
                    </div>

                    <div class="col-lg-6">

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-facebook flex-shrink-0"></i>
                            <div>
                                <h3>Facebook</h3>
                                <a
                                    href="https://www.facebook.com/northcoastvetclinic">facebook.com/northcoastvetclinic</a>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-instagram flex-shrink-0"></i>
                            <div>
                                <h3>Instagram</h3>
                                <a href="https://www.instagram.com/northcoastvetclinic">@northcoastvetclinic</a>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-globe flex-shrink-0"></i>
                            <div>
                                <h3>Visit Us @</h3>
                                <a
                                    href="https://www.northcoastvetclinic.business.site">northcoastvetclinic.business.site</a>
                            </div>
                        </div>
                        <!-- End Info Item -->
                    </div>

                    <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                        <iframe style="border: 0; width: 100%; height: 470px"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3912.612440261399!2d122.03032357536622!3d11.289873688891792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33af95eb641d9afd%3A0xdb8fee9b27cf4622!2sNorthcoast%20Veterinary%20Clinic!5e0!3m2!1sen!2sph!4v1737354867307!5m2!1sen!2sph"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                    <!-- End Google Maps -->

                </div>
            </div>
        </section>
        <!-- /Contact Section -->

    </main>

    <?php 
    include 'includes/footer.php';
   ?>
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
                <h1>Legal Information</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li><a href="resources">Resources</a></li>
                        <li class="current">Legal Information</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Services Section -->
        <section id="services" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Welcome to our Legal Information Section!</h2>
                <p>
                    This segment provides you with crucial information regarding the
                    laws,
                    regulations, and policies that govern our operations. Our goal is to ensure that you are
                    well-informed about your rights and responsibilities. It is important to thorougjly read
                    through this information to understand how it applies to you and how it shapes your
                    interaction wiyj our services. The contents herein are designed to provide clarity and
                    transparency, promoting a mutal understanding and trust between us and our users.
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bx bx-file"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="#modal1" data-bs-toggle="modal" class="stretched-link">The Animal Welfare
                                        Act of 1998 (Republic Act No. 8485)</a>
                                </h4>
                                <p class="description">
                                    Learn more about the Animal Welfare Act and its significance.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <!-- Modal for The Animal Welfare Act of 1998 (Republic Act No. 8485) -->
                    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel1">The Animal Welfare Act of 1998 (Republic
                                        Act No. 8485)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="assets/pdf/ra8485_animal_welfare_act.pdf" width="100%" height="700px"
                                        frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bx bxs-injection"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="#modal2" data-bs-toggle="modal" class="stretched-link">Republic Act No.
                                        9482 "Anti Rabies Act of 2007"</a>
                                </h4>
                                <p class="description">
                                    Learn about the measures established to control and eliminate rabies in the
                                    Philippines. This act also outlines responsible pet ownership and penalties for
                                    violations.
                                </p>
                            </div>

                        </div>
                    </div>
                    <!-- End Service Item -->

                    <!-- Modal for Republic Act No. 9482 "Anti Rabies Act of 2007" -->
                    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel1">Republic Act No.
                                        9482 "Anti
                                        Rabies Act of 2007"</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="assets/pdf/ra9482_anti_rabies_act_of_2007.pdf" width="100%"
                                        height="700px" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bx bxs-shield"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="#modal3" data-bs-toggle="modal" class="stretched-link">The Animal Welfare
                                        Act of 1998 as Amended (RA 8485 as amended by RA 10631)</a>
                                </h4>
                                <p class="description">
                                    Explore the provisions of this amended law, which strengthens the protection and
                                    welfare of animals. It outlines the responsibilities of pet owners, penalties for
                                    animal cruelty, and measures to promote humane treatment.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <!-- Modal for The Animal Welfare Act of 1998 as Amended (RA 8485 as amended by RA 10631) -->
                    <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="modalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel1">The Animal Welfare
                                        Act of 1998
                                        as Amended (RA 8485 as amended by RA 10631)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="assets/pdf/ra8485_as_amended_by_ra10631.pdf" width="100%"
                                        height="700px" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bx bx-book-bookmark"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="#modal4" data-bs-toggle="modal" class="stretched-link">Barangay Ordinance
                                        on Responsible Pet Ownership in Relation to RA No. 9482</a>
                                </h4>
                                <p class="description">
                                    Understand the local regulations that promote responsible pet ownership. This
                                    ordinance complements the Anti-Rabies Act by emphasizing proper pet care,
                                    vaccination, and control to ensure public safety and animal welfare.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <!-- Modal for Barangay Ordinance on Responsible Pet Ownership in Relation to RA No. 9482 -->
                    <div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="modalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel1">Barangay Ordinance on
                                        Responsible Pet Ownership in Relation to RA No. 9482</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe
                                        src="assets/pdf/Barangay-Ordinance-on-Responsible-Pet-Ownership-in-Relation-to-RA-No.-9482.pdf"
                                        width="100%" height="700px" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                </div>
            </div>
        </section>
        <!-- /Services Section -->

    </main>

    <?php 
    include 'includes/footer.php';
   ?>
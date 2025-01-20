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
                <h1>Contact Authorities</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li><a href="resources">Resources</a></li>
                        <li class="current">Contact Authorities</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <section id="starter-section" class="starter-section section">
            <!-- Section Container -->
            <div class="container section-title text-start" data-aos="fade-up">
                <!-- Card Container -->
                <div class="card shadow">
                    <div class="card-body m-4">
                        <!-- Logo and Title Section -->
                        <div class="text-center">
                            <img src="assets/img/472833236_3744733079124093_4118503252606135086_n.jpg"
                                alt="Municipal Seal" style="width: 100px; height: auto; margin-bottom: 1rem;">
                            <h5 class="fw-bold text-center">Republic of the Philippines</h5>
                            <p class="text-center mb-0">
                                Province of Antique<br>
                                Municipality of Tibiao<br>
                                Office of the Municipal Agriculturist
                            </p>
                        </div>

                        <!-- Contact Cards Section -->
                        <div class="row mt-4">
                            <div class="col-md-3 col-6">
                                <div class="card border">
                                    <div class="card-body text-center">
                                        <p class="fw-bold mb-1">Haydee S. Dalumpines</p>
                                        <p class="mb-1">Municipal Agriculturist</p>
                                        <p class="text-muted">09123456789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="card border">
                                    <div class="card-body text-center">
                                        <!-- Add more contact details or leave blank -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="card border">
                                    <div class="card-body text-center">
                                        <!-- Add more contact details or leave blank -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="card border">
                                    <div class="card-body text-center">
                                        <!-- Add more contact details or leave blank -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- End of Row -->
                    </div>
                </div><!-- End of Card -->
            </div><!-- End of Container -->
        </section>


    </main>

    <?php 
    include 'includes/footer.php';
   ?>
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
    <link href="assets/css/index.css" rel="stylesheet">

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
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <a href="index.html" class="hero-logo" data-aos="zoom-in"><img src="assets/img/apple-touch-icon.png"
                    alt></a>
            <h1 data-aos="zoom-in"><span style="color: aqua;">FURRY</span>TECT</h1>
            <h2 data-aos="fade-up">Animal Vaccination and Dogtagging</h2>
            <a data-aos="fade-up" data-aos-delay="200" href="login-admin" class="btn-get-started scrollto">Get
                Started</a>
        </div>
    </section><!-- End Hero -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
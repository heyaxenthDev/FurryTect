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
                <h1>Report Incident</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li class="current">Report Incident</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">

            <!-- Section Title -->
            <div class="container section-title text-start" data-aos="fade-up">
                <div class="card shadow">
                    <div class="card-body m-4">
                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" id="yourName" name="yourName" class="form-control"
                                            placeholder="Your Name" required>
                                        <label for="yourName">Your Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" id="yourEmail" name="yourEmail" class="form-control"
                                            placeholder="Your Email" required>
                                        <label for="yourEmail">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="yourMobile" name="yourMobile" class="form-control"
                                            placeholder="Your Contact Number" required>
                                        <label for="yourMobile">Your Contact Numer</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select id="incidentType" name="incidentType" class="form-select" required
                                            onchange="toggleOtherInput()">
                                            <option value="" disabled selected>Select type of report</option>
                                            <option value="Animal-Vehicle Accident">Animal-Vehicle Accident</option>
                                            <option value="Dog Bites and Attacks">Dog Bites and Attacks</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <label for="incidentType">Incident Type</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="datetime-local" id="dateTime" name="dateTime" class="form-control"
                                            required>
                                        <label for="dateTime">Date and Time</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Input Field for "Others" -->
                            <div class="row mb-3" id="otherIncidentDiv" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="otherIncidentType" name="otherIncidentType"
                                            class="form-control" placeholder="Specify other incident">
                                        <label for="otherIncidentType">Specify Other Incident</label>
                                    </div>
                                </div>
                            </div>

                            <script>
                            function toggleOtherInput() {
                                var incidentType = document.getElementById("incidentType").value;
                                var otherIncidentDiv = document.getElementById("otherIncidentDiv");

                                if (incidentType === "Others") {
                                    otherIncidentDiv.style.display = "block"; // Show input field
                                } else {
                                    otherIncidentDiv.style.display = "none"; // Hide input field
                                }
                            }
                            </script>

                            <div class="form-floating mb-3">
                                <input type="text" id="location" name="location" class="form-control"
                                    placeholder="Enter location" required>
                                <label for="location">Location</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea id="description" name="description" class="form-control" style="height: 100px"
                                    placeholder="Be specific as possible, including relevant details such as the pet’s behavior, people involved, etc."
                                    required></textarea>
                                <label for="description">Description</label>
                            </div>
                            <div class="mb-3">
                                <label for="uploadEvidence" class="form-label">Upload softcopy evidence</label>
                                <input type="file" id="uploadEvidence" name="uploadEvidences[]" class="form-control"
                                    multiple accept=".jpg,.png,.mp4">
                                <small class="text-muted">Photo, Video, .jpg / .png / .mp4 Max of 5 files</small>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" id="agree" name="agree" class="form-check-input" required>
                                <label for="agree" class="form-check-label">
                                    By selecting this checkbox, I agree and accept the <a href="#"
                                        class="text-primary">FurryTect Terms of
                                        Services</a> and <a href="#" class="text-primary">Data Privacy Statement</a>.
                                </label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-get-started"
                                    name="insertIncidentReport">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div><!-- End Section Title -->

        </section><!-- /Starter Section Section -->

    </main>

    <?php 
    include 'includes/footer.php';
   ?>
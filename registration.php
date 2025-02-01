<?php
session_start();
$file_path = "admin/";
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
                <h1>Pet Registration</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li class="current">Pet Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Default Tabs Justified</h5> -->

                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs d-flex pt-4" id="myTabjustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="dog-tab" data-bs-toggle="tab"
                                    data-bs-target="#dog-justified" type="button" role="tab" aria-controls="dog"
                                    aria-selected="true">Dog</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="cat-tab" data-bs-toggle="tab"
                                    data-bs-target="#cat-justified" type="button" role="tab" aria-controls="cat"
                                    aria-selected="false">Cat</button>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                            <div class="tab-pane fade show active" id="dog-justified" role="tabpanel"
                                aria-labelledby="dog-tab">
                                <form action="pet-reg-code.php" method="POST" enctype="multipart/form-data">
                                    <!-- Dog Information start -->
                                    <h4 class="mb-3">Dog's Information</h4>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <img src="<?=$file_path?>assets/img/undraw_dog_c7i6.svg" id="dogImage"
                                                class="img-fluid rounded float-start img-thumbnail mb-3"
                                                alt="Dog Image">
                                            <input type="file" class="form-control" id="dogImageInput" name="dogImage"
                                                accept="image/*">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row mb-3 g-2">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="me-3">Is the Dog have tagged?</h6>
                                                    <div class="form-check me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkBoxTagged">
                                                        <label class="form-check-label" for="checkBoxTagged">
                                                            Yes
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6" id="tagNumberDiv" style="display: none;">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingTagNumber"
                                                            placeholder="Tag Number" name="tagNumber">
                                                        <label for="floatingTagNumber">Tag Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="dateTaggedDiv" style="display: none;">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="floatingDateTagged"
                                                            placeholder="DateTagged" name="dateTagged">
                                                        <label for="floatingDateTagged">Date Tagged</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                            document.getElementById('checkBoxTagged').addEventListener('change',
                                                function() {
                                                    var isChecked = this.checked;
                                                    document.getElementById('tagNumberDiv').style.display =
                                                        isChecked ?
                                                        'block' : 'none';
                                                    document.getElementById('dateTaggedDiv').style.display =
                                                        isChecked ?
                                                        'block' : 'none';
                                                });
                                            </script>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingName"
                                                            placeholder="Name" name="name" required>
                                                        <label for="floatingName">Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingSex" name="sex"
                                                            aria-label="Sex" required>
                                                            <option selected disabled>Choose...</option>
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                        <label for="floatingSex">Sex</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="floatingAge"
                                                            placeholder="Age" name="age" required>
                                                        <label for="floatingAge">Age</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingColor"
                                                            placeholder="Color" name="color" required>
                                                        <label for="floatingColor">Color Description</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-control" id="floatingVaccinationStatus"
                                                            aria-label="Vaccination Status" name="vaccinationStatus"
                                                            required>
                                                            <option value="">Select Vaccination Status</option>
                                                            <option value="vaccinated" class="text-success">Vaccinated
                                                            </option>
                                                            <option value="unvaccinated" class="text-danger">
                                                                Unvaccinated
                                                            </option>
                                                        </select>
                                                        <label for="floatingVaccinationStatus">Vaccination
                                                            Status</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="dateVaccDiv" style="display: none;">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="floatingDateVacc"
                                                            placeholder="Date Vaccinated" name="dateVacc">
                                                        <label for="floatingDateVacc">Date Vaccinated</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                            document.getElementById('floatingVaccinationStatus').addEventListener(
                                                'change',
                                                function() {
                                                    var selectedValue = this.value;
                                                    document.getElementById('dateVaccDiv').style.display =
                                                        selectedValue === 'vaccinated' ? 'block' : 'none';
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <!-- Dog Information End -->

                                    <hr>

                                    <h4 class="mb-3">Owner's Information</h4>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <img src="<?=$file_path?>assets/img/undraw_male_avatar_g98d.svg"
                                                id="ownerImage" class="img-fluid rounded float-start img-thumbnail mb-3"
                                                alt="Owner Image">
                                            <input type="file" class="form-control" id="ownerImageInput"
                                                name="ownerImage" accept="image/*">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row mb-3 g-2">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingFirstName"
                                                            placeholder="First Name" name="firstName" required>
                                                        <label for="floatingFirstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingMiddleName"
                                                            placeholder="Middle Name" name="middleName" required>
                                                        <label for="floatingMiddleName">Middle Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingLastName"
                                                            placeholder="Last Name" name="lastName" required>
                                                        <label for="floatingLastName">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingOwnerSex"
                                                            name="sexOwner" aria-label="Sex" required>
                                                            <option selected disabled>Choose...</option>
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                        <label for="floatingOwnerSex">Sex</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="floatingDateofBirth"
                                                            placeholder="Date of Birth" name="DateofBirth" required>
                                                        <label for="floatingDateofBirth">Date of Birth</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="floatingOwnerAge"
                                                            placeholder="Age" name="ageOwner" required>
                                                        <label for="floatingOwnerAge">Age</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control"
                                                            id="floatingContactNumber" placeholder="Contact Number"
                                                            name="contactNumber" required>
                                                        <label for="floatingContactNumber">Contact Number</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-control" id="floatingBarangay"
                                                            name="barangay" required>
                                                            <option value="">Select Barangay</option>
                                                            <option value="Alegre">Alegre</option>
                                                            <option value="Amar">Amar</option>
                                                            <option value="Bandoja">Bandoja</option>
                                                            <option value="Castillo">Castillo</option>
                                                            <option value="Esparagoza">Esparagoza</option>
                                                            <option value="Importante">Importante</option>
                                                            <option value="La paz">La paz</option>
                                                            <option value="Malabor">Malabor</option>
                                                            <option value="Martinez">Martinez</option>
                                                            <option value="Natividad">Natividad</option>
                                                            <option value="Pitac">Pitac</option>
                                                            <option value="Poblacion">Poblacion</option>
                                                            <option value="Salzar">Salzar</option>
                                                            <option value="San Francisco Norte">San Francisco Norte
                                                            </option>
                                                            <option value="San Francisco Sur">San Francisco Sur</option>
                                                            <option value="San Isidro">San Isidro</option>
                                                            <option value="Santa Ana">Santa Ana</option>
                                                            <option value="Santa Justa">Santa Justa</option>
                                                            <option value="Santa Rosario">Santa Rosario</option>
                                                            <option value="Tigbaboy">Tigbaboy</option>
                                                            <option value="Tuno">Tuno</option>
                                                        </select>
                                                        <label for="floatingBarangay">Barangay</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                        <button class="btn add-btn" type="submit" name="DogsReg"><i
                                                class="bi bi-check-circle"></i>
                                            Submit</button>

                                    </div>
                                </form>

                                <script src="<?=$file_path?>assets/js/dogs-image-display.js"></script>
                            </div>
                            <div class="tab-pane fade" id="cat-justified" role="tabpanel" aria-labelledby="cat-tab">
                                <form action="pet-reg-code.php" method="POST" enctype="multipart/form-data">
                                    <!-- Cat Information start -->
                                    <h4 class="mb-3">Cat's Information</h4>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <img src="<?=$file_path?>assets/img/undraw_cat_epte.svg" id="catImage"
                                                class="img-fluid rounded float-start img-thumbnail mb-3"
                                                alt="Cat Image">
                                            <input type="file" class="form-control" id="catImageInput" name="catImage"
                                                accept="image/*">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row mb-3 g-2">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingCatName"
                                                            placeholder="Name" name="name" required>
                                                        <label for="floatingCatName">Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingCatSex" aria-label="Sex"
                                                            name="sex" required>
                                                            <option selected disabled>Choose...</option>
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                        <label for="floatingCatSex">Sex</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="floatingCatAge"
                                                            placeholder="Age" name="age" required>
                                                        <label for="floatingCatAge">Age</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingCatColor"
                                                            placeholder="Color" name="color" required>
                                                        <label for="floatingCatColor">Color Description</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-control" id="floatingCatVaccinationStatus"
                                                            aria-label="Vaccination Status" name="vaccinationStatus"
                                                            required>
                                                            <option value="">Select Vaccination Status</option>
                                                            <option value="vaccinated" class="text-success">Vaccinated
                                                            </option>
                                                            <option value="unvaccinated" class="text-danger">
                                                                Unvaccinated
                                                            </option>
                                                        </select>
                                                        <label for="floatingCatVaccinationStatus">Vaccination
                                                            Status</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="dateVaccDivCat" style="display: none;">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="floatingCatDateVacc"
                                                            placeholder="Date Vaccinated" name="dateVacc">
                                                        <label for="floatingCatDateVacc">Date Vaccinated</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                            document.getElementById('floatingCatVaccinationStatus').addEventListener(
                                                'change',
                                                function() {
                                                    var selectedValue = this.value;
                                                    document.getElementById('dateVaccDivCat').style.display =
                                                        selectedValue === 'vaccinated' ? 'block' : 'none';
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <!-- Cat Information End -->

                                    <hr>

                                    <h4 class="mb-3">Owner's Information</h4>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <img src="<?=$file_path?>assets/img/undraw_male_avatar_g98d.svg"
                                                id="ownerImage" class="img-fluid rounded float-start img-thumbnail mb-3"
                                                alt="Owner Image">
                                            <input type="file" class="form-control" id="ownerImageInput"
                                                name="ownerImage" accept="image/*">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row mb-3 g-2">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingFirstName"
                                                            placeholder="First Name" name="firstName" required>
                                                        <label for="floatingFirstName">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingMiddleName"
                                                            placeholder="Middle Name" name="middleName" required>
                                                        <label for="floatingMiddleName">Middle Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingLastName"
                                                            placeholder="Last Name" name="lastName" required>
                                                        <label for="floatingLastName">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingOwnerSex"
                                                            name="sexOwner" aria-label="Sex" required>
                                                            <option selected disabled>Choose...</option>
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                        <label for="floatingOwnerSex">Sex</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="floatingDateofBirth"
                                                            placeholder="Date of Birth" name="DateofBirth" required>
                                                        <label for="floatingDateofBirth">Date of Birth</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="floatingOwnerAge"
                                                            placeholder="Age" name="ageOwner" required>
                                                        <label for="floatingOwnerAge">Age</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 g-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control"
                                                            id="floatingContactNumber" placeholder="Contact Number"
                                                            name="contactNumber" required>
                                                        <label for="floatingContactNumber">Contact Number</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-control" id="floatingBarangay"
                                                            name="barangay" required>
                                                            <option value="">Select Barangay</option>
                                                            <option value="Alegre">Alegre</option>
                                                            <option value="Amar">Amar</option>
                                                            <option value="Bandoja">Bandoja</option>
                                                            <option value="Castillo">Castillo</option>
                                                            <option value="Esparagoza">Esparagoza</option>
                                                            <option value="Importante">Importante</option>
                                                            <option value="La paz">La paz</option>
                                                            <option value="Malabor">Malabor</option>
                                                            <option value="Martinez">Martinez</option>
                                                            <option value="Natividad">Natividad</option>
                                                            <option value="Pitac">Pitac</option>
                                                            <option value="Poblacion">Poblacion</option>
                                                            <option value="Salzar">Salzar</option>
                                                            <option value="San Francisco Norte">San Francisco Norte
                                                            </option>
                                                            <option value="San Francisco Sur">San Francisco Sur</option>
                                                            <option value="San Isidro">San Isidro</option>
                                                            <option value="Santa Ana">Santa Ana</option>
                                                            <option value="Santa Justa">Santa Justa</option>
                                                            <option value="Santa Rosario">Santa Rosario</option>
                                                            <option value="Tigbaboy">Tigbaboy</option>
                                                            <option value="Tuno">Tuno</option>
                                                        </select>
                                                        <label for="floatingBarangay">Barangay</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                        <button class="btn add-btn" type="submit" name="CatsReg"><i
                                                class="bi bi-check-circle"></i>
                                            Submit</button>

                                    </div>
                                </form>

                                <script src="<?=$file_path?>assets/js/cats-image-display.js"></script>
                            </div>
                        </div><!-- End Default Tabs -->

                    </div>
                </div>
            </div>

        </section><!-- /Blog Posts Section -->

    </main>

    <?php 
include 'includes/footer.php';
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - FurryTect</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/login.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
    <?php
    include 'includes/alert.php';
    ?>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                            <div class="d-flex justify-content-center py-3">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/furrytect-logo-full-horizontal-smIcon.png" alt>
                                </a>
                            </div><!-- End Logo -->


                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-3 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3" action="login-code.php" method="POST">
                                        <div class="col-12">
                                            <label for="yourLastName" class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="yourLastName"
                                                required>
                                            <div class="invalid-feedback">Please, enter your last name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourFirstName" class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="yourFirstName"
                                                required>
                                            <div class="invalid-feedback">Please, enter your first name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourMiddleName" class="form-label">Middle Name</label>
                                            <input type="text" name="middle_name" class="form-control"
                                                id="yourMiddleName" required>
                                            <div class="invalid-feedback">Please, enter your middle name!</div>
                                        </div>


                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="yourConfirmPassword" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" name="confirm_password" class="form-control"
                                                id="yourConfirmPassword" required>
                                            <div class="invalid-feedback">Please confirm your password!</div>
                                        </div>

                                        <!-- Show Password Checkbox -->
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="showPassword">
                                                <label class="form-check-label" for="showPassword">Show Password</label>
                                            </div>
                                        </div>

                                        <script src="assets/js/reg-password.js"></script>

                                        <!-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div> -->

                                        <div class="col-12">
                                            <button class="btn w-100 text-white" style="background-color: #1cbb9d;"
                                                type="submit" name="AdminReg">Create Account</button>
                                        </div>
                                    </form>

                                    <div class="col-12 mt-3">
                                        <p class="small mb-0">Already have an account? <a href="login-admin">Log
                                                in</a></p>
                                    </div>

                                </div>
                            </div>

                            <div class="credits">
                                Designed by <a href="#">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->



    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
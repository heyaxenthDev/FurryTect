<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Log In - FurryTect</title>
    <meta content name="description">
    <meta content name="keywords">

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

                            <div class="d-flex justify-content-center py-4">
                                <a href="index" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/furrytect-logo-full-horizontal-smIcon.png" alt>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your
                                            Account</h5>
                                        <p class="text-center small">Enter your username &
                                            password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="login-code.php" method="POST">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername"
                                                    value="<?php if(isset($_SESSION['username_input'])){ echo $_SESSION['username_input'];}unset($_SESSION['username_input']); ?>"
                                                    required>
                                                <div class="invalid-feedback">Please enter your
                                                    username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <span hidden="hidden" class="field-icon toggle-password bi bi-eye-fill"
                                                id="icon"
                                                style="position: absolute; right: 30px; transform: translate(0, -50%); top: 66.5%; cursor: pointer;"></span>
                                        </div>
                                        <script src="assets/js/show-password.js"></script>

                                        <!-- <div class="col-12">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                              name="remember" value="true" id="rememberMe">
                                            <label class="form-check-label"
                                              for="rememberMe">Remember me</label>
                                          </div>
                                        </div> -->

                                        <div class="col-12 mb-4">
                                            <button class="btn w-100 text-white" type="submit"
                                                style="background-color: #1cbb9d;" name="AdminLogin">Login</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                            <div class="credits mt-4">
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
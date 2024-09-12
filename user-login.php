<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FurryTect - Animal Vaccination and Dog Tagging</title>
    <meta content name="description">
    <meta content name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="login-code.php" method="POST" autocomplete="off" class="sign-in-form">
                        <a class="logo" href="index">
                            <img src="assets/img/logo.png" alt="easyclass" />
                            <h4><span style="color: #5beed3;">FURRY</span>TECT</h4>
                        </a>

                        <div class="heading">
                            <h2>Welcome Back</h2>
                            <h6>Not registred yet?</h6>
                            <a href="#register" class="toggle">Sign up</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="email" minlength="4" class="input-field" autocomplete="off" name="email"
                                    required />
                                <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" minlength="4" class="input-field" autocomplete="off"
                                    name="password" required />
                                <label>Password</label>
                            </div>

                            <input type="submit" value="Sign In" class="sign-btn" name="signIn" />

                            <p class="text">
                                Forgotten your password or you login datails?
                                <a href="#">Get help</a> signing in
                            </p>
                        </div>
                    </form>

                    <form action="login-code.php" method="POST" autocomplete="off" class="sign-up-form">
                        <a class="logo" href="index">
                            <img src="assets/img/logo.png" alt="easyclass" />
                            <h4><span style="color: #5beed3;">FURRY</span>TECT</h4>
                        </a>

                        <div class="heading">
                            <h2>Get Started</h2>
                            <h6>Already have an account?</h6>
                            <a href="#login" class="toggle">Sign in</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" minlength="4" class="input-field" autocomplete="off" name="firstname"
                                    required />
                                <label>First Name</label>
                            </div>

                            <div class="input-wrap">
                                <input type="email" class="input-field" autocomplete="off" name="email" required />
                                <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" minlength="4" class="input-field" autocomplete="off"
                                    name="password" required />
                                <label>Password</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" minlength="4" class="input-field" autocomplete="off"
                                    name="confirmPassword" required />
                                <label>Confirm Password</label>
                            </div>

                            <input type="submit" value="Sign Up" class="sign-btn" name="signUp" />

                            <p class="text">
                                By signing up, I agree to the
                                <a href="#">Terms of Services</a> and
                                <a href="#">Privacy Policy</a>
                            </p>
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="assets/img/karsten-winegeart-_hoAqzp39tk-unsplash-removebg.png"
                            class="image img-1 show" alt="" />
                        <img src="assets/img/zoe-gayah-jonker-13ky5Ycf0ts-unsplash-removebg-preview.png"
                            class="image img-2" alt="" />
                        <img src="assets/img/alec-favale-Ivzo69e18nk-unsplash-removebg-preview.png" class="image img-3"
                            alt="" />
                    </div>

                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>Create your own account</h2>
                                <h2>Register your pets</h2>
                                <h2>Monitor your pets</h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                            <span data-value="3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Javascript file -->
    <script src="assets/js/app.js"></script>

</body>

</html>
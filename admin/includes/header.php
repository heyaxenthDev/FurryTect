<?php
// Get the base name of the current file without extension
$page = basename(__FILE__, '.php');

// Replace underscores with spaces to match the keys in the titles array
$page = str_replace('_', ' ', $page);

// Get the page title based on the current page
$title = getPageTitle($page);

/**
 * Function to get the page title based on the page name
 *
 * @param string $page The name of the page
 * @return string The corresponding title
 */
function getPageTitle($page)
{
    // Array mapping page names to titles
    $titles = [
        'dashboard' => 'Dashboard - FurryTect',
        'dogs' => 'Dogs - FurryTect',
        'cats' => 'Cats - FurryTect',
        'owners' => 'Owners - FurryTect',
        'vaccination' => 'Vaccination - FurryTect',
        'dog tagging' => 'Dog Tagging - FurryTect',
        'registration' => 'Registration - FurryTect',
        'vaccination report' => 'Vaccination Report - FurryTect',
        'dog tagging report' => 'Dog Tagging Report - FurryTect'
        // Add more pages and titles as needed
    ];

    // Return the title if the page exists in the array, else return a default title
    return $titles[$page] ?? 'FurryTect';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $title; ?></title>
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
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<?php

$id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$query = "SELECT * FROM `admin` WHERE `id` = '$id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user = substr($row['first_name'], 0, 1) . ". " . $row['last_name'];
        $fullname = $row['first_name'] . " " . substr($row['middle_name'], 0, 1) . ". " . $row['last_name'];
        $firstname = $row['first_name'];
        $middlename = $row['middle_name'];
        $lastname = $row['last_name'];
        $username = $row['username'];
        $dc = date("M d, Y", strtotime($row['date_created']));

    }
}
?>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard" class="logo d-flex align-items-center">
                <!-- Full window logo -->
                <img class="d-md-block d-none" src="assets/img/furrytect-logo-full-horizontal-smIcon.png" alt="">
                <!-- Mobile logo -->
                <img class="d-md-none d-block" src="assets/img/furrytect-logo-full-appleSize.png" alt="">
                <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $fullname ?></h6>
                            <span>Administrative</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="user-profile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="user-profile.php">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="\FurryTect/admin-logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
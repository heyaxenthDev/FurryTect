<?php
// Define the current page by checking the URL
$current_page = basename($_SERVER['PHP_SELF'], ".php");

// Mapping page names to their URLs
$pages = [
    "dashboard" => "dashboard",
    "dogs" => "dogs",
    "cats" => "cats",
    "owners" => "owners",
    "vaccination" => "vaccination",
    "dogtagging" => "dogtagging",
    "registration" => "registration",
    "vaccination report" => "vaccination%20report",
    "dogtagging report" => "dogtagging%20report"
];

// Function to determine if a page is active
function is_active($page, $current_page)
{
    return $page === $current_page ? '' : 'collapsed';
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?= is_active('dashboard', $current_page); ?>" href="dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link <?= is_active('dogs', $current_page); ?>" href="dogs">
                <i class="bx bxs-dog"></i>
                <span>Dogs</span>
            </a>
        </li><!-- End Dogs Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= is_active('cats', $current_page); ?>" href="cats">
                <i class="bx bxs-cat"></i>
                <span>Cats</span>
            </a>
        </li><!-- End Cats Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= is_active('owners', $current_page); ?>" href="owners">
                <i class="bi bi-person-fill"></i>
                <span>Owners</span>
            </a>
        </li><!-- End Owners Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= is_active('vaccination', $current_page); ?>" href="vaccination">
                <i class="bx bxs-injection"></i>
                <span>Vaccination</span>
            </a>
        </li><!-- End Vaccination Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= is_active('dogtagging', $current_page); ?>" href="dogtagging">
                <i class="bx bxs-purchase-tag"></i>
                <span>Dogtagging</span>
            </a>
        </li><!-- End Dogtagging Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= is_active('registration', $current_page); ?>" href="registration">
                <i class="bx bxs-cabinet"></i>
                <span>Registration</span>
            </a>
        </li><!-- End Registration Page Nav -->

        <li class="nav-heading">Reports</li>

        <li class="nav-item">
            <a class="nav-link <?= is_active('vaccination report', $current_page); ?>" href="vaccination report">
                <i class="bx bxs-folder-open"></i>
                <span>Vaccination Report</span>
            </a>
        </li><!-- End Vaccination Report Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= is_active('dogtagging report', $current_page); ?>" href="dogtagging report">
                <i class="bx bxs-file"></i>
                <span>Dogtagging Report</span>
            </a>
        </li><!-- End Dogtagging Report Page Nav -->
    </ul>

</aside><!-- End Sidebar-->
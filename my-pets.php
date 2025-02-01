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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

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
                <h1>My Pets</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li class="current">My Pets</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- My Pets Section -->
        <section id="blog-posts" class="blog-posts section">
            <!-- Section Title -->
            <div class="container section-title text-start" data-aos="fade-up">
                <div class="d-flex justify-content-between">
                    <h2>My Pets</h2>
                    <div class="col-md-4">
                        <div class="input-group search-bar">
                            <input type="text" name="search" class="form-control" id="searchInput"
                                placeholder="Search by Pet or Owner Name" required>
                            <button class="btn btn-primary" type="submit" id="searchBtn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="petsList" class="row mt-3">
                    <!-- Dynamic pet articles/cards will be inserted here -->
                </div>
            </div>

        </section>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            function searchPets() {
                var searchQuery = $('#searchInput').val().trim();
                if (searchQuery.length > 0) {
                    $.ajax({
                        url: 'searchPets.php',
                        type: 'GET',
                        data: {
                            search: searchQuery
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (Array.isArray(response)) {
                                displayPets(response);
                            } else {
                                console.error("Unexpected response:", response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", status, error);
                            console.error("Server Response:", xhr.responseText);
                        }
                    });
                } else {
                    $('#petsList').empty();
                }
            }

            // Event listener for search input (live search)
            $('#searchInput').on('keyup', searchPets);

            // Search on button click
            $('#searchBtn').on('click', function(e) {
                e.preventDefault();
                searchPets();
            });

            // Function to display pets dynamically
            function displayPets(pets) {
                $('#petsList').empty(); // Clear previous results

                if (pets.length > 0) {
                    pets.forEach(function(pet) {
                        var petCard = `
                <div class="col-lg-3 mt-3">
                    <article>
                        <div class="post-img">
                            <img src="admin/${pet.picture}" alt="Pet Image" class="img-fluid">
                        </div>
                        <h2 class="title">
                            <span>${pet.name}</span>
                        </h2>
                        <p>
                            Species: ${pet.species} <br> Age: ${pet.age} years old <br> Color: ${pet.color} <br>
                            Owner: ${pet.owner_code} <br>
                            Vaccinated: ${pet.vacc_status ? 'Yes' : 'No'}
                        </p>
                        <div class="d-grid gap-2 col-8 mx-auto mt-2">
                            <button class="btn add-btn view-pet" data-id="${pet.id}" data-name="${pet.name}" 
                                    data-species="${pet.species}" data-age="${pet.age}" data-color="${pet.color}" 
                                    data-owner="${pet.owner_code}" data-vacc="${pet.vacc_status ? 'Yes' : 'No'}"
                                    data-picture="admin/${pet.picture}">
                                <i class="bi bi-eye"></i> View Record
                            </button>
                        </div>
                    </article>
                </div>
                `;
                        $('#petsList').append(petCard);
                    });

                    // Add event listener for "View Record" button
                    $('.view-pet').on('click', function() {
                        var petImage = $(this).data('picture');
                        var petName = $(this).data('name');
                        var petSpecies = $(this).data('species');
                        var petAge = $(this).data('age');
                        var petColor = $(this).data('color');
                        var petOwner = $(this).data('owner');
                        var petVaccinated = $(this).data('vacc');

                        // Populate modal with pet details
                        $('#modalPetImage').attr('src', petImage);
                        $('#modalPetName').text(petName);
                        $('#modalPetSpecies').text(petSpecies);
                        $('#modalPetAge').text(petAge + ' years old');
                        $('#modalPetColor').text(petColor);
                        $('#modalPetOwner').text(petOwner);
                        $('#modalPetVaccinated').text(petVaccinated);

                        // Show the modal
                        $('#petModal').modal('show');
                    });
                } else {
                    $('#petsList').append('<p>No pets found.</p>');
                }
            }
        });
        </script>

        <!-- Pet Details Modal -->
        <div class="modal fade" id="petModal" tabindex="-1" aria-labelledby="petModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="petModalLabel">Pet Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img id="modalPetImage" src="" class="img-fluid rounded shadow" alt="Pet Image">
                            </div>
                            <div class="col-md-7">
                                <h3 id="modalPetName"></h3>
                                <p><strong>Species:</strong> <span id="modalPetSpecies"></span></p>
                                <p><strong>Age:</strong> <span id="modalPetAge"></span></p>
                                <p><strong>Color:</strong> <span id="modalPetColor"></span></p>
                                <p><strong>Owner Code:</strong> <span id="modalPetOwner"></span></p>
                                <p><strong>Vaccinated:</strong> <span id="modalPetVaccinated"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



    </main>

    <?php 
    include 'includes/footer.php';
   ?>
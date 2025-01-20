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
                <h1>Safety Tips</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index">Home</a></li>
                        <li><a href="resources">Resources</a></li>
                        <li class="current">Safety Tips</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bx bx-bulb"></i>
                            </div>
                            <div>
                                <h4 class="title">
                                    <label href="#safetyTips" data-bs-toggle="modal" class="stretched-link">Safety Tips
                                        on Pet Ownership</label>
                                </h4>
                                <p class="description">
                                    Welcome to the wonderful world of pet ownership! It's a journey filled with joy,
                                    companionship, and responsibility. Here are some key tips to ensure you and your pet
                                    start off on the right paw:
                                </p>
                                <a class="read-more-link">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="modal fade" id="safetyTips" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="safetyTipsLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="safetyTipsLabel">Safety Tips on Pet Ownership</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Pet-Proofing Your Home</h6>
                                    <p>
                                        Before bringing your new pet home, take a tour of your living space to
                                        identify and eliminate potential hazards.
                                        Secure any loose wires, keep small objects out of reach, and remove any
                                        plants or substances that could be toxic to your pet.
                                    </p>

                                    <h6>Regular Vet Visits</h6>
                                    <p>
                                        Find a reputable veterinarian in your area and schedule an initial health
                                        check-up for your pet.
                                        Schedule regular check-ups with a veterinarian to keep your animals healthy
                                        and up-to-date on vaccinations.
                                        Regular vet visits are crucial for vaccinations, parasite control, and early
                                        detection of health issues. A healthy pet is a happy pet!
                                    </p>

                                    <h6>Balanced Diet</h6>
                                    <p>
                                        Provide your pet with a nutritious and balanced diet. The right food will
                                        depend on your pet's species, age, and health needs.
                                        Avoid giving them harmful human foods, such as chocolate, onions, or grapes.
                                        Consult with your vet to determine the best diet for your pet,
                                        and always provide fresh water.
                                    </p>

                                    <h6>Exercise and Play</h6>
                                    <p>
                                        Ensure your pet gets plenty of exercise and mental stimulation. Different
                                        pets have different exercise needs, so tailor activities to their specific
                                        requirements.
                                        Playtime not only keeps your pet physically fit but also strengthens your
                                        bond.
                                    </p>

                                    <h6>Identification and Registration</h6>
                                    <p>
                                        Make sure your pet always wears an ID tag with your contact information.
                                        If you have a dog pet, make sure your dog always wears the dog tag that is
                                        provided by the municipality,
                                        and don’t forget to register your pet on this website.
                                    </p>

                                    <h6>Training and Socialization</h6>
                                    <p>
                                        Training your pet in basic obedience commands like "sit," "stay," and "come"
                                        is essential for their safety and your peace of mind.
                                        Socializing your pet with other animals and people helps them become
                                        well-adjusted and reduces anxiety.
                                    </p>

                                    <h6>Hygiene and Grooming</h6>
                                    <p>
                                        Regular grooming is vital for your pet's health. This includes bathing,
                                        brushing, nail trimming, and dental care.
                                        Maintaining good hygiene helps prevent infections and keeps your pet looking
                                        their best.
                                    </p>

                                    <h6>Emergency Preparedness</h6>
                                    <p>
                                        Prepare for emergencies by knowing the location of the nearest 24-hour
                                        animal hospital and keeping a pet first aid kit at home.
                                        Make sure you have a plan in place for natural disasters and other
                                        emergencies.
                                    </p>

                                    <h6>Environment and Comfort</h6>
                                    <p>
                                        Ensure your pet has a comfortable and safe living environment. Provide
                                        appropriate bedding, a clean living space,
                                        a gate or barrier to prevent pets from going onto streets, and protection
                                        from extreme weather conditions.
                                        Expose your dog to different people, animals, and environments from a young
                                        age to help them become more comfortable and less anxious.
                                    </p>

                                    <h6>Understanding Body Language</h6>
                                    <p>
                                        Learn to read your pet’s body language to understand their needs and
                                        emotions. This can help you respond appropriately and prevent potential
                                        problems.
                                    </p>

                                    <h6>Love and Attention</h6>
                                    <p>
                                        Lastly, shower your pet with love and attention. Your pet thrives on your
                                        affection and companionship.
                                        Spend quality time together and build a strong, loving relationship.
                                    </p>

                                    <p>
                                        By following these tips, you'll be well on your way to creating a safe,
                                        happy, and healthy environment for your new pet.
                                        Welcome to the rewarding adventure of pet ownership!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bx bxs-injection"></i> <!-- Use an appropriate icon -->
                            </div>
                            <div>
                                <h4 class="title">
                                    <a href="#DogBites" data-bs-toggle="modal" class="stretched-link">Understanding Why
                                        Dogs Bite</a>
                                </h4>
                                <p class="description">
                                    Dogs may bite for various reasons, including fear, pain, protection of territory or
                                    resources, and even during play. Recognizing these triggers can help you prevent
                                    bites.
                                </p>
                                <a class="read-more-link">Read More</a>
                            </div>

                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="modal fade" id="DogBites" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="DogBitesLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header d-flex align-items-center justify-content-between">
                                    <h5 class="modal-title" id="DogBitesLabel">Tips to Prevent Dog Bites</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>1. Socialize Your Dog</h6>
                                    <p>
                                        Expose your dog to different people, animals, and environments from a young age.
                                        This helps them become more comfortable and less likely to bite out of fear or
                                        anxiety.
                                    </p>

                                    <h6>2. Train Your Dog</h6>
                                    <p>
                                        Basic obedience training can help your dog understand commands and behave
                                        appropriately in different situations.
                                        Positive reinforcement techniques work best.
                                    </p>

                                    <h6>3. Supervise Interactions</h6>
                                    <p>
                                        Always supervise your dog when they are around children or unfamiliar people.
                                        Teach children how to interact with dogs safely and respectfully.
                                    </p>

                                    <h6>4. Respect Your Dog’s Space</h6>
                                    <p>
                                        Give your dog their own space and avoid approaching them when they are eating,
                                        sleeping, or caring for puppies.
                                    </p>

                                    <h6>5. Learn to Read Dog Body Language</h6>
                                    <p>
                                        Understanding your dog’s body language can help you recognize signs of stress or
                                        aggression before a bite occurs.
                                        Signs include growling, bared teeth, raised fur, and a stiff posture.
                                    </p>

                                    <h6>6. Avoid High-Risk Situations</h6>
                                    <p>
                                        Keep your dog on a leash in public places and avoid situations that may provoke
                                        them, such as loud noises or sudden movements.
                                    </p>

                                    <h6>7. Keep Your Dog Healthy</h6>
                                    <p>
                                        Regular vet visits and vaccinations can help keep your dog healthy and reduce
                                        the risk of bites due to pain or illness.
                                    </p>

                                    <h6>8. Spay or Neuter Your Dog</h6>
                                    <p>
                                        Spaying or neutering your dog can reduce aggressive behavior and make them less
                                        likely to bite.
                                    </p>

                                    <h6>9. Teach Children Proper Behavior</h6>
                                    <p>
                                        Educate children on how to approach and interact with dogs safely. Never leave
                                        young children alone with a dog.
                                    </p>

                                    <h6>10. Use Positive Reinforcement</h6>
                                    <p>
                                        Reward your dog for good behavior and avoid using punishment, which can increase
                                        fear and aggression.
                                    </p>

                                    <h6>Responding to a Dog Bite</h6>
                                    <p>
                                        If a dog bite occurs, seek medical attention immediately, especially if the
                                        wound is severe.
                                        Report the bite to local authorities and follow up with the dog’s owner to
                                        ensure they take responsibility and prevent future incidents.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- /Services Section -->

    </main>

    <?php 
    include 'includes/footer.php';
   ?>
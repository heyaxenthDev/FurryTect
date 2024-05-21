<?php
include 'authentication.php';
include 'includes/conn.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/login-session.php';
include 'alert.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <!-- Dogs Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card dogs-card">

                            <div class="card-body">
                                <h5 class="card-title">Dogs</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-dog"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                        // Assuming you have already connected to your database

                                        // Fetch data from the owner table
                                        $sql = "SELECT *, COUNT(`id`) AS dogs_count FROM `dogs`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <h6><?php echo $row['dogs_count']; ?></h6>
                                        <?php
                                            }
                                        } else {
                                            echo "0";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Dogs Card -->

                    <!-- Cats Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card cats-card">

                            <div class="card-body">
                                <h5 class="card-title">Cats</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-cat"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                        // Assuming you have already connected to your database

                                        // Fetch data from the owner table
                                        $sql = "SELECT *, COUNT(`id`) AS cats_count FROM `cats`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <h6><?php echo $row['cats_count']; ?></h6>
                                        <?php
                                            }
                                        } else {
                                            echo "0";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Cats Card -->

                    <!-- Owners Card -->
                    <div class="col-xxl-3 col-md-6">

                        <div class="card info-card owners-card">

                            <div class="card-body">
                                <h5 class="card-title">Owners</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                        // Assuming you have already connected to your database

                                        // Fetch data from the owner table
                                        $sql = "SELECT *, COUNT(`id`) AS owner_count FROM `owners`";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <h6><?php echo $row['owner_count']; ?></h6>
                                        <?php
                                            }
                                        } else {
                                            echo "0";
                                        }

                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Owners Card -->

                    <!-- Vaccinated Card -->
                    <div class="col-xxl-3 col-md-6">

                        <div class="card info-card vacc-card">

                            <div class="card-body">
                                <h5 class="card-title">Vaccinated</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-injection"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                        // Assuming you have already connected to your database

                                        // Fetch data from the owner table
                                        $sql = "SELECT SUM(vacc_count) AS total_vacc_count FROM (
                                                SELECT COUNT(d.`id`) AS vacc_count
                                                FROM `dogs` d
                                                WHERE d.`vacc_status` = 'vaccinated'
                                                
                                                UNION ALL
                                                
                                                SELECT COUNT(c.`id`) AS vacc_count
                                                FROM `cats` c
                                                WHERE c.`vacc_status` = 'vaccinated'
                                            ) AS combined_vacc_counts";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <h6><?php echo $row['total_vacc_count']; ?></h6>
                                        <?php
                                            }
                                        } else {
                                            echo "0";
                                        }
                                        ?>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Vaccinated Card -->

                </div>
            </div>

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- [Project Calendar] start -->
                    <script src='assets/vendor/fullcalendar/index.global.min.js'></script>
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth'
                        });
                        calendar.render();
                    });
                    </script>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Calendar</h5>
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <!-- [Project Calendar] end -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Dog Tagging Data -->
                <div class="card">
                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->
                    <?php
                    // Query to get dog tagging data along with the barangay details
                    $sql = "SELECT o.barangay, COUNT(d.id) as dog_count
                            FROM dogs d
                            LEFT JOIN owners o ON d.owner_code = o.owner_code
                            WHERE d.tag_number IS NOT NULL GROUP BY o.barangay";
                    $result = $conn->query($sql);

                    $barangayData = [];

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $barangayData[] = [
                                'value' => (int)$row['dog_count'],
                                'name' => $row['barangay']
                            ];
                        }
                       echo json_encode($barangayData);
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                    ?>
                    <div class="card-body pb-0">
                        <h5 class="card-title">Dog Tagging Data</h5>
                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const barangayData = <?php echo json_encode($barangayData); ?>;
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                series: [{
                                    name: 'Dogs Tagged',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: barangayData
                                }]
                            });
                        });
                        </script>
                    </div>
                </div><!-- End Dog Tagging Data -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

<?php
include "includes/footer.php";
?>
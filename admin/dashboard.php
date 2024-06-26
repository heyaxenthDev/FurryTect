<?php
    include 'authentication.php';
    checkLogin(); // Call the function to check if the user is logged in
    
    include 'includes/conn.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
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
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Calendar</h5>
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <script src="assets/js/calendar.js"></script>
                    <!-- [Project Calendar] end -->

                    <?php 
                    $schedules = $conn->query("SELECT * FROM `schedule_list`");
                    $sched_res = [];
                    foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
                        $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
                        $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
                        $sched_res[$row['id']] = $row;
                    }
                    ?>

                    <script>
                    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
                    </script>

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Schedule -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Schedule</h5>

                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title"
                                        id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description"
                                        id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm w-75" type="submit" form="schedule-form"><i
                                    class="ri ri-calendar-check-line"></i> Save</button>
                            <button class="btn btn-default border btn-sm" type="reset" form="schedule-form">
                                Cancel</button>
                        </div>
                    </div>
                </div><!-- End Schedule -->

                <!-- Event Details Modal -->
                <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Schedule Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <dl>
                                        <dt class="text-muted">Title</dt>
                                        <dd id="title" class="fw-bold fs-4"></dd>
                                        <dt class="text-muted">Description</dt>
                                        <dd id="description" class=""></dd>
                                        <dt class="text-muted">Start</dt>
                                        <dd id="start" class=""></dd>
                                        <dt class="text-muted">End</dt>
                                        <dd id="end" class=""></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary btn-sm" id="edit"
                                        data-id="">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="delete"
                                        data-id="">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Event Details Modal -->

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
                    $sql = "SELECT o.barangay, COUNT(d.id) AS dog_count
                            FROM owners o
                            LEFT JOIN dogs d ON d.owner_code = o.owner_code WHERE d.tag_number IS NOT NULL 
                            GROUP BY o.barangay";
                    $result = $conn->query($sql);

                    $barangayData = [];

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $barangayData[] = [
                                'value' => (int)$row['dog_count'],
                                'name' => $row['barangay']
                            ];
                        }
                        // echo json_encode($barangayData);
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
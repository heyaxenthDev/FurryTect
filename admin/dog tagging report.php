<?php
include 'authentication.php';
checkLogin(); // Call the function to check if the user is logged in

include 'includes/conn.php';
include 'includes/header.php';
include 'includes/sidebar.php';
include 'alert.php';
?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <h1>Dog Tagging Reports</h1>
        <button class="btn add-btn" onclick="window.print()"><i class="bi bi-printer"></i> Print Report</button>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <!-- Report Header -->
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/img/DAO.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-9 text-center align-content-center">
                                <h4 class="mt-3"><strong>Dog Tagging Report</strong></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Province:</strong> Antique</p>
                                <p><strong>Date Reported: </strong> <?php echo date("M d, Y"); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Municipality:</strong> TIBIAO</p>
                                <p><strong>Livestock Technician:</strong> CANDIDO L. BELARMINO</p>
                            </div>
                        </div>

                        <!-- Table -->
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2">DATE</th>
                                    <th rowspan="2">BARANGAY</th>
                                    <th colspan="3">Owner Information</th>
                                    <th colspan="5">Animal Information</th>
                                    <th>Dog Tagging Information</th>
                                </tr>
                                <tr class="fw-narrow">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Name of Dog</th>
                                    <th>Color</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Animal Registered</th>
                                    <th>Tag Number</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                // Join query to fetch data from 'dogs' and 'owners'
                                $sql = "SELECT 
                                        d.*,
                                        o.*
                                    FROM 
                                        dogs d
                                    INNER JOIN 
                                        owners o 
                                    ON 
                                        d.owner_code = o.owner_code
                                    WHERE 
                                        d.date_tagged IS NOT NULL AND d.date_tagged != ''";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>{$row['date_tagged']}</td>
                                            <td>{$row['barangay']}</td>
                                            <td>{$row['first_name']}</td>
                                            <td>{$row['last_name']}</td>
                                            <td>" . ($row['sex'] == 0 ? "Female" : "Male"). "</td>
                                            <td>{$row['name']}</td>
                                            <td>{$row['color']}</td>
                                            <td>" . ($row['sex'] == 0 ? "Female" : "Male") . "</td>
                                            <td>{$row['age']}</td>
                                            <td>" . ($row['date_tagged'] != null ? 'Yes' : 'No') . "</td>
                                            <td>{$row['tag_number']}</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='11' class='text-center'>No data available</td></tr>";
                                }
                                ?>
                            </tbody>

                        </table>

                        <!-- Report Footer -->
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <img src="assets/img/sub-by.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <img src="assets/img/noted-by.png" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include "includes/footer.php";
?>
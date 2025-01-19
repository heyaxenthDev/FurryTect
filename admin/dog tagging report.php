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
                        <div class="text-center mb-4">
                            <h5>Department of Agriculture</h5>
                            <h6>Bureau of Animal Industry</h6>
                            <p>Visayas Ave. Diliman, Quezon City</p>
                            <h4 class="mt-3"><strong>Dog Tagging Report</strong></h4>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p><strong>Province:</strong> Antique</p>
                                <p><strong>Date Reported: </strong> <?php echo date("M d, Y"); ?></p>
                            </div>
                            <div>
                                <p><strong>Municipality:</strong> TIBIAO</p>
                                <p><strong>Livestock Technician:</strong> CANDIDO L. BELARMINO</p>
                            </div>
                        </div>

                        <!-- Table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Barangay</th>
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
                            <tbody>
                                <?php
                                // Join query to fetch data from 'dogs' and 'owners'
                                $sql = "SELECT 
                                            dogs.date_tagged AS dog_date_tagged,
                                            owners.barangay AS owner_barangay,
                                            owners.first_name AS owner_first_name,
                                            owners.last_name AS owner_last_name,
                                            dogs.name AS dog_name,
                                            dogs.color AS dog_color,
                                            dogs.sex AS dog_sex,
                                            dogs.age AS dog_age,
                                            dogs.vacc_status AS dog_vacc_status,
                                            dogs.tag_number AS dog_tag_number
                                        FROM 
                                            dogs
                                        JOIN 
                                            owners 
                                        ON 
                                            dogs.owner_code = owners.owner_code
                                        ORDER BY 
                                            dogs.date_tagged ASC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>{$row['dog_date_tagged']}</td>
                                            <td>{$row['owner_barangay']}</td>
                                            <td>{$row['owner_first_name']}</td>
                                            <td>{$row['owner_last_name']}</td>
                                            <td>" . ucfirst($row['dog_sex']) . "</td>
                                            <td>{$row['dog_name']}</td>
                                            <td>{$row['dog_color']}</td>
                                            <td>" . ucfirst($row['dog_sex']) . "</td>
                                            <td>{$row['dog_age']}</td>
                                            <td>" . ($row['dog_vacc_status'] == 1 ? 'Yes' : 'No') . "</td>
                                            <td>{$row['dog_tag_number']}</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='11' class='text-center'>No data available</td></tr>";
                                }
                                ?>
                            </tbody>

                        </table>

                        <!-- Report Footer -->
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <p><strong>Submitted by:</strong></p>
                                <p>CANDIDO L. BELARMINO</p>
                                <p>A.T - Livestock</p>
                            </div>
                            <div class="text-end">
                                <p><strong>Noted by:</strong></p>
                                <p>HAYDEE S. DALUMPINES</p>
                                <p>Municipal Agriculturist</p>
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
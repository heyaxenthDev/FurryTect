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
        <h1>Vaccination Reports</h1>
        <button class="btn print-btn" onclick="printCard()"><i class="bi bi-printer"></i> Print Report</button>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="cardToPrint">
                    <div class="card-body mt-3">
                        <!-- Report Header -->
                        <div class="row header-container">
                            <div class="col-3">
                                <img src="assets/img/DAO.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-9 text-center align-content-center">
                                <h4 class="mt-3"><strong>Vaccination Report</strong></h4>
                            </div>
                        </div>

                        <div class="row names">
                            <div class="col-md-6">
                                <p><strong>Province:</strong> Antique</p>
                                <p><strong>Date Reported: </strong> <?php echo date("M d, Y"); ?></p>
                            </div>
                            <div class="col-md-6 one-end">
                                <p><strong>Municipality:</strong> TIBIAO</p>
                                <p><strong>Livestock Technician:</strong> CANDIDO L. BELARMINO</p>
                            </div>
                        </div>

                        <!-- Table -->
                        <table class="table table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2">REASON</th>
                                    <th rowspan="2">DATE</th>
                                    <th rowspan="2">BARANGAY</th>
                                    <th colspan="3">Owner Information</th>
                                    <th colspan="6">Animal Information</th>
                                    <th colspan="4">Vaccination Information</th>
                                </tr>
                                <tr class="fw-narrow">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Name of Pet</th>
                                    <th>Color</th>
                                    <th>Color</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Animal Registered</th>
                                    <th>Disease</th>
                                    <th>Vaccine Type</th>
                                    <th>Vaccine Source</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                // Join query to fetch data from 'dogs' and 'owners'
                                $sql = "SELECT 
                                            d.date_vacc,
                                            d.vacc_reason,
                                            d.name,
                                            d.color,
                                            d.sex,
                                            d.age,
                                            d.vacc_disease,
                                            d.vacc_source,
                                            d.vacc_type,
                                            d.vacc_status,
                                            d.species,
                                            o.*
                                        FROM 
                                            dogs d
                                        INNER JOIN 
                                            owners o 
                                            ON d.owner_code = o.owner_code
                                        WHERE 
                                            d.vacc_status = 'vaccinated' 

                                        UNION ALL

                                        SELECT 
                                            c.date_vacc,
                                            c.vacc_reason,
                                            c.name,
                                            c.color,
                                            c.sex,
                                            c.age,
                                            c.vacc_disease,
                                            c.vacc_source,
                                            c.vacc_type,
                                            c.vacc_status,
                                            c.species,
                                            o.*
                                        FROM
                                            cats c
                                        INNER JOIN 
                                            owners o 
                                            ON c.owner_code = o.owner_code
                                        WHERE 
                                            c.vacc_status = 'vaccinated'
                                        ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $newDateFormat = date('F j, Y', strtotime($row['date_vacc']));
                                        echo "<tr>
                                            <td>{$row['vacc_reason']}</td>
                                            <td>{$newDateFormat}</td>
                                            <td><span>{$row['barangay']}</span></td>
                                            <td>{$row['first_name']}</td> 
                                            <td>{$row['last_name']}</td>
                                            <td>" . ($row['sex'] == 0 ? "Female" : "Male"). "</td>
                                            <td>{$row['name']}</td>
                                            <td>{$row['color']}</td>
                                            <td>{$row['species']}</td>
                                            <td>" . ($row['sex'] == 0 ? "Female" : "Male") . "</td>
                                            <td>{$row['age']}</td>
                                            <td>" . ($row['date_vacc'] != null ? 'Yes' : 'No') . "</td>
                                            <td>{$row['vacc_disease']}</td>
                                            <td>{$row['vacc_type']}</td>
                                            <td>{$row['vacc_source']}</td>
                                            <td>{$row['vacc_status']}</td>                        
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='16' class='text-center'>No data available</td></tr>";
                                }
                                ?>
                            </tbody>

                        </table>

                        <!-- Report Footer -->
                        <div class="row footer-row mt-4">
                            <div class="col-4">
                                <img src="assets/img/sub-by.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-4">
                                <img src="assets/img/noted-by.png" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    function printCard() {
        // Add a class to the body to indicate we're in the print mode
        document.body.classList.add('print-mode');
        window.print();
        document.body.classList.remove('print-mode');
    }
    </script>

</main><!-- End #main -->
<?php
    include "includes/footer.php";
    ?>
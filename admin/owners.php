 <?php
    include 'authentication.php';
    include 'includes/conn.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
    include 'alert.php';

    ?>

 <main id="main" class="main">

     <div class="pagetitle d-flex justify-content-between">
         <h1>Owners</h1>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <button class="btn add-btn"><i class="bi bi-plus-circle"></i> Add Owners</button>
             <button class="btn add-btn"><i class="bi bi-clipboard-data"></i> Generate List</button>
         </div>
     </div><!-- End Page Title -->

     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body mt-2">
                         <!-- Table with stripped rows -->
                         <table class="table datatable">
                             <thead>
                                 <tr>
                                     <th>Owner Code</th>
                                     <th>Last Name</th>
                                     <th>First Name</th>
                                     <th>Middle Name</th>
                                     <th>Sex</th>
                                     <th>Barangay</th>
                                     <th>Number of Pets</th>
                                     <th>Contact Number</th>
                                     <th>Actions</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    // Assuming you have already connected to your database

                                    // Fetch data from the dogs table
                                    $sql = "SELECT o.`owner_code`, o.`first_name`, o.`middle_name`, o.`last_name`, o.`contact_number`, o.`barangay`, o.`sex`,
                                            COUNT(DISTINCT d.`tag_number`) AS num_dogs,
                                            COUNT(DISTINCT c.`name`) AS num_cats
                                        FROM 
                                            `owners` o
                                        LEFT JOIN 
                                            `dogs` d ON o.`owner_code` = d.`owner_code`
                                        LEFT JOIN 
                                            `cats` c ON o.`owner_code` = c.`owner_code`
                                        GROUP BY 
                                            o.`owner_code`
                                        ORDER BY
                                            o.`id`";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $middlenameInitial = substr($row['middle_name'], 0, 1);
                                            $total_pets = $row['num_dogs'] + $row['num_cats'];
                                    ?>
                                 <tr>
                                     <td><?php echo $row["owner_code"]; ?></td>
                                     <td><?php echo $row["last_name"]; ?></td>
                                     <td><?php echo $row["first_name"]; ?></td>
                                     <td><?php echo $row["middle_name"]; ?></td>
                                     <td><?php echo ($row["sex"] == 1) ? "Male" : "Female"; ?></td>
                                     <td><?php echo $row["barangay"]; ?></td>
                                     <td><?php echo $total_pets; ?></td>
                                     <td><?php echo $row["contact_number"]; ?></td>
                                     <td>
                                         <div class="d-grid gap-2 d-md-block">
                                             <button class="btn btn-primary" type="button"><i
                                                     class="bi bi-eye-fill"></i></button>
                                             <button class="btn btn-primary" type="button"><i
                                                     class="bi bi-pencil-square"></i></button>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php
                                        }
                                    }
                                    $conn->close();
                                    ?>
                             </tbody>
                         </table>
                         <!-- End Table with stripped rows -->

                     </div>
                 </div>

             </div>
         </div>
     </section>

 </main><!-- End #main -->
 <?php
    include "includes/footer.php";
    ?>
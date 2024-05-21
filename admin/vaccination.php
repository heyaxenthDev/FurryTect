 <?php
    include 'authentication.php';
    include 'includes/conn.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
    include 'alert.php';

    ?>

 <main id="main" class="main">

     <div class="pagetitle d-flex justify-content-between">
         <h1>Vaccination</h1>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <button class="btn add-btn"><i class="bi bi-clipboard-data"></i> Generate List</button>
         </div>
     </div><!-- End Page Title -->

     <?php include 'modal-cat.php' ?>

     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body mt-2">
                         <!-- Table with stripped rows -->
                         <table class="table datatable">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Sex</th>
                                     <th>Barangay</th>
                                     <th>Species</th>
                                     <th>Date Vaccinated</th>
                                     <th>Actions</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    // Assuming you have already connected to your database

                                    // Fetch data from the cats and dogs tables
                                    $sql = "SELECT c.`name`, c.`sex`, o.`barangay`, c.`species`, c.`date_vacc`
                                            FROM `cats` c 
                                            LEFT JOIN `owners` o ON c.`owner_code` = o.`owner_code`
                                            UNION
                                            SELECT d.`name`, d.`sex`, o.`barangay`, d.`species`, d.`date_vacc`
                                            FROM `dogs` d 
                                            LEFT JOIN `owners` o ON d.`owner_code` = o.`owner_code`
                                            ORDER BY species, name";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                 <tr>
                                     <td><?php echo htmlspecialchars($row['name']); ?></td>
                                     <td><?php echo (htmlspecialchars($row['sex']) == 1) ? "Male" : "Female"; ?></td>
                                     <td><?php echo htmlspecialchars($row['barangay']); ?></td>
                                     <td><?php echo htmlspecialchars($row['species']); ?></td>
                                     <td><?php echo (htmlspecialchars($row['date_vacc']) == null || htmlspecialchars($row['date_vacc']) == "0000-00-00") ? "<span class='badge bg-danger'>Not yet Vaccinated</span>" : htmlspecialchars($row['date_vacc']); ?>
                                     </td>
                                     <td>
                                         <div class="d-grid gap-2 d-md-block">
                                             <button class="btn add-btn" type="button"><i
                                                     class="bi bi-eye-fill"></i></button>
                                             <button class="btn btn-outline-secondary" type="button"><i
                                                     class="bi bi-pencil-square"></i></button>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php
                                        }
                                    } else {
                                        ?>
                                 <tr>
                                     <td colspan="6">No records found.</td>
                                 </tr>
                                 <?php
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
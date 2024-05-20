 <?php
    include 'authentication.php';
    include 'includes/conn.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
    include 'alert.php';

    ?>

 <main id="main" class="main">

     <div class="pagetitle d-flex justify-content-between">
         <h1>Dogs</h1>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#OwnersModalFirst"><i
                     class="bi bi-plus-circle"></i> Add Dogs</button>
             <button class="btn add-btn"><i class="bi bi-clipboard-data"></i> Generate List</button>
         </div>
     </div><!-- End Page Title -->
     <!-- Add Dogs Modal -->
     <?php include 'modal-dogs.php' ?>
     <!-- End Add Dogs Modal -->
     <section class="section">
         <div class="row">
             <div class="col-lg-12">

                 <div class="card">
                     <div class="card-body mt-2">
                         <!-- Table with stripped rows -->
                         <table class="table datatable">
                             <thead>
                                 <tr>
                                     <th>Tag Number</th>
                                     <th>
                                         <b>N</b>ame
                                     </th>
                                     <th>Sex</th>
                                     <th>Barangay</th>
                                     <th>Owner</th>
                                     <th>Contact Number</th>
                                     <th>Actions</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    // Assuming you have already connected to your database

                                    // Fetch data from the dogs table
                                    $sql = "SELECT o.`owner_code`, o.`first_name`, o.`middle_name`, o.`last_name`, o.`contact_number`, o.`barangay`, 
                                    d.`species`, d.`tag_number`, d.`date_tagged`, d.`name`, d.`sex`, d.`age`, d.`color`, d.`owner_code`, d.`vacc_status`, d.`date_vacc`, d.`picture`
                                    FROM `dogs` d LEFT JOIN `owners` o ON d.`owner_code` = o.`owner_code`";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $middlenameInitial = substr($row['middle_name'], 0, 1);
                                    ?>
                                 <tr>
                                     <td><?php echo ($row["tag_number"] == null) ? "Not yet Tagged" : $row["tag_number"]; ?>
                                     </td>
                                     <td><?php echo $row["name"]; ?></td>
                                     <td><?php echo ($row["sex"] == 1) ? "Male" : "Female"; ?></td>
                                     <td><?php echo $row["barangay"]; ?></td>
                                     <td><?php echo $row['first_name'] . " " . $middlenameInitial . ". " . $row['last_name']; ?>
                                     </td>
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
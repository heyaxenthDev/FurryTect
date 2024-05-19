 <?php
    include 'authentication.php';
    include 'includes/conn.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
    ?>

 <main id="main" class="main">

     <div class="pagetitle d-flex justify-content-between">
         <h1>Dogs</h1>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#AddDogsModal"><i
                     class="bi bi-plus-circle"></i> Add Dogs</button>
             <button class="btn add-btn"><i class="bi bi-clipboard-data"></i> Generate List</button>
         </div>
     </div><!-- End Page Title -->
     <!-- Add Dogs Modal -->
     <div class="modal fade" id="AddDogsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-xl modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Dog Information</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="code.php" method="POST">
                         <!-- Dog Information start -->
                         <h4 class="mb-3">Dog's Information</h4>
                         <div class="row g-3">
                             <div class="col-md-4">
                                 <img src="assets/img/dog_default_img.jpg" id="dogImage"
                                     class="img-fluid rounded float-start img-thumbnail mb-3" alt="Dog Image">
                                 <input type="file" class="form-control" id="dogImageInput" accept="image/*">
                             </div>
                             <div class="col-md-8">
                                 <div class="row mb-3 g-2">
                                     <div class="d-flex align-items-center">
                                         <h6 class="me-3">Is Tagged?</h6>
                                         <div class="form-check me-3">
                                             <input class="form-check-input" type="checkbox" id="checkBoxTagged">
                                             <label class="form-check-label" for="checkBoxTagged">
                                                 Yes
                                             </label>
                                         </div>
                                     </div>

                                     <div class="col-md-6" id="tagNumberDiv" style="display: none;">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingTagNumber"
                                                 placeholder="Tag Number">
                                             <label for="floatingTagNumber">Tag Number</label>
                                         </div>
                                     </div>
                                     <div class="col-md-6" id="dateTaggedDiv" style="display: none;">
                                         <div class="form-floating">
                                             <input type="date" class="form-control" id="floatingDateTagged"
                                                 placeholder="DateTagged">
                                             <label for="floatingDateTagged">Date Tagged</label>
                                         </div>
                                     </div>
                                 </div>

                                 <script>
                                 document.getElementById('checkBoxTagged').addEventListener('change', function() {
                                     var isChecked = this.checked;
                                     document.getElementById('tagNumberDiv').style.display = isChecked ?
                                         'block' : 'none';
                                     document.getElementById('dateTaggedDiv').style.display = isChecked ?
                                         'block' : 'none';
                                 });
                                 </script>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-12">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingName"
                                                 placeholder="Name">
                                             <label for="floatingName">Name</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <select class="form-select" id="floatingSex" aria-label="Sex">
                                                 <option selected disabled>Choose...</option>
                                                 <option value="1">Male</option>
                                                 <option value="2">Female</option>
                                             </select>
                                             <label for="floatingSex">Sex</label>
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <input type="number" class="form-control" id="floatingAge"
                                                 placeholder="Age">
                                             <label for="floatingAge">Age</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-12">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingColor"
                                                 placeholder="Color">
                                             <label for="floatingColor">Color Description</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <select class="form-control" id="floatingVaccinationStatus"
                                                 aria-label="Vaccination Status">
                                                 <option value="">Select Vaccination Status</option>
                                                 <option value="vaccinated" class="text-success">Vaccinated</option>
                                                 <option value="unvaccinated" class="text-danger">Unvaccinated
                                                 </option>
                                             </select>
                                             <label for="floatingVaccinationStatus">Vaccination Status</label>
                                         </div>
                                     </div>
                                     <div class="col-md-6" id="dateVaccDiv" style="display: none;">
                                         <div class="form-floating">
                                             <input type="date" class="form-control" id="floatingDateVacc"
                                                 placeholder="Date Vaccinated">
                                             <label for="floatingDateVacc">Date Vaccinated</label>
                                         </div>
                                     </div>
                                 </div>

                                 <script>
                                 document.getElementById('floatingVaccinationStatus').addEventListener('change',
                                     function() {
                                         var selectedValue = this.value;
                                         document.getElementById('dateVaccDiv').style.display =
                                             selectedValue === 'vaccinated' ? 'block' : 'none';
                                     });
                                 </script>
                             </div>
                         </div>
                         <!-- Dog Information End -->
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New
                         Record</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>
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
                                    } else {
                                        echo "No Records";
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
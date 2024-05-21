 <?php
    include 'authentication.php';
    include 'includes/conn.php';
    include 'includes/header.php';
    include 'includes/sidebar.php';
    include 'alert.php';

    ?>

 <main id="main" class="main">

     <div class="pagetitle d-flex justify-content-between">
         <h1>Cats</h1>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <button class="btn add-btn" data-bs-target="#OwnersModalFirst" data-bs-toggle="modal"><i
                     class="bi bi-plus-circle"></i> Add Cats</button>
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
                                     <th><b>N</b>ame</th>
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
                                    // Fetch data from the cats table
                                    $sql = "SELECT o.`owner_code`, o.`first_name`, o.`middle_name`, o.`last_name`, o.`contact_number`, o.`barangay`, 
                                            c.`name`, c.`sex`, c.`age`, c.`color`, c.`vacc_status`, c.`date_vacc`, c.`picture`
                                            FROM `cats` c LEFT JOIN `owners` o ON c.`owner_code` = o.`owner_code` ORDER BY c.`date_created` ASC";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $middlenameInitial = substr($row['middle_name'], 0, 1);
                                    ?>
                                 <tr>
                                     <td><?php echo $row["name"]; ?></td>
                                     <td><?php echo ($row["sex"] == 1) ? "Male" : "Female"; ?></td>
                                     <td><?php echo $row["barangay"]; ?></td>
                                     <td><?php echo $row['first_name'] . " " . $middlenameInitial . ". " . $row['last_name']; ?>
                                     </td>
                                     <td><?php echo $row["contact_number"]; ?></td>
                                     <td>
                                         <div class="d-grid gap-2 d-md-block">
                                             <button class="btn add-btn view-btn" type="button"><i
                                                     class="bi bi-eye-fill"></i></button>
                                             <button class="btn btn-outline-secondary edit-btn" type="button"><i
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

                         <!-- View Modal -->
                         <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="viewModalLabel">View Cat Information</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <!-- Cat Information start -->
                                         <div class="row g-3">
                                             <div class="col-md-4">
                                                 <img src="assets/img/cat_default_img.jpg" id="viewCatImage"
                                                     class="img-fluid rounded float-start img-thumbnail mb-3"
                                                     alt="Cat Image">
                                             </div>
                                             <div class="col-md-8">
                                                 <div class="row mb-3 g-2">
                                                     <div class="col-md-12">
                                                         <div class="form-floating">
                                                             <input type="text" class="form-control"
                                                                 id="viewFloatingCatName" placeholder="Name" name="name"
                                                                 disabled>
                                                             <label for="viewFloatingCatName">Name</label>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row mb-3 g-2">
                                                     <div class="col-md-6">
                                                         <div class="form-floating">
                                                             <select class="form-select" id="viewFloatingCatSex"
                                                                 aria-label="Sex" name="sex" disabled>
                                                                 <option selected disabled>Choose...</option>
                                                                 <option value="1">Male</option>
                                                                 <option value="2">Female</option>
                                                             </select>
                                                             <label for="viewFloatingCatSex">Sex</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                         <div class="form-floating">
                                                             <input type="number" class="form-control"
                                                                 id="viewFloatingCatAge" placeholder="Age" name="age"
                                                                 disabled>
                                                             <label for="viewFloatingCatAge">Age</label>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row mb-3 g-2">
                                                     <div class="col-md-12">
                                                         <div class="form-floating">
                                                             <input type="text" class="form-control"
                                                                 id="viewFloatingCatColor" placeholder="Color"
                                                                 name="color" disabled>
                                                             <label for="viewFloatingCatColor">Color Description</label>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row mb-3 g-2">
                                                     <div class="col-md-6">
                                                         <div class="form-floating">
                                                             <select class="form-control"
                                                                 id="viewFloatingCatVaccinationStatus"
                                                                 aria-label="Vaccination Status"
                                                                 name="vaccinationStatus" disabled>
                                                                 <option value="">Select Vaccination Status</option>
                                                                 <option value="vaccinated" class="text-success">
                                                                     Vaccinated
                                                                 </option>
                                                                 <option value="unvaccinated" class="text-danger">
                                                                     Unvaccinated
                                                                 </option>
                                                             </select>
                                                             <label for="viewFloatingCatVaccinationStatus">Vaccination
                                                                 Status</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6" id="viewDateVaccDivCat"
                                                         style="display: none;">
                                                         <div class="form-floating">
                                                             <input type="date" class="form-control"
                                                                 id="viewFloatingCatDateVacc"
                                                                 placeholder="Date Vaccinated" name="dateVacc" disabled>
                                                             <label for="viewFloatingCatDateVacc">Date
                                                                 Vaccinated</label>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- Cat Information End -->
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary"
                                             data-bs-dismiss="modal">Close</button>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!-- Edit Modal -->
                         <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="editModalLabel">Edit Cat Information</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form id="editCatForm" method="post" enctype="multipart/form-data">
                                             <!-- Cat Information start -->
                                             <div class="row g-3">
                                                 <div class="col-md-4">
                                                     <img src="assets/img/cat_default_img.jpg" id="editCatImage"
                                                         class="img-fluid rounded float-start img-thumbnail mb-3"
                                                         alt="Cat Image">
                                                     <input type="file" class="form-control" id="editCatImageInput"
                                                         name="catImage" accept="image/*">
                                                 </div>
                                                 <div class="col-md-8">
                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editFloatingCatName" placeholder="Name"
                                                                     name="name">
                                                                 <label for="editFloatingCatName">Name</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <select class="form-select" id="editFloatingCatSex"
                                                                     aria-label="Sex" name="sex">
                                                                     <option selected disabled>Choose...</option>
                                                                     <option value="1">Male</option>
                                                                     <option value="2">Female</option>
                                                                 </select>
                                                                 <label for="editFloatingCatSex">Sex</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <input type="number" class="form-control"
                                                                     id="editFloatingCatAge" placeholder="Age"
                                                                     name="age">
                                                                 <label for="editFloatingCatAge">Age</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editFloatingCatColor" placeholder="Color"
                                                                     name="color">
                                                                 <label for="editFloatingCatColor">Color
                                                                     Description</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <select class="form-control"
                                                                     id="editFloatingCatVaccinationStatus"
                                                                     aria-label="Vaccination Status"
                                                                     name="vaccinationStatus">
                                                                     <option value="">Select Vaccination Status</option>
                                                                     <option value="vaccinated" class="text-success">
                                                                         Vaccinated
                                                                     </option>
                                                                     <option value="unvaccinated" class="text-danger">
                                                                         Unvaccinated</option>
                                                                 </select>
                                                                 <label
                                                                     for="editFloatingCatVaccinationStatus">Vaccination
                                                                     Status</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6" id="editDateVaccDivCat"
                                                             style="display: none;">
                                                             <div class="form-floating">
                                                                 <input type="date" class="form-control"
                                                                     id="editFloatingCatDateVacc"
                                                                     placeholder="Date Vaccinated" name="dateVacc">
                                                                 <label for="editFloatingCatDateVacc">Date
                                                                     Vaccinated</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- Cat Information End -->
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary"
                                                     data-bs-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Save changes</button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <script>
                         document.addEventListener('DOMContentLoaded', function() {
                             // View button click event
                             document.querySelectorAll('.view-btn').forEach(function(button) {
                                 button.addEventListener('click', function() {
                                     // Assuming you have the data available in the row
                                     const row = this.closest('tr');
                                     const catName = row.children[0].textContent;
                                     const catSex = row.children[1].textContent === 'Male' ? 1 :
                                         2;
                                     const catAge = row.children[2].textContent;
                                     const catColor = row.children[3].textContent;
                                     const vaccStatus = row.children[4].textContent;
                                     const dateVacc = row.children[5].textContent;

                                     // Populate the view modal with data
                                     document.getElementById('viewFloatingCatName').value =
                                         catName;
                                     document.getElementById('viewFloatingCatSex').value =
                                         catSex;
                                     document.getElementById('viewFloatingCatAge').value =
                                         catAge;
                                     document.getElementById('viewFloatingCatColor').value =
                                         catColor;
                                     document.getElementById('viewFloatingCatVaccinationStatus')
                                         .value = vaccStatus;
                                     document.getElementById('viewFloatingCatDateVacc').value =
                                         dateVacc;

                                     // Show the view modal
                                     new bootstrap.Modal(document.getElementById('viewModal'))
                                         .show();
                                 });
                             });

                             // Edit button click event
                             document.querySelectorAll('.edit-btn').forEach(function(button) {
                                 button.addEventListener('click', function() {
                                     // Assuming you have the data available in the row
                                     const row = this.closest('tr');
                                     const catName = row.children[0].textContent;
                                     const catSex = row.children[1].textContent === 'Male' ? 1 :
                                         2;
                                     const catAge = row.children[2].textContent;
                                     const catColor = row.children[3].textContent;
                                     const vaccStatus = row.children[4].textContent;
                                     const dateVacc = row.children[5].textContent;

                                     // Populate the edit modal with data
                                     document.getElementById('editFloatingCatName').value =
                                         catName;
                                     document.getElementById('editFloatingCatSex').value =
                                         catSex;
                                     document.getElementById('editFloatingCatAge').value =
                                         catAge;
                                     document.getElementById('editFloatingCatColor').value =
                                         catColor;
                                     document.getElementById('editFloatingCatVaccinationStatus')
                                         .value = vaccStatus;
                                     document.getElementById('editFloatingCatDateVacc').value =
                                         dateVacc;

                                     // Show the edit modal
                                     new bootstrap.Modal(document.getElementById('editModal'))
                                         .show();
                                 });
                             });

                             // Handle vaccination status change in edit modal
                             document.getElementById('editFloatingCatVaccinationStatus').addEventListener(
                                 'change',
                                 function() {
                                     const dateVaccDiv = document.getElementById('editDateVaccDivCat');
                                     if (this.value === 'vaccinated') {
                                         dateVaccDiv.style.display = 'block';
                                     } else {
                                         dateVaccDiv.style.display = 'none';
                                     }
                                 });

                             // Handle vaccination status change in view modal
                             document.getElementById('viewFloatingCatVaccinationStatus').addEventListener(
                                 'change',
                                 function() {
                                     const dateVaccDiv = document.getElementById('viewDateVaccDivCat');
                                     if (this.value === 'vaccinated') {
                                         dateVaccDiv.style.display = 'block';
                                     } else {
                                         dateVaccDiv.style.display = 'none';
                                     }
                                 });
                         });
                         </script>

                     </div>
                 </div>


             </div>
         </div>
     </section>

 </main><!-- End #main -->
 <?php
    include "includes/footer.php";
    ?>
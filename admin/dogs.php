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
                                    FROM `dogs` d LEFT JOIN `owners` o ON d.`owner_code` = o.`owner_code` ORDER BY d.`date_created` ASC";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $middlenameInitial = substr($row['middle_name'], 0, 1);
                                    ?>
                                 <tr>
                                     <td><?php echo ($row["tag_number"] == null) ? "<span class='badge bg-danger'>Not yet Tagged</span>" : $row["tag_number"]; ?>
                                     </td>
                                     <td><?php echo $row["name"]; ?></td>
                                     <td><?php echo ($row["sex"] == 1) ? "Male" : "Female"; ?></td>
                                     <td><?php echo $row["barangay"]; ?></td>
                                     <td><?php echo $row['first_name'] . " " . $middlenameInitial . ". " . $row['last_name']; ?>
                                     </td>
                                     <td><?php echo $row["contact_number"]; ?></td>
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
                                         <h5 class="modal-title" id="viewModalLabel">View Dog Information</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form>
                                             <!-- Dog Information start -->
                                             <!-- <h4 class="mb-3">Dog's Information</h4> -->
                                             <div class="row g-3">
                                                 <div class="col-md-4">
                                                     <img src="assets/img/dog_default_img.jpg" id="viewDogImage"
                                                         class="img-fluid rounded float-start img-thumbnail mb-3"
                                                         alt="Dog Image">
                                                 </div>
                                                 <div class="col-md-8">
                                                     <div class="row mb-3 g-2">

                                                         <div class="col-md-6" id="viewTagNumberDiv"
                                                             style="display: none;">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingTagNumber" placeholder="Tag Number"
                                                                     disabled>
                                                                 <label for="viewFloatingTagNumber">Tag Number</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6" id="viewDateTaggedDiv"
                                                             style="display: none;">
                                                             <div class="form-floating">
                                                                 <input type="date" class="form-control"
                                                                     id="viewFloatingDateTagged"
                                                                     placeholder="Date Tagged" disabled>
                                                                 <label for="viewFloatingDateTagged">Date Tagged</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingName" placeholder="Name" disabled>
                                                                 <label for="viewFloatingName">Name</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <select class="form-select" id="viewFloatingSex"
                                                                     aria-label="Sex" disabled>
                                                                     <option selected disabled>Choose...</option>
                                                                     <option value="1">Male</option>
                                                                     <option value="2">Female</option>
                                                                 </select>
                                                                 <label for="viewFloatingSex">Sex</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <input type="number" class="form-control"
                                                                     id="viewFloatingAge" placeholder="Age" disabled>
                                                                 <label for="viewFloatingAge">Age</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingColor" placeholder="Color"
                                                                     disabled>
                                                                 <label for="viewFloatingColor">Color
                                                                     Description</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <select class="form-control"
                                                                     id="viewFloatingVaccinationStatus"
                                                                     aria-label="Vaccination Status" disabled>
                                                                     <option value="">Select Vaccination Status</option>
                                                                     <option value="vaccinated" class="text-success">
                                                                         Vaccinated</option>
                                                                     <option value="unvaccinated" class="text-danger">
                                                                         Unvaccinated</option>
                                                                 </select>
                                                                 <label for="viewFloatingVaccinationStatus">Vaccination
                                                                     Status</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6" id="viewDateVaccDiv"
                                                             style="display: none;">
                                                             <div class="form-floating">
                                                                 <input type="date" class="form-control"
                                                                     id="viewFloatingDateVacc"
                                                                     placeholder="Date Vaccinated" disabled>
                                                                 <label for="viewFloatingDateVacc">Date
                                                                     Vaccinated</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- Dog Information End -->
                                         </form>
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
                                         <h5 class="modal-title" id="editModalLabel">Edit Dog Information</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="code.php" method="POST" enctype="multipart/form-data">
                                             <!-- Dog Information start -->
                                             <!-- <h4 class="mb-3">Dog's Information</h4> -->
                                             <div class="row g-3">
                                                 <div class="col-md-4">
                                                     <img src="assets/img/dog_default_img.jpg" id="editDogImage"
                                                         class="img-fluid rounded float-start img-thumbnail mb-3"
                                                         alt="Dog Image">
                                                     <input type="file" class="form-control" id="editDogImageInput"
                                                         name="dogImage" accept="image/*">
                                                 </div>
                                                 <div class="col-md-8">
                                                     <div class="row mb-3 g-2">

                                                         <div class="col-md-6" id="editTagNumberDiv"
                                                             style="display: none;">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editFloatingTagNumber" placeholder="Tag Number"
                                                                     name="tagNumber">
                                                                 <label for="editFloatingTagNumber">Tag Number</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6" id="editDateTaggedDiv"
                                                             style="display: none;">
                                                             <div class="form-floating">
                                                                 <input type="date" class="form-control"
                                                                     id="editFloatingDateTagged"
                                                                     placeholder="Date Tagged" name="dateTagged">
                                                                 <label for="editFloatingDateTagged">Date Tagged</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editFloatingName" placeholder="Name"
                                                                     name="name">
                                                                 <label for="editFloatingName">Name</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <select class="form-select" id="editFloatingSex"
                                                                     name="sex" aria-label="Sex">
                                                                     <option selected disabled>Choose...</option>
                                                                     <option value="1">Male</option>
                                                                     <option value="2">Female</option>
                                                                 </select>
                                                                 <label for="editFloatingSex">Sex</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <input type="number" class="form-control"
                                                                     id="editFloatingAge" placeholder="Age" name="age">
                                                                 <label for="editFloatingAge">Age</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editFloatingColor" placeholder="Color"
                                                                     name="color">
                                                                 <label for="editFloatingColor">Color
                                                                     Description</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <select class="form-control"
                                                                     id="editFloatingVaccinationStatus"
                                                                     aria-label="Vaccination Status"
                                                                     name="vaccinationStatus">
                                                                     <option value="">Select Vaccination Status</option>
                                                                     <option value="vaccinated" class="text-success">
                                                                         Vaccinated</option>
                                                                     <option value="unvaccinated" class="text-danger">
                                                                         Unvaccinated</option>
                                                                 </select>
                                                                 <label for="editFloatingVaccinationStatus">Vaccination
                                                                     Status</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6" id="editDateVaccDiv"
                                                             style="display: none;">
                                                             <div class="form-floating">
                                                                 <input type="date" class="form-control"
                                                                     id="editFloatingDateVacc"
                                                                     placeholder="Date Vaccinated" name="dateVacc">
                                                                 <label for="editFloatingDateVacc">Date
                                                                     Vaccinated</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- Dog Information End -->
                                             <div class="modal-footer">
                                                 <button type="submit" class="btn btn-primary">Save changes</button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>


                         <script>
                         document.addEventListener("DOMContentLoaded", function() {
                             const viewModal = document.getElementById('viewModal');
                             const editModal = document.getElementById('editModal');

                             // Function to show/hide tag number and date tagged fields
                             function toggleTagFields(modal, isTagged) {
                                 const tagNumberDiv = modal.querySelector('#' + modal.id.replace('Modal',
                                     'TagNumberDiv'));
                                 const dateTaggedDiv = modal.querySelector('#' + modal.id.replace('Modal',
                                     'DateTaggedDiv'));
                                 if (isTagged) {
                                     tagNumberDiv.style.display = 'block';
                                     dateTaggedDiv.style.display = 'block';
                                 } else {
                                     tagNumberDiv.style.display = 'none';
                                     dateTaggedDiv.style.display = 'none';
                                 }
                             }

                             // Function to populate modal with data
                             function populateModal(modal, data) {
                                 Object.keys(data).forEach(key => {
                                     const element = modal.querySelector('#' + modal.id.replace('Modal',
                                         'Floating' + key.charAt(0).toUpperCase() + key.slice(1)
                                     ));
                                     if (element) {
                                         element.value = data[key];
                                     }
                                 });

                                 const isTagged = data.tagNumber !== "Not yet Tagged";
                                 toggleTagFields(modal, isTagged);
                             }

                             // Event listeners for buttons
                             document.querySelectorAll('.btn.add-btn').forEach(button => {
                                 button.addEventListener('click', function() {
                                     const row = this.closest('tr');
                                     const data = {
                                         tagNumber: row.querySelector('td:nth-child(1)')
                                             .innerText,
                                         name: row.querySelector('td:nth-child(2)')
                                             .innerText,
                                         sex: row.querySelector('td:nth-child(3)')
                                             .innerText === "Male" ? 1 : 2,
                                         barangay: row.querySelector('td:nth-child(4)')
                                             .innerText,
                                         owner: row.querySelector('td:nth-child(5)')
                                             .innerText,
                                         contactNumber: row.querySelector('td:nth-child(6)')
                                             .innerText
                                     };
                                     populateModal(viewModal, data);
                                     new bootstrap.Modal(viewModal).show();
                                 });
                             });

                             document.querySelectorAll('.btn.btn-outline-secondary').forEach(button => {
                                 button.addEventListener('click', function() {
                                     const row = this.closest('tr');
                                     const data = {
                                         tagNumber: row.querySelector('td:nth-child(1)')
                                             .innerText,
                                         name: row.querySelector('td:nth-child(2)')
                                             .innerText,
                                         sex: row.querySelector('td:nth-child(3)')
                                             .innerText === "Male" ? 1 : 2,
                                         barangay: row.querySelector('td:nth-child(4)')
                                             .innerText,
                                         owner: row.querySelector('td:nth-child(5)')
                                             .innerText,
                                         contactNumber: row.querySelector('td:nth-child(6)')
                                             .innerText
                                     };
                                     populateModal(editModal, data);
                                     new bootstrap.Modal(editModal).show();
                                 });
                             });

                             // Event listeners for checkboxes
                             document.querySelectorAll('#editCheckBoxTagged').forEach(checkbox => {
                                 checkbox.addEventListener('change', function() {
                                     toggleTagFields(editModal, this.checked);
                                 });
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
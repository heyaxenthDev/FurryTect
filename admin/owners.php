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
             <!-- <button class="btn add-btn"><i class="bi bi-plus-circle"></i> Add Owners</button> -->
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
                                    $sql = "SELECT o.`id`, o.`owner_code`, o.`first_name`, o.`middle_name`, o.`last_name`, o.`contact_number`, o.`barangay`, o.`sex`,
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
                                             <button class="btn add-btn viewBtn" type="button"
                                                 data-id="<?php echo $row["id"]; ?>"><i
                                                     class="bi bi-eye-fill"></i></button>
                                             <button class="btn btn-outline-secondary editBtn"
                                                 data-id="<?php echo $row["id"]; ?>" type="button"><i
                                                     class="bi bi-pencil-square"></i></button>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php
                                        }
                                    }
                                    // $conn->close();
                                    ?>
                             </tbody>
                         </table>
                         <!-- End Table with stripped rows -->

                         <!-- View Modal -->
                         <!-- View Modal -->
                         <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="viewModalLabel">View Owner Information</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form>
                                             <!-- Owner Information Start -->
                                             <div class="row g-3">
                                                 <div class="col-md-4">
                                                     <img id="viewModalFloatingImage" class="img-fluid img-thumbnail"
                                                         src="" alt="Owner Image" />
                                                 </div>
                                                 <div class="col-md-8">
                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingFirstName" placeholder="First Name"
                                                                     name="firstName" readonly>
                                                                 <label for="viewFloatingFirstName">First Name</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingMiddleName"
                                                                     placeholder="Middle Name" name="middleName"
                                                                     readonly>
                                                                 <label for="viewFloatingMiddleName">Middle Name</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingLastName" placeholder="Last Name"
                                                                     name="lastName" readonly>
                                                                 <label for="viewFloatingLastName">Last Name</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-5">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingOwnerSex" placeholder="Sex"
                                                                     name="sexOwner" readonly>
                                                                 <label for="viewFloatingOwnerSex">Sex</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-5">
                                                             <div class="form-floating">
                                                                 <input type="date" class="form-control"
                                                                     id="viewfloatingDateofBirth"
                                                                     placeholder="Date of Birth" name="DateofBirth"
                                                                     readonly>
                                                                 <label for="viewfloatingDateofBirth">Date of
                                                                     Birth</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-2">
                                                             <div class="form-floating">
                                                                 <input type="number" class="form-control"
                                                                     id="viewFloatingOwnerAge" placeholder="Age"
                                                                     name="ageOwner" readonly>
                                                                 <label for="viewFloatingOwnerAge">Age</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingContactNumber"
                                                                     placeholder="Contact Number" name="contactNumber"
                                                                     readonly>
                                                                 <label for="viewFloatingContactNumber">Contact
                                                                     Number</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="viewFloatingBarangay" placeholder="Barangay"
                                                                     name="barangay" readonly>
                                                                 <label for="viewFloatingBarangay">Barangay</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- Owner Information End -->
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>


                         <script>
                         $(document).ready(function() {
                             $('.viewBtn').on('click', function() {
                                 var ownerId = $(this).data('id');

                                 $.ajax({
                                     url: 'fetch_owner.php',
                                     type: 'post',
                                     data: {
                                         id: ownerId
                                     },
                                     success: function(response) {
                                         var owner = JSON.parse(response);

                                         $('#viewFloatingFirstName').val(owner.first_name);
                                         $('#viewFloatingMiddleName').val(owner
                                             .middle_name);
                                         $('#viewFloatingLastName').val(owner.last_name);

                                         var sexText = owner.sex == 1 ? 'Male' : 'Female';
                                         $('#viewFloatingOwnerSex').val(sexText);

                                         $('#viewFloatingOwnerAge').val(owner.age);
                                         $('#viewfloatingDateofBirth').val(owner
                                             .date_of_birth)
                                         $('#viewFloatingContactNumber').val(owner
                                             .contact_number);
                                         $('#viewFloatingBarangay').val(owner.barangay);
                                         $('#viewModalFloatingImage').attr('src', owner
                                             .owner_picture);

                                         $('#viewModal').modal('show');
                                     }
                                 });
                             });
                         });
                         </script>

                         <!-- Edit Modal -->
                         <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="editModalLabel">Edit Owner Information</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="code.php" method="POST" enctype="multipart/form-data">
                                             <!-- Owner Information Start -->
                                             <input type="hidden" class="form-control" id="hiddenID" name="ownerId">
                                             <div class="row g-3">
                                                 <div class="col-md-4">
                                                     <img id="editModalFloatingImage" class="img-fluid img-thumbnail"
                                                         src="" alt="Owner Image" />
                                                     <input type="file" class="form-control" id="editModalFloatingImage"
                                                         name="ownerImage" accept="image/*">
                                                 </div>
                                                 <div class="col-md-8">
                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editfloatingFirstName" placeholder="First Name"
                                                                     name="firstName">
                                                                 <label for="floatingFirstName">First Name</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editfloatingMiddleName"
                                                                     placeholder="Middle Name" name="middleName">
                                                                 <label for="floatingMiddleName">Middle Name</label>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-12">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editfloatingLastName" placeholder="Last Name"
                                                                     name="lastName">
                                                                 <label for="floatingLastName">Last Name</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-5">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editfloatingOwnerSex" placeholder="Sex"
                                                                     name="sexOwner">
                                                                 <label for="floatingOwnerSex">Sex</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-5">
                                                             <div class="form-floating">
                                                                 <input type="date" class="form-control"
                                                                     id="editfloatingDateofBirth"
                                                                     placeholder="Date of Birth" name="DateofBirth">
                                                                 <label for="editfloatingDateofBirth">Date of
                                                                     Birth</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-2">
                                                             <div class="form-floating">
                                                                 <input type="number" class="form-control"
                                                                     id="editfloatingOwnerAge" placeholder="Age"
                                                                     name="ageOwner">
                                                                 <label for="floatingOwnerAge">Age</label>
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-3 g-2">
                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editfloatingContactNumber"
                                                                     placeholder="Contact Number" name="contactNumber">
                                                                 <label for="floatingContactNumber">Contact
                                                                     Number</label>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-6">
                                                             <div class="form-floating">
                                                                 <input type="text" class="form-control"
                                                                     id="editfloatingBarangay" placeholder="Barangay"
                                                                     name="barangay">
                                                                 <label for="floatingBarangay">Barangay</label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <!-- Owner Information End -->
                                             <div class="modal-footer">
                                                 <button type="submit" class="btn btn-primary" name="UpdateOwners">Save
                                                     changes</button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <script>
                         $(document).ready(function() {
                             $('.editBtn').on('click', function() {
                                 var ownerId = $(this).data('id');

                                 $.ajax({
                                     url: 'fetch_owner.php',
                                     type: 'post',
                                     data: {
                                         id: ownerId
                                     },
                                     success: function(response) {
                                         var owner = JSON.parse(response);

                                         $('#hiddenID').val(owner.id);
                                         $('#editModalFloatingImage').attr('src', owner
                                             .owner_picture);
                                         $('#editfloatingFirstName').val(owner.first_name);
                                         $('#editfloatingMiddleName').val(owner
                                             .middle_name);
                                         $('#editfloatingLastName').val(owner.last_name);

                                         var sexText = owner.sex == 1 ? 'Male' : 'Female';
                                         $('#editfloatingOwnerSex').val(sexText);
                                         $('#editfloatingDateofBirth').val(owner
                                             .date_of_birth);
                                         $('#editfloatingOwnerAge').val(owner.age);
                                         $('#editfloatingContactNumber').val(owner
                                             .contact_number);
                                         $('#editfloatingBarangay').val(owner.barangay);

                                         $('#editModal').modal('show');
                                     }
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
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
                                            c.`id`, c.`name`, c.`sex`, c.`age`, c.`color`, c.`vacc_status`, c.`date_vacc`, c.`picture`
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
                        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel">View cat Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <!-- cat Information start -->
                                            <!-- <h4 class="mb-3">cat's Information</h4> -->
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <img id="viewModalFloatingImage" class="img-fluid img-thumbnail"
                                                        src="" alt="cat Image" />
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row mb-3 g-2">

                                                        <div class="row mb-3 g-2">
                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="viewFloatingName" placeholder="Name"
                                                                        readonly>
                                                                    <label for="viewFloatingName">Name</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="row mb-3 g-2">
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="viewFloatingSex" placeholder="Sex" readonly>
                                                                <label for="viewFloatingSex">Sex</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="number" class="form-control"
                                                                    id="viewFloatingAge" placeholder="Age" readonly>
                                                                <label for="viewFloatingAge">Age</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 g-2">
                                                        <div class="col-md-12">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="viewFloatingColor" placeholder="Color" readonly>
                                                                <label for="viewFloatingColor">Color
                                                                    Description</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 g-2">
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="viewFloatingVaccinationStatus"
                                                                    placeholder="Vaccination Status" readonly>
                                                                <label for="viewFloatingVaccinationStatus">Vaccination
                                                                    Status</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" id="viewDateVaccDiv">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    id="viewFloatingDateVacc"
                                                                    placeholder="Date Vaccinated" readonly>
                                                                <label for="viewFloatingDateVacc">Date
                                                                    Vaccinated</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- cat Information End -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        $(document).ready(function() {
                            $('.viewBtn').on('click', function() {
                                var catId = $(this).data('id');

                                $.ajax({
                                    url: 'fetch_cat.php',
                                    type: 'post',
                                    data: {
                                        id: catId
                                    },
                                    success: function(response) {
                                        var cat = JSON.parse(response);

                                        $('#viewFloatingName').val(cat.name);

                                        // Format sex value
                                        var sexText = cat.sex == 1 ? 'Male' : 'Female';
                                        $('#viewFloatingSex').val(sexText);

                                        $('#viewFloatingAge').val(cat.age);
                                        $('#viewFloatingColor').val(cat.color);
                                        $('#viewFloatingVaccinationStatus').val(cat
                                            .vacc_status);
                                        $('#viewFloatingDateVacc').val(cat.date_vacc);
                                        $('#viewModalFloatingImage').attr('src', cat
                                            .picture);

                                        // Show or hide tag number and date tagged fields based on the data
                                        if (cat.tag_number) {
                                            $('#viewTagNumberDiv').show();
                                        } else {
                                            $('#viewTagNumberDiv').hide();
                                        }

                                        if (cat.date_tagged) {
                                            $('#viewDateTaggedDiv').show();
                                        } else {
                                            $('#viewDateTaggedDiv').hide();
                                        }

                                        if (cat.vacc_status === 'vaccinated') {
                                            $('#viewDateVaccDiv').show();
                                        } else {
                                            $('#viewDateVaccDiv').hide();
                                        }

                                        // Show the modal
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
                                        <h5 class="modal-title" id="editModalLabel">Edit Cat Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <!-- Cat Information start -->
                                            <!-- <h4 class="mb-3">Cat's Information</h4> -->
                                            <input type="hidden" class="form-control" id="hiddenID" name="catId">
                                            <div class="row g-3">
                                                <div class="col-md-4">

                                                    <img id="editModalFloatingImage" class="img-fluid img-thumbnail"
                                                        src="" alt="cat Image" />
                                                    <input type="file" class="form-control" id="editcatImageInput"
                                                        name="catImage" accept="image/*">
                                                </div>
                                                <div class="col-md-8">

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
                                                                    <option selected readonly>Choose...</option>
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
                                                        <div class="col-md-6" id="editDateVaccDiv">
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
                                            <!-- cat Information End -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="UpdateCats">Save
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
                                var catId = $(this).data('id');

                                $.ajax({
                                    url: 'fetch_cat.php',
                                    type: 'post',
                                    data: {
                                        id: catId
                                    },
                                    success: function(response) {
                                        var cat = JSON.parse(response);

                                        $('#hiddenID').val(cat.id);

                                        $('#editFloatingName').val(cat.name);
                                        $('#editFloatingSex').val(cat.sex);
                                        $('#editFloatingAge').val(cat.age);
                                        $('#editFloatingColor').val(cat.color);
                                        $('#editFloatingVaccinationStatus').val(cat
                                            .vacc_status);
                                        $('#editFloatingDateVacc').val(cat.date_vacc);
                                        $('#editModalFloatingImage').attr('src', cat
                                            .picture);

                                        // Show or hide tag number and date tagged fields based on the data
                                        if (cat.tag_number) {
                                            $('#editTagNumberDiv').show();
                                        } else {
                                            $('#editTagNumberDiv').hide();
                                        }

                                        if (cat.date_tagged) {
                                            $('#editDateTaggedDiv').show();
                                        } else {
                                            $('#editDateTaggedDiv').hide();
                                        }

                                        if (cat.vacc_status === 'vaccinated') {
                                            $('#editDateVaccDiv').show();
                                        } else {
                                            $('#editDateVaccDiv').hide();
                                        }

                                        // Show the modal
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
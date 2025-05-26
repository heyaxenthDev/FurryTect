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
        <h1>Dogs</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#OwnersModalFirst"><i
                    class="bi bi-plus-circle"></i> Add Dogs</button>
        </div>
    </div><!-- End Page Title -->

    <!-- Add Dogs Modal -->
    <?php include_once 'modal-dogs.php' ?>
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
                                    d.`id`, d.`species`, d.`tag_number`, d.`date_tagged`, d.`name`, d.`sex`, d.`age_years`, d.`age_months`, d.`color`, d.`owner_code`, d.`vacc_status`, d.`date_vacc`, d.`picture`
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
                                                    <img id="viewModalFloatingImage" class="img-fluid img-thumbnail"
                                                        src="" alt="Dog Image" />
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

                                                        <div class="col-md-6" id="viewTagNumberDiv">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="viewFloatingTagNumber" placeholder="Tag Number"
                                                                    readonly>
                                                                <label for="viewFloatingTagNumber">Tag Number</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="viewDateTaggedDiv">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    id="viewFloatingDateTagged"
                                                                    placeholder="Date Tagged" readonly>
                                                                <label for="viewFloatingDateTagged">Date Tagged</label>
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
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-floating">
                                                                        <input type="number" class="form-control"
                                                                            id="viewFloatingAgeYears" name="age_years"
                                                                            placeholder="Years" min="0">
                                                                        <label for="viewFloatingAgeYears">Age
                                                                            (Years)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-floating">
                                                                        <input type="number" class="form-control"
                                                                            id="viewFloatingAgeMonths" name="age_months"
                                                                            placeholder="Months" min="0" max="11">
                                                                        <label for="viewFloatingAgeMonths">Age
                                                                            (Months)</label>
                                                                    </div>
                                                                </div>
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
                                            <!-- Dog Information End -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        $(document).ready(function() {
                            $('.viewBtn').on('click', function() {
                                var dogId = $(this).data('id');

                                $.ajax({
                                    url: 'fetch_dog.php',
                                    type: 'post',
                                    data: {
                                        id: dogId
                                    },
                                    success: function(response) {
                                        var dog = JSON.parse(response);

                                        $('#viewFloatingTagNumber').val(dog.tag_number);
                                        $('#viewFloatingDateTagged').val(dog.date_tagged);
                                        $('#viewFloatingName').val(dog.name);

                                        // Format sex value
                                        var sexText = dog.sex == 1 ? 'Male' : 'Female';
                                        $('#viewFloatingSex').val(sexText);

                                        $('#viewFloatingAgeYears').val(dog.age_years);
                                        $('#viewFloatingAgeMonths').val(dog.age_months);
                                        $('#viewFloatingColor').val(dog.color);
                                        $('#viewFloatingVaccinationStatus').val(dog
                                            .vacc_status);
                                        $('#viewFloatingDateVacc').val(dog.date_vacc);
                                        $('#viewModalFloatingImage').attr('src', dog
                                            .picture);

                                        // Show or hide tag number and date tagged fields based on the data
                                        if (dog.tag_number) {
                                            $('#viewTagNumberDiv').show();
                                        } else {
                                            $('#viewTagNumberDiv').hide();
                                        }

                                        if (dog.date_tagged) {
                                            $('#viewDateTaggedDiv').show();
                                        } else {
                                            $('#viewDateTaggedDiv').hide();
                                        }

                                        if (dog.vacc_status === 'vaccinated') {
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
                                        <h5 class="modal-title" id="editModalLabel">Edit Dog Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <!-- Dog Information start -->
                                            <!-- <h4 class="mb-3">Dog's Information</h4> -->
                                            <input type="hidden" class="form-control" id="hiddenID" name="dogId">
                                            <div class="row g-3">
                                                <div class="col-md-4">

                                                    <img id="editModalFloatingImage" class="img-fluid img-thumbnail"
                                                        src="" alt="Dog Image" />
                                                    <input type="file" class="form-control" id="editDogImageInput"
                                                        name="dogImage" accept="image/*">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row mb-3 g-2">

                                                        <div class="col-md-6" id="editTagNumberDiv">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="editFloatingTagNumber" placeholder="Tag Number"
                                                                    name="tagNumber">
                                                                <label for="editFloatingTagNumber">Tag Number</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="editDateTaggedDiv">
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
                                                                    <option selected readonly>Choose...</option>
                                                                    <option value="1">Male</option>
                                                                    <option value="2">Female</option>
                                                                </select>
                                                                <label for="editFloatingSex">Sex</label>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-floating">
                                                                        <input type="number" class="form-control"
                                                                            id="editFloatingAgeYears" name="age_years"
                                                                            placeholder="Years" min="0">
                                                                        <label for="editFloatingAgeYears">Age
                                                                            (Years)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-floating">
                                                                        <input type="number" class="form-control"
                                                                            id="editFloatingAgeMonths" name="age_months"
                                                                            placeholder="Months" min="0" max="11">
                                                                        <label for="editFloatingAgeMonths">Age
                                                                            (Months)</label>
                                                                    </div>
                                                                </div>
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
                                            <!-- Dog Information End -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="UpdateDogs">Save
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
                                var dogId = $(this).data('id');

                                $.ajax({
                                    url: 'fetch_dog.php',
                                    type: 'post',
                                    data: {
                                        id: dogId
                                    },
                                    success: function(response) {
                                        var dog = JSON.parse(response);

                                        $('#hiddenID').val(dog.id);

                                        $('#editFloatingTagNumber').val(dog.tag_number);
                                        $('#editFloatingDateTagged').val(dog.date_tagged);
                                        $('#editFloatingName').val(dog.name);
                                        $('#editFloatingSex').val(dog.sex);
                                        $('#editFloatingAgeYears').val(dog.age_years);
                                        $('#editFloatingAgeMonths').val(dog.age_months);
                                        $('#editFloatingColor').val(dog.color);
                                        $('#editFloatingVaccinationStatus').val(dog
                                            .vacc_status);
                                        $('#editFloatingDateVacc').val(dog.date_vacc);
                                        $('#editModalFloatingImage').attr('src', dog
                                            .picture);

                                        // Show or hide tag number and date tagged fields based on the data
                                        if (dog.tag_number) {
                                            $('#editTagNumberDiv').show();
                                        } else {
                                            $('#editTagNumberDiv').hide();
                                        }

                                        if (dog.date_tagged) {
                                            $('#editDateTaggedDiv').show();
                                        } else {
                                            $('#editDateTaggedDiv').hide();
                                        }

                                        if (dog.vacc_status === 'vaccinated') {
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
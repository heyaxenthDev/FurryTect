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
        <h1>Vaccination</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
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
                                    $sql = "SELECT c.`id`, c.`name`, c.`sex`, o.`barangay`, c.`species`, c.`date_vacc`
                                            FROM `cats` c 
                                            LEFT JOIN `owners` o ON c.`owner_code` = o.`owner_code`
                                            UNION
                                            SELECT d.`id`, d.`name`, d.`sex`, o.`barangay`, d.`species`, d.`date_vacc`
                                            FROM `dogs` d 
                                            LEFT JOIN `owners` o ON d.`owner_code` = o.`owner_code`
                                            ORDER BY species, name";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
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
                                        <button class="btn add-btn view-btn" data-id="<?php echo $row["id"]; ?>"
                                            data-type="<?php echo $row['species']?>"><i
                                                class=" bi bi-eye-fill"></i></button>
                                        <button class="btn btn-outline-secondary edit-btn"
                                            data-id="<?php echo $row["id"]; ?>"
                                            data-type="<?php echo $row['species']?>"><i
                                                class="bi bi-pencil-square"></i></button>
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
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Vaccination Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <img id="viewModalFloatingImage" class="img-fluid img-thumbnail" src="placeholder.jpg"
                                    alt="Animal Image" />
                            </div>
                            <div class="col-md-8">
                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingName"
                                                placeholder="Name" readonly>
                                            <label for="viewFloatingName">Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingSex"
                                                placeholder="Sex" readonly>
                                            <label for="viewFloatingSex">Sex</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingSpecies"
                                                placeholder="Species" readonly>
                                            <label for="viewFloatingSpecies">Species</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingBarangay"
                                                placeholder="Barangay" readonly>
                                            <label for="viewFloatingBarangay">Barangay</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingOwner"
                                                placeholder="Owner's Name" readonly>
                                            <label for="viewFloatingOwner">Owner's Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingVaccinationReason"
                                                placeholder="Vaccine Reason" readonly>
                                            <label for="viewFloatingVaccinationReason">Vaccine Reason</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingVaccinationStatus"
                                                placeholder="Vaccination Status" readonly>
                                            <label for="viewFloatingVaccinationStatus">Vaccination Status</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingVaccinationDisease"
                                                placeholder="Disease" readonly>
                                            <label for="viewFloatingVaccinationDisease">Disease</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingVaccineType"
                                                placeholder="Vaccine Type" readonly>
                                            <label for="viewFloatingVaccineType">Vaccine Type</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="viewFloatingVaccSource"
                                                placeholder="Vaccine Source" readonly>
                                            <label for="viewFloatingVaccSource">Vaccine Source</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Vaccination Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="update_vacc_info.php" method="POST">

                        <div class="row g-3">
                            <div class="col-md-4">
                                <img id="editModalFloatingImage" class="img-fluid img-thumbnail" src="placeholder.jpg"
                                    alt="Animal Image" />
                            </div>
                            <div class="col-md-8">
                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingName"
                                                placeholder="Name" disabled>
                                            <input type="hidden" class="form-control" id="editFloatingID" name="id"
                                                placeholder="ID">
                                            <label for="editFloatingName">Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingSex"
                                                placeholder="Sex" disabled>
                                            <label for="editFloatingSex">Sex</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingSpecies"
                                                placeholder="Species" name="species" disabled>
                                            <input type="text" class="form-control" id="FloatingSpecies"
                                                placeholder="Species" name="species">
                                            <label for="editFloatingSpecies">Species</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingBarangay"
                                                placeholder="Barangay" disabled>
                                            <label for="editFloatingBarangay">Barangay</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingOwner"
                                                placeholder="Owner's Name" disabled>
                                            <label for="editFloatingOwner">Owner's Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingVaccinationReason"
                                                placeholder="Vaccine Reason" name="vaccination_reason" required>
                                            <label for="editFloatingVaccinationReason">Vaccine Reason</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control" id="editFloatingVaccinationStatus"
                                                aria-label="Vaccination Status" name="vaccination_status" required>
                                                <option value="">Select Vaccination Status</option>
                                                <option value="vaccinated" class="text-success">Vaccinated</option>
                                                <option value="unvaccinated" class="text-danger">Unvaccinated
                                                </option>
                                            </select>
                                            <label for="editFloatingVaccinationStatus">Vaccination Status</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingVaccinationDisease"
                                                placeholder="Disease" name="vaccination_disease" required>
                                            <label for="editFloatingVaccinationDisease">Disease</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 g-2">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingVaccineType"
                                                placeholder="Vaccine Type" name="vaccine_type" required>
                                            <label for="editFloatingVaccineType">Vaccine Type</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="editFloatingVaccSource"
                                                placeholder="Vaccine Source" name="vacc_source" required>
                                            <label for="editFloatingVaccSource">Vaccine Source</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="saveEditChangesBtn" class="btn btn-success">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <script>
    $(document).ready(function() {
        $('.view-btn').on('click', function() {
            var id = $(this).data('id');
            var species = $(this).data('type');

            // AJAX call to fetch vaccination data
            $.ajax({
                url: 'vacc_info.php',
                type: 'post',
                data: {
                    id: id,
                    species: species
                },
                dataType: 'json', // Expecting JSON response
                success: function(response) {
                    if (response.status === 'error') {
                        alert(response.message || "Failed to fetch data.");
                        return;
                    }

                    var data =
                        response; // Response is already parsed if dataType is set to 'json'

                    // Populate fields safely
                    $('#viewFloatingName').val(data.name || 'Unknown');
                    $('#viewFloatingSex').val(data.sex == 1 ? 'Male' : 'Female');
                    $('#viewFloatingSpecies').val(species);
                    $('#viewFloatingBarangay').val(data.barangay || 'Unknown');
                    $('#viewFloatingOwner').val((data.first_name || '') + ' ' + (data
                        .last_name || ''));
                    $('#viewFloatingVaccinationStatus').val(data.vacc_status ||
                        'Not Available');
                    $('#viewFloatingVaccinationReason').val(data.vacc_reason ||
                        'Not Provided');
                    $('#viewFloatingVaccinationDisease').val(data.vacc_disease || 'N/A');
                    $('#viewFloatingVaccineType').val(data.vacc_type || 'N/A');
                    $('#viewFloatingVaccSource').val(data.vacc_source || 'N/A');

                    // Handle Image
                    $('#viewModalFloatingImage').attr('src', data.picture ? data.picture :
                        '/images/default-animal.png');

                    // Show the modal
                    $('#viewModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    alert("An error occurred while fetching data. Please try again.");
                }
            });
        });
    });
    </script> -->

    <script>
    $(document).ready(function() {
        function fetchData(id, species, isEditMode = false) {
            $.ajax({
                url: 'vacc_info.php',
                type: 'post',
                data: {
                    id: id,
                    species: species
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'error') {
                        alert(response.message || "Failed to fetch data.");
                        return;
                    }

                    var data = response;

                    if (isEditMode) {
                        // Populate Edit Modal
                        $('#editFloatingID').val(data.id);
                        $('#editFloatingName').val(data.name || '');
                        $('#editFloatingSex').val(data.sex == 1 ? 'Male' : 'Female');
                        $('#editFloatingSpecies').val(species);
                        $('#FloatingSpecies').val(species);
                        $('#editFloatingBarangay').val(data.barangay || '');
                        $('#editFloatingOwner').val((data.first_name || '') + ' ' + (data
                            .last_name || ''));
                        $('#editFloatingVaccinationStatus').val(data.vacc_status || '');
                        $('#editFloatingVaccinationReason').val(data.vacc_reason || '');
                        $('#editFloatingVaccinationDisease').val(data.vacc_disease || '');
                        $('#editFloatingVaccineType').val(data.vaccine_type || '');
                        $('#editFloatingVaccSource').val(data.vacc_source || '');
                        $('#editModalFloatingImage').attr('src', data.picture ? data.picture :
                            '/images/default-animal.png');

                        $('#editModal').data('id', id).data('species', species).modal('show');
                    } else {
                        // Populate View Modal
                        $('#viewFloatingName').val(data.name || '');
                        $('#viewFloatingSex').val(data.sex == 1 ? 'Male' : 'Female');
                        $('#viewFloatingSpecies').val(species);
                        $('#viewFloatingBarangay').val(data.barangay || '');
                        $('#viewFloatingOwner').val((data.first_name || '') + ' ' + (data
                            .last_name || ''));
                        $('#viewFloatingVaccinationStatus').val(data.vacc_status || '');
                        $('#viewFloatingVaccinationReason').val(data.vacc_reason || '');
                        $('#viewFloatingVaccinationDisease').val(data.vacc_disease || '');
                        $('#viewFloatingVaccineType').val(data.vaccine_type || '');
                        $('#viewFloatingVaccSource').val(data.vacc_source || '');
                        $('#viewModalFloatingImage').attr('src', data.picture ? data.picture :
                            '/images/default-animal.png');

                        $('#viewModal').modal('show');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    alert("An error occurred while fetching data.");
                }
            });
        }

        // View Button Click
        $('.view-btn').on('click', function() {
            var id = $(this).data('id');
            var species = $(this).data('type');
            fetchData(id, species, false); // View mode
        });

        // Edit Button Click
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            var species = $(this).data('type');
            fetchData(id, species, true); // Edit mode
        });

    });
    </script>






    <?php
    include "includes/footer.php";
?>
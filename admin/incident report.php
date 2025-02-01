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
        <h1>Incident Reports</h1>
        <button class="btn add-btn" onclick="printCard()"><i class="bi bi-printer"></i> Print Report</button>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date of Report</th>
                                    <th>Incident ID</th>
                                    <th>Incident Type</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Assuming you have already connected to your database

                                    // Fetch data from the dogs table
                                    $sql = "SELECT * FROM `incidentreports` ORDER BY date_time ASC";
                                    $count = 0;

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $count++;
                                    ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?= date("F j, Y, g:i A", strtotime($row["date_time"])) ?></td>
                                    <td><?=$row["incident_id"]?></td>
                                    <td><?=$row["incident_type"]?></td>
                                    <td><?=$row["location"]; ?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <button class="btn add-btn viewBtn" type="button"
                                                data-id="<?=$row["id"]; ?>" data-incident="<?= $row["incident_id"]?>"><i
                                                    class="bi bi-eye-fill"></i> View Full
                                                Report</button>
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

                        <!-- Modal for Viewing Full Report -->
                        <div class="modal fade" id="viewReportModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="viewReportModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewReportModalLabel">Full Incident Report</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Start of form -->
                                        <form action="code.php" method="POST" enctype="multipart/form-data">

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" id="viewName" name="yourName"
                                                            class="form-control" placeholder="Your Name" required>
                                                        <label for="viewName">Your Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="email" id="viewEmail" name="yourEmail"
                                                            class="form-control" placeholder="Your Email" required>
                                                        <label for="viewEmail">Your Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" id="viewMobile" name="yourMobile"
                                                            class="form-control" placeholder="Your Contact Number"
                                                            required>
                                                        <label for="viewMobile">Your Contact Numer</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" id="viewIncidentType" name="incidentType"
                                                            class="form-control" readonly>
                                                        <label for="viewIncidentType">Incident Type</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" id="viewDateTime" name="dateTime"
                                                            class="form-control" readonly>
                                                        <label for="viewDateTime">Date and Time</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hidden Input Field for "Others" -->
                                            <div class="row mb-3" id="otherIncidentDiv" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" id="otherIncidentType"
                                                            name="otherIncidentType" class="form-control"
                                                            placeholder="Specify other incident">
                                                        <label for="otherIncidentType">Specify Other Incident</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                            function toggleOtherInput() {
                                                var incidentType = document.getElementById("incidentType").value;
                                                var otherIncidentDiv = document.getElementById("otherIncidentDiv");

                                                if (incidentType === "Others") {
                                                    otherIncidentDiv.style.display = "block"; // Show input field
                                                } else {
                                                    otherIncidentDiv.style.display = "none"; // Hide input field
                                                }
                                            }
                                            </script>

                                            <div class="form-floating mb-3">
                                                <input type="text" id="viewLocation" name="location"
                                                    class="form-control" placeholder="Enter location" readonly>
                                                <label for="viewLocation">Location</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea id="viewDescription" name="description" class="form-control"
                                                    style="height: 100px"
                                                    placeholder="Be specific as possible, including relevant details such as the pet’s behavior, people involved, etc."
                                                    readonly></textarea>
                                                <label for="viewDescription">Description</label>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Uploaded softcopy
                                                    evidence</label>

                                                <div id="modalLinkContainer"></div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                        <!-- End of form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal -->

                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            document.querySelectorAll('.viewBtn').forEach(button => {
                                button.addEventListener('click', () => {
                                    const id = button.getAttribute(
                                        'data-id');
                                    const fileId = button.getAttribute(
                                        'data-incident');

                                    console.log(fileId);
                                    console.log(id);

                                    fetch(
                                            `get_incident_details.php?id=${id}&fileId=${fileId}`
                                        )
                                        .then(response => response.json())
                                        .then(data => {
                                            // Patient Information
                                            document.getElementById('viewName')
                                                .value = data.name || '';
                                            document.getElementById('viewEmail')
                                                .value = data.email || '';
                                            document.getElementById('viewMobile')
                                                .value = data.contact_number || '';
                                            document.getElementById('viewIncidentType')
                                                .value = data.incident_type || '';
                                            const rawDate = data.created_at;
                                            if (rawDate) {
                                                const dateObj = new Date(rawDate);
                                                const formattedDate = dateObj
                                                    .toLocaleString('en-US', {
                                                        year: 'numeric',
                                                        month: 'long',
                                                        day: 'numeric',
                                                        hour: '2-digit',
                                                        minute: '2-digit',
                                                        hour12: true
                                                    });

                                                document.getElementById('viewDateTime')
                                                    .value = formattedDate;
                                            } else {
                                                document.getElementById('viewDateTime')
                                                    .value = 'N/A'; // Handle missing date
                                            }

                                            document.getElementById('otherIncidentDiv')
                                                .value = data.for_others || '';
                                            document.getElementById('viewLocation')
                                                .value = data.location || '';
                                            document.getElementById('viewDescription')
                                                .value = data.description || '';

                                            console.log(document.getElementById(
                                                'viewDescription').value);

                                            // Attachments
                                            // Populate the modal with attachment links
                                            const modalLinkContainer = document
                                                .getElementById(
                                                    'modalLinkContainer');

                                            // Clear previous links (if any)
                                            modalLinkContainer.innerHTML = '';

                                            // Check if there are attachments
                                            if (Array.isArray(data.attachments) && data
                                                .attachments.length > 0) {
                                                // Loop through each attachment and create a link
                                                data.attachments.forEach(attachment => {
                                                    const linkElement = document
                                                        .createElement('a');
                                                    linkElement.href = attachment;
                                                    // Set the HTML content for the link with an icon and text
                                                    linkElement.innerHTML =
                                                        '<i class="bi bi-eye"></i> View Evidence';

                                                    linkElement.target =
                                                        '_blank'; // Open in new tab

                                                    // Optionally add some styling or classes to the link
                                                    linkElement.classList.add(
                                                        'attachment-link',
                                                        'btn',
                                                        'btn-primary', 'btn-sm',
                                                        'mb-2');

                                                    // Append the link to the modal container
                                                    modalLinkContainer.appendChild(
                                                        linkElement);
                                                    modalLinkContainer.appendChild(
                                                        document.createElement(
                                                            'br')
                                                    ); // Optional: Adds space between links
                                                });
                                            } else {
                                                // No attachments available
                                                modalLinkContainer.innerHTML =
                                                    'No attachments available.';
                                            }

                                            // Show the modal
                                            new bootstrap.Modal(document.getElementById(
                                                'viewReportModal')).show();

                                        })
                                        .catch(error => {
                                            console.error('Error fetching patient details:',
                                                error);
                                        });
                                });
                            });
                        });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
    function printCard() {
        // Add a class to the body to indicate we're in the print mode
        document.body.classList.add('print-mode');
        window.print();
        document.body.classList.remove('print-mode');
    }
    </script>

</main><!-- End #main -->
<?php
include "includes/footer.php";
?>
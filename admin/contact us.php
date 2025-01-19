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
        <h1>Email Queries</h1>
        <!-- <button class="btn add-btn"><i class="bi bi-printer"></i> Print Report</button> -->
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
                                    <th>
                                        <b>N</b>ame
                                    </th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date Received</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // Populate the table with all the queries from the database
                                    $sql = "SELECT * FROM contact_messages ORDER BY id DESC";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                        
                                        ?>
                                <tr>
                                    <td><?= $row['name']?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?= $row['subject']?></td>
                                    <td><?= $row['submitted_at']?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <button class="btn add-btn viewBtn" type="button"
                                                data-id="<?php echo $row["id"]; ?>"><i
                                                    class="bi bi-eye-fill"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- View Modal -->
    <div class="modal fade" id="viewQueryModal" tabindex="-1" aria-labelledby="viewQueryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewQueryModalLabel">View Email Query</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" id="queryName" name="name" class="form-control" placeholder="Your Name"
                                readonly />
                        </div>
                        <div class="col-md-6">
                            <input type="email" id="queryEmail" class="form-control" name="email"
                                placeholder="Your Email" readonly />
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="querySubject" class="form-control" name="subject"
                                placeholder="Subject" readonly />
                        </div>
                        <div class="col-md-12">
                            <textarea id="queryMessage" class="form-control" name="message" rows="6"
                                placeholder="Message" readonly></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewButtons = document.querySelectorAll('.viewBtn');
        const queryName = document.getElementById('queryName');
        const queryEmail = document.getElementById('queryEmail');
        const querySubject = document.getElementById('querySubject');
        const queryMessage = document.getElementById('queryMessage');

        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const queryId = this.getAttribute('data-id');

                // Fetch query details via AJAX
                fetch(`get_query_details.php?id=${queryId}`)
                    .then(response => response.json())
                    .then(data => {
                        queryName.value = data.name;
                        queryEmail.value = data.email;
                        querySubject.value = data.subject;
                        queryMessage.value = data.message;

                        // Show the modal
                        const viewQueryModal = new bootstrap.Modal(document.getElementById(
                            'viewQueryModal'));
                        viewQueryModal.show();
                    })
                    .catch(error => console.error('Error fetching query details:', error));
            });
        });
    });
    </script>


</main>End #main
<?php
include "includes/footer.php";
?>
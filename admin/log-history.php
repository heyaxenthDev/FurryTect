<?php 
 include "authentication.php";
 checklogin();

 include "includes/conn.php";
 include "includes/header.php";
 include "includes/sidebar.php";
 include "alert.php";

?>

<main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <h1>Log History of Users</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <!-- <button class="btn add-btn"><i class="bi bi-clipboard-data"></i> Generate List</button> -->
        </div>
    </div><!-- End Page Title -->

    <?php include 'modal-cat.php' ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Description</th>
                                    <th>Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                // Populate table with data from the database
                                $sql = "SELECT * FROM log_history";
                                $result = $conn->query($sql);
                                if ( $result->num_rows > 0) {
                                    while ( $row = $result->fetch_assoc() ) {
                              ?>

                                <tr>
                                    <td><?= $row['username']?></td>
                                    <td><?= $row['description']?></td>
                                    <td><?= $row['datetime_modified']?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php 
include "includes/footer.php";
?>
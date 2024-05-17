 <?php
    include 'includes/header.php';
    include 'includes/sidebar.php';
    ?>

 <main id="main" class="main">

     <div class="pagetitle d-flex justify-content-between">
         <h1>Owners</h1>
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <button class="btn add-btn"><i class="bi bi-plus-circle"></i> Add Owners</button>
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
                                 <tr>
                                     <td>9958</td>
                                     <td>9958</td>
                                     <td>Unity Pugh</td>
                                     <td>9958</td>
                                     <td>Curicó</td>
                                     <td>2005/02/11</td>
                                     <td>37%</td>
                                     <td>
                                         <div class="d-grid gap-2 d-md-block">
                                             <button class="btn btn-primary" type="button"><i
                                                     class="bi bi-eye-fill"></i></button>
                                             <button class="btn btn-primary" type="button"><i
                                                     class="bi bi-pencil-square"></i></button>
                                         </div>
                                     </td>
                                 </tr>
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
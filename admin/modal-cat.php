     <div class="modal fade" id="OwnersModalFirst" aria-hidden="true" aria-labelledby="OwnersModalFirstLabel"
         tabindex="-1">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="OwnersModalFirstLabel">Find and Select Existing Owner</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <div class="modal-body">
                     Enter the Owner's Code below to check the existing owner's record before proceeding...
                     <div class="form-floating mt-2">
                         <input type="text" class="form-control" name="ownersCode" id="ownersCode"
                             placeholder="Owner's Code">
                         <label for="ownersCode">Owner's Code</label>
                     </div>
                     <div id="ownerInfo" class="mt-3"></div>
                 </div>

                 <script>
                 $(document).ready(function() {
                     $('#ownersCode').on('input', function() {
                         var ownersCode = $(this).val();
                         if (ownersCode) {
                             $.ajax({
                                 url: 'check_owner.php',
                                 type: 'POST',
                                 data: {
                                     ownersCode: ownersCode
                                 },
                                 success: function(response) {
                                     $('#ownerInfo').html(response);
                                     $('#ownerCodeInput').val(
                                         ownersCode
                                     ); // Set the owner's code in the hidden input field
                                 }
                             });
                         } else {
                             $('#ownerInfo').html('');
                             $('#ownerCodeInput').val(
                                 ''
                             ); // Clear the owner's code in the hidden input field if no code is entered
                         }
                     });
                 });
                 </script>


                 <div class="modal-footer">
                     <button class="btn btn-primary" data-bs-target="#AddNewCatModal" data-bs-toggle="modal">Proceed to
                         Next Page</button>
                 </div>
             </div>
         </div>
     </div>

     <div class="modal fade" id="AddNewCatModal" aria-hidden="true" aria-labelledby="AddNewCatModalLabel2"
         tabindex="-1">
         <div class="modal-dialog modal-dialog-centered modal-xl">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="AddNewCatModalLabel2">Cat's Information</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="code.php" method="POST" enctype="multipart/form-data">
                         <!-- Cat Information start -->
                         <input type="hidden" id="ownerCodeInput" name="ownerCode">

                         <div class="row g-3">
                             <div class="col-md-4">
                                 <img src="assets/img/cat_default_img.jpg" id="catImage"
                                     class="img-fluid rounded float-start img-thumbnail mb-3" alt="Cat Image">
                                 <input type="file" class="form-control" id="catImageInput" name="catImage"
                                     accept="image/*">
                             </div>

                             <script>
                             // Function to display the selected image or the default image
                             function displayImage(input, imgElement, defaultSrc) {
                                 if (input.files && input.files[0]) {
                                     var reader = new FileReader();
                                     reader.onload = function(e) {
                                         imgElement.src = e.target.result;
                                     };
                                     reader.readAsDataURL(input.files[0]);
                                 } else {
                                     imgElement.src = defaultSrc;
                                 }
                             }

                             document
                                 .getElementById("catImageInput")
                                 .addEventListener("change", function() {
                                     displayImage(
                                         this,
                                         document.getElementById("catImage"),
                                         "assets/img/cat_default_img.jpg"
                                     );
                                 });
                             </script>

                             <div class="col-md-8">
                                 <div class="row mb-3 g-2">
                                     <div class="col-md-12">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingCatName"
                                                 placeholder="Name" name="name">
                                             <label for="floatingCatName">Name</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <select class="form-select" id="floatingCatSex" aria-label="Sex"
                                                 name="sex">
                                                 <option selected disabled>Choose...</option>
                                                 <option value="1">Male</option>
                                                 <option value="2">Female</option>
                                             </select>
                                             <label for="floatingCatSex">Sex</label>
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <input type="number" class="form-control" id="floatingCatAge"
                                                 placeholder="Age" name="age">
                                             <label for="floatingCatAge">Age</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-12">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingCatColor"
                                                 placeholder="Color" name="color">
                                             <label for="floatingCatColor">Color Description</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <select class="form-control" id="floatingCatVaccinationStatus"
                                                 aria-label="Vaccination Status" name="vaccinationStatus">
                                                 <option value="">Select Vaccination Status</option>
                                                 <option value="vaccinated" class="text-success">Vaccinated</option>
                                                 <option value="unvaccinated" class="text-danger">Unvaccinated
                                                 </option>
                                             </select>
                                             <label for="floatingCatVaccinationStatus">Vaccination Status</label>
                                         </div>
                                     </div>
                                     <div class="col-md-6" id="dateVaccDivCat" style="display: none;">
                                         <div class="form-floating">
                                             <input type="date" class="form-control" id="floatingCatDateVacc"
                                                 placeholder="Date Vaccinated" name="dateVacc">
                                             <label for="floatingCatDateVacc">Date Vaccinated</label>
                                         </div>
                                     </div>
                                 </div>

                                 <script>
                                 document.getElementById('floatingCatVaccinationStatus').addEventListener('change',
                                     function() {
                                         var selectedValue = this.value;
                                         document.getElementById('dateVaccDivCat').style.display =
                                             selectedValue === 'vaccinated' ? 'block' : 'none';
                                     });
                                 </script>
                             </div>
                         </div>
                         <!-- Cat Information End -->
                         <hr>
                         <div class="d-grid gap-2 col-4 mx-auto mt-4">
                             <button class="btn add-btn" type="submit" name="AddCats"><i class="bi bi-check-circle"></i>
                                 Submit</button>
                         </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>
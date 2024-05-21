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
                     <h1 class="modal-title fs-5" id="AddNewCatModalLabel2">Dog's Information</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="code.php" method="POST" enctype="multipart/form-data">
                         <!-- Dog Information start -->
                         <input type="hidden" id="ownerCodeInput" name="ownerCode">
                         <!-- <h4 class="mb-3">Dog's Information</h4> -->
                         <div class="row g-3">
                             <div class="col-md-4">
                                 <img src="assets/img/dog_default_img.jpg" id="dogImage"
                                     class="img-fluid rounded float-start img-thumbnail mb-3" alt="Dog Image">
                                 <input type="file" class="form-control" id="dogImageInput" name="dogImage"
                                     accept="image/*">
                             </div>
                             <script src="assets/js/dogs-image-display.js"></script>
                             <div class="col-md-8">
                                 <div class="row mb-3 g-2">
                                     <div class="d-flex align-items-center">
                                         <h6 class="me-3">Is Tagged?</h6>
                                         <div class="form-check me-3">
                                             <input class="form-check-input" type="checkbox" id="checkBoxTagged">
                                             <label class="form-check-label" for="checkBoxTagged">
                                                 Yes
                                             </label>
                                         </div>
                                     </div>

                                     <div class="col-md-6" id="tagNumberDiv" style="display: none;">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingTagNumber"
                                                 placeholder="Tag Number" name="tagNumber">
                                             <label for="floatingTagNumber">Tag Number</label>
                                         </div>
                                     </div>
                                     <div class="col-md-6" id="dateTaggedDiv" style="display: none;">
                                         <div class="form-floating">
                                             <input type="date" class="form-control" id="floatingDateTagged"
                                                 placeholder="DateTagged" name="dateTagged">
                                             <label for="floatingDateTagged">Date Tagged</label>
                                         </div>
                                     </div>
                                 </div>

                                 <script>
                                 document.getElementById('checkBoxTagged').addEventListener('change', function() {
                                     var isChecked = this.checked;
                                     document.getElementById('tagNumberDiv').style.display = isChecked ?
                                         'block' : 'none';
                                     document.getElementById('dateTaggedDiv').style.display = isChecked ?
                                         'block' : 'none';
                                 });
                                 </script>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-12">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingName"
                                                 placeholder="Name" name="name">
                                             <label for="floatingName">Name</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <select class="form-select" id="floatingSex" name="sex" aria-label="Sex">
                                                 <option selected disabled>Choose...</option>
                                                 <option value="1">Male</option>
                                                 <option value="2">Female</option>
                                             </select>
                                             <label for="floatingSex">Sex</label>
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <input type="number" class="form-control" id="floatingAge"
                                                 placeholder="Age" name="age">
                                             <label for="floatingAge">Age</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-12">
                                         <div class="form-floating">
                                             <input type="text" class="form-control" id="floatingColor"
                                                 placeholder="Color" name="color">
                                             <label for="floatingColor">Color Description</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-3 g-2">
                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             <select class="form-control" id="floatingVaccinationStatus"
                                                 aria-label="Vaccination Status" name="vaccinationStatus">
                                                 <option value="">Select Vaccination Status</option>
                                                 <option value="vaccinated" class="text-success">Vaccinated</option>
                                                 <option value="unvaccinated" class="text-danger">Unvaccinated
                                                 </option>
                                             </select>
                                             <label for="floatingVaccinationStatus">Vaccination Status</label>
                                         </div>
                                     </div>
                                     <div class="col-md-6" id="dateVaccDiv" style="display: none;">
                                         <div class="form-floating">
                                             <input type="date" class="form-control" id="floatingDateVacc"
                                                 placeholder="Date Vaccinated" name="dateVacc">
                                             <label for="floatingDateVacc">Date Vaccinated</label>
                                         </div>
                                     </div>
                                 </div>

                                 <script>
                                 document.getElementById('floatingVaccinationStatus').addEventListener('change',
                                     function() {
                                         var selectedValue = this.value;
                                         document.getElementById('dateVaccDiv').style.display =
                                             selectedValue === 'vaccinated' ? 'block' : 'none';
                                     });
                                 </script>
                             </div>
                         </div>
                         <!-- Dog Information End -->

                         <hr>
                         <div class="d-grid gap-2 col-4 mx-auto mt-4">
                             <button class="btn add-btn" type="submit" name="AddDogs"><i class="bi bi-check-circle"></i>
                                 Submit</button>
                         </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>
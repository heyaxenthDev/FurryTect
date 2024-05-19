// Function to display the selected image or the default image
function displayImage(input, imgElement, defaultSrc) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      imgElement.src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    imgElement.src = defaultSrc;
  }
}

document
  .getElementById("dogImageInput")
  .addEventListener("change", function () {
    displayImage(
      this,
      document.getElementById("dogImage"),
      "assets/img/dog_default_img.jpg"
    );
  });

document
  .getElementById("ownerImageInput")
  .addEventListener("change", function () {
    displayImage(
      this,
      document.getElementById("ownerImage"),
      "assets/img/user.png"
    );
  });

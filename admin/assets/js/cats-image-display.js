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
  .getElementById("catImageInput")
  .addEventListener("change", function () {
    displayImage(
      this,
      document.getElementById("catImage"),
      "assets/img/cat_default_img.jpg"
    );
  });

document
  .getElementById("catOwnerImageInput")
  .addEventListener("change", function () {
    displayImage(
      this,
      document.getElementById("catOwnerImage"),
      "assets/img/user.png"
    );
  });

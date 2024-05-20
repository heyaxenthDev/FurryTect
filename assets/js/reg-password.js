$(document).ready(function () {
  $("#showPassword").on("change", function () {
    const passwordField = $("#yourPassword");
    const confirmPasswordField = $("#yourConfirmPassword");
    const type = $(this).is(":checked") ? "text" : "password";
    passwordField.attr("type", type);
    confirmPasswordField.attr("type", type);
  });
});

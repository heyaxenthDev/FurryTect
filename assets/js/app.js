const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

let currentSlide = 0;
const textGroup = document.querySelector(".text-group");

// Input field focus and blur animations
inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

// Toggle between sign-in and sign-up modes
toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});



// Function to move slider manually
function moveSlider(index) {
  currentSlide = index; // Set current slide to the clicked index

  let currentImage = document.querySelector(`.img-${index + 1}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  textGroup.style.transform = `translateY(-${index * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  bullets[index].classList.add("active");
}

// Function to go to the next slide automatically
function nextSlide() {
  currentSlide = (currentSlide + 1) % images.length; // Increment the slide, loop back if at the end
  moveSlider(currentSlide);
}

// Auto-play the carousel every 3 seconds
let autoPlay = setInterval(nextSlide, 4000);

// Bullet click functionality for manual control
bullets.forEach((bullet, index) => {
  bullet.addEventListener("click", () => {
    moveSlider(index);
    clearInterval(autoPlay); // Stop auto-play when user manually controls the slider
    autoPlay = setInterval(nextSlide, 3000); // Restart auto-play after interaction
  });
});

// Initialize the first slide
moveSlider(currentSlide);

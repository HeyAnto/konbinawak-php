let slideIndex = 0;

function showSlides() {
  let slides = document.querySelectorAll(".carousel-item");
  if (slideIndex >= slides.length) {
    slideIndex = 0;
  }
  if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }
  document.querySelector(".carousel-inner").style.transform = `translateX(-${
    slideIndex * 100
  }%)`;
}

function prevSlide() {
  slideIndex--;
  showSlides();
}

function nextSlide() {
  slideIndex++;
  showSlides();
}

showSlides(); // Initial call to display the first slide

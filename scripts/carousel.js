let slideIndex = 0;
let startX = 0;
let endX = 0;
let autoSlideInterval;
let isAutoSlideStopped = false;

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

// Slide Auto
function startAutoSlide() {
  if (!isAutoSlideStopped) {
    autoSlideInterval = setInterval(() => {
      nextSlide();
    }, 3000);
  }
}

function stopAutoSlide() {
  clearInterval(autoSlideInterval);
}

startAutoSlide();

// Swipe Mobile
function handleSwipe() {
  const swipeThreshold = 50;
  const deltaX = endX - startX;

  if (deltaX > swipeThreshold) {
    prevSlide();
  } else if (deltaX < -swipeThreshold) {
    nextSlide();
  }
}

document
  .querySelector(".carousel-inner")
  .addEventListener("touchstart", (e) => {
    startX = e.touches[0].clientX;
    stopAutoSlide();
    isAutoSlideStopped = true;
  });

document.querySelector(".carousel-inner").addEventListener("touchend", (e) => {
  endX = e.changedTouches[0].clientX;
  handleSwipe();
});

document.querySelector(".carousel").addEventListener("mouseenter", () => {
  stopAutoSlide();
});

document.querySelector(".carousel").addEventListener("mouseleave", () => {
  startAutoSlide();
});

showSlides();

const currentPage = window.location.pathname
  .split("/")
  .pop()
  .replace(".php", "");

const navButtons = document.querySelectorAll(".btn-nav");

navButtons.forEach((button) => {
  const buttonPage = button.getAttribute("data-page");
  if (buttonPage === currentPage) {
    button.classList.add("nav-active");
  }
});

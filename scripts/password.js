document
  .getElementById("togglePassword")
  .addEventListener("click", function () {
    let passwordInput = document.getElementById("password");
    let type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;
    this.textContent = type === "password" ? "🐵" : "🙈";
  });

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const passwordInput = document.getElementById("password");
  const passwordContainer = document.getElementById("password-register");

  const messageContainer = document.createElement("p");
  messageContainer.style.color = "red";
  messageContainer.style.fontSize = "0.75rem";
  messageContainer.style.marginTop = "5px";

  form.addEventListener("submit", function (event) {
    const password = passwordInput.value;
    const passwordPattern = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

    if (!passwordPattern.test(password)) {
      event.preventDefault();
      messageContainer.textContent =
        "Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.";

      if (!passwordContainer.contains(messageContainer)) {
        passwordContainer.appendChild(messageContainer);
      }
    } else {
      if (passwordContainer.contains(messageContainer)) {
        passwordContainer.removeChild(messageContainer);
      }
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const passwordInput = document.getElementById("password");
  const passwordContainer = document.getElementById("password-login");

  const messageContainer = document.createElement("p");
  messageContainer.style.color = "red";
  messageContainer.style.fontSize = "0.75rem";
  messageContainer.style.marginTop = "5px";

  form.addEventListener("submit", function (event) {
    const password = passwordInput.value;
    const passwordPattern = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

    if (!passwordPattern.test(password)) {
      event.preventDefault();
      messageContainer.textContent = "Mot de passe incorrect.";

      if (!passwordContainer.contains(messageContainer)) {
        passwordContainer.appendChild(messageContainer);
      }
    } else {
      if (passwordContainer.contains(messageContainer)) {
        passwordContainer.removeChild(messageContainer);
      }
    }
  });
});

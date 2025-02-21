const toggleButton = document.getElementById("toggleContrast");
const body = document.body;

// Vérifier si le mode contraste est déjà activé
if (localStorage.getItem("contrastMode") === "enabled") {
    body.classList.add("contrast-mode");
    toggleButton.textContent = "Mode Normal";
}

toggleButton.addEventListener("click", () => {
    body.classList.toggle("contrast-mode");

    if (body.classList.contains("contrast-mode")) {
        localStorage.setItem("contrastMode", "enabled");
        toggleButton.textContent = "Mode Normal";
    } else {
        localStorage.setItem("contrastMode", "disabled");
        toggleButton.textContent = "Mode Contraste";
    }
});


// script.js
document.getElementById('login-form').addEventListener('submit', function (e) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');
  
    // Réinitialiser le message d'erreur
    errorMessage.textContent = '';
  
    // Validation simple
    if (!email || !password) {
      e.preventDefault(); // Empêche l'envoi du formulaire
      errorMessage.textContent = 'Veuillez remplir tous les champs.';
    } else if (!validateEmail(email)) {
      e.preventDefault();
      errorMessage.textContent = 'Veuillez entrer une adresse email valide.';
    }
  });
  
  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
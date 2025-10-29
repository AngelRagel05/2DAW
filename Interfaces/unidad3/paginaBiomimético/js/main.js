document.addEventListener("DOMContentLoaded", () => {
  const arteBtn = document.getElementById("arteBtn");
  const roots = document.querySelectorAll(".root-path");
  const sections = document.querySelectorAll(".art-section");

  // 🔹 Función que ejecuta toda la animación
  const playAnimation = () => {
    arteBtn.disabled = true;
    localStorage.setItem("arteClicked", "true"); // guarda el estado

    roots.forEach((root, i) => {
      root.classList.add("root-animated");
      root.style.transition = `stroke-dashoffset 2.5s ease ${i * 0.3}s`;
      root.style.strokeDashoffset = "0";

      setTimeout(() => {
        root.classList.remove("root-animated");
        sections[i].classList.add("visible");
      }, 1500 + i * 250);
    });
  };

  // 🔹 Evento normal de clic en el botón
  arteBtn.addEventListener("click", playAnimation);

  // 🔹 Si ya se pulsó antes, reproducimos la animación automáticamente
  const arteClicked = localStorage.getItem("arteClicked");
  if (arteClicked === "true") {
    setTimeout(() => {
      playAnimation();
    }, 600); // un pequeño retardo para que cargue el DOM antes
  }
});

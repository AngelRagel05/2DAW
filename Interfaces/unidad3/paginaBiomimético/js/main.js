document.addEventListener("DOMContentLoaded", () => {
  const arteBtn = document.getElementById("arteBtn");
  const roots = document.querySelectorAll(".root-path");
  const sections = document.querySelectorAll(".art-section");

  arteBtn.addEventListener("click", () => {
    arteBtn.disabled = true;

    roots.forEach((root, i) => {
      root.style.transition = `stroke-dashoffset 2.5s ease ${i * 0.3}s`;
      root.style.strokeDashoffset = "0";

      // Cuando la raíz termine, mostrar la sección correspondiente
      setTimeout(() => {
        sections[i].classList.add("visible");
      }, 2500 + i * 300);
    });
  });
});

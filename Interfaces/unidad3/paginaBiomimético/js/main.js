document.addEventListener("DOMContentLoaded", () => {
  const arteBtn = document.getElementById("arteBtn");
  const roots = document.querySelectorAll(".root-path");
  const sections = document.querySelectorAll(".art-section");

  arteBtn.addEventListener("click", () => {
    arteBtn.disabled = true;

    roots.forEach((root, i) => {
      root.classList.add("root-animated");
      root.style.transition = `stroke-dashoffset 2.5s ease ${i * 0.3}s`;
      root.style.strokeDashoffset = "0";

      setTimeout(() => {
        root.classList.remove("root-animated");
        sections[i].classList.add("visible");
      }, 1500 + i * 250);
    });
  });
});

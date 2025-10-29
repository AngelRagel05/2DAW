document.addEventListener("DOMContentLoaded", () => {
  // Animación de raíces
  const arteBtn = document.getElementById("arteBtn");
  const roots = document.querySelectorAll(".root-path");
  const sections = document.querySelectorAll(".art-section");

  const playAnimation = () => {
    arteBtn.disabled = true;
    localStorage.setItem("arteClicked", "true");

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

  arteBtn.addEventListener("click", playAnimation);

  const arteClicked = localStorage.getItem("arteClicked");
  if (arteClicked === "true") {
    setTimeout(() => {
      playAnimation();
    }, 600);
  }

  // Menú hamburguesa
  const menuToggle = document.getElementById("menuToggle");
  const navList = document.querySelector(".nav-list");

  menuToggle.addEventListener("click", () => {
    menuToggle.classList.toggle("active");
    navList.classList.toggle("active");

    // Forzamos display para que sobreescriba Bootstrap
    if (navList.classList.contains("active")) {
      navList.style.display = "flex";
      navList.style.flexDirection = "column";
      navList.style.alignItems = "center";
    } else {
      navList.style.display = "none";
    }
  });

  window.addEventListener("resize", () => {
    const navList = document.querySelector(".nav-list");
    const menuToggle = document.getElementById("menuToggle");

    if (window.innerWidth > 768) {
      // En escritorio, quitamos cualquier estilo inline
      navList.style.display = "";
      navList.style.flexDirection = "";
      navList.style.alignItems = "";
      menuToggle.classList.remove("active");
      navList.classList.remove("active");
    }
  });
});

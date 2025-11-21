"use strict";

function log(mensaje) {
  const li = document.getElementById("log");
  li.innerHTML += "<li>" + mensaje + "</li>";
}

const zona = document.getElementsById("zona-mouse");

zona.addEventListener("mouseenter", () => {
  zona.classList.add("highlight");
  log("El ratón entrá en la zona sensible");
});

zona.addEventListener("mouseLeave", () => {
  zona.classList.remove("highlight");
  log("El ratón salió de la zona sensible");
});

zona.addEventListener("click", () => {
  log("Click");
});

zona.addEventListener("mousemove", (e) => {
  log("Posición: " + e.clientX + ", " + e.clientY);
});

const input = document.getElementById("input-texto");

input.addEventListener("focus", () => {
  log("Input enfocado");
});

input.addEventListener("blur", () => {
  log("Input desenfocado");
});

input.addEventListener("keydown", (e) => {
  log("Tecla pulsada: " + e.key);
});

input.addEventListener("keyup", (e) => {
  log("Tecla soltada: " + e.code);
});

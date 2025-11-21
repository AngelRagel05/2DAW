"use strict";

const input = document.getElementById("input-teclado");
const zona = document.getElementById("zona-sensible");
const log = document.getElementById("log-eventos");

function addLog(texto) {
    const li = document.createElement("li");
    li.textContent = texto;
    log.appendChild(li);
}

// ----------------------------
// Eventos del INPUT
// ----------------------------

input.addEventListener("mouseover", (event) => {
    addLog("El ratón ha entrado en el input" + event.type);
});

input.addEventListener("mouseout", (event) => {
    addLog("El ratón ha salido del input" + event.type);
});

input.addEventListener("mouseenter", (event) => {
    addLog("El ratón ha entrado en el input (mouseenter)" + event.type);
});

input.addEventListener("click", (event) => {
    addLog("Se ha hecho clic en el input" + event.type);
});

// ----------------------------
// Eventos de la ZONA SENSIBLE
// ----------------------------
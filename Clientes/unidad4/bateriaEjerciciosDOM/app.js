"use strict";

// ********** Ejercicio 1 **********
let tituloPrincipal = document.getElementById("titulo-principal");
let primerElementoSubtitulado = document.getElementsByClassName("subtitulo")[0];
let listaIMG = document.querySelectorAll("img.thumb");
let button = document.querySelector("#btn-add-task");

console.log(tituloPrincipal.textContent);
console.log(primerElementoSubtitulado.textContent);
listaIMG.forEach(img => console.log(img.src));
console.log(button.textContent);

// ********** Ejercicio 2 **********
const btnToggle = document.getElementById("btn-toggle");
const foco = document.getElementById("light-bulb");

btnToggle.addEventListener("click", () => {
    foco.classList.toggle("luz-apagada");
    foco.classList.toggle("luz-encendida");
});

// ********** Ejercicio 3 **********
const profileName = document.getElementsByClassName("profile-name")[0];
profileName.textContent = "José Braulio Palomo Vazquez";

const profileDesc = document.getElementsByClassName("profile-desc")[0];
profileDesc.textContent = "Ex estudiante de 2º de DAW";

const profileCard = document.getElementById("profile-card");
profileCard.setAttribute("data-user-id", "DWEC-001");

// ********** Ejercicio 4 **********
const imagenPrincipal = document.getElementById("main-image");
const miniaturas = document.querySelectorAll(".thumb");

miniaturas.forEach(thumb => {
    thumb.addEventListener("click", () => {
        imagenPrincipal.src = thumb.src;
    });
});

// ********** Ejercicio 5 **********
const btnAddTask = document.getElementById("btn-add-task");
btnAddTask.addEventListener("click", () => {
    const taskInput = document.getElementById("input-new-task");
    let taskText = taskInput.value.trim();
    if (taskText !== "") {
        taskInput.document.createElement("li");
        
    }
});
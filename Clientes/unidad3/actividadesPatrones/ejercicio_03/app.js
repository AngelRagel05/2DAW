"use strict";

import { TaskManager } from "./TaskManager.js";

const taskManager = new TaskManager();

// Observador 1: actualiza la lista <ul> en el HTML
function actualizarListaHTML() {
    const ul = document.getElementById("listaTareas");
    ul.innerHTML = ""; // limpiamos la lista antes de agregar

    const tareas = taskManager.obtenerTareas();
    tareas.forEach(tarea => {
        const li = document.createElement("li");
        li.textContent = tarea.toString(); // usa el método toString de Tarea
        ul.appendChild(li);
    });
}

// Observador 2: mostrar el contador en consola (opcional)
function mostrarContador() {
    console.log(`Total de tareas: ${taskManager.obtenerTareas().length}`);
}

// Suscribimos los observadores
taskManager.suscribir(actualizarListaHTML);
taskManager.suscribir(mostrarContador);

// Agregar tareas de ejemplo
taskManager.agregarTarea("Estudiar patrones de diseño");
taskManager.agregarTarea("Hacer ejercicio físico");

// Marcar la primera como completada
const primeraTarea = taskManager.obtenerTareas()[0];
taskManager.marcarTareaCompletada(primeraTarea.id);

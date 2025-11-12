"use strict";

import { Tarea } from "./tarea.js";

// Creo dos tareas de ejemplo
let tarea1 = new Tarea("Estudiar patrones de diseño.");
let tarea2 = new Tarea("Hacer ejercicio físico.");

// Marco la primera tarea como completada
tarea1.completar();

// Muestro las tareas en la consola
console.log(tarea1.toString());
console.log(tarea2.toString());
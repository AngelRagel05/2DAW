"use strict";

import { Tarea } from "../ejercicio_01/tarea.js";

/**
 * Representa un gestor de tareas.
 * @class
 */
export class TaskManager {

    /**
     * Crea un nuevo gestor de tareas.
     * @constructor
     * @property {Tarea[]} tasks - Lista de tareas gestionadas.
     */
    constructor() {
        this.tasks = [];
    }

    /**
     * Agrega una nueva tarea al gestor.
     * @param {string} texto 
     */
    agregarTarea(texto) {
        const nuevaTarea = new Tarea(texto);
        this.tasks.push(nuevaTarea);
    }

    /**
     * Elimina una tarea del gestor por su id.
     * @param {number} id 
     */
    eliminarTarea(id) {
        this.tasks = this.tasks.filter(tarea => tarea.id !== id);
    }

    /**
     * Lista todas las tareas gestionadas.
     * @returns {Tarea[]} Lista de tareas.
     */
    obtenerTareas() {
        return this.tasks;
    }

    /**
     * Marca una tarea como completada por su id.
     * @param {number} id 
     */
    marcarTareaCompletada(id) {
        for (const tarea of this.tasks) {
            if (tarea.id === id) {
                tarea.completar();
                break;
            }        
        }
    }
}
"use strict";

/**
 * Representa una tarea pendiente o completada.
 * @class
 */
export class Tarea {

  /**
   * Crea una nueva tarea.
   * @constructor
   * @param {string} texto - El texto descriptivo de la tarea.
   * @property {number} id - Identificador único de la tarea.
   * @property {string} texto - Texto descriptivo de la tarea.
   * @property {boolean} completada - Indica si la tarea está completada.
   * @property {Date} fechaCreacion - Fecha y hora de creación de la tarea. 
   */
  constructor(texto) {
    this.id = Date.now();
    this.texto = texto;
    this.completada = false;
    this.fechaCreacion = new Date();
  }

/**
 * Marca la tarea como completada.
 * @method
 */
  completar() {
    this.completada = true;
  }

/**
 * Devuelve una representación en cadena de la tarea.
 * @method
 * @returns {string} Representación en cadena de la tarea.
 */
  toString() {
    return this.completada ? "[X] " + this.texto : "[ ] " + this.texto;
  }
}
"use strict";

//! ***************************************************************************************
console.log("Ejercicio 1: Funciones predefinidas y manipulación básica.");

let array = [4.7, 2.3, 9.8, 6.5];

console.log("Redondea todos los números hacia arriba usando una función predefinida.");
for (let i = 0; i < array.length; i++) {
    console.log(Math.ceil(array[i]));
}

console.log("Convierte todos los números a strings y muestra su longitud.");
for (let i = 0; i < array.length; i++) {
    let stringArray = array[i].toString();
    console.log("La cadena es: " + stringArray + " y su longitud es de: " + stringArray.length);
}

console.log("Calcula el mayor y el menor valor usando funciones Math.");
console.log("El número mayor es: " + Math.max(...array));
console.log("El número menor es: " + Math.min(...array));

let string = "JavaScript";

console.log("Convierte todas las letras a mayúsculas.");
console.log(string.toUpperCase());

console.log("Obtén los 4 primeros caracteres usando un método de string.");
console.log(string.slice(0, 4));

console.log("Verifica si contiene la letra 'S' (mayúscula).");
for (let i = 0; i < string.length; i++) {
    if (string.charAt(i) === "S") console.log("Contiene la 'S' en mayúscula.");
}

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 2: Funciones definidas por el usuario.");



//! ***************************************************************************************
console.log("");
console.log("Ejercicio 3: Arrays – creación y manipulación.");

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 4: Operaciones combinadas y encadenamiento.");

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 5: Gestión de Inventario con funciones avanzadas.");

//! ***************************************************************************************
console.log("");
console.log("Ejercicio 6: Ordenar, agrupar y validar datos.");

//! ***************************************************************************************
console.log("");
console.log("jercicio 7: Sistema de gestión de tareas (CRUD básico con arrays).");
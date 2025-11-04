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

console.log("Crea una función saludar(nombre) que reciba un nombre y devuelva 'Hola, [nombre]!'.");
function saludar(nombre) {
    console.log("¡Hola, " + nombre + "!");
}
saludar("María");

console.log("Crea una función esPar(numero) que devuelva true si el número es par, false si es impar.");
function esPar(numero) {
    return numero % 2 === 0;
}
console.log("¿El número 7 es par? " + esPar(7));

console.log("Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback, y aplique la callback a cada elemento del array (usa for…of o forEach).");
function operacionArray(arr, callback) {
    arr.forEach(callback);
}
operacionArray([2, 4, 6, 8], function (num) {
    console.log("Número multiplicado por 2: " + num * 2);
});

console.log("Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce.");
function promedio(arr) {
    return arr.reduce((acc, val) => acc + val, 0) / arr.length;
}
console.log("El promedio de [3, 6, 9] es: " + promedio([3, 6, 9]));

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
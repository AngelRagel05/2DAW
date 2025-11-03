'use strict';

// Crear una función recursiva y otra no recursiva para calcular el factorial de un número

let num = parseInt(prompt("Introduce un número: ", 10));

function factorialRecursivo(num) {
    if (n < 0) return "El factorial no está definido para números negativos.";
    return (n <= 1) ? 1 : n * factorialRecursivo(n - 1);
}

function factorialNoRecursivo(num) {
    if (num < 0) {
        return "El factorial no está definido para números negativos.";
    }
    let resultado = 1;
    for (let i = 2; i <= num; i++) {
        resultado *= i;
    }
    return resultado;
}

let numInt;

numInt++;

console.log(`Factorial de ${num} (recursivo): ${factorialRecursivo(num)}`);
console.log(`Factorial de ${num} (no recursivo): ${factorialNoRecursivo(num)}`);


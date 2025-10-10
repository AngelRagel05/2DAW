let numeros = [1, 2, 3, 4];
let suma = 0;
 
for (let i = 0; i <= numeros.length; i++) {
    suma += numeros[i];
}
 
console.log("Suma total: " + suma);

// El código anterior tiene un error en el bucle for. El índice debe ser menor que la longitud del array, no menor o igual.

for (let i = 0; i < numeros.length; i++) {
    suma += numeros[i];
}
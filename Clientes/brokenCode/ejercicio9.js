function calcularPrecio(base, descuento) {
    let precioFinal = base;
    if (descuento) {
        precioFinal = base - base * descuento;
    }
    return precioFinal.toFixed(2);
}
 
console.log(calcularPrecio(100, 0.2));
console.log(calcularPrecio(100, 60));

// Hay fallos en practicamente todas las líneas del código. El código corregido es:

function calcularPrecio(base, descuento) {
    let precioFinal = 0;
    if (descuento >= 1) {
        precioFinal = base - (base * (descuento / 100));
    } else {
        precioFinal = base - (base * descuento);
    }
    return precioFinal.toFixed(2);
}

console.log(calcularPrecio(100, 0.2));
console.log(calcularPrecio(100, 60));

// El primer console.log devuelve 80.00 y el segundo 40.00, que son los valores correctos.
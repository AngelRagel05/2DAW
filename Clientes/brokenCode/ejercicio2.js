let edad = 16;
if (edad => 18) {
    console.log("Eres mayor de edad");
} else {
    console.log("Eres menor de edad");
}

// Hay un error en la condición "edad => 18", debería ser "edad >= 18"

if (edad >= 18) {
    console.log("Eres mayor de edad");
} else {
    console.log("Eres menor de edad");
}
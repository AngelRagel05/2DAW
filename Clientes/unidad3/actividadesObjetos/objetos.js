"use strict";

//! ************************************************************************************************************************************** //
console.log('1. Creación y acceso a objetos.'); 

let persona = {
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeniera"
};

console.log(persona.nombre); // Ana
console.log(persona.edad);   // 28

persona.pais = "España";
console.log(persona.pais);   // España

delete persona.trabajo;
console.log(persona.trabajo); // undefined

for (let clave in persona) {
    console.log(clave + ": " + persona[clave]);
}

//! ************************************************************************************************************************************** //
console.log('2. Operador "in" y bucle "for...in."');

let apellidoExiste = false;
// Verifico si existe la clave "nombre" en el objeto persona y verifico si no existe la clave "Apellido"
for (let clave in persona) {
    if (clave === "nombre") console.log('La clave "nombre" existe en el objeto persona. Y su propiedad es: ' + persona[clave]);
    if (clave === "Apellido") apellidoExiste = true;
}
if (!apellidoExiste) console.log("La clave 'Apellido' no existe en el objeto persona.");   

for (let clave in persona) {
    console.log(clave + ": " + persona[clave]);
}

//! ************************************************************************************************************************************** //
console.log('3. Referencias de objetos y clonación.');

//! ************************************************************************************************************************************** //
console.log('5. Métodos en objetos y uso de "this".');

//! ************************************************************************************************************************************** //
console.log('6. Symbol y claves ocultas.');

//! ************************************************************************************************************************************** //
console.log('7. Conversión de objetos a valores primitivos.');

//! ************************************************************************************************************************************** //
console.log('8. Herencia de Clases.');

//! ************************************************************************************************************************************** //
console.log('9.Encapsulación con Propiedades Privadas.');

//! ************************************************************************************************************************************** //
console.log('10. Objeto window, DOM y eventos:');
function saludar(nombre) {
    console.log("Hola " + name);
}
 
saludar("Ana");

// El error en el código es que la función utiliza la variable 'name' en lugar de 'nombre', que es el parámetro correcto.

function saludar(nombre) {
    console.log("Hola " + nombre);
}
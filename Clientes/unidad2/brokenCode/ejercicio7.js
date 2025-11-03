function procesarDatos(datos, callback) {
    callback(dat);
}
 
procesarDatos([1,2,3], function(d) {
    console.log("Datos recibidos:", d);
});

// El código anterior tiene un error en la variable pasada al callback. Debe ser 'datos' en lugar de 'dat'.

function procesarDatos(datos, callback) {
    callback(datos);
}
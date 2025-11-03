<!DOCTYPE html>
<html lang="es">
<body>
  <button id="miBoton">Click me</button>
 
  <script>
    const btn = document.getElementById("miBoton");
    btn.addEventListener("click", function() {
      let msg = "Hola mundo";
      console.log(msj);
    });
  </script>
</body>
</html>

// En la línea donde se hace el console.log, la variable debe ser 'msg' en lugar de 'msj'.

<!DOCTYPE html>
<html lang="es">
<body>
  <button id="miBoton">Click me</button>
 
  <script>
    const btn = document.getElementById("miBoton");
    btn.addEventListener("click", function() {
      let msg = "Hola mundo";
      console.log(msg);
    });
  </script>
</body>
</html>
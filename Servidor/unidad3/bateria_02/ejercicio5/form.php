<?php
// Comprobamos si se recibe el campo 'centro' por GET
if (!empty($_GET['centro'])) {
    // Guardamos el valor en la cookie 'centro', que expira en 1 minuto
    setcookie("centro", $_GET['centro'], time() + 60);

    // Redirigimos a receptor.php
    header("Location: receptor.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Centro</title>
</head>
<body>
    <h1>Formulario de Centro</h1>
    <form method="get" action="">
        <label for="centro">Introduce el centro:</label>
        <input type="text" name="centro" id="centro" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

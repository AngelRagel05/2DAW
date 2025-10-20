<?php

$nombre = '';
$email = '';
$telefono = '';
$errores = [];

if (isset($_GET['submit'])) {
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $telefono = isset($_GET['telefono']) ? $_GET['telefono'] : '';

    $nombre === ''
        ? $errores[] = "El nombre es obligatorio."
        : null;

    (!filter_var($email, FILTER_VALIDATE_EMAIL))
        ? $errores[] = "El correo electrónico no es válido."
        : null;

    (!preg_match("/^[0-9]{9}$/", $telefono))
        ? $errores[] = "El número de teléfono debe contener 9 dígitos numéricos."
        : null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Datos (GET)</title>
</head>

<body>
    <h1>Validación de Datos (GET)</h1>

    <?php
    if (isset($errores) && count($errores) > 0) {
        echo "<h2>Errores encontrados:</h2><ul>";
        foreach ($errores as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Datos enviados correctamente:</h2>";
        echo "<p>Nombre: " . htmlspecialchars($nombre) . "</p>";
        echo "<p>Correo Electrónico: " . htmlspecialchars($email) . "</p>";
        echo "<p>Teléfono: " . htmlspecialchars($telefono) . "</p>";
    }
    ?>
</body>

</html>
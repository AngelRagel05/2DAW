<?php
// Crear cookie 'centro' con valor 'Ilerna' que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Simple</title>
</head>

<body>
    <h1>Creación de la Cookie</h1>
    <?php
    if (isset($_COOKIE['centro'])) {
        echo "<p>La cookie 'centro' tiene el valor: " . htmlspecialchars($_COOKIE['centro']) . "</p>";
    } else {
        echo "<p>La cookie 'centro' ha sido creada. Se podrá leer en la próxima carga de la página.</p>";
    }
    ?>
</body>

</html>
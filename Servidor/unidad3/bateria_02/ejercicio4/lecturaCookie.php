<?php
// Crear cookie 'centro' con valor 'Ilerna' que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura de Cookie</title>
</head>

<body>
    <h1>Lectura de la Cookie</h1>

    <h2>Contenido de $_COOKIE:</h2>
    <pre><?php var_dump($_COOKIE); ?></pre>

    <h2>Valor de la cookie "centro":</h2>
    <p>
        <?php
        if (isset($_COOKIE['centro'])) {
            echo htmlspecialchars($_COOKIE['centro']);
        } else {
            echo "La cookie 'centro' todavía no está disponible o ha expirado.";
        }
        ?>
    </p>

    <p>Refresca la página varias veces para ver cómo aparece y desaparece la cookie después de 30 segundos.</p>
</body>

</html>
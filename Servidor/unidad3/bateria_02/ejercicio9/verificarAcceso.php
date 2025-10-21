<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Acceso</title>
</head>
<body>
    <h1>Verificación de Acceso</h1>
    <?php
    if (isset($_SESSION['rol'])) {
        echo "<p>Acceso concedido como: <strong>" . htmlspecialchars($_SESSION['rol']) . "</strong></p>";
    } else {
        echo "<p>Acceso denegado</p>";
        echo '<form action="iniciarSesion.php" method="get">
                <button type="submit">Login</button>
              </form>';
    }
    ?>
</body>
</html>

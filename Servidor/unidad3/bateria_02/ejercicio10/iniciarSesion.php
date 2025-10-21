<?php
session_start();

// Guardar un valor en la sesión
$_SESSION['rol'] = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión con Valor</title>
</head>
<body>
    <h1>Sesión PHP</h1>
    <p>ID de la sesión actual: <strong><?php echo session_id(); ?></strong></p>
    <p>Valor almacenado en $_SESSION['rol']: <strong><?php echo $_SESSION['rol']; ?></strong></p>

    <form action="verificarAcceso.php" method="get">
        <button type="submit">Verificar Acceso</button>
    </form>
</body>
</html>

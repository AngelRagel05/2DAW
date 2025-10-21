<?php
// Iniciar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicialización de Sesión</title>
</head>

<body>
    <h1>Sesión PHP</h1>
    <p>ID de la sesión actual: <strong><?php echo session_id(); ?></strong></p>
    <p>Refresca la página varias veces y verás que el ID de la sesión permanece igual mientras la sesión siga activa.</p>
</body>

</html>
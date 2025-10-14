<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de Servidor</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>

<body>
    <h1>Información del Servidor</h1>
    <ul>
        <li><strong>Nombre del script ejecutado:</strong> <?php echo $_SERVER['SCRIPT_NAME']; ?></li>
        <li><strong>Software del servidor:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
        <li><strong>Dirección IP del cliente:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
        <li><strong>Método de la petición:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></li>
        <li><strong>Agente de usuario (navegador):</strong> <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
    </ul>
</body>

</html>
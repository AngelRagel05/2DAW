<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de Servidor</title>
    <link rel="stylesheet" href="../../../css/bootstrap.css">
</head>


<body class="bg-light text-dark">

    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h2 class="mb-0">Información del Servidor</h2>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush fs-5">
                    <li class="list-group-item">
                        <strong>Nombre del script ejecutado:</strong>
                        <span class="text-secondary"><?php echo $_SERVER['SCRIPT_NAME']; ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong>Software del servidor:</strong>
                        <span class="text-secondary"><?php echo $_SERVER['SERVER_SOFTWARE']; ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong>Dirección IP del cliente:</strong>
                        <span class="text-secondary"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong>Método de la petición:</strong>
                        <span class="text-secondary"><?php echo $_SERVER['REQUEST_METHOD']; ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong>Agente de usuario (navegador):</strong>
                        <span class="text-secondary"><?php echo $_SERVER['HTTP_USER_AGENT']; ?></span>
                    </li>
                </ul>
            </div>

            <div class="card-footer text-center text-muted">
                <small>Generado automáticamente con PHP - <?php echo date('d/m/Y H:i:s'); ?></small>
            </div>
        </div>
    </div>

</body>

</html>
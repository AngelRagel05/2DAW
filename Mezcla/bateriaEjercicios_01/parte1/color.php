<?php
$color = "";
if (isset($_GET['generar'])) {
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);

    $color = "rgb($r, $g, $b)";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Colores Aleatorios</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light d-flex flex-column align-items-center justify-content-center vh-100">

    <div class="card shadow p-4 text-center">
        <h1 class="card-title mb-4">🎨 Generador de Colores Aleatorios</h1>

        <!-- Botón -->
        <form action="" method="GET">
            <button class="btn btn-primary btn-lg mb-4" type="submit" name="generar">
                Generar Color
            </button>
        </form>

        <!-- Mostrar color -->
        <?php if ($color != ""): ?>
            <div class="card border-0 shadow mb-3 mx-auto" style="width:150px; height:150px; background-color: <?php echo $color; ?>;"></div>
            <p class="h5 text-muted">Código: <strong><?php echo $color; ?></strong></p>
        <?php else: ?>
            <p class="text-secondary">Pulsa el botón para generar un color aleatorio</p>
        <?php endif; ?>
    </div>
    
</body>

</html>
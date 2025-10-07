<?php

session_start();

if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = [];
}

$color = "";
if (isset($_GET['generar'])) {
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);

    $color = "rgb($r, $g, $b)";

    // Guardar este color en el historial
    $_SESSION['historial'][] = $color;

    if (count($_SESSION['historial']) > 5) {
        array_shift($_SESSION['historial']); // elimina el primer elemento
    }
}

// Reiniciar historial
if (isset($_GET['reiniciar'])) {
    $_SESSION['historial'] = [];
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

            <button class="btn btn-danger btn-lg mb-4" name="reiniciar" type="submit">
                Reiniciar Historial
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

    <div class="text-center">
        <h2 class="mt-5">Historial de Colores Generados:</h2>
        <?php
        // Si hay colores en la sesión, los mostramos            
        if (!empty($_SESSION['historial'])) {
            foreach (array_reverse($_SESSION['historial']) as $valor) {
                echo "<div class='d-inline-block m-2' style='width:50px; height:50px; background-color: $valor;' title='$valor'></div>";
            }
        } else {
            // Si todavía no hay colores generados
            echo "<p class='text-secondary'>Aún no has generado ningún color.</p>";
        }
        ?>
    </div>
</body>

</html>
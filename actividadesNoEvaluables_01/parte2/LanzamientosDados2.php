<?php
session_start(); // Necesario para usar variables de sesión

if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = [];
}

$resultado = "";

if (isset($_GET['lanzar'])) {
    $dado = rand(1, 6);

    $resultado = "Has sacado un " . $dado;
    $resultado .= "<br><img src='img/cara{$dado}.png' alt='Cara{$dado}' width='100' height='100'>";

    $_SESSION['historial'][] = $dado;
}

if (isset($_GET['reset'])) {
    $_SESSION['historial'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanzamientos Dados 2</title>
    <link rel="icon" href="img/dado.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="mb-4">Lanzar dado</h1>

        <form action="" method="get" class="mb-3">
            <button type="submit" name="lanzar" value="1" class="btn btn-success btn-lg">🎲 Tirar Dado</button>
            <button type="submit" name="reset" value="1" class="btn btn-danger btn-lg">♻️ Reiniciar Historial</button>
        </form>

        <div class="mt-4">
            <?php if ($resultado != "") echo "<div class='alert alert-info'>$resultado</div>"; ?>
        </div>

        <div class="mt-4">
            <h2>Historial de lanzamientos:</h2>
            <?php
            if (!empty($_SESSION['historial'])) {
                foreach ($_SESSION['historial'] as $index => $valor) {
                    echo "Lanzamiento " . ($index + 1) . ": " . $valor . "<br>";
                }
            } else {
                echo "No hay lanzamientos en el historial.";
            }
            ?>
        </div>
    </div>
</body>

</html>
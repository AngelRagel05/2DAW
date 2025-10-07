<?php
session_start(); // Necesario para usar variables de sesión

// Si no existe todavía el historial en la sesión, lo creamos como un array vacío
if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = [];
}

// Variable para mostrar el último resultado
$resultado = "";

// Si se pulsa el botón "Tirar dado" (GET['lanzar'])
if (isset($_GET['lanzar'])) {
    // Random del 1 al 6
    $dado = rand(1, 6);

    // Mostrar resultado
    $resultado = "Has sacado un " . $dado;
    $resultado .= "<br><img src='img/cara{$dado}.png' alt='Cara{$dado}' width='100' height='100'>";

    // Guardar este lanzamiento en el historial
    $_SESSION['historial'][] = $dado;
}

// Si el usuario pulsa "Reiniciar Historial", vaciamos el historial   ******Preguntar a Sergio como funciona esto**************
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
            // Si hay lanzamientos en la sesión, los mostramos            
            if (!empty($_SESSION['historial'])) {
                foreach ($_SESSION['historial'] as $index => $valor) {
                    echo "Lanzamiento " . ($index + 1) . ": " . $valor . "<br>";
                }
            } else {
                // Si todavía no hay lanzamientos                
                echo "No hay lanzamientos en el historial.";
            }
            ?>
        </div>
    </div>
</body>

</html>
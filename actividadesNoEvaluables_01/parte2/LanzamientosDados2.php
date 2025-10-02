<?php

$resultado = "";
$historial = [];

if (isset($_GET['lanzar'])) {
    $dado = rand(1, 6);

    $resultado = "Has sacado un " . $dado;

    $resultado .= "<br><img src='img/cara{$dado}.png' alt='Cara{$dado}' width='100' height='100'>";
}

if (isset($_GET['historial'])) {
    $historial[] = $dado;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanzamientos Dados 1</title>
    <link rel="icon" href="img/dado.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="mb-4">
            <form action="" method="get">
                <button type="submit" name="lanzar" value="1">Tirar Dado</button>
            </form>
        </h1>

        <div class="mt-4">
            <?php
            if ($resultado != "") {
                echo $resultado;
            }
            ?>
            <div class="mt-4">
                <h2>Historial de lanzamientos:</h2>
                <?php
                if (!empty($historial)) {
                    foreach ($historial as $index => $valor) {
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
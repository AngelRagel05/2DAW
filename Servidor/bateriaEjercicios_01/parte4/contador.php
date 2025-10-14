<?php
// Objetivo: usar GET + variables + cookies o parámetros simples.
// 1. Cada vez que visitas contador.php, aumenta un contador (?visitas=3, ?visitas=4, etc.).
// 2. Muestra: “Has visitado esta página X veces.”
// 3. Si no hay parámetro, empieza en 1.
// 4. Opción B: usa setcookie("visitas", …) para que no se borre al cerrar

$visitas = 1; // Valor por defecto
if (isset($_GET['visitas']) && is_numeric($_GET['visitas']) && $_GET['visitas'] >= 1) {
    $visitas = (int)$_GET['visitas'] + 1; // Incrementa el contador
}
setcookie("visitas", $visitas, time() + 3600 * 24 * 30); // Guarda en cookie por 30 días    
$frase = "Has visitado esta página $visitas veces.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 text-center" style="max-width: 400px; margin: auto;">
            <h2 class="mb-4">Contador de Visitas</h2>
            <p class="lead"><?php echo $frase; ?></p>
            <a href="contador.php?visitas=<?php echo $visitas; ?>" class="btn btn-primary mt-3">Visitar de nuevo</a>
        </div>
    </div>
</body>

</html>
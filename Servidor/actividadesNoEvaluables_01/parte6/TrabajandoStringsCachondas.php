<?php
$frase = "Hace frío tiempo frío que frío me frío estoy frío quedando frío contigo frío";

// Convertimos la frase en array
$arrayFrase = explode(" ", $frase);

// Forma A: quitar todas las palabras "frío"
$arraySinFrioA = [];
for ($i = 0; $i < count($arrayFrase); $i++) {
    if ($arrayFrase[$i] != "frío") {
        $arraySinFrioA[] = $arrayFrase[$i];
    }
}

// Forma B: palabras de posición par (0, 2, 4...) usando el array original
$arraySinFrioB = [];
for ($i = 0; $i < count($arrayFrase); $i++) {
    if ($i === 0 || $i % 2 === 0) {
        $arraySinFrioB[] = $arrayFrase[$i];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Cachondas</title>
    <link rel="icon" href="img/frio.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<?php
$frase = "Hace frío tiempo frío que frío me frío estoy frío quedando frío contigo frío";

// Convertimos la frase en array
$arrayFrase = explode(" ", $frase);

// Forma A: quitar todas las palabras "frío"
$arraySinFrioA = [];
for ($i = 0; $i < count($arrayFrase); $i++) {
    if ($arrayFrase[$i] != "frío") {
        $arraySinFrioA[] = $arrayFrase[$i];
    }
}

// Forma B: palabras de posición par (0, 2, 4...) usando el array original
$arraySinFrioB = [];
for ($i = 0; $i < count($arrayFrase); $i++) {
    if ($i % 2 === 0) {
        $arraySinFrioB[] = $arrayFrase[$i];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Cachondas</title>
    <link rel="icon" href="img/frio.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <!-- Tarjeta de frase original -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body text-center">
                <h1 class="card-title text-danger">Frase original</h1>
                <p class="card-text fs-4"><?php echo $frase; ?></p>
            </div>
        </div>

        <!-- Tarjeta Forma A -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body text-center">
                <h2 class="card-title text-primary">Sin 'frío'</h2>
                <p class="card-text fs-5"><?php echo implode(" ", $arraySinFrioA); ?></p>
            </div>
        </div>

        <!-- Tarjeta Forma B -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body text-center">
                <h2 class="card-title text-success">Palabras de posición par</h2>
                <p class="card-text fs-5"><?php echo implode(" ", $arraySinFrioB); ?></p>
            </div>
        </div>

        <!-- Imagen decorativa -->
        <div class="text-center my-4">
            <img src="img/helado.png" class="img-fluid rounded shadow" style="max-width:200px;" alt="Frío">
        </div>
    </div>

</body>

</html>
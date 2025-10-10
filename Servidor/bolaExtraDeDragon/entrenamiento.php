<?php
// Variables iniciales
$nivelGoku = isset($_GET['nivelGoku']) ? (int)$_GET['nivelGoku'] : 1000;
$diasEntrenamiento = isset($_GET['diasEntrenamiento']) ? (int)$_GET['diasEntrenamiento'] : 1;

// Control de errores
if ($diasEntrenamiento < 1) $diasEntrenamiento = 1;
if ($diasEntrenamiento > 10) $diasEntrenamiento = 10;

// Array de entrenamientos
$entrenamientos = ["Combate", "Meditación", "Vuelo", "Sala del tiempo"];

// Mejoras especiales (aleatorio)
$mejorasEspeciales = rand(0, 1) ? "par" : "impar";
$kaioKenActivado = false;
$itOver9000 = false;

// Variable para acumular mensajes
$mensajes = "";

// Función de entrenamiento
function entrenar($nivel, $tipo, $dia, $mejorasEspeciales, &$kaioKenActivado, &$itOver9000, &$mensajes)
{
    // Aplicar mejora especial si toca
    if (($mejorasEspeciales === "par" && $dia % 2 == 0) || ($mejorasEspeciales === "impar" && $dia % 2 != 0)) {
        $nivel *= 1.5;
        $kaioKenActivado = true;
        $mensajes .= "<div class='alert alert-danger fw-bold text-center w-50 mx-auto'>KAIO KEN x1.5 ACTIVADO!!</div>";
    }

    // Aumentar según tipo
    switch ($tipo) {
        case "Combate":
            $nivel += 1000;
            break;
        case "Meditación":
            $nivel += 300;
            break;
        case "Vuelo":
            $nivel += 200;
            break;
        case "Sala del tiempo":
            $nivel *= 1.5;
            break;
    }

    // Mensaje IT´S OVER 9000
    if (!$itOver9000 && $nivel > 9000) {
        $itOver9000 = true;
        $mensajes .= "<h1 class='text-warning display-3 fw-bold text-center' style='text-shadow:2px 2px black;'>IT'S OVER 9000!!!!</h1>";
    }

    // Mostrar estado
    $tipoSafe = htmlspecialchars($tipo, ENT_QUOTES, 'UTF-8');
    $mensajes .= "<div class='alert alert-info text-center w-50 mx-auto'>Día $dia: Goku ha entrenado con $tipoSafe y ha alcanzado el nivel $nivel.</div>";

    return $nivel;
}

// Simulación
if (isset($_GET['simulate']) && $_GET['simulate'] === "yes") {
    $diasEntrenamiento = rand(1, 10);
    for ($i = 1; $i <= $diasEntrenamiento; $i++) {
        $tipo = $entrenamientos[array_rand($entrenamientos)];
        $nivelGoku = entrenar($nivelGoku, $tipo, $i, $mejorasEspeciales, $kaioKenActivado, $itOver9000, $mensajes);
    }
} elseif (isset($_GET['entrenamiento'])) {
    // Entrenamiento manual
    $tipo = in_array($_GET['entrenamiento'], $entrenamientos) ? $_GET['entrenamiento'] : $entrenamientos[0];
    $nivelGoku = entrenar($nivelGoku, $tipo, $diasEntrenamiento, $mejorasEspeciales, $kaioKenActivado, $itOver9000, $mensajes);
}

// Mensaje final
if ($nivelGoku >= 100000) {
    $mensajes .= "<div class='alert alert-warning text-center w-50 mx-auto fw-bold'>💥 ¡Goku ha alcanzado el Ultra Instinto! 💥</div>";
} else {
    $mensajes .= "<div class='alert alert-danger text-center w-50 mx-auto fw-bold'>Goku necesita más entrenamiento...</div>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrenamiento Son Goku</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4 fw-bold">Entrenamiento de Goku</h1>

        <!-- Mensajes dinámicos -->
        <div class="text-center mb-4">
            <?php echo $mensajes; ?>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">

                <!-- Formulario manual -->
                <form method="GET" class="mb-3 p-4 border rounded bg-white shadow-sm">
                    <div class="mb-3">
                        <label class="form-label">Nivel de Goku:</label>
                        <input type="number" class="form-control" name="nivelGoku"
                            value="<?php echo htmlspecialchars($nivelGoku); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Días de entrenamiento:</label>
                        <input type="number" class="form-control" name="diasEntrenamiento"
                            value="<?php echo htmlspecialchars($diasEntrenamiento); ?>" min="1" max="10">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo de entrenamiento:</label>
                        <select name="entrenamiento" class="form-select">
                            <?php foreach ($entrenamientos as $ent) {
                                $entSafe = htmlspecialchars($ent);
                                echo "<option value='$entSafe'>$entSafe</option>";
                            } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Entrenar</button>
                </form>

                <!-- Botón de simulación -->
                <form method="GET">
                    <input type="hidden" name="simulate" value="yes">
                    <button type="submit" class="btn btn-danger w-100">Simular entrenamiento</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
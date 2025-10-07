<?php
$nombre = "";
$edadCanina = "";
$mensajeError = "";

if (isset($_GET['calcular'])) {
    $nombre = trim($_GET['nombre']);
    $edadHumana = trim($_GET['edadHumana']);

    if (is_numeric($edadHumana) && $edadHumana >= 0) {
        if ($edadHumana <= 2) {
            $edadCanina = $edadHumana * 10.5;
        } else {
            $edadCanina = 21 + (($edadHumana - 2) * 4);
        }
    } else {
        $mensajeError = "⚠️ Por favor, introduce una edad humana válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Edad Canina</title>
    <link rel="icon" href="img/perro.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg p-4 text-center" style="width: 350px;">
        <h2 class="mb-4">🐾 Calculadora de Edad Canina</h2>

        <!-- Formulario -->
        <form method="GET" action="">
            <div class="mb-3">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del perro"
                       value="<?php echo htmlspecialchars($nombre); ?>">
            </div>

            <div class="mb-3">
                <input type="number" class="form-control" name="edadHumana" placeholder="Edad humana (en años)">
            </div>

            <button type="submit" name="calcular" class="btn btn-primary w-100">
                Calcular edad canina
            </button>
        </form>

        <!-- Resultado -->
        <?php if ($edadCanina != ""): ?>
            <div class="alert alert-success mt-4">
                🐕 La edad canina de <strong><?php echo htmlspecialchars($nombre); ?></strong> es 
                <strong><?php echo $edadCanina; ?></strong> años.
            </div>
        <?php elseif ($mensajeError != ""): ?>
            <div class="alert alert-danger mt-4"><?php echo $mensajeError; ?></div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$valor1 = $_GET['valor1'] ?? null;
$valor2 = $_GET['valor2'] ?? null;
$operacion = $_GET['operacion'] ?? null;
$resultado = null;

if ($operacion !== null) {
    switch ($operacion) {
        case 'and':
            $resultado = ($valor1 && $valor2) ? "Verdadero" : "Falso";
            break;
        case 'or':
            $resultado = ($valor1 || $valor2) ? "Verdadero" : "Falso";
            break;
        case 'xor':
            $resultado = ($valor1 xor $valor2) ? "Verdadero" : "Falso";
            break;
        case 'suma':
            $resultado = $valor1 + $valor2;
            break;
        case 'resta':
            $resultado = $valor1 - $valor2;
            break;
        default:
            $resultado = "Operación no válida";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora / Comparador</title>
    <link rel="icon" href="img/calculadora.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="mb-4 text-center">Calculadora / Comparador</h2>
            <form action="" method="get" class="row g-3 text-center">
                <div class="col-md-4">
                    <label class="form-label">Introduce el primer valor</label>
                    <input type="text" class="form-control" name="valor1" placeholder="Valor 1">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Elige operación</label>
                    <select name="operacion" class="form-select">
                        <option value="and">AND (&&)</option>
                        <option value="or">OR (||)</option>
                        <option value="xor">XOR</option>
                        <option value="suma">Suma (+)</option>
                        <option value="resta">Resta (-)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Introduce el segundo valor</label>
                    <input type="text" class="form-control" name="valor2" placeholder="Valor 2">
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Calcular</button>
                </div>
            </form>
        </div>

        <?php
        if ($resultado !== null) {
            if ($resultado === "Verdadero") {
                echo "<div class='alert alert-success text-center mt-4'><strong>Resultado lógico:</strong> $resultado</div>";
            } elseif ($resultado === "Falso") {
                echo "<div class='alert alert-danger text-center mt-4'><strong>Resultado lógico:</strong> $resultado</div>";
            } elseif (is_numeric($resultado)) {
                echo "<div class='alert alert-info text-center mt-4'><strong>Resultado numérico:</strong> $resultado</div>";
            } else {
                echo "<div class='alert alert-warning text-center mt-4'><strong>Error:</strong> $resultado</div>";
            }
        }
        ?>
    </div>

</body>

</html>
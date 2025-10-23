<?php
$resultado = "";
$num1 = "";
$num2 = "";
$operacion = "";

if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])) {
    $num1 = (float)$_GET['num1'];
    $num2 = (float)$_GET['num2'];
    $operacion = $_GET['operacion'];

    switch ($operacion) {
        case '+':
            $resultado = $num1 + $num2;
            break;
        case '-':
            $resultado = $num1 - $num2;
            break;
        case '*':
            $resultado = $num1 * $num2;
            break;
        case '/':
            $resultado = ($num2 != 0) ? $num1 / $num2 : "Error: división por 0";
            break;
        case 'mayor':
            $resultado = max($num1, $num2);
            break;
        case 'menor':
            $resultado = min($num1, $num2);
            break;
        case 'igual':
            $resultado = ($num1 == $num2) ? "Sí" : "No";
            break;
        default:
            $resultado = "Operación no válida";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Operacione Mixtas</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4" style="max-width: 500px; margin: auto;">
            <h2 class="text-center mb-4">Calculadora de Operaciones Mixtas</h2>

            <form method="get">
                <div class="row g-3 mb-3">
                    <div class="col-md-5">
                        <label for="num1" class="form-label">Número 1</label>
                        <input type="number" step="any" name="num1" id="num1" class="form-control"
                            value="<?php echo htmlspecialchars($num1); ?>" required>
                    </div>

                    <div class="col-md-2 text-center">
                        <label for="operacion" class="form-label">Operación</label>
                        <select name="operacion" id="operacion" class="form-select" required>
                            <option value="+" <?php if ($operacion == '+') echo 'selected'; ?>>+</option>
                            <option value="-" <?php if ($operacion == '-') echo 'selected'; ?>>-</option>
                            <option value="*" <?php if ($operacion == '*') echo 'selected'; ?>>*</option>
                            <option value="/" <?php if ($operacion == '/') echo 'selected'; ?>>/</option>
                            <option value="mayor" <?php if ($operacion == 'mayor') echo 'selected'; ?>>mayor</option>
                            <option value="menor" <?php if ($operacion == 'menor') echo 'selected'; ?>>menor</option>
                            <option value="igual" <?php if ($operacion == 'igual') echo 'selected'; ?>>igual</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="num2" class="form-label">Número 2</label>
                        <input type="number" step="any" name="num2" id="num2" class="form-control"
                            value="<?php echo htmlspecialchars($num2); ?>" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Calcular</button>
                </div>
            </form>

            <?php if ($resultado !== ""): ?>
                <div class="alert alert-info mt-4 text-center fs-5">
                    <strong>Resultado:</strong> <?php echo $resultado; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
<?php
// Inicializamos variables
$frase = "";
$sujeto = "";
$accion = "";
$cierre = "";

// Si el formulario se ha enviado (hay parámetros en $_GET)
if (isset($_POST['sujeto']) && isset($_POST['accion']) && isset($_POST['cierre'])) {
    $sujeto = $_POST['sujeto'];
    $accion = $_POST['accion'];
    $cierre = $_POST['cierre'];

    // Construir frase concatenando
    $frase = $sujeto . $accion . $cierre . ".";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generadar de Excusas</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>

<body>
    <div class="container mt-5">

        <div class="text-center mb-4">
            <h2>Generador de Excusas</h2>
            <p>Selecciona cada parte de tu excusa y haz clic en "Generar"</p>
        </div>

        <div class="card shadow-sm p-4">
            <form method="post">
                <div class="row g-3">

                    <!-- Sujeto -->
                    <div class="col-md-4">
                        <label for="sujeto" class="form-label">Sujeto</label>
                        <select name="sujeto" id="sujeto" class="form-select">
                            <option value="Mi gato">Mi gato</option>
                            <option value="El jefe">El jefe</option>
                            <option value="Mi vecino">Mi vecino</option>
                            <option value="El profe de DAW">El profe de DAW</option>
                            <option value="Mi ordenador">Mi ordenador</option>
                        </select>
                    </div>

                    <!-- Acción -->
                    <div class="col-md-4">
                        <label for="accion" class="form-label">Acción</label>
                        <select name="accion" id="accion" class="form-select">
                            <option value=" se comió ">se comió</option>
                            <option value=" perdió ">perdió</option>
                            <option value=" rompió ">rompió</option>
                            <option value=" olvidó ">olvidó</option>
                            <option value=" borró ">borró</option>
                        </select>
                    </div>

                    <!-- Cierre -->
                    <div class="col-md-4">
                        <label for="cierre" class="form-label">Cierre</label>
                        <select name="cierre" id="cierre" class="form-select">
                            <option value="mi trabajo">mi trabajo</option>
                            <option value="las llaves">las llaves</option>
                            <option value="la base de datos">la base de datos</option>
                            <option value="los apuntes">los apuntes</option>
                            <option value="el servidor">el servidor</option>
                        </select>
                    </div>

                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Generar excusa</button>
                </div>
            </form>
        </div>

        <?php if ($frase !== ""): ?>
            <div class="card mt-5 shadow-sm p-4 text-center">
                <h4 class="text-primary">¡Tu excusa es!</h4>
                <p class="fs-4"><?php echo $frase; ?></p>
            </div>
        <?php endif; ?>

    </div>
</body>

</html>
<?php
// Inicializamos variable de resultado
$frase = "";

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
    <title>Frases Cuñados</title>
    <link rel="icon" href="img/cuñado.png">
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="mb-4 text-center">Constructor de Cuñados</h2>

            <form action="" method="post">

                <!-- Sujeto -->
                <div class="mb-3">
                    <label for="sujeto" class="form-label">Elige un sujeto:</label>
                    <select class="form-select" name="sujeto" id="sujeto">
                        <option value="Yo en tu lugar">Yo en tu lugar</option>
                        <option value="La verdad es que">La verdad es que</option>
                        <option value="Tú sabes que">Tú sabes que</option>
                        <option value="No hay duda de que">No hay duda de que</option>
                        <option value="Al final">Al final</option>
                    </select>
                </div>

                <!-- Acción -->
                <div class="mb-3">
                    <label for="accion" class="form-label">Elige una acción:</label>
                    <select class="form-select" name="accion" id="accion">
                        <option value=" siempre hay que invertir en ">Siempre hay que invertir en</option>
                        <option value=" lo importante es ">Lo importante es</option>
                        <option value=" nunca subestimes ">Nunca subestimes</option>
                        <option value=" yo siempre digo que ">Yo siempre digo que</option>
                        <option value=" el secreto está en ">El secreto está en</option>
                    </select>
                </div>

                <!-- Cierre -->
                <div class="mb-3">
                    <label for="cierre" class="form-label">Elige un cierre:</label>
                    <select class="form-select" name="cierre" id="cierre">
                        <option value="la bolsa de valores">La bolsa de valores</option>
                        <option value="el no tener dinero congelado en el banco">El no tener dinero congelado en el banco</option>
                        <option value="los chemtrails">Los chemtrails</option>
                        <option value="la nube">La nube</option>
                        <option value="las criptocoins">Las criptocoins</option>
                    </select>
                </div>

                <!-- Botón -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar formulario</button>
                </div>
            </form>
        </div>

        <?php
        if ($frase != "") {
            // Mostrar la frase
            echo "<div class='alert alert-info mt-4 text-center'>$frase</div>";

            // Generar imagen random entre 1 y 4
            $numImg = rand(1, 4);
            $imagen = "img/random{$numImg}.png";

            // Mostrar la imagen
            echo "<div class='text-center mt-3'>
            <img src='$imagen' alt='Imagen cuñada' class='img-fluid rounded shadow' style='max-width:200px;'>
          </div>";
        }
        ?>

    </div>

</body>

</html>
<?php
// Inicializamos variables
$frase = "";
$sujeto = "";
$accion = "";
$cierre = "";

// Arrays para aleatorio
$sujetos = [
    "Yo en tu lugar", 
    "La verdad es que", 
    "Tú sabes que", 
    "No hay duda de que", 
    "Al final",
    "Está claro que", 
    "Como siempre digo", 
    "No podemos olvidar que", 
    "Sin duda", 
    "Debes recordar que"
];

$acciones = [
    "siempre hay que invertir en", 
    "lo importante es", 
    "nunca subestimes", 
    "yo siempre digo que", 
    "el secreto está en",
    "conviene prestar atención a", 
    "hay que cuidar", 
    "siempre se debe valorar", 
    "es fundamental entender", 
    "no olvides analizar"
];

$cierres = [
    "la bolsa de valores", 
    "el no tener dinero congelado en el banco", 
    "los chemtrails", 
    "la nube", 
    "las criptocoins",
    "los intereses compuestos", 
    "el mercado inmobiliario", 
    "la energía solar", 
    "las inversiones alternativas", 
    "el ahorro inteligente"
];

// Si se pulsa enviar formulario
if (isset($_POST['submit'])) {
    // Valores de selects
    $sujeto = $_POST['sujeto'] ?? "";
    $accion = $_POST['accion'] ?? "";
    $cierre = $_POST['cierre'] ?? "";

    // Inputs custom
    $sujeto_custom = trim($_POST['sujeto_custom'] ?? "");
    $accion_custom = trim($_POST['accion_custom'] ?? "");
    $cierre_custom = trim($_POST['cierre_custom'] ?? "");

    // Prioridad a los inputs custom si no están vacíos
    if ($sujeto_custom !== "") $sujeto = $sujeto_custom;
    if ($accion_custom !== "") $accion = $accion_custom;
    if ($cierre_custom !== "") $cierre = $cierre_custom;

    $frase = $sujeto . " " . $accion . " " . $cierre . ".";

}

// Si se pulsa generar aleatoria
if (isset($_POST['random'])) {
    $sujeto = $sujetos[array_rand($sujetos)];
    $accion = $acciones[array_rand($acciones)];
    $cierre = $cierres[array_rand($cierres)];

    $frase = $sujeto . " " . $accion . " " . $cierre . ".";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frases Cuñados</title>
    <link rel="icon" href="img/cuñado.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-light">

    <div class="container mt-2">
        <div class="card shadow p-3">
            <h3 class="mb-4 text-center">Constructor de Cuñados</h3>

            <form action="" method="post">

                <!-- Sujeto -->
                <div class="mb-3">
                    <label for="sujeto" class="form-label">Elige un sujeto:</label>

                    <!-- Select de sujeto -->
                    <select class="form-select" name="sujeto" id="sujeto">
                        <?php
                        // Recorremos el array $sujetos y creamos una <option> por cada elemento
                        foreach ($sujetos as $opt): ?>
                            <option value="<?php echo $opt; ?>">
                                <?php echo $opt; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Input de texto para escribir un sujeto personalizado -->
                    <!-- Si este campo no está vacío, en el PHP tendrá prioridad sobre el select -->
                    <input type="text" class="form-control mt-2"
                        name="sujeto_custom"
                        placeholder="O escribe tu propio sujeto">
                </div>


                <!-- Acción -->
                <div class="mb-3">
                    <label for="accion" class="form-label">Elige una acción:</label>

                    <!-- Select de acción -->
                    <select class="form-select" name="accion" id="accion">
                        <?php
                        // Igual que antes, generamos <option> por cada acción del array $acciones
                        foreach ($acciones as $opt): ?>
                            <option value="<?php echo $opt; ?>">
                                <?php echo trim($opt); // trim quita espacios innecesarios al mostrar 
                                ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Input custom para acción -->
                    <input type="text" class="form-control mt-2"
                        name="accion_custom"
                        placeholder="O escribe tu propia acción">
                </div>


                <!-- Cierre -->
                <div class="mb-3">
                    <label for="cierre" class="form-label">Elige un cierre:</label>

                    <!-- Select de cierre -->
                    <select class="form-select" name="cierre" id="cierre">
                        <?php
                        // Recorremos el array $cierres para mostrar las opciones
                        foreach ($cierres as $opt): ?>
                            <option value="<?php echo $opt; ?>">
                                <?php echo $opt; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Input custom para cierre -->
                    <input type="text" class="form-control mt-2"
                        name="cierre_custom"
                        placeholder="O escribe tu propio cierre">
                </div>

                <!-- Botón -->
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Enviar formulario</button>
                    <button type="submit" name="random" class="btn btn-primary">Generar aleatoria</button>
                </div>
            </form>
        </div>

        <?php
        if ($frase !== "") {
            // Mostrar la frase
            echo "<div class='alert alert-info mt-4 text-center'>$frase</div>";

            // Generar imagen random entre 1 y 8
            $numImg = rand(1, 8);
            $imagen = "img/random{$numImg}.png";

            // Mostrar la imagen
            echo "<div class='text-center mt-3'>
            <img src='$imagen' alt='Imagen cuñada' class='img-fluid rounded shadow' style='max-width:200px;'></div>";
        }
        ?>
    </div>

</body>

</html>
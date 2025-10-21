<?php

if (!empty($_GET['centro'])) {  // verifica que exista y que no esté vacío
    $centro = strtolower($_GET['centro']);

    if ($centro === "ilerna") {
        header("Location: https://www.ilerna.es/");
        exit();
    } else {
        $echado = "Booooo! Fueraaaa!!!";
    }
} else {
    $noEspecificado = "No se ha especificado ningún centro.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get" action="redirigir2.php">
        <label for="centro">Introduce el centro</label>
        <input type="text" name="centro" id="centro">
        <button type="submit">Enviar</button>
    </form>

    <?php
    if (isset($echado)) {
        echo "<p>$echado</p>";
    }
    if (isset($noEspecificado)) {
        echo "<p>$noEspecificado</p>";
    }
    ?>
</body>

</html>
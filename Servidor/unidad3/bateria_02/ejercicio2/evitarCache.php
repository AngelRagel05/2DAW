<?php
// Evitar que la página se almacene en caché
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Fecha de expiración en el pasado

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Sin Caché</title>
</head>

<body>
    <h1>Esta página nunca se almacenará en caché</h1>
    <p>Cada vez que la visitas, el navegador solicita el contenido al servidor.</p>
</body>

</html>
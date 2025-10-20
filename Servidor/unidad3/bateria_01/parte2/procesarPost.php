<?php 

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['telefono'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos recibidos (POST)</title>
</head>
<body>
    <h1>Datos recibidos mediante GET</h1>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>
</body>
</html>
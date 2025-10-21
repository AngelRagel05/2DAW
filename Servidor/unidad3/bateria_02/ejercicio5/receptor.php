<?php
// Comprobamos si la cookie 'centro' existe
if (!isset($_COOKIE['centro'])) {
    // Si no existe o ha expirado, redirigimos al formulario
    header("Location: form.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptor de Cookie</title>
</head>
<body>
    <h1>Valor de la cookie 'centro'</h1>
    <p>La cookie contiene: <strong><?php echo htmlspecialchars($_COOKIE['centro']); ?></strong></p>
    <p>Refresca la página para probar la expiración de 1 minuto.</p>
</body>
</html>

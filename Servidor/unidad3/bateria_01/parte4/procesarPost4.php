<?php
// procesarPost4.php - versión segura (POST) con sanitización y escape en salida
header('Content-Type: text/html; charset=utf-8');

// CSP básica: evita scripts inline/externos. Ajusta según tus necesidades.
header("Content-Security-Policy: default-src 'self'; script-src 'self'; object-src 'none';");

// Inicializar
$nombre = '';
$email = '';
$telefono = '';
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogida segura: obtenemos raw y hacemos trim.
    // NOTA: no dependas sólo del filtro de entrada para XSS — escapar al output es lo esencial.
    $nombre_raw   = trim((string)filter_input(INPUT_POST, 'nombre', FILTER_UNSAFE_RAW) ?? '');
    $email_raw    = trim((string)filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW) ?? '');
    $telefono_raw = trim((string)filter_input(INPUT_POST, 'telefono', FILTER_UNSAFE_RAW) ?? '');

    // Normalización opcional (quita caracteres de control)
    $nombre = preg_replace('/[\x00-\x1F\x7F]/u', '', $nombre_raw);
    $email  = preg_replace('/[\x00-\x1F\x7F]/u', '', $email_raw);
    $telefono = preg_replace('/[^\d]/', '', $telefono_raw); // dejar sólo dígitos para validar

    // Validaciones
    if ($nombre === '') {
        $errores[] = "El nombre es obligatorio.";
    } elseif (mb_strlen($nombre, 'UTF-8') > 200) {
        $errores[] = "El nombre es demasiado largo (máx 200 caracteres).";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    } elseif (mb_strlen($email, 'UTF-8') > 320) {
        $errores[] = "El correo electrónico es demasiado largo.";
    }

    // Teléfono: exactamente 9 dígitos (España)
    if (!preg_match('/^[0-9]{9}$/', $telefono)) {
        $errores[] = "El número de teléfono debe contener exactamente 9 dígitos numéricos.";
    }
}

// Helper: escape on output (siempre usar al imprimir)
function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Procesar POST (seguro)</title>
</head>
<body>
  <h1>Procesar POST (seguro)</h1>

  <?php if (!empty($errores)): ?>
    <h2>Errores encontrados:</h2>
    <ul>
      <?php foreach ($errores as $err): ?>
        <li><?php echo e($err); ?></li>
      <?php endforeach; ?>
    </ul>
  <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <h2>Datos enviados correctamente:</h2>
    <p>Nombre: <?php echo e($nombre); ?></p>
    <p>Correo Electrónico: <?php echo e($email); ?></p>
    <p>Teléfono: <?php echo e($telefono); ?></p>
  <?php else: ?>
    <p>No se han enviado datos todavía.</p>
  <?php endif; ?>

</body>
</html>

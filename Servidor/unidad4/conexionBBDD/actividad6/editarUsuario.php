<?php
require_once "config.php";
session_start();

if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id'])) {
    die("Falta id.");
}

$id = (int) $_GET['id'];
$errors = [];
$success = "";

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Procesar POST (actualizar)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $new_password = $_POST['password'] ?? '';

        if ($nombre_usuario === '') $errors[] = "Nombre de usuario obligatorio.";
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email inválido.";

        if (empty($errors)) {
            // Comprobar duplicado de email (excepto este mismo usuario)
            $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND id != :id");
            $check->bindValue(':email', $email, PDO::PARAM_STR);
            $check->bindValue(':id', $id, PDO::PARAM_INT);
            $check->execute();

            if ($check->rowCount() > 0) {
                $errors[] = "El email ya está en uso por otro usuario.";
            } else {
                if ($new_password !== '') {
                    $hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $upd = $pdo->prepare("UPDATE usuarios SET nombre_usuario = :nombre_usuario, email = :email, password = :password WHERE id = :id");
                    $upd->bindValue(':password', $hash, PDO::PARAM_STR);
                } else {
                    $upd = $pdo->prepare("UPDATE usuarios SET nombre_usuario = :nombre_usuario, email = :email WHERE id = :id");
                }

                $upd->bindValue(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);
                $upd->bindValue(':email', $email, PDO::PARAM_STR);
                $upd->bindValue(':id', $id, PDO::PARAM_INT);
                $upd->execute();

                $success = "Usuario actualizado correctamente.";
                // Si hemos actualizado el usuario logueado, actualizar el nombre en sesión
                if ($_SESSION['user_id'] == $id) {
                    $_SESSION['user_name'] = $nombre_usuario;
                }
            }
        }
    }

    // Cargar datos actuales
    $stmt = $pdo->prepare("SELECT id, nombre_usuario, email FROM usuarios WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Usuario no encontrado.");
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar usuario</title></head>
<body>
<h2>Editar usuario</h2>

<?php if ($success): ?><p><?= htmlspecialchars($success) ?></p><?php endif; ?>
<?php if (!empty($errors)): ?>
    <ul><?php foreach ($errors as $err): ?><li><?= htmlspecialchars($err) ?></li><?php endforeach; ?></ul>
<?php endif; ?>

<form method="post" action="">
    <label>Nombre usuario:</label><br>
    <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($user['nombre_usuario']) ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"><br><br>

    <label>Nueva contraseña (dejar vacío para no cambiar):</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Actualizar">
</form>

<p><a href="usuarios.php">Volver al listado</a></p>
</body>
</html>

<?php
require_once "config.php";
session_start();

if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
    header('Location: usuarios.php');
    exit;
}

$id = (int) $_POST['id'];

// No permitir eliminar al propio usuario por seguridad (opcional)
if ($id === (int)$_SESSION['user_id']) {
    // Redirigir con mensaje si quieres; aquí solo volvemos al listado
    header('Location: usuarios.php');
    exit;
}

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $del = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $del->bindValue(':id', $id, PDO::PARAM_INT);
    $del->execute();
} catch (PDOException $e) {
    // Podrías manejar el error y mostrar mensaje; aquí redirigimos
}

header('Location: usuarios.php');
exit;

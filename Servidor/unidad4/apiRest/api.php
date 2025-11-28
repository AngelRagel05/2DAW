<?php
// api.php
header("Content-Type: application/json");

// Conectar con la base de datos
$mysql = new mysqli("localhost", "root", "", "empresa");

// Obtener el metodo HTTP
$metodo = $_SERVER["REQUEST_METHOD"];

// Obtener el recurso solicitado
$recurso = $_GET["recurso"] ?? "empleados";

// Enrutar egún metodo HTTP
switch ($metodo) {

    case "GET":
        if ($recurso == "empleados") {
            $resultado = $mysql->query("SELECT * FROM empleados");
            $productos = $resultado->fetch_all(MYSQLI_ASSOC);
            echo json_encode($productos);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Recurso no encontrado"]);
        }
        break;

    case "POST":
        if ($recurso == "empleados") {
            // Crear nuevo producto
            $datos = json_decode(file_get_contents("php://input"), true);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Recurso no encontrado"]);
        }

        $stmt = $mysql->prepare("INSERT INTO empleados (nombre, puesto, salario) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $datos["nombre"], $datos["puesto"], $datos["salario"]);
        $stmt->execute();
        echo json_encode(["mensaje" => "Empleado creado", "id" => $stmt->insert_id]);
        break;

    case "PUT":
        // Logica para actualizar un recurso
        break;

    case "DELETE":
        // Logica para eliminar un recurso
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}









?>
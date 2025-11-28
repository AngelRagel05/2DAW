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
        if ($recurso == "empleados" && isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            $datos = json_decode(file_get_contents("php://input"), true);
            $stmt = $mysql->prepare("UPDATE empleados SET nombre=?, puesto=?, salario=? WHERE id=?");
            $stmt->bind_param("ssdi", $datos["nombre"], $datos["puesto"], $datos["salario"], $id);
            if ($stmt->execute()) {
                echo json_encode(["mensaje" => "Empleado actualizado"]);
            } else {
                http_response_code(500);
                echo json_encode(["error" => "Error al actualizar empleado"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Falta el ID del empleado"]);
        }
        break;

    case "DELETE":
        if ($recurso == "empleados" && isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            $stmt = $mysql->prepare("DELETE FROM empleados WHERE id=?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo json_encode(["mensaje" => "Empleado eliminado"]);
            } else {
                http_response_code(500);
                echo json_encode(["error" => "Error al eliminar empleado"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Falta el ID del empleado"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}

<?php
// Conexión a la base de datos
require_once '../includes/conec_db.php';

$data = json_decode(file_get_contents("php://input"), true);
$IDUsuario = $data["iDUsuario"];
$accion = $data["accion"];

//echo json_encode( $data);
//$response = ["success" => false];

try {
    if ($accion == "TraerSeguidos") {
        // Inserta el favorito
        $sql = "SELECT 1 from usuarios_seguidos WHERE id_seguidor = :idUsuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $IDUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $tablas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    if ($accion == "TraerSeguidores") {
        $sql = "SELECT 1 from usuarios_seguidos WHERE id_seguido = :idUsuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $IDUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $tablas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    echo json_encode( $e->getMessage());
    $response["error"] = $e->getMessage();
}

// Retorna la respuesta como JSON
header("Content-Type: application/json");

echo json_encode($tablas, JSON_PRETTY_PRINT);
?>

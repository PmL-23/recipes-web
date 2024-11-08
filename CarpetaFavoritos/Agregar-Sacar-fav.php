<?php
// Conexión a la base de datos
require_once '../includes/conec_db.php';

$data = json_decode(file_get_contents("php://input"), true);
$idUsuario = $data["idUsuario"];
$accion = $data["accion"];

$response = ["success" => false];

try {
    if ($accion === "agregar") {
        // Inserta el favorito
        $sql = "INSERT INTO favoritos (`id_favorito`, `id_publicacion`, `id_usuario`) VALUES (NULL, :idPublicacion, :idUsuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        // Agrega la publicación si se necesita el ID de la publicación
        $stmt->execute();
        $response["success"] = true;
    } elseif ($accion === "eliminar") {
        // Elimina el favorito
        $sql = "DELETE FROM favoritos WHERE id_usuario = :idUsuario AND id_publicacion = :idPublicacion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        // Agrega la publicación si se necesita el ID de la publicación
        $stmt->execute();
        $response["success"] = true;
    }
} catch (Exception $e) {
    $response["error"] = $e->getMessage();
}

// Retorna la respuesta como JSON
header("Content-Type: application/json");
echo json_encode($response);
?>

<?php
// Conexión a la base de datos
require_once '../includes/conec_db.php';

$data = json_decode(file_get_contents("php://input"), true);
$IDUsuario = $data["iDUsuario"];
$IDPublicacion = $data["iDPublicacion"];
$accion = $data["accion"];

//echo json_encode( $data);
$response = ["success" => false];

try {
    if ($accion === "agregar") {
        // Inserta el favorito
        $sql = "INSERT INTO favoritos (id_publicacion, id_usuario) VALUES (:idPublicacion, :idUsuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $IDUsuario, PDO::PARAM_INT);
        $stmt->bindParam(":idPublicacion", $IDPublicacion, PDO::PARAM_INT);
        // Agrega la publicación si se necesita el ID de la publicación
        $stmt->execute();
        $response["success"] = true;
    } elseif ($accion === "eliminar") {
        // Elimina el favorito
        $sql = "DELETE FROM favoritos WHERE id_usuario = :idUsuario AND id_publicacion = :idPublicacion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $IDUsuario, PDO::PARAM_INT);
        $stmt->bindParam(":idPublicacion", $IDPublicacion, PDO::PARAM_INT);
        $stmt->execute();
        $response["success"] = true;
    }
    elseif ($accion === "consultar") {
        // Elimina el favorito
        $sql = "SELECT 1 from favoritos WHERE id_usuario = :idUsuario AND id_publicacion = :idPublicacion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $IDUsuario, PDO::PARAM_INT);
        $stmt->bindParam(":idPublicacion", $IDPublicacion, PDO::PARAM_INT);
        $stmt->execute();
        $existFav = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($existFav)  == 0){
            $response["success"] = false;
        }
        if (count($existFav) == 1){
            $response["success"] = true;
        }
    }
} catch (Exception $e) {
    echo json_encode( $e->getMessage());
    $response["error"] = $e->getMessage();
}

// Retorna la respuesta como JSON
header("Content-Type: application/json");
echo json_encode($response);
?>

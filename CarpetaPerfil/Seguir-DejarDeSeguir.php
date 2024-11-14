<?php
// Conexión a la base de datos
require_once '../includes/conec_db.php';

$data = json_decode(file_get_contents("php://input"), true);
$IDUsuarioSession = (int)$data["IDUsuarioSession"];
$IDUsuarioASeguir = (int)$data["IDUsuarioASeguir"];
$accion = $data["accion"];


try {
    if ($accion === "Seguir") {
        $sql = "INSERT INTO usuarios_seguidos (id_seguido, id_seguidor) VALUES (:idcuenta, :idsession)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idsession", $IDUsuarioSession, PDO::PARAM_INT);
        $stmt->bindParam(":idcuenta", $IDUsuarioASeguir, PDO::PARAM_INT);
        $stmt->execute();
        $response["success"] = true;
    } elseif ($accion === "Siguiendo") {
        $sql = "DELETE FROM usuarios_seguidos WHERE id_seguido = :idcuenta AND id_seguidor = :idsession";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idsession", $IDUsuarioSession, PDO::PARAM_INT);
        $stmt->bindParam(":idcuenta", $IDUsuarioASeguir, PDO::PARAM_INT);
        $stmt->execute();
        $response["success"] = true;
    }
    elseif ($accion === "consultar") {
        // Elimina el favorito
        $sql = "SELECT 1 from usuarios_seguidos WHERE id_seguido = :idcuenta AND id_seguidor = :idsession";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":idsession", $IDUsuarioSession, PDO::PARAM_INT);
        $stmt->bindParam(":idcuenta", $IDUsuarioASeguir, PDO::PARAM_INT);
        $stmt->execute();
        $existfollow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($existfollow)  == 0){
            $response["success"] = false;
        }
        if (count($existfollow) == 1){
            $response["success"] = true;
        }
    }
} catch (Exception $e) {
//    echo json_encode( $e->getMessage());
$response["error"] = $e->getMessage();
}

// Retorna la respuesta como JSON
header("Content-Type: application/json");
echo json_encode($response);
?>

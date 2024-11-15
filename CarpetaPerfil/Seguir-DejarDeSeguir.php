<?php
require_once '../includes/conec_db.php';
require_once('../notificaciones/notificacion.php');
require_once('../includes/seguidores.php'); 

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

        agregarNotificacion($conn, $IDUsuarioSession, null, $IDUsuarioASeguir, 'nuevo_seguidor');
        
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
    $response["error"] = $e->getMessage();
}

header("Content-Type: application/json");
echo json_encode($response);
?>

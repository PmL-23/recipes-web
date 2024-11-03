<?php
function obtenerSeguidores($conn, $idUsuario) {
    $query = "SELECT id_seguidor FROM usuarios_seguidos WHERE id_seguido = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$idUsuario]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
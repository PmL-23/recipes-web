<?php
session_start();
include '../includes/conec_db.php';

if (!isset($_SESSION['id'])) {
    echo json_encode(["error" => "No autorizado"]);
    exit();
}

$id_usuario = $_SESSION['id'];

// Obtener el nombre de la imagen anterior
$sql = "SELECT foto_usuario FROM usuarios WHERE id_usuario = :id_usuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Datos del archivo
$nombreArchivo = $_FILES['imagen']['name'];
$rutaTemporal = $_FILES['imagen']['tmp_name'];

// Carpeta destino
$carpetaDestino = '../fotos_usuario/';

//Genera un nombre único para evitar sobrescribir archivos
$nombreArchivoUnico = uniqid() . '_' . basename($nombreArchivo);
$rutaDestino = $carpetaDestino . $nombreArchivoUnico;

if (empty($_FILES["imagen"])) {
    echo json_encode(["error" => "No se seleccionó ninguna imagen"]);
    exit();
}

if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
    // Si hay una imagen anterior, la elimina del filesystem
    if ($usuario && file_exists($carpetaDestino . $usuario['foto_usuario'])) {
        unlink($carpetaDestino . $usuario['foto_usuario']);
    }

    $sqlQuery = "UPDATE usuarios SET foto_usuario = :foto_usuario WHERE id_usuario = :id_usuario";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bindParam(':foto_usuario', $rutaDestino, PDO::PARAM_STR);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Imagen actualizada", "foto_usuario" => $nombreArchivoUnico]);
    } else {
        echo json_encode(["error" => "Error al actualizar la imagen en la base de datos"]);
    }
} else {
    echo json_encode(["error" => "Error al mover el archivo"]);
}
?>


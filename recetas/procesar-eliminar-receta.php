<?php
session_start();
include '../includes/conec_db.php';


if (isset($_SESSION['id'])) {
    $id_usuario_autor = $_SESSION['id'];
} else {
    $errors[] = 'No se ha proporcionado un ID válido: usuario';
}


if (isset($_GET['id'])) {
    $id_publicacion = $_GET['id'];
} else {
    $errors[] = 'No se ha proporcionado un ID válido: publicación';
}


if (empty($errors)) {
    
        $queries = [
            "DELETE FROM notificaciones WHERE id_publicacion = :id_publicacion",
            "DELETE FROM ingredientes_recetas WHERE id_publicacion = :id_publicacion",
            "DELETE FROM etiquetas_recetas WHERE id_publicacion = :id_publicacion",
            "DELETE FROM paises_recetas WHERE id_publicacion = :id_publicacion",
            "DELETE FROM valoraciones WHERE id_publicacion = :id_publicacion",
            "DELETE FROM imagenes_pasos WHERE id_paso IN (SELECT id_paso FROM pasos_recetas WHERE id_publicacion = :id_publicacion)",
            "DELETE FROM pasos_recetas WHERE id_publicacion = :id_publicacion"
        ];
    
        foreach ($queries as $query) {
            $stm = $conn->prepare($query);
            $stm->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
            $stm->execute();
        }

        $queryPublicacion = "DELETE FROM publicaciones_recetas WHERE id_publicacion = :id_publicacion AND id_usuario_autor = :id_usuario_autor";
        $publicacionStm = $conn->prepare($queryPublicacion); 
        $publicacionStm->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
        $publicacionStm->bindParam(':id_usuario_autor', $_SESSION['id'], PDO::PARAM_INT);

        if ($publicacionStm->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => "Error al eliminar publicación"]);
        }
    }  else {
        echo json_encode(['success' => false, 'errors' => $errors]);
    }
?>


<?php

require_once('../../includes/conec_db.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {

        $ID_Receta = isset($_GET['id_publicacion_receta']) ? intval($_GET['id_publicacion_receta']) : null;

        if ($ID_Receta) {

            $query = $conn->prepare("SELECT comentarios.*, usuarios.username as nombre_usuario FROM comentarios join usuarios on usuarios.id_usuario = comentarios.id_usuario_autor WHERE id_publicacion = :ID_Publicacion_Receta");
            $query->bindParam(':ID_Publicacion_Receta', $ID_Receta);
            $query->execute();
    
            $comentariosReceta = [];
    
            // Recorrer los resultados
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $comentariosReceta[] = [
                    'idComentario' => $row['id_comentario'],  //id del comentario
                    'nombre' => $row['nombre_usuario'],  // Nombre del usuario
                    'fechaPublicacion' => $row['fecha_comentario'], //fecha del comentario
                    'textoComentario' => $row['texto'],  //contenido del comentario
                ];
            }
    
            // Devolver los comentariosReceta como JSON
            echo json_encode($comentariosReceta);
    
        } else {
            echo json_encode($comentariosReceta = []);
        }

    } catch (PDOException $e) {
        // Manejar cualquier error en la consulta o conexión
        echo json_encode(['error' => $e->getMessage()]);
    }

}  
?>
<?php

session_start();

require_once('../../includes/conec_db.php');

$usuarioID = $_SESSION['id']; // Usuario que comenta (seguidor)
$nombreUsuario = $_SESSION['nomUsuario']; // Nombre del usuario que comenta

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $textoComentario = isset($_POST["texto_comentario"]) ? $_POST["texto_comentario"] : NULL;
        $id_publicacion_receta = isset($_POST["id_publicacion_receta"]) ? $_POST["id_publicacion_receta"] : NULL;

        if (empty($textoComentario)) {
            echo json_encode(['success' => false, 'message' => 'Texto del comentario no puede estar vacío..', 'id_publicacion_receta' => $id_publicacion_receta]);
            exit();
        }

        $fechaYHoraActual = new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));
        $FechaHoraFormateada = $fechaYHoraActual->format('Y-m-d H:i:s');

        $query = "INSERT INTO comentarios (id_usuario_autor, id_publicacion, texto, fecha_comentario) VALUES (:UsuarioID, :id_publicacion_receta, :TextoComentario, :FechaYHoraActual)";
        $ConsultaSQL = $conn->prepare($query);

        $ConsultaSQL->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);
        $ConsultaSQL->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
        $ConsultaSQL->bindParam(':TextoComentario', $textoComentario, PDO::PARAM_STR);
        $ConsultaSQL->bindParam(':FechaYHoraActual', $FechaHoraFormateada, PDO::PARAM_STR);

        if ($ConsultaSQL->execute()) {


            $ID_NuevoComentario = $conn->lastInsertId();

            if (!empty($ID_NuevoComentario) && is_numeric($ID_NuevoComentario)) {

                $queryReceta = "SELECT id_usuario_autor FROM publicaciones_recetas WHERE id_publicacion = :id_publicacion";
                $stmtReceta = $conn->prepare($queryReceta);
                $stmtReceta->bindParam(':id_publicacion', $id_publicacion_receta, PDO::PARAM_INT);
                $stmtReceta->execute();

                $usuarioPublicador = $stmtReceta->fetchColumn(); 

                if ($usuarioPublicador && $usuarioPublicador != $usuarioID) {
                    $queryNotificacion = "INSERT INTO notificaciones (id_seguidor, id_publicacion, id_seguido, tipo, visto, fecha) 
                                          VALUES (:id_seguidor, :id_publicacion, :id_seguido, 'nuevo_comentario', 0, :fecha)";
                    $stmtNotificacion = $conn->prepare($queryNotificacion);

                    $stmtNotificacion->bindParam(':id_seguidor', $usuarioID, PDO::PARAM_INT); // El que comenta (seguidor)
                    $stmtNotificacion->bindParam(':id_publicacion', $id_publicacion_receta, PDO::PARAM_INT); // La publicación que fue comentada
                    $stmtNotificacion->bindParam(':id_seguido', $usuarioPublicador, PDO::PARAM_INT); // El que recibe la notificación (el dueño de la publicación)
                    $stmtNotificacion->bindParam(':fecha', $FechaHoraFormateada, PDO::PARAM_STR); 

                    $stmtNotificacion->execute();
                }

                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'id_usuario' => $usuarioID,
                    'nombre' => $nombreUsuario,
                    'fechaPublicacion' => $fechaYHoraActual->format('Y-m-d H:i:s'),
                    'texto_comentario' => $textoComentario,
                    'id_comentario' => $ID_NuevoComentario
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al agregar comentario..']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar comentario..']);
        }

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Faltan campos en la solicitud..', 'id_publicacion_receta' => $id_publicacion_receta]);
}
?>

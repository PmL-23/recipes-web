<?php

session_start();

require_once('../../includes/conec_db.php');

$usuarioID = $_SESSION['id'];//establezco el usuario id con el id de la sesion
$nombreUsuario = $_SESSION['nomUsuario'];

/* if (!Permisos::tienePermiso('Comentar Sitio', $usuarioID)) {//validamos que tenga permiso para comentar, de lo contrario, mostramos error
    echo("error al comentar, no tiene permiso.");
    header('Location: ../Vistas/index.php'); //Si el usuario intento comentar y no tiene permiso, vuelvo al indice, mejorar en versiones futuras*
    exit();
} */


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $textoComentario = isset($_POST["texto_comentario"]) ? $_POST["texto_comentario"] : NULL;
        $id_publicacion_receta = isset($_POST["id_publicacion_receta"]) ? $_POST["id_publicacion_receta"] : NULL;

        if ( empty($textoComentario) ) {
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
                // Devuelve el JSON con el header correcto
                header('Content-Type: application/json');
                    
                echo json_encode([
                    'success' => true,
                    'id_usuario' => $usuarioID,
                    'nombre' => $nombreUsuario,
                    'fechaPublicacion' => $fechaYHoraActual->format('Y-m-d H:i:s'),
                    'texto_comentario' => $textoComentario,
                    'id_comentario' => $ID_NuevoComentario
                ]);

            }else{

                echo json_encode(['success' => false, 'message' => 'Error al agregar comentario..']);

            }

        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar comentario..']);
        }

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Faltan campos en la solicitud..', 'id_sitio' => $id_sitio]);
}
?>
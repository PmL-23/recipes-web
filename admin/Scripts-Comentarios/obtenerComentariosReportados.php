<?php
session_start();
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan
require_once('../../includes/permisos.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['id']) && isset($_SESSION['nomUsuario'])) {
            
        $usuarioID = $_SESSION['id']; // ID Usuario logueado

        if (!Permisos::tienePermiso('Gestionar Comentarios Reportados', $usuarioID)) {
            echo json_encode(['success' => false, 'error' => 'Error, no posee el permiso para gestionar comentarios reportados.']);
            exit();
        }
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder gestionar comentarios reportados..', 'id_publicacion_receta' => $id_publicacion_receta]);
        exit();
    }

    $sqlQuery = "SELECT comentarios.id_comentario, comentarios.texto, comentarios.fecha_comentario, usuarios.username, usuarios.foto_usuario, COUNT(DISTINCT reportes.id_reporte) as cantidad_reportes, publicaciones_recetas.id_publicacion FROM comentarios LEFT JOIN reportes ON comentarios.id_comentario = reportes.id_obj_reportado LEFT JOIN usuarios ON comentarios.id_usuario_autor = usuarios.id_usuario LEFT JOIN publicaciones_recetas ON comentarios.id_publicacion = publicaciones_recetas.id_publicacion WHERE reportes.tipo_obj_reportado = 'comentario' GROUP BY comentarios.id_comentario, comentarios.texto, comentarios.fecha_comentario";

    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae todos los comentarios reportados, su cantidad de reportes y datos del autor

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo los comentarios al front
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $listaDeComentarios = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {

            $listaDeComentarios[] = [
                'id_comentario' => $row['id_comentario'],
                'nombre_usuario' => $row['username'],
                'foto_usuario' => $row['foto_usuario'],
                'texto_comentario' => $row['texto'],
                'cant_reportes' => $row['cantidad_reportes'],
                'fecha_comentario' => $row['fecha_comentario'],
                'id_publicacion' => $row['id_publicacion'],
            ];

        }

        echo json_encode([
            'success' => true,
            'comentarios' => $listaDeComentarios
        ]);

    }else{

        echo json_encode([
            'success' => false,
            'message' => 'Error al traer comentarios reportados'
        ]);

    }

} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error en la solicitud GET'
    ]);
}
?>
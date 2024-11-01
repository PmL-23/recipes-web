<?php
session_start();

require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sqlQuery = "SELECT usuarios.id_usuario, usuarios.username, usuarios.nom_completo, usuarios.email, usuarios.foto_usuario, COUNT(DISTINCT publicaciones_recetas.id_publicacion) as cantidad_publicaciones, COUNT(DISTINCT reportes.id_reporte) as cantidad_reportes, COUNT(DISTINCT usuarios_seguidos.id_seguidor) as cantidad_seguidores FROM usuarios LEFT JOIN reportes ON usuarios.id_usuario = reportes.id_obj_reportado LEFT JOIN publicaciones_recetas ON usuarios.id_usuario = publicaciones_recetas.id_usuario_autor LEFT JOIN usuarios_seguidos ON usuarios.id_usuario = usuarios_seguidos.id_seguido WHERE reportes.tipo_obj_reportado = 'usuario' GROUP BY usuarios.id_usuario, usuarios.nom_completo, usuarios.email, usuarios.username, usuarios.foto_usuario";

    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae todos los usuarios reportados

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo las categorias al front
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $listaDeUsuarios = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {
            $listaDeUsuarios[] = [
                'id_usuario' => $row['id_usuario'],
                'nombre_usuario' => $row['username'],
                'nombre_completo' => $row['nom_completo'],
                'foto_usuario' => $row['foto_usuario'],
                'cant_publicaciones' => $row['cantidad_publicaciones'],
                'cant_reportes' => $row['cantidad_reportes'],
                'cant_seguidores' => $row['cantidad_seguidores'],
                'correo' => $row['email']
            ];
        }

        echo json_encode([
            'success' => true,
            'usuarios' => $listaDeUsuarios
        ]);

    }else{
        echo "Error al publicar comentario";
        echo json_encode([
            'success' => false,
            'message' => 'Error al traer reportes de usuarios'
        ]);
    }

} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error en la solicitud GET'
    ]);
}
?>
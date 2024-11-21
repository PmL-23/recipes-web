<?php
session_start();
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan
require_once('../../includes/permisos.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['id']) && isset($_SESSION['nomUsuario'])) {
            
        $usuarioID = $_SESSION['id']; // ID Usuario logueado

        if (!Permisos::tienePermiso('Gestionar Etiquetas', $usuarioID)) {
            echo json_encode(['success' => false, 'error' => 'Error, no posee el permiso para gestionar etiquetas.']);
            exit();
        }
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder gestionar etiquetas..', 'id_publicacion_receta' => $id_publicacion_receta]);
        exit();
    }

    $sqlQuery = "SELECT * FROM etiquetas WHERE estado = 1 ORDER BY etiquetas.id_etiqueta DESC";
    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae todas las etiquetas cargadas

    if (!$queryResults) {
        echo "Error en la consulta SQL";
        exit();
    }

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo las etiquetas al front
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $etiquetas = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {
            $etiquetas[] = [
                'id_etiqueta' => $row['id_etiqueta'],  //ID de etiqueta
                'titulo' => $row['titulo'],  // Titulo de etiqueta
            ];
        }

        // Devolver las etiquetas como JSON
        echo json_encode($etiquetas);

    }else{
        echo "Error al obtener etiquetas";
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>
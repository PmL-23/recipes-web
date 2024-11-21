<?php
session_start();
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan
require_once('../../includes/permisos.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['id']) && isset($_SESSION['nomUsuario'])) {
            
        $usuarioID = $_SESSION['id']; // ID Usuario logueado

        if (!Permisos::tienePermiso('Gestionar Ingredientes', $usuarioID)) {
            echo json_encode(['success' => false, 'error' => 'Error, no posee el permiso para gestionar ingredientes.']);
            exit();
        }
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder gestionar ingredientes..', 'id_publicacion_receta' => $id_publicacion_receta]);
        exit();
    }

    $sqlQuery = "SELECT * FROM ingredientes WHERE estado = 1 ORDER BY ingredientes.id_ingrediente DESC";
    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae todas los ingredientes cargadas

    if (!$queryResults) {
        echo "Error en la consulta SQL";
        exit();
    }

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo los ingredientes al front
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $ingredientes = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {
            $ingredientes[] = [
                'id_ingrediente' => $row['id_ingrediente'],  //ID de ingrediente
                'nombre' => $row['nombre'],  // Nombre de ingrediente
            ];
        }

        // Devolver las ingredientes como JSON
        echo json_encode($ingredientes);

    }else{
        echo "Error al obtener ingredientes";
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>
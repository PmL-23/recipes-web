<?php
session_start();
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan
require_once('../../includes/permisos.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['id']) && isset($_SESSION['nomUsuario'])) {
            
        $usuarioID = $_SESSION['id']; // ID Usuario logueado

        if (!Permisos::tienePermiso('Listar Reportes Publicacion', $usuarioID)) {
            echo json_encode(['success' => false, 'message' => 'Error, no posee el permiso para listar publicaciones reportadas.']);
            exit();
        }
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder listar publicaciones reportadas..', 'id_publicacion_receta' => $id_publicacion_receta]);
        exit();
    }

    $ID_Publicacion = isset($_GET["id_publicacion"]) ? $_GET["id_publicacion"] : NULL;

    if (empty($_GET["id_publicacion"])) {
        echo "Datos incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes.

    $sqlQuery = "SELECT reportes.id_reporte, reportes.fecha_reporte, reportes.observacion as detalles_reporte, razones.descripcion as motivo_reporte, usuarios.username as usuario_reportante FROM reportes JOIN razones ON reportes.id_razon = razones.id_razon JOIN usuarios ON reportes.id_reportante = usuarios.id_usuario WHERE reportes.id_obj_reportado = :id_obj AND reportes.tipo_obj_reportado = 'publicacion'";

    $queryResults = $conn->prepare($sqlQuery);

    $queryResults->bindParam(':id_obj', $ID_Publicacion, PDO::PARAM_INT);

    if ($queryResults->execute()) {
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $listaDeReportes = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {

            $listaDeReportes[] = [
                'id_reporte' => $row['id_reporte'],
                'fecha_reporte' => $row['fecha_reporte'],
                'detalles_reporte' => $row['detalles_reporte'],
                'motivo_reporte' => $row['motivo_reporte'],
                'usuario_reportante' => $row['usuario_reportante']
            ];

        }

        echo json_encode([
            'success' => true,
            'reportes' => $listaDeReportes
        ]);

    }else{

        echo json_encode([
            'success' => false,
            'message' => 'Error al traer lista de reportes'
        ]);

    }

} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error en la solicitud GET'
    ]);
}
?>
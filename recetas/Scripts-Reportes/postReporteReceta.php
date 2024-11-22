<?php

session_start();

require_once('../../includes/conec_db.php');
require_once('../../includes/permisos.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (isset($_SESSION['id'])) {
            $usuarioID = $_SESSION['id'];//establezco el usuario id con el id de la sesion

            if (!Permisos::tienePermiso('Reportar Publicación', $usuarioID)) {
                echo json_encode(['success' => false, 'message' => 'No podes realizar esta acción.']);
                exit();
            }
        }else{
            echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para enviar un reporte.']);
            exit();
        }


        $id_motivo_reporte = isset($_POST["motivo"]) ? $_POST["motivo"] : NULL;
        $id_publicacion_receta = isset($_POST["id_publicacion_receta"]) ? $_POST["id_publicacion_receta"] : NULL;
        $objReportado = "publicacion";
        $observacionReporte = isset($_POST["observacion"]) ? $_POST["observacion"] : NULL;

        if ( empty($id_motivo_reporte) ) {
            echo json_encode(['success' => false, 'message' => 'El motivo no puede estar vacío..']);
            exit();
        }

        if ( empty($id_publicacion_receta) ) {
            echo json_encode(['success' => false, 'message' => 'Id de publicación a reportar no encontrado..']);
            exit();
        }

        if ( empty($observacionReporte) ) {
            echo json_encode(['success' => false, 'message' => 'Texto de detalles de reporte no puede estar vacío..']);
            exit();
        }

        $query = "INSERT INTO reportes (id_razon, id_reportante, id_obj_reportado, tipo_obj_reportado, observacion) VALUES (:IDRazon, :IDUsuarioReportante, :id_publicacion_receta, :tipo_obj_reportado, :Observacion)";
        $ConsultaSQL = $conn->prepare($query);

        $ConsultaSQL->bindParam(':IDRazon', $id_motivo_reporte, PDO::PARAM_INT);
        $ConsultaSQL->bindParam(':IDUsuarioReportante', $usuarioID, PDO::PARAM_INT);
        $ConsultaSQL->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
        $ConsultaSQL->bindParam(':tipo_obj_reportado', $objReportado, PDO::PARAM_STR);
        $ConsultaSQL->bindParam(':Observacion', $observacionReporte, PDO::PARAM_STR);

        if ($ConsultaSQL->execute()) {

            $ID_NuevoReporte = $conn->lastInsertId();

            if (!empty($ID_NuevoReporte) && is_numeric($ID_NuevoReporte)) {

                // Devuelve el JSON con el header correcto
                header('Content-Type: application/json');
                    
                echo json_encode([
                    'success' => true
                ]);

            }else{

                echo json_encode(['success' => false, 'message' => 'Error al crear nuevo reporte..']);

            }

        } else {
            echo json_encode(['success' => false, 'message' => 'Error al crear nuevo reporte..']);
        }

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Faltan campos en la solicitud..', 'id_publicacion_receta' => $id_publicacion_receta]);
}
?>
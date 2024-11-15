<?php

session_start();

require_once('../../includes/conec_db.php');

/* if (!Permisos::tienePermiso('Comentar publicacion', $usuarioID)) {//validamos que tenga permiso para comentar, de lo contrario, mostramos error
    echo("error al comentar, no tiene permiso.");
    header('Location: ../Vistas/index.php'); //Si el usuario intento comentar y no tiene permiso, vuelvo al indice, mejorar en versiones futuras*
    exit();
} */


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (isset($_SESSION['id'])) {
            $usuarioID = $_SESSION['id'];//establezco el usuario id con el id de la sesion
        }else{
            echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder enviar reporte..']);
            exit();
        }

        $id_motivo_reporte = isset($_POST["motivo"]) ? $_POST["motivo"] : NULL;
        $id_comentario_reportado = isset($_POST["id_comentario"]) ? $_POST["id_comentario"] : NULL;
        $objReportado = "comentario";
        $observacionReporte = isset($_POST["observacion"]) ? $_POST["observacion"] : NULL;

        if ( empty($id_motivo_reporte) ) {
            echo json_encode(['success' => false, 'message' => 'El motivo no puede estar vacío..']);
            exit();
        }

        if ( empty($id_comentario_reportado) ) {
            echo json_encode(['success' => false, 'message' => 'Id de comentario a reportar no encontrado..']);
            exit();
        }

        if ( empty($observacionReporte) ) {
            echo json_encode(['success' => false, 'message' => 'Texto de detalles de reporte no puede estar vacío..']);
            exit();
        }

        $query = "INSERT INTO reportes (id_razon, id_reportante, id_obj_reportado, tipo_obj_reportado, observacion) VALUES (:IDRazon, :IDUsuarioReportante, :id_comentario_reportado, :tipo_obj_reportado, :Observacion)";
        $ConsultaSQL = $conn->prepare($query);

        $ConsultaSQL->bindParam(':IDRazon', $id_motivo_reporte, PDO::PARAM_INT);
        $ConsultaSQL->bindParam(':IDUsuarioReportante', $usuarioID, PDO::PARAM_INT);
        $ConsultaSQL->bindParam(':id_comentario_reportado', $id_comentario_reportado, PDO::PARAM_INT);
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
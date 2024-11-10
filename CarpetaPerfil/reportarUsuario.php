<?php

session_start();

require_once('../includes/conec_db.php');

$usuarioID = $_SESSION['id'];//establezco el usuario id con el id de la sesion

/* if (!Permisos::tienePermiso('Comentar publicacion', $usuarioID)) {//validamos que tenga permiso para comentar, de lo contrario, mostramos error
    echo("error al comentar, no tiene permiso.");
    header('Location: ../Vistas/index.php'); //Si el usuario intento comentar y no tiene permiso, vuelvo al indice, mejorar en versiones futuras*
    exit();
} */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $id_motivo_reporte = isset($_POST["motivo"]) ? $_POST["motivo"] : NULL;
        $usermame_reportado = isset($_POST["usuario_reportado"]) ? $_POST["usuario_reportado"] : NULL;
        $objReportado = "usuario";
        $observacionReporte = isset($_POST["observacion"]) ? $_POST["observacion"] : NULL;

        if ( empty($id_motivo_reporte) ) {
            echo json_encode(['success' => false, 'message' => 'El motivo no puede estar vacío..']);
            exit();
        }

        if ( empty($usermame_reportado) ) {
            echo json_encode(['success' => false, 'message' => 'Nombre de usuario a reportar no encontrado..']);
            exit();
        }

        if ( empty($observacionReporte) ) {
            echo json_encode(['success' => false, 'message' => 'Texto de detalles de reporte no puede estar vacío..']);
            exit();
        }

        $queryGetID = "SELECT usuarios.id_usuario FROM usuarios WHERE username = :Username";
        $ConsultaGetID = $conn->prepare($queryGetID);
        $ConsultaGetID->bindParam(':Username', $usermame_reportado, PDO::PARAM_STR);
        $ConsultaGetID->execute();
        
        $User_ID = $ConsultaGetID->fetch(PDO::FETCH_ASSOC);

        if ($User_ID) {

            $query = "INSERT INTO reportes (id_razon, id_reportante, id_obj_reportado, tipo_obj_reportado, observacion) VALUES (:IDRazon, :IDUsuarioReportante, :usuario_reportado, :tipo_obj_reportado, :Observacion)";
            $ConsultaSQL = $conn->prepare($query);

            $ConsultaSQL->bindParam(':IDRazon', $id_motivo_reporte, PDO::PARAM_INT);
            $ConsultaSQL->bindParam(':IDUsuarioReportante', $usuarioID, PDO::PARAM_INT);
            $ConsultaSQL->bindParam(':usuario_reportado', $User_ID['id_usuario'], PDO::PARAM_INT);
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

        }


    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Faltan campos en la solicitud..', 'usuario_reportado' => $usuario_reportado]);
}
?>
<?php

session_start();

require_once('../../includes/conec_db.php');

/* if (!Permisos::tienePermiso('Valorar publicacion', $usuarioID)) {//validamos que tenga permiso para valorar, de lo contrario, mostramos error
    echo("error al valorar, no tiene permiso.");
    header('Location: ../Vistas/index.php'); //Si el usuario intento valorar y no tiene permiso, vuelvo al indice, mejorar en versiones futuras*
    exit();
} */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (isset($_SESSION['id'])) {
            $usuarioID = $_SESSION['id'];//establezco el usuario id con el id de la sesion
        }else{
            echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder valorar receta..']);
            exit();
        }

        $valoracionReceta = isset($_POST["valoracion"]) ? $_POST["valoracion"] : NULL;
        $id_publicacion_receta = isset($_POST["id_publicacion_receta"]) ? $_POST["id_publicacion_receta"] : NULL;

        if ( empty($valoracionReceta) ) {
            echo json_encode(['success' => false, 'message' => 'Valor de nueva valoración de receta no recibido..', 'id_publicacion_receta' => $id_publicacion_receta]);
            exit();
        }

        $queryVerificarValoracion = "SELECT valoraciones.puntuacion FROM valoraciones WHERE id_usuario_autor = :UsuarioID AND id_publicacion = :id_publicacion_receta";
        
        $ConsultaVerificacion = $conn->prepare($queryVerificarValoracion);
        $ConsultaVerificacion->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
        $ConsultaVerificacion->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);
        $ConsultaVerificacion->execute();

        $campos = $ConsultaVerificacion->fetchAll(\PDO::FETCH_ASSOC);

        //A partir de la cantidad de campos devuelta y la valoración actual decido que query ejecutar:
        if( (count($campos) > 0) && ($campos[0]['puntuacion'] == $valoracionReceta) ) {

            //Eliminar valoracion de BD

            $queryEliminarValoracion = "DELETE FROM valoraciones WHERE id_publicacion = :id_publicacion_receta AND id_usuario_autor = :UsuarioID";
            
            $ConsultaEliminacion = $conn->prepare($queryEliminarValoracion);
            $ConsultaEliminacion->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
            $ConsultaEliminacion->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);

            if ($ConsultaEliminacion->execute()) {

                // Devuelve el JSON con el header correcto
                header('Content-Type: application/json');
                        
                echo json_encode([
                    'success' => true,
                    'accion' => 'delete'
                ]);

            } else {
                echo json_encode(['success' => false, 'message' => 'Error al eliminar valoración..']);
            }

        }else if( (count($campos) > 0) && ($campos[0]['puntuacion'] != $valoracionReceta) ){

            //Actualizar valoración en BD

            $queryActualizarValoracion = "UPDATE valoraciones SET puntuacion = :Valoracion WHERE id_publicacion = :id_publicacion_receta AND id_usuario_autor = :UsuarioID";
            
            $ConsultaActualizacion = $conn->prepare($queryActualizarValoracion);
            $ConsultaActualizacion->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
            $ConsultaActualizacion->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);
            $ConsultaActualizacion->bindParam(':Valoracion', $valoracionReceta, PDO::PARAM_INT);

            if ($ConsultaActualizacion->execute()) {

                // Devuelve el JSON con el header correcto
                header('Content-Type: application/json');
                        
                echo json_encode([
                    'success' => true,
                    'accion' => 'update'
                ]);

            } else {
                echo json_encode(['success' => false, 'message' => 'Error al actualizar valoración..']);
            }


        }else if(count($campos) == 0){

            //Insertar valoración en BD

            $queryInsertarValoracion = "INSERT INTO valoraciones (id_publicacion, id_usuario_autor, puntuacion) VALUES (:id_publicacion_receta, :UsuarioID, :Valoracion)";
            
            $ConsultaInsert = $conn->prepare($queryInsertarValoracion);
            $ConsultaInsert->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
            $ConsultaInsert->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);
            $ConsultaInsert->bindParam(':Valoracion', $valoracionReceta, PDO::PARAM_INT);

            if ($ConsultaInsert->execute()) {

                $ID_Nueva_Valoracion = $conn->lastInsertId();

                if (!empty($ID_Nueva_Valoracion) && is_numeric($ID_Nueva_Valoracion)) {
                    // Devuelve el JSON con el header correcto
                    header('Content-Type: application/json');
                        
                    echo json_encode([
                        'success' => true,
                        'accion' => 'insert'
                    ]);

                }else{

                    echo json_encode(['success' => false, 'message' => 'Error al agregar valoracion..']);

                }

            } else {
                echo json_encode(['success' => false, 'message' => 'Error al agregar valoracion..']);
            }
        }

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Faltan campos en la solicitud..', 'id_publicacion_receta' => $id_publicacion_receta]);
}
?>
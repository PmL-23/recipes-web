<?php

session_start();

require_once('../../includes/conec_db.php');

$usuarioID = $_SESSION['id'];//establezco el usuario id con el id de la sesion

/* if (!Permisos::tienePermiso('Valorar publicacion', $usuarioID)) {//validamos que tenga permiso para valorar, de lo contrario, mostramos error
    echo("error al valorar, no tiene permiso.");
    header('Location: ../Vistas/index.php'); //Si el usuario intento valorar y no tiene permiso, vuelvo al indice, mejorar en versiones futuras*
    exit();
} */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $id_publicacion_receta = isset($_POST["id_publicacion_receta"]) ? $_POST["id_publicacion_receta"] : NULL;

        $queryFavorito = "SELECT favoritos.id_favorito FROM favoritos WHERE id_usuario = :UsuarioID AND id_publicacion = :id_publicacion_receta";
        
        $ConsultaSelect = $conn->prepare($queryFavorito);
        $ConsultaSelect->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
        $ConsultaSelect->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);
        $ConsultaSelect->execute();

        $campos = $ConsultaSelect->fetchAll(\PDO::FETCH_ASSOC);

        //A partir de la cantidad de campos devuelta decido que query ejecutar:
        if( (count($campos) > 0) ) {

            //Eliminar favorito de BD
            $queryEliminarFavorito = "DELETE FROM favoritos WHERE id_publicacion = :id_publicacion_receta AND id_usuario = :UsuarioID";
            
            $ConsultaDelete = $conn->prepare($queryEliminarFavorito);
            $ConsultaDelete->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
            $ConsultaDelete->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);

            if ($ConsultaDelete->execute()) {

                // Devuelve el JSON con el header correcto
                header('Content-Type: application/json');
                        
                echo json_encode([
                    'success' => true,
                    'accion' => 'delete'
                ]);

            } else {
                echo json_encode(['success' => false, 'message' => 'Error al eliminar favorito..']);
            }

        }else if(count($campos) == 0){

            //Insertar favorito en BD
            $queryInsertarFavorito = "INSERT INTO favoritos (id_publicacion, id_usuario) VALUES (:id_publicacion_receta, :UsuarioID)";
            
            $ConsultaInsert = $conn->prepare($queryInsertarFavorito);
            $ConsultaInsert->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);
            $ConsultaInsert->bindParam(':UsuarioID', $usuarioID, PDO::PARAM_INT);

            if ($ConsultaInsert->execute()) {

                $ID_Nuevo_favorito = $conn->lastInsertId();

                if (!empty($ID_Nuevo_favorito) && is_numeric($ID_Nuevo_favorito)) {
                    // Devuelve el JSON con el header correcto
                    header('Content-Type: application/json');
                        
                    echo json_encode([
                        'success' => true,
                        'accion' => 'insert'
                    ]);

                }else{

                    echo json_encode(['success' => false, 'message' => 'Error al agregar favorito..']);

                }

            } else {
                echo json_encode(['success' => false, 'message' => 'Error al agregar favorito..']);
            }
        }

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Faltan campos en la solicitud..', 'id_publicacion_receta' => $id_publicacion_receta]);
}
?>
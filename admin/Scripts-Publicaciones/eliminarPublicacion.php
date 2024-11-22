<?php
session_start();
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan
require_once('../../includes/permisos.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['id']) && isset($_SESSION['nomUsuario'])) {
            
        $usuarioID = $_SESSION['id']; // ID Usuario logueado

        if (!Permisos::tienePermiso('Eliminar Publicacion Reportada', $usuarioID)) {
            echo json_encode(['success' => false, 'message' => 'Error, no posee el permiso para eliminar publicaciones reportadas.']);
            exit();
        }
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder eliminar publicaciones reportadas..', 'id_publicacion_receta' => $id_publicacion_receta]);
        exit();
    }

    $ID_Publicacion = isset($_POST["ObjID"]) ? $_POST["ObjID"] : NULL;

    if (empty($_POST["ObjID"])) {
        echo "Datos de eliminación de publicación incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de eliminar.

    // Hago delete del campo a la tabla publicaciones_recetas con los datos que traigo en POST.

    $sqlQuery = "DELETE FROM publicaciones_recetas WHERE id_publicacion = :ID_Publicacion";
    $QueryLlamado = $conn->prepare($sqlQuery); //Preparo la consulta que me elimina una publicación

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':ID_Publicacion', $ID_Publicacion, PDO::PARAM_INT);

    if ($QueryLlamado->execute()) { //si se pudo eliminar, devuelvo true como señal al frontend
        
        $sqlQuery = "DELETE FROM reportes WHERE id_obj_reportado = :IDPublicacion AND tipo_obj_reportado = 'publicacion'";
        $QueryExec = $conn->prepare($sqlQuery); //Preparo la consulta que me elimina reportes hechos a una publicación
        $QueryExec->bindParam(':IDPublicacion', $ID_Publicacion, PDO::PARAM_INT);
    
        if ($QueryExec->execute()) { //si se pudo eliminar, devuelvo true como señal al frontend
                
            // Devuelve el JSON con el header correcto
            header('Content-Type: application/json');
    
            echo json_encode([
                'success' => true
            ]);
    
        }else{
            echo json_encode([
                'success' => false,
                'message' => 'Error al ejecutar querySQL.'
            ]);
        }

    }else{
        echo json_encode([
            'success' => false
        ]);
    }


} else {
    echo "Faltan campos en la solicitud.";
}
?>
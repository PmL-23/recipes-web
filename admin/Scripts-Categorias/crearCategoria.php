<?php
session_start();
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan
require_once('../../includes/permisos.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['id']) && isset($_SESSION['nomUsuario'])) {
            
        $usuarioID = $_SESSION['id']; // ID Usuario logueado

        if (!Permisos::tienePermiso('Gestionar Categorias', $usuarioID)) {
            echo json_encode(['success' => false, 'error' => 'Error, no posee el permiso para gestionar categorias.']);
            exit();
        }
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder gestionar categorias..', 'id_publicacion_receta' => $id_publicacion_receta]);
        exit();
    }

    $tituloCategoria = isset($_POST["inputCategoriaTitulo"]) ? $_POST["inputCategoriaTitulo"] : NULL; //Seteamos el campo de titulo de categoría, imagen y el seccion de la nueva categoria.

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_NO_FILE) {
        echo "Imagen de categoria es obligatoria.";
        exit();
    }

    // Datos del archivo
    $nombreArchivo = $_FILES['imagen']['name'];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];

    // Definir la carpeta de destino
    $carpetaDestino = '../../categorias/imgs/';

    // Crear un nombre único para evitar sobrescribir archivos
    $nombreArchivoUnico = uniqid() . '_' . basename($nombreArchivo);
    $rutaDestino = $carpetaDestino . $nombreArchivoUnico;

    $seccionCategoria = isset($_POST["seccion"]) ? $_POST["seccion"] : NULL;

    if (empty($_POST["inputCategoriaTitulo"]) || empty($_FILES["imagen"]) || empty($_POST["seccion"])) {
        echo "Datos de inserción de categoria incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de hacer insert.

    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        // Inserto a la tabla categoria los datos que traigo en POST.
    
        $sqlQuery = "INSERT INTO categorias(titulo, nombre_imagen, seccion) VALUES (:TituloCategoria, :NombreImagenCategoria, :SeccionCategoria)";
        $QueryLlamado = $conn->prepare($sqlQuery); //Preparo la consulta que me inserta una categoria
    
        if (!$QueryLlamado) {
            echo "Error en la consulta SQL";
            exit();
        }
    
        $QueryLlamado->bindParam(':TituloCategoria', $tituloCategoria, PDO::PARAM_STR); //con esto nada mas establezco los valores que obtuve a la consulta
        $QueryLlamado->bindParam(':NombreImagenCategoria', $nombreArchivoUnico, PDO::PARAM_STR);
        $QueryLlamado->bindParam(':SeccionCategoria', $seccionCategoria, PDO::PARAM_STR);
    
        if ($QueryLlamado->execute()) { //si se pudo crear categoria, devuelvo por json una señal
            
            // Devuelve el JSON con el header correcto
            header('Content-Type: application/json');
    
            $ultimoIDInsertado = $conn->lastInsertId();
            
            if (!empty($ultimoIDInsertado) && is_numeric($ultimoIDInsertado)) {
    
                echo json_encode([
                    'success' => true
                ]);
    
            }else{
                echo json_encode([
                    'success' => false
                ]);
            }
    
        }else{
            echo json_encode([
                'success' => false
            ]);
        }
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>
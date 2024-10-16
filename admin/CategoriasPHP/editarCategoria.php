<?php
session_start();

require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tituloCategoria = isset($_POST["inputCategoriaTitulo"]) ? $_POST["inputCategoriaTitulo"] : NULL; //Seteamos el campo de titulo de categoría, imagen y el seccion de la categoria a editar.

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {

        /* $imagenBinariaCategoria = file_get_contents($_FILES['imagen']['tmp_name']); // Convierte la imagen a binario */

        // Datos del archivo
        $nombreArchivo = $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];

        // Definir la carpeta de destino
        $carpetaDestino = '../../categorias/imgs/';

        // Crear un nombre único para evitar sobrescribir archivos
        $nombreArchivoUnico = uniqid() . '_' . basename($nombreArchivo);
        $rutaDestino = $carpetaDestino . $nombreArchivoUnico;
    }

    $seccionCategoria = isset($_POST["seccion"]) ? $_POST["seccion"] : NULL;

    $IDCategoria = isset($_POST["categoriaID"]) ? $_POST["categoriaID"] : NULL;

    if (empty($_POST["inputCategoriaTitulo"]) || empty($_POST["seccion"]) || empty($_POST["categoriaID"])) {
        echo "Datos de actualización de categoria incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de hacer update.

    // Hago update a la tabla categoria con los datos que traigo en POST.

    $sqlQueryCategoria = "UPDATE categorias SET titulo = :TituloCategoria, seccion = :SeccionCategoria WHERE id_categoria = :IDCategoria";
    
    $FlagMoverArchivo = move_uploaded_file($rutaTemporal, $rutaDestino);

    if ($FlagMoverArchivo) {

        // Obtener la ruta de la imagen asociada a la publicación que quieres borrar
        $sql = "SELECT nombre_imagen FROM categorias WHERE id_categoria = :IDCategoria";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "Error en la consulta SQL";
            exit();
        }

        $stmt->bindParam(':IDCategoria', $IDCategoria, PDO::PARAM_STR);
        $stmt->execute();

        $nombreImagenAnterior = $stmt->fetch(PDO::FETCH_ASSOC); // Nombre de la imagen
        $rutaImagenAnterior = '../../categorias/imgs/' . $nombreImagenAnterior["nombre_imagen"];

        $FlagBorrarArchivoAnterior = unlink($rutaImagenAnterior);
    }

    if ((isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) && $FlagBorrarArchivoAnterior) {
        $sqlQueryCategoria = "UPDATE categorias SET titulo = :TituloCategoria, nombre_imagen = :NombreImagen, seccion = :SeccionCategoria WHERE id_categoria = :IDCategoria";
    }

    $QueryLlamado = $conn->prepare($sqlQueryCategoria); //Preparo la consulta que me actualiza una categoria

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':IDCategoria', $IDCategoria, PDO::PARAM_STR);
    $QueryLlamado->bindParam(':TituloCategoria', $tituloCategoria, PDO::PARAM_STR); //con esto nada mas establezco los valores que obtuve a la consulta

    if ((isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) && $FlagBorrarArchivoAnterior) {
        $QueryLlamado->bindParam(':NombreImagen', $nombreArchivoUnico, PDO::PARAM_STR);
    }

    $QueryLlamado->bindParam(':SeccionCategoria', $seccionCategoria, PDO::PARAM_STR);

    if ($QueryLlamado->execute()) { //si se pudo editar, devuelvo true como señal al frontend
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        echo json_encode([
            'success' => true
        ]);

    }else{
        echo json_encode([
            'success' => false
        ]);
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>
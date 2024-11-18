<?php
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $IDCategoria = isset($_POST["ItemID"]) ? $_POST["ItemID"] : NULL;

    if (empty($_POST["ItemID"])) {
        echo "Datos de eliminación de categoria incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de eliminar.

    // Obtener la ruta de la imagen asociada a la publicación que quieres borrar
    $sql = "SELECT nombre_imagen FROM categorias WHERE id_categoria = :IDCategoria";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error en la consulta SQL";
        exit();
    }

    $stmt->bindParam(':IDCategoria', $IDCategoria, PDO::PARAM_STR);
    $stmt->execute();

    $nombreArchivo = $stmt->fetch(PDO::FETCH_ASSOC); // Nombre de la imagen
    $rutaImagen = '../../categorias/imgs/' . $nombreArchivo["nombre_imagen"];

    // Paso 2: Eliminar el archivo de la imagen del sistema de archivos
    if ($rutaImagen && file_exists($rutaImagen)) {

        if (unlink($rutaImagen)) {

            // Hago delete del campo a la tabla categoria con los datos que traigo en POST.

            $sqlQueryCategoria = "UPDATE categorias SET estado = 0 WHERE id_categoria = :IDCategoria";
            $QueryLlamado = $conn->prepare($sqlQueryCategoria); //Preparo la consulta que me elimina una categoria

            if (!$QueryLlamado) {
                echo "Error en la consulta SQL";
                exit();
            }

            $QueryLlamado->bindParam(':IDCategoria', $IDCategoria, PDO::PARAM_STR);

            if ($QueryLlamado->execute()) { //si se pudo eliminar, devuelvo true como señal al frontend
                
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
            /* echo "Error al eliminar la imagen."; */
            echo json_encode([
                'success' => false
            ]);
        }

    } else {
        /* echo "La imagen no existe o ya fue eliminada."; */
        echo json_encode([
            'success' => false
        ]);
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>
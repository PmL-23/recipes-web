<?php
require '../includes/conec_db.php';
if (isset($_GET['id'])) {

    $id_receta = $_GET['id'];

    $sql = "SELECT p.*, u.username, u.foto_usuario 
            FROM publicaciones_recetas p
            INNER JOIN usuarios u ON p.id_usuario_autor = u.id_usuario
            WHERE p.id_publicacion = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_receta, PDO::PARAM_INT);
    $stmt->execute();
    $receta = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($receta) {
        // obtenemos datos de la receta
        $nombreUsuario = htmlspecialchars($receta['username'], ENT_QUOTES, 'UTF-8');
        $fotoUsuario = htmlspecialchars($receta['foto_usuario'], ENT_QUOTES, 'UTF-8');
        $titulo = htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8');
        $descripcion = htmlspecialchars($receta['descripcion'], ENT_QUOTES, 'UTF-8');
        $fecha = htmlspecialchars($receta['fecha_publicacion'], ENT_QUOTES, 'UTF-8');
        $dificultad = htmlspecialchars($receta['dificultad'], ENT_QUOTES, 'UTF-8');
        $minutos_prep = htmlspecialchars($receta['minutos_prep'], ENT_QUOTES, 'UTF-8');
        $imagen = '../html_paises/img/imgArg/' . $receta['titulo'] . '.jpg';
        if (!file_exists($imagen)) {
            $imagen = '../html_paises/img/imgArg/default.jpg'; // Imagen por defecto
        }
    } else {
        echo "No se encontró la receta.";
    }
} else {
    echo "No se proporcionó una receta válida.";
}

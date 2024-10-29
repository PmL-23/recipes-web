<?php
require '../includes/conec_db.php';
if (isset($_GET['id'])) {


    $id_receta = $_GET['id'];


    $sql = "SELECT p.*, u.username, u.foto_usuario, c.titulo AS categoria_titulo, d.titulo AS etiqueta_titulo, pa.id_pais, pe.ruta_imagen_pais, pi.nombre, po.ingrediente, pu.texto, pu.id_paso, pu.num_paso
                FROM publicaciones_recetas p
                INNER JOIN usuarios u ON p.id_usuario_autor = u.id_usuario
                INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                INNER JOIN etiquetas_recetas d ON p.id_publicacion = d.id_publicacion
                INNER JOIN paises_recetas pa ON p.id_publicacion = pa.id_publicacion
                INNER JOIN paises pe ON pa.id_pais = pe.id_pais    
                INNER JOIN paises pi ON pa.id_pais = pi.id_pais    
                INNER JOIN ingredientes_recetas po ON p.id_publicacion = po.id_publicacion
                INNER JOIN pasos_recetas pu ON p.id_publicacion = pu.id_publicacion
                WHERE p.id_publicacion = :id";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_receta, PDO::PARAM_INT);
    $stmt->execute();
    $recetas = $stmt->fetchAll(PDO::FETCH_ASSOC); #agarramos todas


    if ($recetas) {
        $receta = $recetas[0]; #usamos solo la primera en los demas que no tengas mas de 1 valor

        $nombreUsuario = htmlspecialchars($receta['username'], ENT_QUOTES, 'UTF-8');
        $fotoUsuario = htmlspecialchars($receta['foto_usuario'], ENT_QUOTES, 'UTF-8');
        $titulo = htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8');
        $descripcion = htmlspecialchars($receta['descripcion'], ENT_QUOTES, 'UTF-8');
        $fecha = htmlspecialchars($receta['fecha_publicacion'], ENT_QUOTES, 'UTF-8');
        $dificultad = htmlspecialchars($receta['dificultad'], ENT_QUOTES, 'UTF-8');
        $minutos_prep = htmlspecialchars($receta['minutos_prep'], ENT_QUOTES, 'UTF-8');
        $imagen = '../html_paises/img/imgArg/' . $receta['titulo'] . '.jpg';
        $categoriaTitulo = htmlspecialchars($receta['categoria_titulo'], ENT_QUOTES, 'UTF-8'); // Título de la categoría

        $etiquetas = [];
        foreach ($recetas as $row) {
            if (!empty($row['etiqueta_titulo'])) {
                $etiquetas[] = htmlspecialchars($row['etiqueta_titulo'], ENT_QUOTES, 'UTF-8');
            }
        }
        $etiquetas = array_unique($etiquetas); //para que no repita
        if (!file_exists($imagen)) {
            $imagen = '../html_paises/img/imgArg/default.jpg'; // Imagen por defecto
        }

        $paisRecetas = [];
        foreach ($recetas as $row) {
            if (!empty($row['ruta_imagen_pais'])) {
                $paisRecetas[] = htmlspecialchars($row['ruta_imagen_pais'], ENT_QUOTES, 'UTF-8');
            }
        }
        $paisRecetas = array_unique($paisRecetas);
        $nombrePais = htmlspecialchars($receta['nombre'], ENT_QUOTES, 'UTF-8');

        $ingredientes = [];
        foreach ($recetas as $row) {
            if (!empty($row['ingrediente'])) {
                $ingredientes[] = htmlspecialchars($row['ingrediente'], ENT_QUOTES, 'UTF-8');
            }
        }
        $ingredientes = array_unique($ingredientes);

        $pasos = [];
        $id_pasos = [];
        $numerosPasos = [];
        foreach ($recetas as $row) {
            if (!empty($row['texto'])) {
                $pasos[$row['id_paso']] = htmlspecialchars($row['texto'], ENT_QUOTES, 'UTF-8');
            }
            if (!empty($row['id_paso'])) {
                $id_pasos[] = $row['id_paso'];
            }
            if (!empty($row['num_paso'])) {
                $numerosPasos[$row['id_paso']] = htmlspecialchars($row['num_paso'], ENT_QUOTES, 'UTF-8');
            }
        }
        $pasos = array_values($pasos);
        $numerosPasos = array_values($numerosPasos); // Convertir a arreglo indexado

        //imagenes
        $imagenesPasos = [];
        if (!empty($id_pasos)) {
            $forma = implode(',', array_fill(0, count($id_pasos), '?'));
            $sql_imagenes = "SELECT ruta_imagen_paso FROM imagenes_pasos WHERE id_paso IN ($forma)";
            $stmt_imagenes = $conn->prepare($sql_imagenes);
            $stmt_imagenes->execute($id_pasos);
            $imagenesPasos = $stmt_imagenes->fetchAll(PDO::FETCH_COLUMN);
        }
    } else {
        echo "No se encontró la receta.";
    }
} else {
    echo "No se proporcionó una receta válida.";
}

<?php
require '../includes/conec_db.php';

if (isset($_GET['id'])) {
    $id_receta = $_GET['id'];

    $sql = "SELECT p.*, u.username, u.foto_usuario, c.titulo AS categoria_titulo, 
                    pa.id_pais, pe.ruta_imagen_pais, pi.nombre
            FROM publicaciones_recetas p
            INNER JOIN usuarios u ON p.id_usuario_autor = u.id_usuario
            INNER JOIN categorias c ON p.id_categoria = c.id_categoria
            LEFT JOIN paises_recetas pa ON p.id_publicacion = pa.id_publicacion
            LEFT JOIN paises pe ON pa.id_pais = pe.id_pais
            LEFT JOIN paises pi ON pa.id_pais = pi.id_pais
            WHERE p.id_publicacion = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_receta, PDO::PARAM_INT);
    $stmt->execute();
    $recetaData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($recetaData) {

        $receta = $recetaData[0];
        $nombreUsuario = htmlspecialchars($receta['username'], ENT_QUOTES, 'UTF-8');
        $fotoUsuario = htmlspecialchars($receta['foto_usuario'], ENT_QUOTES, 'UTF-8');
        $titulo = htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8');
        $descripcion = htmlspecialchars($receta['descripcion'], ENT_QUOTES, 'UTF-8');
        $fecha = htmlspecialchars($receta['fecha_publicacion'], ENT_QUOTES, 'UTF-8');
        $dificultad = htmlspecialchars($receta['dificultad'], ENT_QUOTES, 'UTF-8');
        $minutos_prep = htmlspecialchars($receta['minutos_prep'], ENT_QUOTES, 'UTF-8');
        $imagen = '../html_paises/img/imgArg/' . $receta['titulo'] . '.jpg';
        
        if (!file_exists($imagen)) {
            $imagen = '../html_paises/img/imgArg/default.jpg';
        }

        $categoriaTitulo = htmlspecialchars($receta['categoria_titulo'], ENT_QUOTES, 'UTF-8');
        $etiquetas = array_unique(array_column($recetaData, 'etiqueta_titulo'));
        $paisRecetas = array_unique(array_column($recetaData, 'ruta_imagen_pais'));
        $nombrePais = htmlspecialchars($receta['nombre'], ENT_QUOTES, 'UTF-8');

        $sql_ingredientes = "SELECT ingrediente FROM ingredientes_recetas WHERE id_publicacion = :id";
        $stmt_ingredientes = $conn->prepare($sql_ingredientes);
        $stmt_ingredientes->bindParam(':id', $id_receta, PDO::PARAM_INT);
        $stmt_ingredientes->execute();
        $ingredientes = $stmt_ingredientes->fetchAll(PDO::FETCH_COLUMN);

        $sql_pasos = "SELECT pu.id_paso, pu.num_paso, pu.texto, img.ruta_imagen_paso
                      FROM pasos_recetas pu
                      LEFT JOIN imagenes_pasos img ON pu.id_paso = img.id_paso
                      WHERE pu.id_publicacion = :id
                      ORDER BY pu.num_paso ASC";

        $stmt_pasos = $conn->prepare($sql_pasos);
        $stmt_pasos->bindParam(':id', $id_receta, PDO::PARAM_INT);
        $stmt_pasos->execute();
        $pasosData = $stmt_pasos->fetchAll(PDO::FETCH_ASSOC);
        
        // pasos y sus imágenes
        $pasos = [];
        foreach ($pasosData as $paso) {
            $idPaso = $paso['id_paso'];
            if (!isset($pasos[$idPaso])) {
                $pasos[$idPaso] = [
                    'num_paso' => htmlspecialchars($paso['num_paso'], ENT_QUOTES, 'UTF-8'),
                    'texto' => htmlspecialchars($paso['texto'], ENT_QUOTES, 'UTF-8'),
                    'imagenes' => []
                ];
            }
            if (!empty($paso['ruta_imagen_paso'])) {
                $pasos[$idPaso]['imagenes'][] = htmlspecialchars($paso['ruta_imagen_paso'], ENT_QUOTES, 'UTF-8');
            }
        }
    } else {
        echo "No se encontró la receta.";
    }
} else {
    echo "No se proporcionó una receta válida.";
}
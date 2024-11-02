<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

    <link rel="stylesheet" href="../buscador/buscador_style.css">
    <link rel="stylesheet" href="../css/c-countries.css">
    <script src="../buscador/buscador_script.js" defer></script>
    <script src="mostrarSegunFecha.js"></script>
    <script src="../index/manejarModal.js" defer></script>
    <script src="receta_paises.js" defer></script>
    
    <?php include '../includes/head.php'; ?>
</head>

<body>

<?php 
include '../includes/header.php'; 
include '../includes/conec_db.php';

$id_pais = isset($_GET['id_pais']) ? intval($_GET['id_pais']) : null;

if ($id_pais) {
    // Obtener el nombre del país
    $stmt = $conn->prepare("SELECT nombre FROM paises WHERE id_pais = :id_pais");
    $stmt->execute(['id_pais' => $id_pais]);
    $pais = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener las recetas del país
    $stmt = $conn->prepare("
        SELECT publicaciones_recetas.* 
        FROM publicaciones_recetas 
        JOIN paises_recetas ON publicaciones_recetas.id_publicacion = paises_recetas.id_publicacion 
        WHERE paises_recetas.id_pais = :id_pais
    ");
    $stmt->execute(['id_pais' => $id_pais]);
    $recetas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $pais = null;
    $recetas = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recetas de <?= $pais ? $pais['nombre'] : 'País' ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Recetas de <?= $pais ? $pais['nombre'] : 'País' ?></h2>
    <div class="row">
        <?php if (!empty($recetas)): ?>
            <?php foreach ($recetas as $receta): ?>
                <?php
                $stmt = $conn->prepare("SELECT ruta_imagen FROM imagenes WHERE id_publicacion = :id_publicacion");
                $stmt->execute(['id_publicacion' => $receta['id_publicacion']]);
                $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                    <div class="card h-100">
                        <?php if (!empty($imagenes)): ?>
                            <img src="<?= $imagenes[0]['ruta_imagen'] ?>" class="card-img-top" alt="<?= $receta['titulo'] ?>">
                        <?php else: ?>
                            <img src="default_image_path.jpg" class="card-img-top" alt="Imagen no disponible">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $receta['titulo'] ?></h5>
                            <p class="card-text"><?= $receta['descripcion'] ?></p>
                            <a href="" class="btn btn-primary verReceta" data-modal="modal<?= str_replace(' ', '', $receta['titulo']) ?>">Ver Receta</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay recetas disponibles para este país.</p>
        <?php endif; ?>
    </div>
</body>
</html>


<?php
session_start();
include '../includes/conec_db.php';

$id_pais = isset($_GET['id_pais']) ? intval($_GET['id_pais']) : null;

if ($id_pais) {
    // Obtener el nombre del país
    $stmt = $conn->prepare("SELECT nombre FROM paises WHERE id_pais = :id_pais");
    $stmt->execute(['id_pais' => $id_pais]);
    $pais = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener las recetas del país
    $stmt = $conn->prepare("
        SELECT publicaciones_recetas.*,
               AVG(valoraciones.puntuacion) AS valoracion_puntaje
        FROM publicaciones_recetas
        JOIN paises_recetas ON publicaciones_recetas.id_publicacion = paises_recetas.id_publicacion
        LEFT JOIN valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion
        WHERE paises_recetas.id_pais = :id_pais
        GROUP BY publicaciones_recetas.id_publicacion
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas de <?= $pais ? htmlspecialchars($pais['nombre'], ENT_QUOTES, 'UTF-8') : 'País' ?></title>
    <link rel="stylesheet" href="../buscador/buscador_style.css">
    <link rel="stylesheet" href="../css/c-countries.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./formato.css">
    <script src="../buscador/buscador_script.js" defer></script>
    <script src="mostrarSegunFecha.js"></script>
    <script src="../index/manejarModal.js" defer></script>
    <script src="receta_paises.js" defer></script>
    <?php include '../includes/head.php'; ?>
</head>

<body>
    <main class="flex-grow-1">
        <?php include '../includes/header.php'; ?>

        <div class="container mt-3">
            <h2 class="text-center my-4 fw-bold" style="color: #198754;">
                Recetas de <?= $pais ? htmlspecialchars($pais['nombre'], ENT_QUOTES, 'UTF-8') : 'País' ?>
            </h2>
            <div class="row">
                <?php if (!empty($recetas)): ?>
                    <?php foreach ($recetas as $receta): ?>
                        <?php
                        // Obtener las imágenes de la receta
                        $stmt = $conn->prepare("SELECT ruta_imagen FROM imagenes WHERE id_publicacion = :id_publicacion");
                        $stmt->execute(['id_publicacion' => $receta['id_publicacion']]);
                        $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                            <div class="card h-100 cursor-pointer" style="border-radius: 15px; overflow: hidden;">
                                <a href="../recetas/receta-plantilla.php?id=<?= $receta['id_publicacion'] ?>">
                                    <div class="card-img-wrapper position-relative d-flex justify-content-center align-items-center" style="aspect-ratio: 16/9; border-radius: 15px 15px 0 0;">
                                        <img src="<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['ruta_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                                            class="card-img-top img-fluid"
                                            alt="<?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?>"
                                            style="object-fit: cover; width: 100%; height: 100%;">
                                        <!-- Superposición en la parte inferior de la imagen -->
                                        <div class="card-overlay">
                                            <div class="card-details d-flex justify-content-between w-100">
                                                <p class="card-text dificultad m-0"><?= htmlspecialchars($receta['dificultad'], ENT_QUOTES, 'UTF-8') ?></p>
                                                <p class="card-text minutos m-0"><?= htmlspecialchars($receta['minutos_prep'], ENT_QUOTES, 'UTF-8') ?> min</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body text-left">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title receta-titulo m-0"><?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?></h5>
                                        <div class="rating d-flex mb-2">
                                            <?php $puntuacion = (int)$receta['valoracion_puntaje']; ?>
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <i class="bi bi-star-fill <?= $i <= $puntuacion ? 'text-warning' : 'text-secondary' ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay recetas disponibles para este país.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include '../includes/footer.php' ?>

</body>

</html>
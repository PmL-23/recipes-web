<?php
session_start();
include '../includes/permisos.php'
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/c-countries.css">
    <link rel="stylesheet" href="./sliders/carrousell.css">
    <link rel="stylesheet" href="./recetas.css">
    <link rel="stylesheet" href="./sliders/carrouselRecetasMasValoradas.css">
    <!-- JS -->
    <script src="./recetasSegunHora/mostrarPorFecha1.js" defer></script>
    <script src="receta_paises.js" defer></script>
    <script src="./sliders/recetasSlider.js" defer></script>
    <!-- HEAD -->
    <?php include '../includes/head.php' ?>
</head>

<body>

    <?php
    include '../includes/header.php';
    include '../includes/conec_db.php';
    include '../includes/paises.php';
    include './mejoresRecetas.php';
    include './recetasSegunHora/mostrarSegunHora.php';
    ?>

    <!-- BANDERAS -->
    <div class="paises-contenedor">
        <?php foreach ($paises as $pais): ?>
            <a href="#">
                <div class="bandera-container" onclick="abrirRecetas(<?= $pais['id_pais'] ?>)">
                    <img src="../svg/<?= $pais['ruta_imagen_pais'] ?>" alt="<?= $pais['nombre'] ?>" title="<?= $pais['nombre'] ?>" class="bandera" width="100" height="auto">
                </div>
            </a>
        <?php endforeach; ?>
    </div>


   


    <!-- MEJORES RECETAS -->
    <div class="pt-7"></div>
    <div class="container">
        <div class="my-4 text-start display-4 fw-bold" style="color: #198754;">Las mejores recetas!</div>
    </div>

    <div class="container">
        <div class="swiper-container" id="swiperRecetas">
            <div class="swiper-wrapper">
                <?php foreach ($masValoradas as $receta): ?>
                    <?php
                    $stmt = $conn->prepare("SELECT ruta_imagen FROM imagenes WHERE id_publicacion = :id_publicacion");
                    $stmt->execute(['id_publicacion' => $receta['id_publicacion']]);
                    $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="swiper-slide">
                        <div class="card h-100 cursor-pointer" style="border-radius: 15px; overflow: hidden;">
                            <a href="../recetas/receta-plantilla.php?id=<?= $receta['id_publicacion'] ?>">
                                <div class="card-img-wrapper position-relative d-flex justify-content-center align-items-center" style="aspect-ratio: 16/9; border-radius: 15px 15px 0 0;">
                                    <img src="<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['ruta_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                                        class="card-img-top img-fluid"
                                        alt="<?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?>"
                                        style="object-fit: cover; width: 100%; height: 100%;">
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

            </div>
            <!-- flechas de navegacion -->
            <div class="swiper-button-next" id="swiperButtonNextRecetas" style="margin-top: 42rem;color: #198754;"></div>
            <div class="swiper-button-prev" id="swiperButtonPrevRecetas" style="margin-top: 42rem;color: #198754;"></div>
        </div>
    </div>


    <!-- MOSTRAR RECETAS SEGUN HORA -->
    <div class="container mt-5">
        <div id="saludoDia" class="saludo-dia my-4 text-start display-4 fw-bold" style="color: #198754;">
            <!-- saludo dinamico -->
        </div>
        <div id="mensajeRecetas" class="mt-2 text-start display-6 fw-bold" style="color: #198754;"></div>

        <div class="container mt-3">
            <div class="row">
                <?php foreach ($recetasSegunHora as $receta): ?>
                    <?php
                    $stmt = $conn->prepare("SELECT ruta_imagen FROM imagenes WHERE id_publicacion = :id_publicacion");
                    $stmt->execute(['id_publicacion' => $receta['id_publicacion']]);
                    $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card h-100 cursor-pointer" style="border-radius: 15px; overflow: hidden;">
                            <a href="../recetas/receta-plantilla.php?id=<?= $receta['id_publicacion'] ?>">
                                <div class="card-img-wrapper position-relative d-flex justify-content-center align-items-center" style="aspect-ratio: 16/9; border-radius: 15px 15px 0 0;">
                                    <img src="<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['ruta_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                                        class="card-img-top img-fluid"
                                        alt="<?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?>"
                                        style="object-fit: cover; width: 100%; height: 100%;">
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
            </div>
        </div>
    </div>

</body>
<?php include '../includes/footer.php' ?>

</html>
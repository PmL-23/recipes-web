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


    <!-- SLIDER ROTATIVO -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="2000" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                <span class="timer"></span>
            </button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                <span class="timer"></span>
            </button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                <span class="timer"></span>
            </button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4">
                <span class="timer"></span>
            </button>
        </div>
        <div class="carousel-inner">

            <div class="carousel-item active d-item">
                <img src="./img/aprender.jpg" class="d-block w-100 d-img" alt="Bienvenida">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Tu mejor sitio de Recetas!</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Bienvenido!</h1>
                </div>
            </div>

            <div class="carousel-item d-item">
                <img src="./img/saludables.jpg" class="d-block w-100 d-img" alt="saludables">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Descubre nuestrar recetas mas saludables</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Nos importa tu salud!</h1>
                </div>
            </div>

            <div class="carousel-item d-item">
                <img src="./img/amasar.jpg" class="d-block w-100 d-img" alt="masas">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Se un experto con las masas</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Aprende a Amasar!</h1>
                </div>
            </div>

            <div class="carousel-item d-item">
                <img src="./img/comidasyhoras.jpg" class="d-block w-100 d-img" alt="masas">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Hay recetas para cada momento de tu dia</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Elige tu momento!</h1>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

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
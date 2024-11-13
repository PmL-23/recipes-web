<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

    <link rel="stylesheet" href="categorias.css">
    <link rel="stylesheet" href="../html_paises/formatoRecetasPaises.css">
    <script src="categorias.js" defer></script>

    <?php include '../includes/head.php' ?>

</head>

<body>
    <?php
    include '../includes/header.php';
    include './consultas.php';
    ?>

    <div class="container d-flex flex-column align-items-center">
        <h1 class="my-5">Filtrar categorias</h1>
        <div class="w-75">
            <ul class="d-flex d-column w-100 justify-content-around flex-wrap">
                <li class="filtro-item item-active">Todas</li>
                <li class="filtro-item">Saladas</li>
                <li class="filtro-item">Ocasiones especiales</li>
                <li class="filtro-item">Dietas especiales</li>
                <li class="filtro-item">Bebidas</li>
                <li class="filtro-item">Dulces</li>
            </ul>
        </div>
    </div>

    <div class="secciones-container">

        <!-- seccion saladas -->
        <v id="saladas-seccion" class="container filtro-seccion">


            <div class="container mt-3">
                <h2 class="my-4">Saladas</h2>
                <div class="row">
                    <?php foreach ($saladas as $receta): ?>
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

    <!-- seccion ocasiones especiales -->
    <div id="ocasiones-esp-seccion" class="container filtro-seccion">
        <h2 class="my-4">Ocasiones especiales</h2>

        <div id="ocasiones-especiales-container" class="filtro-container d-flex flex-row flex-wrap">

            <!-- elementos dinamicos -->

        </div>
    </div>

    <!-- seccion dietas especiales -->
    <div id="dietas-esp-seccion" class="container filtro-seccion">
        <h2 class="my-4">Dietas especiales</h2>

        <div id="dietas-especiales-container" class="filtro-container d-flex flex-row flex-wrap">

            <!-- elementos dinamicos -->

        </div>
    </div>

    <!-- seccion bebidas -->
    <div id="bebidas-seccion" class="container filtro-seccion">
        <h2 class="my-4">Bebidas</h2>
        <div id="bebidas-container" class="filtro-container d-flex flex-row flex-wrap">

            <!-- elementos dinamicos -->

        </div>
    </div>

    <!-- seccion dulces -->
    <div id="dulces-seccion" class="container filtro-seccion">
        <h2 class="my-4">Dulces</h2>
        <div id="dulces-container" class="filtro-container d-flex flex-row flex-wrap">

            <!-- elementos dinamicos -->

        </div>
    </div>

    </div>
    <?php include '../includes/footer.php' ?>
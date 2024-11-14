<?php
session_start();
require_once('./ScriptsPHP/ObtenerRecetasDeCategoria.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

    <link rel="stylesheet" href="categorias1.css">

    <link rel="stylesheet" href="../html_paises/formatoRecetasPaises.css">
    <script src="./categoriass.js" defer></script>

    <?php include '../includes/head.php' ?>

</head>

<body>

    <main class="flex-grow-1"> <?php include '../includes/header.php' ?>

        <h2 class="text-center pt-5 fw-bold">Categoria: <span class="text-secondary fw-lighter"><?php if (!$categoriaTitulo == NULL) echo $categoriaTitulo["titulo"];
                                                                                                else echo "Categoria no encontrada"; ?></span></h2>

        <!-- Sección de recetas -->
        <div class="container mt-5">
            <div class="row">
                <?php if (!empty($recetasDeCategoria)): ?>
                    <?php foreach ($recetasDeCategoria as $receta): ?>
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
                <?php else: ?>
                    <h2 class="text-center pt-5 fw-lighter">No hay recetas en esta categoria.</h2>
                <?php endif; ?>

            </div>

        </div>
    </main>

    <?php include '../includes/footer.php' ?>
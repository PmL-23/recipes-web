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
        
        <link rel="stylesheet" href="categorias.css">
        <script src="categorias.js" defer></script>
        
        <?php include '../includes/head.php'?>
        
    </head>
    
<body>
<?php include '../includes/header.php'?>

    <h2 class="text-center pt-5 fw-bold">Categoria: <span class="text-secondary fw-lighter"><?php if(!$categoriaTitulo == NULL) echo $categoriaTitulo["titulo"]; else echo "Categoria no encontrada"; ?></span></h2>

    <!-- Sección de recetas -->
    <div class="container mt-5">
        <div class="row">

            <?php if (!empty($recetasDeCategoria)): ?>
                <?php foreach ($recetasDeCategoria as $receta): ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion">
                        <div class="card h-100">
                            <img src='../images/<?= $receta['ruta_imagen'] ?>' class="card-img-top" alt="<?= $receta['titulo'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $receta['titulo'] ?></h5>
                                <p class="card-text"><?= $receta['descripcion'] ?></p>
                                <a href="" class="btn btn-primary verReceta" data-modal="modal<?= str_replace(' ', '', $receta['titulo']) ?>">Ver Receta</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h2 class="text-center pt-5 fw-lighter">No hay recetas en esta categoria.</h2>
            <?php endif; ?>

        </div>

    </div>

<?php include '../includes/footer.php'?>
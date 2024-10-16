<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>

    <?php include '../includes/head.php' ?>
</head>

<body>
    <?php include '../includes/header.php' ?>
    <!-- BUSCADOR -->
    <?php include '../includes/conec_db.php'; ?>
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
        <div class="card h-100">
            <img src="../html_paises/img/imgArg/medialunas.jpg" class="card-img-top" alt="medialunas">
            <div class="card-body">
                <h5 class="card-title">Medialunas</h5>
                <p class="card-text">Deliciosas medialunas que son croissants argentinos, ideales para acompañar
                    café con leche.</p>
                <a id="verReceta" href="#" class="btn btn-primary verReceta" data-modal="modalReceta">Ver Receta</a>
            </div>
        </div>
    </div>
</body>

<?php include '../includes/footer.php' ?>

</html>
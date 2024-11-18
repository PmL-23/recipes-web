<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>
        
        <link rel="stylesheet" href="categorias1.css">
        <script src="./categoriass.js" defer></script>
        
        <?php include '../includes/head.php'?>
        
    </head>
    
<body>
<?php include '../includes/header.php'?>

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
        <div id="saladas-seccion" class="container filtro-seccion">
            <h2 class="my-4">Saladas</h2>
    
            <div id="saladas-container" class="filtro-container d-flex flex-row flex-wrap align-items-center">
    
                <!-- elementos dinamicos -->
    
            </div>
        </div>
    
        <!-- seccion ocasiones especiales -->
        <div id="ocasiones-esp-seccion" class="container filtro-seccion">
            <h2 class="my-4">Ocasiones especiales</h2>
    
            <div id="ocasiones-especiales-container" class="filtro-container d-flex flex-row flex-wrap align-items-center">
    
                <!-- elementos dinamicos -->
    
            </div>
        </div>
    
        <!-- seccion dietas especiales -->
        <div id="dietas-esp-seccion" class="container filtro-seccion">
            <h2 class="my-4">Dietas especiales</h2>
    
            <div id="dietas-especiales-container" class="filtro-container d-flex flex-row flex-wrap align-items-center">
    
                <!-- elementos dinamicos -->
    
            </div>
        </div>
    
        <!-- seccion bebidas -->
        <div id="bebidas-seccion" class="container filtro-seccion">
            <h2 class="my-4">Bebidas</h2>
            <div id="bebidas-container" class="filtro-container d-flex flex-row flex-wrap align-items-center">
    
                <!-- elementos dinamicos -->
    
            </div>
        </div>
    
        <!-- seccion dulces -->
        <div id="dulces-seccion" class="container filtro-seccion">
            <h2 class="my-4">Dulces</h2>
            <div id="dulces-container" class="filtro-container d-flex flex-row flex-wrap align-items-center">
    
                <!-- elementos dinamicos -->
    
            </div>
        </div>

    </div>
    <?php include '../includes/footer.php'?>
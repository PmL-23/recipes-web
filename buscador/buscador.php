<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

    <link rel="stylesheet" href="a.css">
    <script src="a.js" defer></script>
    <script src="buscador_script.js" defer></script>
    <!-- <script src="search.js" defer></script> -->
    <!-- <script src="pasos.js" defer></script> -->
    <script src="ingredientes.js" defer></script>

    <?php include '../includes/head.php' ?>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/conec_db.php';
    include '../includes/paises.php' ?>
 <!-- BUSCADOR -->
 <div class="container mt-4 d-flex justify-content-center">
        <div class="search-input-box">
            <a href="#" target="_blank" class="search-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#26533c" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="6"></circle>
                    <line x1="16" y1="16" x2="21" y2="21"></line>
                </svg>
            </a>
            <input type="text" id="campo" placeholder="Busca recetas, ingredientes, personas y más" />
            <a href="filtrar.php"><button type="button" id="toggleFiltro" class="btn btn-primary ms-2 me-2">Filtrar</button></a>
            
           

            <div class="container-suggestions">
                <!-- Aquí irán las sugerencias -->
            </div>
        </div>
        <div class="buscador2 ocultar">
            <div id="tituloContainer"></div>
        </div>
    </div>



<div class="container-suggestions">
    <!-- Aquí irán las sugerencias -->
</div>

<div id="content" class="oculto pt-7">

</div>


    <div>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
        <h1></h1><br>
    </div>









    <?php include '../includes/footer.php' ?>
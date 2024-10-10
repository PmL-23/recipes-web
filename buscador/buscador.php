<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>

        <link rel="stylesheet" href="buscador_style.css">
        <script src="buscador_script.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>
    
    <!-- BUSCADOR -->
    <div class="buscador mt-4">
        <form action="#" method="GET">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#26533c" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="6" /> <!-- El círculo de la lupa -->
                <line x1="16" y1="16" x2="21" y2="21" /> <!-- Mango de la lupa -->
            </svg>
            <input type="text" placeholder="Busca recetas, ingredientes, personas y más"
                class="form-control d-inline-block" style="width: 80%;" id="busqueda">
            <button type="button" id="toggleFiltro" class="btn btn-primary">Filtrar</button>
        </form>
    
        <div class="filtro" id="filtro">
            <h5>Filtros de Búsqueda</h5>
            <form id="filtroForm">
                <div class="form-group container">
                    <label for="tipoFiltro">Filtrar por:</label>
                    <select class="form-control" id="tipoFiltro">
                        <option value="publicacion">Publicación</option>
                        <option value="ingredientes">Ingredientes</option>
                        <option value="etiquetas">Etiquetas</option>
                        <option value="categoria">Categoría</option>
                    </select>
                </div>
            <div class="container">
                <div class="form-group d-none" id="ingrediente-filtro">
                    <label for="ingrediente">Ingrediente</label>
                    <input type="text" class="form-control" id="ingrediente" placeholder="Ej. Tomate">
                </div>
                <div class="form-group d-none" id="categoria-filtro">
                    <label for="categoria">Categoría</label>
                    <select class="form-control" id="categoria" multiple>
                        <option value="saladas">Saladas</option>
                        <option value="ocaciones-especiales">Ocaciones Especiales</option>
                        <option value="dietas-especiales">Dietas Especiales</option>
                        <option value="bebidas">Bebidas</option>
                        <option value="dulces">Dulces</option>
                    </select>
                </div>
                <div class="form-group d-none" id="publicacion-filtro">
                    <label for="publicacion">Publicación</label>
                    <select class="form-control" id="publicacion" multiple>
                        <option value="Valoración">Valoración</option>
                        <option value="Tiempo de elaboración">Tiempo de elaboración</option>
                    </select>
                </div>
                <div class="form-group d-none" id="etiqueta-filtro">
                    <label for="etiqueta">Etiquetas</label>
                    <input type="text" class="form-control" id="etiqueta" placeholder="Ej. Vegetariano">
                </div>
            </div>
            </form>
        </div>   
</div>

<div class="container">
    <h2>Resultado:</h2><span id="text-ingresado"></span>
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









<?php include '../includes/footer.php'?>  
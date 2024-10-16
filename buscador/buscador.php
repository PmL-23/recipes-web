<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

    <link rel="stylesheet" href="../index/a.css">
    <script src="../index/a.js" defer></script>
    <script src="buscador_script.js" defer></script>
    <script src="search.js" defer></script>
    <script src="pasos.js" defer></script>
    <script src="ingredientes.js" defer></script>

    <?php include '../includes/head.php' ?>
</head>

<body>
    <?php include '../includes/header.php'; ?>

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
            <button type="button" id="toggleFiltro" class="btn btn-primary ms-2 me-2">Filtrar</button>
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

            <div class="container-suggestions">
                <!-- Aquí irán las sugerencias -->sacascascasc
            </div>
        </div>
        <div class="buscador2 ocultar">
            <div id="tituloContainer"></div>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <tbody id="content">
                <!-- Aquí se rellenarán los datos dinámicamente -->cascascascascsc
            </tbody>
        </table>

        <div id="modalReceta" class="modal">
            <div class="modal-contenido">
                <span class="cerrar">&times;</span>
                <h3>Pasos:</h3>
                <ol id="pasosReceta">
                    <!-- Los pasos se cargarán aquí dinámicamente -->
                </ol>
                <h3>Ingredientes:</h3>
                <ul id="ingredientesReceta">
                    <!-- Los ingredientes se cargarán aquí dinámicamente -->
                </ul>
            </div>
        </div>
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
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar</title>
    <?php include '../includes/head.php'; ?>
    <link rel="stylesheet" href="buscador.css">
    <script src="buscar.js" defer></script>
    <script src="filtross.js" defer></script>
    <script src="manejarCampos.js" defer></script>
</head>

<body class="cuerpo">
    <div class="contenido">
        <?php include '../includes/header.php'; ?>
        <?php include '../includes/conec_db.php'; ?>

        <!-- BUSCADOR -->
        <div class="buscador text-center my-3">
            <form id="buscarReceta" method="POST" class="d-flex justify-content-center">
                <input id="acaa" type="text" placeholder="Busca recetas, ingredientes, personas y más" class="form-control me-2 buscador-input" name="campo" style="max-width: 400px;">
                <button type="submit" id="toggleFiltro" class="btn buscar-btn buscador-boton">Buscar</button>
                <button type="button" id="toggleFiltro" class="btn filtrar-btn buscador-boton">Filtros</button>
            </form>
        </div>


        <!-- RECETAS Y FILTROS -->
        <div class="container flex-fill mt-1">
            <div class="row">
                <!-- FILTRO-->
                <div class="filtroTamanio col-lg-3 col-md-4 col-sm-12 mb-4">
                    <!-- filtro pantallas chicas -->
                    <a id="pantallasChicas" class=" oculto" href="#">
                        <div class="mt-3">
                            <h5 id="filtroChico">Filtros</h5>
                        </div>
                    </a>
                    <!-- MODAL -->
                    <div id="modalFiltros" class="modal-overlay oculto">
                        <div class="modal-contenido">
                            <span class="close-modal">&times;</span>
                            <h5>Filtros</h5>
                            <form id="filtrarRecetaModal" method="POST">
                                <div class="form-group">
                                    <label for="dificultad">Dificultad</label>
                                    <select name="dificultad" id="dificultad" class="form-control">
                                        <option value="" disabled selected>Seleccione una dificultad.</option>

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="categoria">Categoria</label>
                                    <select name="categoria" id="categoria" class="form-control">
                                        <option value="" disabled selected>Seleccione una categoria</option>

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tiempo">Tiempo de Preparación</label>
                                    <select id="tiemp0" name="tiempo" class="form-control">
                                        <option value="" disabled selected>Seleccione una tiempo.</option>
                                        <option value="menos30">Menos de 30 minutos</option>
                                        <option value="30a60">30 a 60 minutos</option>
                                        <option value="mas60">Más de 60 minutos</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="valoracion">Valoraciones</label>
                                    <select name="valoracion" id="valoracion" class="form-control">
                                        <option value="" disabled selected>Seleccione una valoracion.</option>
                                        <option value="masValoradas">Mas Valoradas</option>
                                        <option value="menosValoradas">Menos Valoradas</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="etiqueta">Etiquetas</label>
                                    <select name="etiqueta" id="etiqueta" class="form-control">
                                        <option value="" disabled selected>Seleccione una etiqueta.</option>

                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="ingrediente">Ingredientes</label>
                                    <select name="ingrediente" id="ingrediente" class="form-control">
                                        <option value="" disabled selected>Seleccione un orden.</option>
                                        <option value="masIngredientes">Menor cantidad de ingredientes</option>
                                        <option value="menosIngredientes">Mayor cantidad de ingredientes</option>
                                    </select>
                                    <div id="buscarIngredientePantallaChica" class="form-group mt-3">
                                        <button type="button" class="btn btn-secondary form-control">Buscar Ingrediente</button>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" id="aplicarModalFiltros" class="btn btn-primary mt-3">Aplicar Filtros</button>
                                    <button type="button" id="limpiarFiltrosModal" class="btn btn-danger mt-3">Limpiar Filtros</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- filtro pantallas grandes -->
                    <div id="pantallaGrande" class="filtros mt-4 oculto">
                        <h5>Filtrar por</h5>
                        <form id="filtrarReceta" action="aplicandoFiltros.php" method="POST">
                            <div class="form-group">
                                <label for="dificultad">Dificultad</label>
                                <select name="dificultad" id="dificultad" class="form-control">
                                    <option value="" disabled selected>Seleccione una dificultad.</option>

                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="categoria">Categoria</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="" disabled selected>Seleccione una categoria.</option>

                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tiempo">Tiempo de Preparación</label>
                                <select id="tiempo" name="tiempo" class="form-control">
                                    <option value="" disabled selected>Seleccione una tiempo.</option>
                                    <option value="menos30">Menos de 30 minutos</option>
                                    <option value="30a60">30 a 60 minutos</option>
                                    <option value="mas60">Más de 60 minutos</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="valoracion">Valoraciones</label>
                                <select name="valoracion" id="valoracion" class="form-control">
                                    <option value="" disabled selected>Seleccione una valoracion.</option>
                                    <option value="masValoradas">Mas Valoradas</option>
                                    <option value="menosValoradas">Menos Valoradas</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="etiqueta">Etiquetas</label>
                                <select name="etiqueta" id="etiqueta" class="form-control">
                                    <option value="" disabled selected>Seleccione una etiqueta.</option>

                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="ingrediente">Ingredientes</label>
                                <select name="ingrediente" id="ingrediente" class="form-control">
                                    <option value="" disabled selected>Seleccione un orden.</option>
                                    <option value="masIngredientes">Menor cantidad de ingredientes</option>
                                    <option value="menosIngredientes">Mayor cantidad de ingredientes</option>
                                </select>
                                <div id="buscarIngrediente" class="form-group mt-3">
                                    <button type="button" class="btn btn-secondary form-control">Buscar Ingrediente</button>
                                </div>
                            </div>

                            <div class="form-group botonesFiltros mt-3">
                                <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                                <button type="button" id="limpiarFiltros" class="btn btn-danger ms-2">Limpiar Filtros</button>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- RECETAS-->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div id="resultados" class="row mt-4 text-center">
                        <!-- aca va todo -->
                    </div>
                </div>


            </div>
        </div>

        <?php include '../includes/footer.php'; ?>
    </div>

    <!-- Modal Buscar Ingrediente -->
    <div id="modalBuscarIngrediente" class="modal-overlay oculto">
        <div class="modal-contenido">
            <span id="cerrarModal" class="close-modal">&times;</span>
            <h5>Filtros</h5>
            <div class="modal-body">
                <p class="text-center text-muted mb-4">Agregá los ingredientes que tienes en tu cocina</p>
                <!-- formulario para los ingredientes -->
                <form id="aplicarModalFiltrosBuscar" method="POST">

                    <div id="ingredientes-container">
                        <div class="input-dinamico">
                            <label for="ingrediente1" class="font-weight-bold">1</label>
                            <input type="text" id="ingrediente1" name="campo2" class="form-control" placeholder="Escribe un ingrediente aqui...">
                            <div id="mostrarCampo3" class="oculto">
                                <label for="ingrediente1" class="font-weight-bold">2</label>
                                <input type="text" id="ingrediente2" name="campo3" class="form-control mt-1" placeholder="Escribe un ingrediente aqui...">
                            </div>
                            <div id="mostrarCampo4" class="oculto">
                                <label for="ingrediente1" class="font-weight-bold mt-1">3</label>
                                <input type="text" id="ingrediente3" name="campo4" class="form-control mt-1" placeholder="Escribe un ingrediente aqui...">
                            </div>
                            <div id="mostrarCampo5" class="oculto">
                                <label for="ingrediente1" class="font-weight-bold mt-1">4</label>
                                <input type="text" id="ingrediente4" name="campo5" class="form-control mt-1" placeholder="Escribe un ingrediente aqui...">
                            </div>
                            <button id="eliminarUltimoCampo" type="button" class="mt-1 btn btn-danger ml-2 d-block">
                                <i class="bi bi-trash"></i> <!-- Ícono de papelera de Bootstrap Icons -->
                            </button>
                        </div>
                    </div>

                    <!-- Mensaje de límite de ingredientes -->
                    <p id="limite-mensaje" class="text-danger font-weight-bold mt-2 d-none">No puedes agregar más de 3 ingredientes.</p>
                    <div id="botonesChicos">
                        <button type="button" id="agregar-ingrediente" class="btn btn-warning btn-block my-3">Agregar Ingrediente</button>
                        <button type="submit" id="filtrarBusquedaIngrediente" class="btn btn-primary btn-block">Filtrar</button>
                        <button type="submit" id="filtrarBusquedaIngredienteChico" class="btn btn-primary btn-block oculto">Filtrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


</body>

</html>
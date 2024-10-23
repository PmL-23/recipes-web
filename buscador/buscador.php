<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar</title>
    <?php include '../includes/head.php'; ?>
    <link rel="stylesheet" href="buscador.css">
    <script src="buscador.js" defer></script>
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
                <button type="button" id="toggleFiltro" class="btn filtrar-btn buscador-boton">Filtrar</button>
            </form>
        </div>

        <!-- RECETAS Y FILTROS -->
        <div class="container flex-fill mt-4">
            <div class="row">
                <!-- FILTRO-->
                <div class="filtroTamanio col-lg-3 col-md-4 col-sm-12 mb-4">
                    <!-- filtro pantallas chicas -->
                    <a id="pantallasChicas" class="oculto" href="#">
                        <div class="filtros mt-4">
                            <h5>Filtros</h5>
                        </div>
                    </a>
                    <!-- MODAL -->
                    <div id="modalFiltros" class="modal-overlay oculto">
                        <div class="modal-contenido">
                            <span class="close-modal">&times;</span>
                            <h5>Filtros</h5>
                            <form>
                                <div class="form-group">
                                    <label for="dificultad">Dificultad</label>
                                    <select id="dificultad" class="form-control">
                                        <option value="">Todas</option>
                                        <option value="facil">Fácil</option>
                                        <option value="media">Media</option>
                                        <option value="dificil">Difícil</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tiempo">Tiempo de Preparación</label>
                                    <select id="tiempo" class="form-control">
                                        <option value="">Todos</option>
                                        <option value="menos30">Menos de 30 minutos</option>
                                        <option value="30a60">30 a 60 minutos</option>
                                        <option value="mas60">Más de 60 minutos</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="button" class="btn btn-primary mt-3">Aplicar Filtros</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- filtro pantallas grandes -->
                    <div id="pantallaGrande" class="filtros mt-4">
                        <h5>Filtros</h5>
                        <form>
                            <div class="form-group">
                                <label for="dificultad">Dificultad</label>
                                <select id="dificultad" class="form-control">
                                    <option value="">Todas</option>
                                    <option value="facil">Fácil</option>
                                    <option value="media">Media</option>
                                    <option value="dificil">Difícil</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tiempo">Categoria</label>
                                <select id="tiempo" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="menos30">Mañana</option>
                                    <option value="30a60">Tarde</option>
                                    <option value="mas60">Noche</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tiempo">Tiempo de Preparación</label>
                                <select id="tiempo" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="menos30">Menos de 30 minutos</option>
                                    <option value="30a60">30 a 60 minutos</option>
                                    <option value="mas60">Más de 60 minutos</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <button type="button" class="btn btn-primary mt-3">Aplicar Filtros</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- RECETAS     -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div id="resultados" class="row mt-4 text-center">
                        <!-- aca va todo -->
                    </div>
                </div>
            </div>
        </div>

        <?php include '../includes/footer.php'; ?>
    </div>
</body>

</html>
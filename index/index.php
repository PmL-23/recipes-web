<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

        <link rel="stylesheet" href="../buscador/buscador_style.css">
        <link rel="stylesheet" href="../css/c-countries.css">
        <link rel="stylesheet" href="a.css">
        <script src="a.js" defer></script>
        <script src="../buscador/buscador_script.js" defer></script>
        <script src="mostrarSegunFecha.js"></script>
        <script src="receta_paises.js" defer></script>
        <!-- Link custom script -->
        <script src="../index/manejarModal.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>

    <?php include '../includes/header.php' ?>
    <!-- BUSCADOR -->
     <?php include '../includes/conec_db.php';
     include '../includes/paises.php'?>

     
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
            <div class="filtro mt-4" id="filtro">
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
                <!-- Aquí irán las sugerencias -->
            </div>
        </div>
        <div class="buscador2 ocultar">
            <div id="tituloContainer"></div>
        </div>
    </div>







    <!-- paises -->
    <div class="paises-contenedor">
        <?php foreach($paises as $pais): ?>
            <div class="bandera-container" onclick="abrirRecetas(<?= $pais['id_pais'] ?>)">
                <img src="../svg/<?= $pais['ruta_imagen_pais'] ?>" alt="<?= $pais['nombre'] ?>" title="<?= $pais['nombre'] ?>" class="bandera" width="100" height="auto">
            </div>
        <?php endforeach; ?>
    </div>


    <!-- primer Slider -->

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">

            <div class="carousel-item active d-item"> <!-- solo en esta linea tiene que estar el active-->
                <img src="../img/aprender.jpg" class="d-block w-100 d-img" alt="Bienvenida">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Tu mejor sitio de Recetas!</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Bienvenido!</h1>
                    <!-- <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Ver Recetas</button> -->
                </div>
            </div>

            <div class="carousel-item d-item">
                <img src="../img/saludables.jpg" class="d-block w-100 d-img" alt="saludables">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Descubre nuestrar recetas mas saludables</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Nos importa tu salud!</h1>
                    <!-- <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Ver</button> -->
                </div>
            </div>

            <div class="carousel-item d-item">
                <img src="../img/amasar.jpg" class="d-block w-100 d-img" alt="masas">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Se un experto con las masas</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Aprende a Amasar!</h1>
                    <!-- <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Ver</button> -->
                </div>
            </div>

            <div class="carousel-item d-item">
                <img src="../img/comidasyhoras.jpg" class="d-block w-100 d-img" alt="masas">
                <div class="carousel-caption top-0 mt-4">
                    <p class="mt-5 fs-3 text-uppercase">Hay recetas para cada momento de tu dia</p>
                    <h1 class="display-1 fw-bolder text-capitalize">¡Elige tu momento!</h1>
                    <!-- <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Ver</button> -->
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <div class="pt-7"></div>
    <div class="container">
        <div class="my-4 text-start display-4 fw-bold text-primary">Las mejores recetas!</div>
    </div>

    <!-- slider -->
    <div id="custom">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="receta-item card">
                        <div class="card_landing" style="background-image: url(../images/milanesas_lp.jpg);">
                            <h6>Milanesas</h6>
                        </div>
                        <div class="card_info">
                            <div class="head">
                                <p class="title">Milanesas</p>
                                <div class="description">
                                    <div class="item">
                                        <i class="fas fa-clock"></i>
                                        <p>30 min</p>
                                    </div>
                                    <div class="item">
                                        <i class="fas fa-user"></i>
                                        <p>4</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <p class="title">Ingredientes:</p>
                                <ul class="list">
                                    <li>500g de carne</li>
                                    <li>1 taza de pan rallado</li>
                                    <li>2 huevos</li>
                                    <li>Sal y pimienta al gusto</li>
                                </ul>
                            </div>
                            <div class="action">
                                <a href="../recetas/recetas.php" class="btn">Quiero la receta!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="receta-item card">
                        <div class="card_landing" style="background-image: url(../images/empanadas_lp.jpg);">
                            <h6>Empanadas</h6>
                        </div>
                        <div class="card_info">
                            <div class="head">
                                <p class="title">Empanadas</p>
                                <div class="description">
                                    <div class="item">
                                        <i class="fas fa-clock"></i>
                                        <p>45 min</p>
                                    </div>
                                    <div class="item">
                                        <i class="fas fa-user"></i>
                                        <p>6</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <p class="title">Ingredientes:</p>
                                <ul class="list">
                                    <li>500g de carne picada</li>
                                    <li>1 cebolla</li>
                                    <li>2 huevos</li>
                                    <li>1 paquete de masa para empanadas</li>
                                </ul>
                            </div>
                            <div class="action">
                                <a href="..//recetas/recetas.html" class="btn">Quiero la receta!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="receta-item card">
                        <div class="card_landing" style="background-image: url(../images/nioquis_lp.jpg);">
                            <h6>Ñoquis</h6>
                        </div>
                        <div class="card_info">
                            <div class="head">
                                <p class="title">Ñoquis</p>
                                <div class="description">
                                    <div class="item">
                                        <i class="fas fa-clock"></i>
                                        <p>50 min</p>
                                    </div>
                                    <div class="item">
                                        <i class="fas fa-user"></i>
                                        <p>6</p>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <p class="title">Ingredientes:</p>
                                <ul class="list">
                                    <li>Harina unos g</li>
                                    <li>3kg de queso para rallar</li>
                                    <li>2 huevos</li>
                                    <li>1 paquete de masa para empanadas</li>
                                </ul>
                            </div>
                            <div class="action">
                                <a href="../recetas/recetas.html" class="btn">Quiero la receta!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev custom-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next custom-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- Mostrar segun hora del dia recetas precargadas -->

    <!-- Recetas Argentinas -->
    <div class="container mt-5">
        <!-- Saludo -->
        <div id="saludoDia" class="saludo-dia my-4 text-start display-4 fw-bold text-primary">
            <!-- El saludo dinámico se mostrará aquí -->
        </div>
        <div id="mensajeRecetas" class="mt-2 text-start display-6 fw-bold text-primary"></div> <!-- Nuevo div para el mensaje adicional -->


        <div class="row mt-2">
            <!-- Desayuno Argentino-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/medialunas.jpg" class="card-img-top" alt="medialunas">
                    <div class="card-body">
                        <h5 class="card-title">Medialunas</h5>
                        <p class="card-text">Deliciosas medialunas que son croissants argentinos, ideales para acompañar
                            café con leche.</p>
                        <a id="verReceta" href="" class="btn btn-primary verReceta" data-modal="modalReceta">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno Boliviano-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/api.jpg" class="card-img-top" alt="api con pastel">
                    <div class="card-body">
                        <h5 class="card-title">Api con Pastel</h5>
                        <p class="card-text">Bebida caliente de maíz morado acompañada de pasteles fritos rellenos de
                            queso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalApi">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno Brasilero-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Pão de Queijo.jpg" class="card-img-top" alt="pão de queijo">
                    <div class="card-body">
                        <h5 class="card-title">Pão de Queijo</h5>
                        <p class="card-text">Pequeños panes de queso, crujientes por fuera y suaves por dentro.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPaoDeQueijo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo Chileno-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Pastel de Choclo.jpg" class="card-img-top" alt="pastel de choclo">
                    <div class="card-body">
                        <h5 class="card-title">Pastel de Choclo</h5>
                        <p class="card-text">Guiso a base de carne y una capa de puré de maíz.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPastelDeChoclo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo Colombiano-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Bandeja Paisa.jpg" class="card-img-top" alt="bandeja paisa">
                    <div class="card-body">
                        <h5 class="card-title">Bandeja Paisa</h5>
                        <p class="card-text">Plato típico con frijoles, carne, chicharrón, arroz y aguacate.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBandejaPaisa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo Ecuatoriano-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Encebollado.jpg" class="card-img-top" alt="encebollado">
                    <div class="card-body">
                        <h5 class="card-title">Encebollado</h5>
                        <p class="card-text">Sopa de pescado con yuca, cebolla y cilantro, muy nutritiva.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEncebollado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda Paraguaya-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Pan de Queso.jpg" class="card-img-top" alt="pan de queso">
                    <div class="card-body">
                        <h5 class="card-title">Pan de Queso</h5>
                        <p class="card-text">Pequeños panes de queso, suaves por dentro y crujientes por fuera.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanDeQueso">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda Peruana-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Picarones.jpg" class="card-img-top" alt="picarones">
                    <div class="card-body">
                        <h5 class="card-title">Picarones</h5>
                        <p class="card-text">Dulces fritos en aceite vegetas hechos con masa de camote y zapallo, bañados en miel de chancaca.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPicarones">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda Uruguaya-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Pastafrola.jpg" class="card-img-top" alt="pastafrola">
                    <div class="card-body">
                        <h5 class="card-title">Pastafrola</h5>
                        <p class="card-text">Tarta dulce con mermelada, un clásico de la merienda uruguaya.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPastafrola">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena Venezolana-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Empanadas Andinas.jpg" class="card-img-top" alt="empanadas andinas">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas Andinas</h5>
                        <p class="card-text">Empanadas crujientes rellenas de carne o queso, típicas de los Andes venezolanos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadasAndinas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena Argentina-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/ravioles.jpg" class="card-img-top" alt="ravioles">
                    <div class="card-body">
                        <h5 class="card-title">Ravioles</h5>
                        <p class="card-text">Pasta Argentina rellena de carne, queso, verduras o una combinación de
                            estas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalRavioles">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena Boliviana-->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/chankaPollo.jpg" class="card-img-top" alt="chanka de pollo">
                    <div class="card-body">
                        <h5 class="card-title">Chanka de Pollo</h5>
                        <p class="card-text">Sopa de pollo típica de la región andina de Bolivia, preparada con choclo,
                            papas, y hierbas aromáticas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChankaPollo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- horario fuera de limite -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion madrugada">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Biscoito de Polvilho.jpg" class="card-img-top" alt="biscoito de polvilho">
                    <div class="card-body">
                        <h5 class="card-title">Biscoito de Polvilho</h5>
                        <p class="card-text">Galletas crujientes hechas de almidón de yuca, ideales para acompañar un
                            café.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBiscoitoPolvilho">Ver Receta</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion madrugada">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/masacoPlatano.jpg" class="card-img-top" alt="masaco de platano">
                    <div class="card-body">
                        <h5 class="card-title">Masaco de plátano</h5>
                        <p class="card-text">Un delicioso puré de plátano verde frito, mezclado con queso o carne.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMasaco">Ver Receta</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion madrugada">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Arroz con Leche y Mazamorra.jpg" class="card-img-top" alt="arroz con leche y mazamorra">
                    <div class="card-body">
                        <h5 class="card-title">Arroz con Leche y Mazamorra</h5>
                        <p class="card-text">Una combinación de Arroz con Leche cremoso y Mazamorra Morada con maíz morado, frutas y especias.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozConLecheYmazamorra">Ver Receta</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Modal para medialunas -->
    <div id="modalReceta" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Medialunas</h2>
            <p id="descripcionReceta">Deliciosas medialunas que son croissants argentinos, ideales para acompañar café
                con leche.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de agua</li>
                <li>1/2 taza de azúcar</li>
                <li>500g de harina</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Mezclar los ingredientes secos.</li>
                <li>Añadir el agua y amasar.</li>
                <li>Dejar reposar durante 1 hora.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>
    <!-- Modal Api con Pastel -->
    <div id="modalApi" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Api con Pastel</h2>
            <p id="descripcionReceta">Bebida caliente de maíz morado acompañada de pasteles fritos rellenos de queso.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de maíz morado</li>
                <li>1/2 taza de azúcar</li>
                <li>1 litro de agua</li>
                <li>Pasteles fritos de queso</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocer el maíz morado en agua y azúcar hasta que suelte color.</li>
                <li>Colar y servir caliente con los pasteles.</li>
            </ol>
        </div>
    </div>
    <!-- Modal para Pão de Queijo -->
    <div id="modalPaoDeQueijo" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Pão de Queijo</h2>
            <p id="descripcionReceta">Pequeños panes de queso, crujientes por fuera y suaves por dentro.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>250g de queso parmesano</li>
                <li>250g de harina de yuca</li>
                <li>125ml de leche</li>
                <li>125ml de aceite</li>
                <li>2 huevos</li>
                <li>Sal al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Precalentar el horno a 180°C.</li>
                <li>Mezclar la harina con el queso y la sal.</li>
                <li>Calentar el aceite y la leche, luego añadir a la mezcla.</li>
                <li>Agregar los huevos y amasar bien.</li>
                <li>Formar bolitas y hornear por 20 minutos.</li>
            </ol>
        </div>
    </div>
    <!-- Modal para Pastel de Choclo -->
    <div id="modalPastelDeChoclo" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreRecetaPastelDeChoclo">Pastel de Choclo</h2>
            <p id="descripcionRecetaPastelDeChoclo">Guiso a base de carne y una capa de puré de maíz.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesRecetaPastelDeChoclo">
                <li>500g de carne molida</li>
                <li>2 tazas de maíz</li>
                <li>1 cebolla</li>
                <li>2 huevos</li>
                <li>Sal y pimienta al gusto</li>
                <li>1 taza de aceitunas</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosRecetaPastelDeChoclo">
                <li>Sofreír la cebolla y agregar la carne.</li>
                <li>Preparar un puré con el maíz y los huevos.</li>
                <li>Colocar la carne en un molde y cubrir con el puré.</li>
                <li>Hornear durante 30 minutos a 180°C.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Bandeja Paisa -->
    <div id="modalBandejaPaisa" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Bandeja Paisa</h2>
            <p id="descripcionReceta">Plato típico con frijoles, carne, chicharrón, arroz y aguacate.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de frijoles</li>
                <li>200g de carne molida</li>
                <li>100g de chicharrón</li>
                <li>1 taza de arroz</li>
                <li>1 aguacate</li>
                <li>1 plátano maduro</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocinar los frijoles hasta que estén tiernos.</li>
                <li>En una sartén, freír la carne y el chicharrón.</li>
                <li>Servir en un plato con arroz, frijoles, aguacate y plátano frito.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Encebollado -->
    <div id="modalEncebollado" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Encebollado</h2>
            <p id="descripcionReceta">Sopa de pescado con yuca, cebolla y cilantro, muy nutritiva.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>500 g de pescado (atún o dorado)</li>
                <li>200 g de yuca</li>
                <li>1 cebolla roja</li>
                <li>Cilantro al gusto</li>
                <li>Sal y pimienta al gusto</li>
                <li>Agua</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocer el pescado en agua con sal.</li>
                <li>Agregar la yuca y cocinar hasta que esté suave.</li>
                <li>Retirar el pescado y desmenuzar.</li>
                <li>Servir caliente con cebolla y cilantro.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Pan de Queso -->
    <div class="modal" id="modalPanDeQueso">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Pan de Queso</h2>
            <p id="descripcionReceta">Pequeños panes de queso, suaves por dentro y crujientes por fuera.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>Queso</li>
                <li>Harina</li>
                <li>Leche</li>
                <li>Sal</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Mezclar todos los ingredientes hasta formar una masa.</li>
                <li>Formar bolitas y hornear hasta dorar.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Picarones -->
    <div id="modalPicarones" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Picarones</h2>
            <p id="descripcionReceta">Dulces fritos en aceite vegetas hechos con masa de camote y zapallo, bañados en miel de chancaca.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>500g de camote</li>
                <li>500g de zapallo</li>
                <li>500g de harina</li>
                <li>Miel de chancaca</li>
                <li>1 cucharadita de anís</li>
                <li>1 cucharadita de sal</li>
                <li>Agua al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocer y hacer puré el camote y zapallo.</li>
                <li>Mezclar con la harina, sal y anís, formar una masa suave.</li>
                <li>Formar los picarones y freír en aceite caliente hasta dorar.</li>
                <li>Servir con miel de chancaca.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Pastafrola -->
    <div class="modal" id="modalPastafrola">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Pastafrola</h2>
            <p id="descripcionReceta">Tarta dulce con mermelada, un clásico de la merienda uruguaya.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>Masa de tarta</li>
                <li>Mermelada de membrillo</li>
                <li>Azúcar</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Estirar la masa en un molde.</li>
                <li>Rellenar con la mermelada y cubrir con tiras de masa.</li>
                <li>Hornear hasta que la masa esté dorada.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Empanadas Andinas -->
    <div class="modal" id="modalEmpanadasAndinas">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Empanadas Andinas</h2>
            <p id="descripcionReceta">Empanadas crujientes rellenas de carne o queso, típicas de los Andes venezolanos.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 tazas de harina de maíz</li>
                <li>1 taza de agua caliente</li>
                <li>500 g de carne molida o queso</li>
                <li>Sal al gusto</li>
                <li>Aceite para freír</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Mezclar la harina con agua y sal hasta formar una masa.</li>
                <li>Rellenar las empanadas con carne o queso.</li>
                <li>Freír en aceite caliente hasta dorar.</li>
            </ol>
        </div>
    </div>
    <!-- Modal para Ravioles -->
    <div id="modalRavioles" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Ravioles</h2>
            <p>Pasta argentina rellena de carne, queso, verduras o una combinación de estas.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de masa para pasta</li>
                <li>250g de carne molida</li>
                <li>100g de queso ricotta</li>
                <li>1 huevo</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Preparar la masa y estirarla.</li>
                <li>Rellenar con la mezcla de carne y queso.</li>
                <li>Cerrar los ravioles y cocer en agua hirviendo.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Chanka de Pollo -->
    <div id="modalChankaPollo" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Chanka de Pollo</h2>
            <p id="descripcionReceta">Sopa de pollo típica de la región andina de Bolivia, preparada con choclo, papas y hierbas aromáticas.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 pollo troceado</li>
                <li>2 papas cortadas en cubos</li>
                <li>1 taza de choclo desgranado</li>
                <li>1/2 taza de cebolla picada</li>
                <li>Hierbas al gusto (cilantro, perejil)</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Hervir el pollo en agua con sal hasta que esté tierno.</li>
                <li>Agregar las papas y el choclo, cocinar hasta que las papas estén blandas.</li>
                <li>Incorporar las hierbas y servir caliente.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Biscoito de Polvilho -->
    <div id="modalBiscoitoPolvilho" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreRecetaBiscoitoPolvilho">Biscoito de Polvilho</h2>
            <p id="descripcionRecetaBiscoitoPolvilho">Galletas crujientes hechas de almidón de yuca, ideales para acompañar un café.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesRecetaBiscoitoPolvilho">
                <li>500g de almidón de yuca</li>
                <li>2 huevos</li>
                <li>100ml de aceite</li>
                <li>200ml de agua</li>
                <li>Sal al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosRecetaBiscoitoPolvilho">
                <li>Precalentar el horno a 180°C.</li>
                <li>Mezclar todos los ingredientes hasta obtener una masa homogénea.</li>
                <li>Formar pequeñas bolitas y colocarlas en una bandeja para hornear.</li>
                <li>Hornear durante 20-25 minutos o hasta que estén doradas.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Masaco de Plátano -->
    <div id="modalMasaco" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreRecetaMasaco">Masaco de plátano</h2>
            <p id="descripcionRecetaMasaco">Un delicioso puré de plátano verde frito, mezclado con queso o carne.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesRecetaMasaco">
                <li>4 plátanos verdes</li>
                <li>200g de queso</li>
                <li>1 taza de carne cocida y desmenuzada</li>
                <li>Sal al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosRecetaMasaco">
                <li>Freír los plátanos en agua con sal hasta que estén tiernos.</li>
                <li>Escurrir y machacar los plátanos.</li>
                <li>Mezclar con el queso y la carne.</li>
                <li>Formar tortas y freír hasta dorar.</li>
            </ol>
        </div>
    </div>
    <!-- Modal Arroz con Leche y Mazamorra -->
    <div id="modalArrozConLecheYmazamorra" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Arroz con Leche y Mazamorra</h2>
            <p id="descripcionReceta">Una combinación de Arroz con Leche cremoso y Mazamorra Morada con maíz morado, frutas y especias.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de arroz</li>
                <li>4 tazas de leche</li>
                <li>1/2 taza de mazamorra morada</li>
                <li>1/2 taza de azúcar</li>
                <li>Especias (canela, clavo de olor)</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocinar el arroz con leche y especias hasta que esté cremoso.</li>
                <li>Servir en un plato y añadir la mazamorra morada encima.</li>
            </ol>
        </div>
    </div>

    <?php include '../includes/footer.php' ?>
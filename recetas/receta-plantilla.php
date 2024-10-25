<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

    <link rel="stylesheet" href="../css/recetas.css">
    <link rel="stylesheet" href="../css/recetas-banner.css">
    <link rel="stylesheet" href="../css/carrousel.css">
    <script src="recetas.js" defer></script>

    <?php
    include '../includes/head.php';
    include 'manjeoGetReceta.php'; //aca esta en manejo de las recetas
    ?>

</head>

<body>
    <?php include '../includes/header.php' ?>

    <div class="contenido-principal container my-5 ps-5">
        <div class="container">
            <div class="perfil-usuario my-3">
                <div class="row align-items-center">
                    <div class="col-md-1 col-sm-6">
                        <div>
                            <!-- Aca va la foto del usuario -->
                            <img src="<?php
                                        if (empty($fotoUsuario)) {
                                            echo '../images/default-image.png'; // Imagen por defecto
                                        } else {
                                            echo $fotoUsuario; // Foto del usuario
                                        }
                                        ?>" alt="Imagen del usuario" id="portada-receta" height="80">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-1">
                        <h5 id="nombre-usuario">
                            <!-- Aca va el nombre del usuario -->
                            <?php echo "@$nombreUsuario"; ?>
                        </h5>
                    </div>
                    <div class="col-md-7 col-sm-2 text-end">
                        <p class="text-muted">Fecha de publicación:
                            <span>
                                <?php echo $fecha; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="datos-receta row align-items-start">
                <div class="contenedor-img d-flex col-md-6 col-sm-12">
                    <!-- Aca va la imagen de la receta -->
                    <img src="<?php echo $imagen; ?>" alt="Receta" class="portada rounded img-fluid" id="portada-receta">
                </div>
                <div class="content-info col-md-6 col-sm-12">
                    <div class="my-5">
                        <h2>
                            <!-- titulo de la receta -->
                            <?php echo $titulo; ?>
                        </h2>
                        <p>
                            <!-- descripcion de la receta -->
                            <?php echo $descripcion; ?>
                        </p><br>
                        <p class="categoria-style d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">
                            <?php echo $categoriaTitulo; ?>
                            <!-- todas las categorias -->
                        </p>
                        <p class="estilosCategorias">
                            <?php
                            if (!empty($etiquetas)) {
                                foreach ($etiquetas as $etiqueta) {
                                    echo '<span class="etiqueta">' . $etiqueta . '</span> ';
                                }
                            } else {
                                echo 'No hay etiquetas';
                            }
                            ?>
                            <!-- ni idea que va aca -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor-detalles container text-center w-75">
        <div class="row align-items-start">
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <!-- imagen del pais al que pertenece la receta -->

                    <?php
                    if (!empty($paisRecetas)) {
                        foreach ($paisRecetas as $paisReceta) {
                            echo '<img src="../svg/' . $paisReceta . '" alt="Bandera" width="35" class="bandera" id="bandera-receta"> ';
                        }
                    } else {
                        echo 'No hay banderas disponibles';
                    }
                    ?>

                    <h5 id="nombrePaisRecetaDB">
                        <?php
                        echo 'origen';
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <img src="../svg/bar-chart-line-fill.svg" width="25px" class="icono-item" alt="Dificultad icon">
                    <!-- <h5>Dificultad</h5> -->
                    <p id="dificultadRecetaDB" class="dificultad">
                        <?php echo $dificultad; ?>
                    </p>
                </div>
            </div>
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <img src="../svg/alarm.svg" width="25px" class="icono-item" alt="Dificultad icon">
                    <!-- <h5>Tiempo</h5> -->
                    <p id="tiempoRecetaDB" class="tiempo">
                        <!-- tiempo en minutos de la receta -->
                        <?php echo $minutos_prep . 'min'; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3>Ingredientes</h3>
        <div class="">
            <ol class="list-group">
                <!-- todos los ingredientes como una lista -->
                <?php
                if (!empty($ingredientes)) {
                    foreach ($ingredientes as $ingrediente) {
                        echo '<li class="list-group-item">' . $ingrediente . '</li> ';
                    }
                } else {
                    echo 'No hay ingredientes';
                } ?>
            </ol>
        </div>
    </div>

    <div class="container mt-5 pasos-receta">
        <h3>Pasos de la Receta</h3>
        <ol class="list-group">
            <!-- todos los pasos como una lista -->
            <?php
            if (!empty($pasos)) {
                foreach ($pasos as $paso) {
                    echo '<li class="list-group-item">' . $paso . '</li> ';
                }
            } else {
                echo 'No hay pasos';
            } ?>
        </ol>
    </div>
    </div>

    <!-- hasta aca le mando -->

    <div class="valoraciones my-4 text-center">
        <h5>Promedio de valoraciones</h5>
        <div class="stars" id="promedioCalificaciones">
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9734;</span>
            <span class="star">&#9734;</span>
        </div>
        <p id="puntajePromedio"></p>
        <p id="totalValoraciones">Total de Valoraciones: <span id="countValoraciones"></span></p>
    </div>

    <div class="container my-5">
        <div class="comentarios ps-5" id="seccionComentarios">
            <h5>Comentarios:</h5>
            <textarea id="comentarioText" class="form-control mb-2" rows="3" placeholder="Escribe tu comentario..."></textarea>
            <button class="btn btn-success" id="btnEnviarComentario">Enviar</button>
            <ul class="list-group mt-3" id="listaComentarios"></ul>

            <div class="acciones my-2">
                <button class="btn btn-light" id="btnComentar">
                    <i class="bi bi-chat"></i>
                </button>
                <button class="btn btn-light" id="btnCompartir">
                    <i class="bi bi-share"></i>
                </button>
                <button class="btn btn-light">
                    <i class="bi bi-bookmark"></i>
                </button>
                <div class="valoracion">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modalReportar" tabindex="-1" aria-labelledby="modalReportarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportarLabel">Reportar Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formReportar">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo</label>
                            <select class="form-select" id="motivo" required>
                                <option value="">Seleccione un motivo</option>
                                <option value="Inapropiado">Contenido inapropiado</option>
                                <option value="Spam">Spam</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Reporte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="modalCompartir" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h2>Compartir</h2>
                <div class="redes">
                    <a href="https://www.facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <h1>Publicaciones similares</h1>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
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
                            <a href="#" class="btn">Quiero la receta!</a>
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
                            <a href="#" class="btn">Quiero la receta!</a>
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
                            <a href="#" class="btn">Quiero la receta!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <?php include '../includes/footer.php' ?>
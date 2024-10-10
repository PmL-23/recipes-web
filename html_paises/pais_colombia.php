<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Colombia</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>

    <h2 class="text-center pt-5">Las mejores recetas de Colombia</h2>
    <!-- Barra de navegación secundaria -->
    <nav class="menu-barra pt-4">
        <div class="menu-toggle" id="menuToggle">☰</div>
        <ul class="menu-list">
            <li><a id="todos" href="#todos">Todos</a></li>
            <li><a id="desayuno" href="#desayuno">Desayuno</a></li>
            <li><a id="almuerzo" href="#almuerzo">Almuerzo</a></li>
            <li><a id="merienda" href="#merienda">Merienda</a></li>
            <li><a id="cena" href="#cena">Cena</a></li>
        </ul>
    </nav>
    <!-- Sección de recetas -->

    <!-- Recetas Colombianas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Arepas.jpg" class="card-img-top" alt="arepas">
                    <div class="card-body">
                        <h5 class="card-title">Arepas</h5>
                        <p class="card-text">Deliciosas arepas de maíz, perfectas para un desayuno colombiano.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArepas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Calentado.jpg" class="card-img-top" alt="calentado">
                    <div class="card-body">
                        <h5 class="card-title">Calentado</h5>
                        <p class="card-text">Plato tradicional de arroz con frijoles y carne, un desayuno sustancioso.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCalentado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Bocadillo.jpg" class="card-img-top" alt="bocadillo">
                    <div class="card-body">
                        <h5 class="card-title">Bocadillo</h5>
                        <p class="card-text">Dulce de guayaba, ideal para acompañar con queso y café.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBocadillo">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Huevos Pericos.jpg" class="card-img-top" alt="huevos pericos">
                    <div class="card-body">
                        <h5 class="card-title">Huevos Pericos</h5>
                        <p class="card-text">Huevos revueltos con cebolla y tomate, ideales para acompañar con arepas.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalHuevosPericos">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Changua.jpg" class="card-img-top" alt="changua">
                    <div class="card-body">
                        <h5 class="card-title">Changua</h5>
                        <p class="card-text">Sopa de leche con huevo, típica de la región andina.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChangua">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Tamal.jpg" class="card-img-top" alt="tamal">
                    <div class="card-body">
                        <h5 class="card-title">Tamal</h5>
                        <p class="card-text">Masa de maíz rellena de carne, verduras y especias, envuelta en hoja de
                            plátano.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTamal">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
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

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Ajiaco.jpg" class="card-img-top" alt="ajiaco">
                    <div class="card-body">
                        <h5 class="card-title">Ajiaco</h5>
                        <p class="card-text">Sopa de pollo con tres tipos de papa y guascas, típica de Bogotá.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAjiaco">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Sancocho.jpg" class="card-img-top" alt="sancocho">
                    <div class="card-body">
                        <h5 class="card-title">Sancocho</h5>
                        <p class="card-text">Guiso de carne y plátano, ideal para compartir en familia.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSancocho">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Posta Negra.jpg" class="card-img-top" alt="posta negra">
                    <div class="card-body">
                        <h5 class="card-title">Posta Negra</h5>
                        <p class="card-text">Carne de res cocida en salsa de cerveza y especias, típica de la región
                            caribe.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPostaNegra">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Pescado Frito.jpg" class="card-img-top" alt="pescado frito">
                    <div class="card-body">
                        <h5 class="card-title">Pescado Frito</h5>
                        <p class="card-text">Pescado frito, servido con arroz y ensalada, típico de la costa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPescadoFrito">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Lentejas.png" class="card-img-top" alt="lentejas">
                    <div class="card-body">
                        <h5 class="card-title">Lentejas</h5>
                        <p class="card-text">Guiso de lentejas con chorizo y verduras, un plato nutritivo y sabroso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalLentejas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Arepas de Huevo.jpg" class="card-img-top" alt="arepas de huevo">
                    <div class="card-body">
                        <h5 class="card-title">Arepas de Huevo</h5>
                        <p class="card-text">Arepas fritas rellenas de huevo, un bocadillo delicioso para la merienda.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArepasDeHuevo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Buñuelos.jpg" class="card-img-top" alt="buñuelos">
                    <div class="card-body">
                        <h5 class="card-title">Buñuelos</h5>
                        <p class="card-text">Bocadillos fritos a base de queso y masa de yuca, ideales para acompañar
                            con café.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBunuelos">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Chocoramo.png" class="card-img-top" alt="chocoramo">
                    <div class="card-body">
                        <h5 class="card-title">Chocoramo</h5>
                        <p class="card-text">Galleta cubierta de chocolate y rellena de crema, un clásico para la
                            merienda.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChocoramo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Tamalito.png" class="card-img-top" alt="tamalito">
                    <div class="card-body">
                        <h5 class="card-title">Tamalito</h5>
                        <p class="card-text">Pequeños tamales rellenos, perfectos para un refrigerio.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTamalito">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Galletas de Avena.jpg" class="card-img-top"
                        alt="galletas de avena">
                    <div class="card-body">
                        <h5 class="card-title">Galletas de Avena</h5>
                        <p class="card-text">Galletas saludables y deliciosas, ideales para acompañar con leche.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalGalletasDeAvena">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Postre de Tres Leches.jpg" class="card-img-top"
                        alt="postre tres leches">
                    <div class="card-body">
                        <h5 class="card-title">Postre de Tres Leches</h5>
                        <p class="card-text">Pastel empapado en tres tipos de leche, un dulce tradicional para la
                            merienda.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPostreTresLeches">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Sopa de Verduras.png" class="card-img-top" alt="sopa de verduras">
                    <div class="card-body">
                        <h5 class="card-title">Sopa de Verduras</h5>
                        <p class="card-text">Sopa caliente de verduras, ideal para terminar el día de manera ligera.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopaDeVerduras">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Pasta al Pesto.jpg" class="card-img-top" alt="pasta al pesto">
                    <div class="card-body">
                        <h5 class="card-title">Pasta al Pesto</h5>
                        <p class="card-text">Deliciosa pasta con salsa pesto, una opción ligera para la cena.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPastaAlPesto">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Ensalada de Quinoa.jpg" class="card-img-top"
                        alt="ensalada de quinoa">
                    <div class="card-body">
                        <h5 class="card-title">Ensalada de Quinoa</h5>
                        <p class="card-text">Ensalada fresca de quinoa con verduras, ideal para una cena saludable.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEnsaladaDeQuinoa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Pollo Asado.jpg" class="card-img-top" alt="pollo asado">
                    <div class="card-body">
                        <h5 class="card-title">Pollo Asado</h5>
                        <p class="card-text">Pollo marinado y asado al horno, un plato fácil y sabroso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolloAsado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Pescado a la Plancha.jpg" class="card-img-top"
                        alt="pescado a la plancha">
                    <div class="card-body">
                        <h5 class="card-title">Pescado a la Plancha</h5>
                        <p class="card-text">Pescado fresco a la plancha, servido con vegetales al vapor.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPescadoAlaPlancha">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgColombia/Tacos de Pollo.jpg" class="card-img-top" alt="tacos de pollo">
                    <div class="card-body">
                        <h5 class="card-title">Tacos de Pollo</h5>
                        <p class="card-text">Tacos rellenos de pollo, ideales para una cena informal.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTacosDePollo">Ver Receta</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Modal Arepas -->
    <div id="modalArepas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Arepas</h2>
            <p id="descripcionReceta">Deliciosas arepas de maíz, perfectas para un desayuno colombiano.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 tazas de harina de maíz</li>
                <li>1 taza de agua tibia</li>
                <li>1/2 cucharadita de sal</li>
                <li>Mantequilla para untar</li>
                <li>Relleno al gusto (queso, carne, etc.)</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Mezclar la harina, agua y sal en un bol hasta obtener una masa suave.</li>
                <li>Dividir la masa en bolas y aplanarlas para formar las arepas.</li>
                <li>Cocinar en una plancha caliente por 5 minutos de cada lado.</li>
                <li>Agregar el relleno y servir.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Calentado -->
    <div id="modalCalentado" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Calentado</h2>
            <p id="descripcionReceta">Plato tradicional de arroz con frijoles y carne, un desayuno sustancioso.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 tazas de arroz</li>
                <li>1 taza de frijoles cocidos</li>
                <li>1 taza de carne desmechada</li>
                <li>Cilantro al gusto</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>En una sartén, calentar la carne con los frijoles y el arroz.</li>
                <li>Sazonar con sal, pimienta y cilantro al gusto.</li>
                <li>Servir caliente acompañado de huevo frito si se desea.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Bocadillo -->
    <div id="modalBocadillo" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Bocadillo</h2>
            <p id="descripcionReceta">Dulce de guayaba, ideal para acompañar con queso y café.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>500g de guayaba</li>
                <li>250g de azúcar</li>
                <li>Jugo de 1 limón</li>
                <li>1/2 taza de agua</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Licuar la guayaba con el agua y el jugo de limón.</li>
                <li>En una olla, mezclar la guayaba licuada con el azúcar y cocinar a fuego lento.</li>
                <li>Cocinar hasta que espese y luego verter en un molde.</li>
                <li>Dejar enfriar, cortar en porciones y servir con queso.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Huevos Pericos -->
    <div id="modalHuevosPericos" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Huevos Pericos</h2>
            <p id="descripcionReceta">Huevos revueltos con cebolla y tomate, ideales para acompañar con arepas.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>4 huevos</li>
                <li>1/2 cebolla picada</li>
                <li>1 tomate picado</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>En una sartén, calentar un poco de aceite y añadir la cebolla.</li>
                <li>Cuando esté dorada, agregar el tomate y cocinar por 2 minutos.</li>
                <li>Batir los huevos, añadir a la sartén y cocinar hasta que estén listos.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Changua -->
    <div id="modalChangua" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Changua</h2>
            <p id="descripcionReceta">Sopa de leche con huevo, típica de la región andina.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 tazas de leche</li>
                <li>1 huevo</li>
                <li>1/4 taza de cebolla picada</li>
                <li>Sal y cilantro al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>En una olla, calentar la leche con la cebolla y sal.</li>
                <li>Cuando hierva, romper el huevo en la olla y cocinar por 2 minutos.</li>
                <li>Servir caliente y espolvorear cilantro por encima.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Tamal -->
    <div id="modalTamal" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Tamal</h2>
            <p id="descripcionReceta">Masa de maíz rellena de carne, verduras y especias, envuelta en hoja de plátano.
            </p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>500g de masa de maíz</li>
                <li>300g de carne de cerdo o pollo</li>
                <li>1/2 taza de verduras al gusto</li>
                <li>Hojas de plátano</li>
                <li>Sal y especias al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Hervir la carne con especias y desmenuzar.</li>
                <li>Mezclar la masa con el caldo de la carne y formar tamales.</li>
                <li>Rellenar con la carne y verduras, envolver en hojas de plátano.</li>
                <li>Cocinar al vapor por 1 hora.</li>
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

    <!-- Modal Ajiaco -->
    <div id="modalAjiaco" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Ajiaco</h2>
            <p id="descripcionReceta">Sopa de pollo con tres tipos de papa, ideal para un almuerzo reconfortante.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 pollo</li>
                <li>3 tipos de papa (criolla, pastusa, sabanera)</li>
                <li>1 mazorca</li>
                <li>1/2 taza de cebolla y ajo</li>
                <li>Sal y guascas al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocinar el pollo con cebolla, ajo y agua.</li>
                <li>Agregar las papas y la mazorca, cocinar hasta que estén suaves.</li>
                <li>Servir caliente, acompañado de aguacate y crema.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Sancocho -->
    <div id="modalSancocho" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Sancocho</h2>
            <p id="descripcionReceta">Guiso de carne y plátano, ideal para compartir en familia.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>500 g de carne (res o pollo)</li>
                <li>2 plátanos verdes</li>
                <li>1 yuca</li>
                <li>1 mazorca de maíz</li>
                <li>Cilantro al gusto</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>En una olla grande, cocinar la carne en agua con sal hasta que esté tierna.</li>
                <li>Añadir los plátanos, yuca y mazorca, cocinando hasta que estén suaves.</li>
                <li>Agregar el cilantro y ajustar la sal y pimienta al gusto.</li>
                <li>Servir caliente y disfrutar en familia.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Posta Negra -->
    <div id="modalPostaNegra" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Posta Negra</h2>
            <p id="descripcionReceta">Carne de res cocida en salsa de cerveza y especias, típica de la región caribe.
            </p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 kg de carne de res</li>
                <li>1 botella de cerveza oscura</li>
                <li>1 cebolla</li>
                <li>2 dientes de ajo</li>
                <li>Especias (comino, pimienta, etc.)</li>
                <li>Sal al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Marinar la carne con la cerveza y especias por al menos 2 horas.</li>
                <li>Cocinar en una olla a fuego lento hasta que esté tierna.</li>
                <li>Servir con arroz y ensalada.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Pescado Frito -->
    <div id="modalPescadoFrito" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Pescado Frito</h2>
            <p id="descripcionReceta">Pescado frito, servido con arroz y ensalada, típico de la costa.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 pescado entero limpio (preferiblemente róbalo)</li>
                <li>Jugo de limón</li>
                <li>Harina de trigo</li>
                <li>Sal y pimienta al gusto</li>
                <li>Aceite para freír</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Marinar el pescado con limón, sal y pimienta.</li>
                <li>Pasar por harina y freír en aceite caliente hasta dorar.</li>
                <li>Servir con arroz y ensalada fresca.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Lentejas -->
    <div id="modalLentejas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Lentejas</h2>
            <p id="descripcionReceta">Guiso de lentejas con chorizo y verduras, un plato nutritivo y sabroso.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de lentejas</li>
                <li>200 g de chorizo</li>
                <li>1 cebolla</li>
                <li>1 zanahoria</li>
                <li>2 dientes de ajo</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocinar las lentejas en agua hasta que estén tiernas.</li>
                <li>En una sartén, sofreír el chorizo, cebolla, ajo y zanahoria.</li>
                <li>Agregar las lentejas a la mezcla y cocinar por unos minutos más.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Arepas de Huevo -->
    <div id="modalArepasDeHuevo" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Arepas de Huevo</h2>
            <p id="descripcionReceta">Arepas fritas rellenas de huevo, un bocadillo delicioso para la merienda.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 tazas de harina de maíz</li>
                <li>1 taza de agua</li>
                <li>Sal al gusto</li>
                <li>Huevos (uno por arepa)</li>
                <li>Aceite para freír</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Mezclar la harina con agua y sal hasta obtener una masa suave.</li>
                <li>Formar arepas, freírlas hasta dorar y abrir un corte para agregar el huevo.</li>
                <li>Freír nuevamente hasta que el huevo esté cocido.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Buñuelos -->
    <div id="modalBunuelos" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Buñuelos</h2>
            <p id="descripcionReceta">Bocadillos fritos a base de queso y masa de yuca, ideales para acompañar con café.
            </p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de queso rallado</li>
                <li>1 taza de harina de yuca</li>
                <li>1 huevo</li>
                <li>Sal al gusto</li>
                <li>Aceite para freír</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Mezclar todos los ingredientes hasta formar una masa.</li>
                <li>Formar bolitas y freír en aceite caliente hasta dorar.</li>
                <li>Servir calientes con café.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Chocoramo -->
    <div id="modalChocoramo" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Chocoramo</h2>
            <p id="descripcionReceta">Galleta cubierta de chocolate y rellena de crema, un clásico para la merienda.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 paquete de galletas</li>
                <li>Chocolate para cubrir</li>
                <li>Crema de cacao o vainilla al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Rellenar las galletas con la crema.</li>
                <li>Sumergir en chocolate derretido y dejar enfriar.</li>
                <li>Disfrutar como un bocadillo dulce.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Tamalito -->
    <div id="modalTamalito" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Tamalito</h2>
            <p id="descripcionReceta">Pequeños tamales rellenos, perfectos para un refrigerio.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 tazas de masa de maíz</li>
                <li>1 taza de agua</li>
                <li>Sal al gusto</li>
                <li>Relleno al gusto (carne, verduras, etc.)</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Preparar la masa y agregar el relleno deseado.</li>
                <li>Enrollar la masa en hojas de plátano.</li>
                <li>Cocinar al vapor durante 1 hora.</li>
                <li>Servir caliente.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Galletas de Avena -->
    <div id="modalGalletasDeAvena" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Galletas de Avena</h2>
            <p id="descripcionReceta">Galletas saludables y deliciosas, ideales para acompañar con leche.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de avena</li>
                <li>1/2 taza de azúcar</li>
                <li>1/2 taza de mantequilla</li>
                <li>1 huevo</li>
                <li>1 cucharadita de vainilla</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Precalentar el horno a 180°C.</li>
                <li>Mezclar todos los ingredientes en un bol.</li>
                <li>Formar pequeñas bolitas y colocar en una bandeja para hornear.</li>
                <li>Hornear durante 15 minutos.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Postre de Tres Leches -->
    <div id="modalPostreTresLeches" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Postre de Tres Leches</h2>
            <p id="descripcionReceta">Pastel empapado en tres tipos de leche, un dulce tradicional para la merienda.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 pastel de vainilla</li>
                <li>1 taza de leche condensada</li>
                <li>1 taza de leche evaporada</li>
                <li>1 taza de crema de leche</li>
                <li>Frutas para decorar (opcional)</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Preparar el pastel de vainilla y dejar enfriar.</li>
                <li>Mezclar las leches y empapar el pastel con la mezcla.</li>
                <li>Refrigerar durante varias horas antes de servir.</li>
                <li>Decorar con frutas si se desea.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Sopa de Verduras -->
    <div id="modalSopaDeVerduras" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Sopa de Verduras</h2>
            <p id="descripcionReceta">Sopa caliente de verduras, ideal para terminar el día de manera ligera.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 tazas de verduras variadas (zanahoria, brócoli, etc.)</li>
                <li>4 tazas de caldo de verduras</li>
                <li>1 cebolla picada</li>
                <li>1 diente de ajo picado</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Sofreír la cebolla y el ajo en una olla.</li>
                <li>Agregar las verduras y el caldo.</li>
                <li>Cocinar a fuego lento durante 20 minutos.</li>
                <li>Salpimentar y servir caliente.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Pasta al Pesto -->
    <div id="modalPastaAlPesto" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Pasta al Pesto</h2>
            <p id="descripcionReceta">Deliciosa pasta con salsa pesto, una opción ligera para la cena.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>200 g de pasta</li>
                <li>1 taza de albahaca fresca</li>
                <li>1/4 taza de nueces</li>
                <li>1/4 taza de aceite de oliva</li>
                <li>Queso parmesano al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocinar la pasta según las instrucciones del paquete.</li>
                <li>Mezclar albahaca, nueces, aceite y queso en un procesador.</li>
                <li>Combinar la pasta con la salsa pesto y servir.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Ensalada de Quinoa -->
    <div id="modalEnsaladaDeQuinoa" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Ensalada de Quinoa</h2>
            <p id="descripcionReceta">Ensalada fresca de quinoa con verduras, ideal para una cena saludable.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 taza de quinoa</li>
                <li>2 tazas de agua</li>
                <li>1 pimiento rojo picado</li>
                <li>1/2 pepino picado</li>
                <li>Jugo de limón al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Cocinar la quinoa en agua hasta que esté tierna.</li>
                <li>Dejar enfriar y mezclar con las verduras.</li>
                <li>Aliñar con jugo de limón y servir.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Pollo Asado -->
    <div id="modalPolloAsado" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Pollo Asado</h2>
            <p id="descripcionReceta">Pollo marinado y asado al horno, un plato fácil y sabroso.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>1 pollo entero</li>
                <li>1/4 taza de aceite de oliva</li>
                <li>2 cucharaditas de pimentón</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Marinar el pollo con aceite y especias.</li>
                <li>Asar en el horno a 200°C por 1 hora.</li>
                <li>Dejar reposar y servir.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Pescado a la Plancha -->
    <div id="modalPescadoAlaPlancha" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Pescado a la Plancha</h2>
            <p id="descripcionReceta">Pescado fresco a la plancha, servido con vegetales al vapor.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>2 filetes de pescado</li>
                <li>1 cucharada de aceite de oliva</li>
                <li>Sal y pimienta al gusto</li>
                <li>Vegetales al vapor</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>Calentar el aceite en una sartén.</li>
                <li>Agregar el pescado y sazonar.</li>
                <li>Cocinar por 4-5 minutos de cada lado.</li>
                <li>Servir con vegetales al vapor.</li>
            </ol>
        </div>
    </div>

    <!-- Modal Tacos de Pollo -->
<div id="modalTacosDePollo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tacos de Pollo</h2>
        <p id="descripcionReceta">Tacos rellenos de pollo, ideales para una cena informal.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 pechugas de pollo desmenuzadas</li>
            <li>8 tortillas de maíz</li>
            <li>1 taza de lechuga picada</li>
            <li>1/2 taza de crema agria</li>
            <li>1/2 taza de salsa roja o verde</li>
            <li>Queso rallado al gusto</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el pollo en agua con sal hasta que esté tierno y desmenuzarlo.</li>
            <li>Calentar las tortillas en un comal o sartén.</li>
            <li>Colocar el pollo desmenuzado en el centro de cada tortilla.</li>
            <li>Añadir lechuga, crema, salsa y queso al gusto.</li>
            <li>Enrollar las tortillas y servir con más salsa si se desea.</li>
        </ol>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
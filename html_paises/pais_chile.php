<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chile</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>
    
    <h2 class="text-center pt-5">Las mejores recetas de Chile</h2>
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
    
    <!-- Recetas Chilenas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Marraqueta.jpg" class="card-img-top" alt="marraqueta">
                    <div class="card-body">
                        <h5 class="card-title">Marraqueta</h5>
                        <p class="card-text">Pan crujiente chileno, ideal para acompañar con palta.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMarraqueta">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Alfajores de Dulce de Leche.jpg" class="card-img-top" alt="alfajores de dulce de leche">
                    <div class="card-body">
                        <h5 class="card-title">Alfajores de Dulce de Leche</h5>
                        <p class="card-text">Galletas rellenas con dulce de leche y cubiertas de chocolate.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAlfajores">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Sopaipillas.jpg" class="card-img-top" alt="sopaipillas">
                    <div class="card-body">
                        <h5 class="card-title">Sopaipillas</h5>
                        <p class="card-text">Frituras de masa de calabaza, perfectas con pebre.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopaipillas">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Pan de Pascua.jpg" class="card-img-top" alt="pan de pascua">
                    <div class="card-body">
                        <h5 class="card-title">Pan de Pascua</h5>
                        <p class="card-text">Pastel tradicional chileno, típico de la Navidad.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanDePascua">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/calzonesRotos.jpg" class="card-img-top" alt="calzones rotos">
                    <div class="card-body">
                        <h5 class="card-title">Calzones rotos</h5>
                        <p class="card-text">Son masas fritas en forma de tiras, espolvoreadas con azúcar flor.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCalzonesRotos">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Mote con Huesillo.jpg" class="card-img-top" alt="mote con huesillo">
                    <div class="card-body">
                        <h5 class="card-title">Mote con Huesillo</h5>
                        <p class="card-text">Bebida dulce a base de trigo y duraznos deshidratados.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMoteConHuesillo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
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

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Porotos con Riendas.jpg" class="card-img-top" alt="porotos con riendas">
                    <div class="card-body">
                        <h5 class="card-title">Porotos con Riendas</h5>
                        <p class="card-text">Plato de porotos con fideos y longaniza, ideal para el frío.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPorotosConRiendas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Cazuela.jpg" class="card-img-top" alt="cazuela">
                    <div class="card-body">
                        <h5 class="card-title">Cazuela</h5>
                        <p class="card-text">Sopa con carne, verduras y arroz, perfecta para el invierno.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCazuela">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Tortilla de Acelga.jpeg" class="card-img-top" alt="tortilla de acelga">
                    <div class="card-body">
                        <h5 class="card-title">Tortilla de Acelga</h5>
                        <p class="card-text">Tortilla hecha con acelga y huevo, deliciosa y nutritiva.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortillaAcelga">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Charquicán.jpeg" class="card-img-top" alt="charquican">
                    <div class="card-body">
                        <h5 class="card-title">Charquicán</h5>
                        <p class="card-text">Guiso de carne con verduras y puré, muy reconfortante.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCharquican">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Rocoto Relleno.png" class="card-img-top" alt="rocoto relleno">
                    <div class="card-body">
                        <h5 class="card-title">Rocoto Relleno</h5>
                        <p class="card-text">Pimiento relleno de carne, típico del norte de Chile.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalRocotoRelleno">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Chocotorta.jpg" class="card-img-top" alt="chocotorta">
                    <div class="card-body">
                        <h5 class="card-title">Chocotorta</h5>
                        <p class="card-text">Postre de galletas de chocolate y dulce de leche.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChocotorta">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Bocadillos de Mermelada.jpg" class="card-img-top" alt="bocadillos de mermelada">
                    <div class="card-body">
                        <h5 class="card-title">Bocadillos de Mermelada</h5>
                        <p class="card-text">Galletas rellenas con mermelada, perfectas para el té.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBocadillosMermelada">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Panqueques.jpg" class="card-img-top" alt="panqueques">
                    <div class="card-body">
                        <h5 class="card-title">Panqueques</h5>
                        <p class="card-text">Deliciosos panqueques con manjar o mermelada.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanqueques">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Torta de Vainilla.jpg" class="card-img-top" alt="torta de vainilla">
                    <div class="card-body">
                        <h5 class="card-title">Torta de Vainilla</h5>
                        <p class="card-text">Delicada torta de vainilla con crema pastelera.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortaVainilla">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Tarta de Frutas.jpg" class="card-img-top" alt="tarta de frutas">
                    <div class="card-body">
                        <h5 class="card-title">Tarta de Frutas</h5>
                        <p class="card-text">Base de galleta crujiente con frutas frescas y crema.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTartaFrutas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Galletas de Avena.jpg" class="card-img-top" alt="galletas de avena">
                    <div class="card-body">
                        <h5 class="card-title">Galletas de Avena</h5>
                        <p class="card-text">Galletas saludables de avena, perfectas para merendar.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalGalletasAvena">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Asado.jpg" class="card-img-top" alt="asado">
                    <div class="card-body">
                        <h5 class="card-title">Asado</h5>
                        <p class="card-text">Carne asada a la parrilla, tradicional en reuniones familiares.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAsado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Empanadas.jpg" class="card-img-top" alt="empanadas">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas</h5>
                        <p class="card-text">Masa rellena de carne o mariscos, típicas de fiestas patrias.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Ceviche.jpg" class="card-img-top" alt="ceviche">
                    <div class="card-body">
                        <h5 class="card-title">Ceviche</h5>
                        <p class="card-text">Pescado marinado en limón, fresco y delicioso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCeviche">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Chorrillana.jpg" class="card-img-top" alt="chorrillana">
                    <div class="card-body">
                        <h5 class="card-title">Chorrillana</h5>
                        <p class="card-text">Plato de papas fritas con carne y cebolla, ideal para compartir.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChorrillana">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Pescado al Horno.jpg" class="card-img-top" alt="pescado al horno">
                    <div class="card-body">
                        <h5 class="card-title">Pescado al Horno</h5>
                        <p class="card-text">Pescado fresco horneado con hierbas, ligero y sabroso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPescadoAlHorno">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgChile/Pollo al Curry.jpg" class="card-img-top" alt="pollo al curry">
                    <div class="card-body">
                        <h5 class="card-title">Pollo al Curry</h5>
                        <p class="card-text">Pechuga de pollo cocinada con especias y crema de coco.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolloAlCurry">Ver Receta</a>
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>

<!-- Estructura de los modales -->
<div id="modalMarraqueta" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Marraqueta</h2>
        <p class="descripcionReceta">Pan crujiente chileno, ideal para acompañar con palta.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>500g de harina</li>
            <li>10g de sal</li>
            <li>15g de levadura</li>
            <li>300ml de agua</li>
            <li>Opcional: semillas de sésamo</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Mezclar la harina, sal y levadura.</li>
            <li>Añadir agua y amasar hasta obtener una masa suave.</li>
            <li>Dejar reposar la masa durante 30 minutos.</li>
            <li>Formar bollos y dejar reposar nuevamente.</li>
            <li>Hornear a 220°C durante 20 minutos.</li>
        </ol>
    </div>
</div>

<div id="modalAlfajores" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Alfajores de Dulce de Leche</h2>
        <p class="descripcionReceta">Galletas rellenas con dulce de leche y cubiertas de chocolate.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>200g de mantequilla</li>
            <li>200g de azúcar</li>
            <li>2 huevos</li>
            <li>400g de harina</li>
            <li>200g de dulce de leche</li>
            <li>Chocolate para cubrir</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Batir la mantequilla con el azúcar hasta blanquear.</li>
            <li>Añadir los huevos y mezclar bien.</li>
            <li>Agregar la harina y formar una masa.</li>
            <li>Estirar y cortar las galletas.</li>
            <li>Hornear a 180°C durante 10 minutos.</li>
            <li>Rellenar con dulce de leche y cubrir con chocolate.</li>
        </ol>
    </div>
</div>
<!-- Modal para Sopaipillas -->
<div id="modalSopaipillas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaSopaipillas">Sopaipillas</h2>
        <p id="descripcionRecetaSopaipillas">Frituras de masa de calabaza, perfectas con pebre.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaSopaipillas">
            <li>500g de calabaza cocida</li>
            <li>300g de harina</li>
            <li>1 cucharadita de sal</li>
            <li>Agua tibia</li>
            <li>Aceite para freír</li>
            <!-- Agrega más ingredientes aquí -->
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaSopaipillas">
            <li>Hacer un puré con la calabaza cocida.</li>
            <li>Mezclar el puré con harina y sal, y añadir agua hasta obtener una masa.</li>
            <li>Estirar la masa y cortar en círculos.</li>
            <li>Freír en aceite caliente hasta doradas.</li>
            <!-- Agrega más pasos aquí -->
        </ol>
    </div>
</div>
<!-- Modal para Pan de Pascua -->
<div id="modalPanDePascua" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaPanDePascua">Pan de Pascua</h2>
        <p id="descripcionRecetaPanDePascua">Pastel tradicional chileno, típico de la Navidad.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaPanDePascua">
            <li>200g de harina</li>
            <li>150g de azúcar</li>
            <li>3 huevos</li>
            <li>100g de frutas secas</li>
            <li>1 taza de leche</li>
            <li>1 cucharadita de polvo de hornear</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaPanDePascua">
            <li>Precalentar el horno a 180°C.</li>
            <li>Mezclar todos los ingredientes en un bol.</li>
            <li>Verter la mezcla en un molde engrasado.</li>
            <li>Hornear durante 40 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal para Calzones Rotos -->
<div id="modalCalzonesRotos" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaCalzonesRotos">Calzones Rotos</h2>
        <p id="descripcionRecetaCalzonesRotos">Son masas fritas en forma de tiras, espolvoreadas con azúcar flor.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaCalzonesRotos">
            <li>500g de harina</li>
            <li>2 huevos</li>
            <li>100g de azúcar</li>
            <li>1 cucharadita de polvos de hornear</li>
            <li>1 taza de leche</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaCalzonesRotos">
            <li>Mezclar todos los ingredientes hasta formar una masa.</li>
            <li>Estirar la masa y cortarla en tiras.</li>
            <li>Freír las tiras en aceite caliente hasta dorar.</li>
            <li>Espolvorear con azúcar flor antes de servir.</li>
        </ol>
    </div>
</div>

<!-- Modal para Mote con Huesillo -->
<div id="modalMoteConHuesillo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaMoteConHuesillo">Mote con Huesillo</h2>
        <p id="descripcionRecetaMoteConHuesillo">Bebida dulce a base de trigo y duraznos deshidratados.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaMoteConHuesillo">
            <li>1 taza de trigo</li>
            <li>5 duraznos deshidratados</li>
            <li>Azúcar al gusto</li>
            <li>Agua</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaMoteConHuesillo">
            <li>Remojar el trigo en agua durante la noche.</li>
            <li>Cocinar el trigo en agua hasta que esté tierno.</li>
            <li>Agregar los duraznos y el azúcar al gusto.</li>
            <li>Servir frío o a temperatura ambiente.</li>
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

<!-- Modal para Porotos con Riendas -->
<div id="modalPorotosConRiendas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaPorotosConRiendas">Porotos con Riendas</h2>
        <p id="descripcionRecetaPorotosConRiendas">Plato de porotos con fideos y longaniza, ideal para el frío.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaPorotosConRiendas">
            <li>1 taza de porotos</li>
            <li>100g de fideos</li>
            <li>200g de longaniza</li>
            <li>1 cebolla</li>
            <li>1 zanahoria</li>
            <li>Agua</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaPorotosConRiendas">
            <li>Cocinar los porotos en agua hasta que estén tiernos.</li>
            <li>Añadir la longaniza y las verduras picadas.</li>
            <li>Agregar los fideos y cocinar hasta que estén listos.</li>
        </ol>
    </div>
</div>

<!-- Modal para Cazuela -->
<div id="modalCazuela" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaCazuela">Cazuela</h2>
        <p id="descripcionRecetaCazuela">Sopa con carne, verduras y arroz, perfecta para el invierno.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaCazuela">
            <li>500g de carne (pollo o res)</li>
            <li>2 papas</li>
            <li>1 zanahoria</li>
            <li>1 cebolla</li>
            <li>1 taza de arroz</li>
            <li>Agua</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaCazuela">
            <li>Hervir la carne en agua con sal hasta que esté cocida.</li>
            <li>Agregar las verduras y cocinar hasta que estén tiernas.</li>
            <li>Incorporar el arroz y cocinar hasta que esté listo.</li>
        </ol>
    </div>
</div>

<!-- Modal para Tortilla de Acelga -->
<div id="modalTortillaAcelga" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tortilla de Acelga</h2>
        <p id="descripcionReceta">Tortilla hecha con acelga y huevo, deliciosa y nutritiva.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de acelga picada</li>
            <li>3 huevos</li>
            <li>1/2 taza de cebolla picada</li>
            <li>2 cucharadas de aceite</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>En una sartén, calentar el aceite y añadir la cebolla hasta que esté dorada.</li>
            <li>Agregar la acelga y cocinar por unos minutos.</li>
            <li>Batir los huevos y sazonar con sal y pimienta.</li>
            <li>Verter los huevos en la sartén y cocinar a fuego bajo hasta que cuaje.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal para Charquicán -->
<div id="modalCharquican" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Charquicán</h2>
        <p id="descripcionReceta">Guiso de carne con verduras y puré, muy reconfortante.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de carne de res</li>
            <li>1 taza de zapallo picado</li>
            <li>1 taza de papa picada</li>
            <li>1/2 taza de cebolla picada</li>
            <li>2 cucharadas de aceite</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>En una olla, calentar el aceite y añadir la cebolla hasta dorar.</li>
            <li>Agregar la carne y cocinar hasta que esté dorada.</li>
            <li>Incorporar las verduras y suficiente agua para cubrir.</li>
            <li>Cocinar a fuego lento hasta que las verduras estén tiernas.</li>
            <li>Aplastar las verduras y mezclar todo para formar un puré.</li>
        </ol>
    </div>
</div>

<!-- Modal para Rocoto Relleno -->
<div id="modalRocotoRelleno" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Rocoto Relleno</h2>
        <p id="descripcionReceta">Pimiento relleno de carne, típico del norte de Chile.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 rocotos</li>
            <li>500g de carne molida</li>
            <li>1 taza de cebolla picada</li>
            <li>1/2 taza de aceitunas negras picadas</li>
            <li>1/2 taza de queso rallado</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hervir los rocotos en agua con sal para quitar el picante.</li>
            <li>En una sartén, calentar el aceite y añadir la cebolla hasta dorar.</li>
            <li>Agregar la carne y las aceitunas, cocinar hasta que esté todo bien mezclado.</li>
            <li>Rellenar los rocotos con la mezcla y cubrir con queso rallado.</li>
            <li>Hornear a 180°C por 30 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal para Chocotorta -->
<div id="modalChocotorta" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Chocotorta</h2>
        <p id="descripcionReceta">Postre de galletas de chocolate y dulce de leche.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 paquetes de galletas de chocolate</li>
            <li>400g de dulce de leche</li>
            <li>400g de queso crema</li>
            <li>1 taza de café (opcional)</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar el dulce de leche y el queso crema hasta obtener una mezcla homogénea.</li>
            <li>Sumergir las galletas en el café y colocar una capa en el fondo del molde.</li>
            <li>Agregar una capa de la mezcla de dulce de leche y repetir hasta terminar.</li>
            <li>Refrigerar durante al menos 4 horas antes de servir.</li>
        </ol>
    </div>
</div>

<!-- Modal para Bocadillos de Mermelada -->
<div id="modalBocadillosMermelada" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bocadillos de Mermelada</h2>
        <p id="descripcionReceta">Galletas rellenas con mermelada, perfectas para el té.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina</li>
            <li>1/2 taza de mantequilla</li>
            <li>1/2 taza de azúcar</li>
            <li>1 huevo</li>
            <li>1/2 taza de mermelada</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Precalentar el horno a 180°C.</li>
            <li>Mezclar la mantequilla, el azúcar y el huevo hasta obtener una crema.</li>
            <li>Agregar la harina y mezclar hasta formar una masa.</li>
            <li>Estirar la masa y cortar en círculos. Colocar una cucharada de mermelada en el centro y cubrir con otro círculo.</li>
            <li>Hornear por 12-15 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal para Panqueques -->
<div id="modalPanqueques" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Panqueques</h2>
        <p id="descripcionReceta">Deliciosos panqueques con manjar o mermelada.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de harina</li>
            <li>1 taza de leche</li>
            <li>2 huevos</li>
            <li>2 cucharadas de azúcar</li>
            <li>Mantequilla para la sartén</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes hasta obtener una mezcla suave.</li>
            <li>Calentar una sartén con un poco de mantequilla.</li>
            <li>Verter un poco de mezcla en la sartén y cocinar hasta que aparezcan burbujas.</li>
            <li>Dar vuelta y cocinar por el otro lado hasta dorar.</li>
            <li>Servir con manjar o mermelada.</li>
        </ol>
    </div>
</div>

<!-- Modal para Torta de Vainilla -->
<div id="modalTortaVainilla" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Torta de Vainilla</h2>
        <p class="descripcionReceta">Delicada torta de vainilla con crema pastelera.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>200g de harina</li>
            <li>150g de azúcar</li>
            <li>3 huevos</li>
            <li>1 cucharadita de esencia de vainilla</li>
            <li>Crema pastelera para el relleno</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Batir los huevos con el azúcar hasta espumar.</li>
            <li>Añadir la harina tamizada y la esencia de vainilla.</li>
            <li>Verter en un molde y hornear a 180°C por 25 minutos.</li>
            <li>Rellenar con crema pastelera una vez fría.</li>
        </ol>
    </div>
</div>

<!-- Modal para Tarta de Frutas -->
<div id="modalTartaFrutas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Tarta de Frutas</h2>
        <p class="descripcionReceta">Base de galleta crujiente con frutas frescas y crema.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>200g de galletas molidas</li>
            <li>100g de mantequilla derretida</li>
            <li>200g de crema batida</li>
            <li>Frutas frescas (fresas, kiwi, etc.)</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Mezclar las galletas molidas con la mantequilla y formar la base.</li>
            <li>Refrigerar por 30 minutos.</li>
            <li>Rellenar con crema batida.</li>
            <li>Colocar las frutas frescas encima.</li>
        </ol>
    </div>
</div>

<!-- Modal para Galletas de Avena -->
<div id="modalGalletasAvena" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Galletas de Avena</h2>
        <p class="descripcionReceta">Galletas saludables de avena, perfectas para merendar.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>150g de avena</li>
            <li>100g de azúcar moreno</li>
            <li>1 huevo</li>
            <li>100g de harina</li>
            <li>50g de mantequilla</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Mezclar todos los ingredientes en un bol.</li>
            <li>Formar bolitas con la masa y aplastarlas.</li>
            <li>Hornear a 180°C durante 12 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal para Asado -->
<div id="modalAsado" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Asado</h2>
        <p class="descripcionReceta">Carne asada a la parrilla, tradicional en reuniones familiares.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>1 kg de carne de res (preferiblemente costillar o lomo)</li>
            <li>Sal gruesa</li>
            <li>Pimienta</li>
            <li>Carbón o leña para la parrilla</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Encender la parrilla con carbón o leña.</li>
            <li>Sazonar la carne con sal y pimienta.</li>
            <li>Colocar la carne sobre la parrilla y asar al gusto.</li>
            <li>Servir caliente acompañado de ensaladas o papas.</li>
        </ol>
    </div>
</div>

<!-- Modal para Empanadas -->
<div id="modalEmpanadas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Empanadas</h2>
        <p class="descripcionReceta">Masa rellena de carne o mariscos, típicas de fiestas patrias.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>500g de harina</li>
            <li>1 taza de agua</li>
            <li>200g de manteca</li>
            <li>500g de carne picada o mariscos</li>
            <li>Cebolla, ají y condimentos al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Preparar la masa mezclando harina, manteca y agua.</li>
            <li>Rellenar con carne o mariscos previamente cocidos.</li>
            <li>Sellar las empanadas y hornear a 180°C por 20 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal para Ceviche -->
<div id="modalCeviche" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Ceviche</h2>
        <p class="descripcionReceta">Pescado marinado en limón, fresco y delicioso.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>500g de pescado fresco (preferiblemente corvina)</li>
            <li>Jugo de 5 limones</li>
            <li>1 cebolla morada en rodajas finas</li>
            <li>Cilantro picado</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Cortar el pescado en cubos pequeños.</li>
            <li>Marinar el pescado en el jugo de limón por 10 minutos.</li>
            <li>Añadir la cebolla y cilantro.</li>
            <li>Servir frío acompañado de tostadas o maíz.</li>
        </ol>
    </div>
</div>

<!-- Modal para Chorrillana -->
<div id="modalChorrillana" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Chorrillana</h2>
        <p class="descripcionReceta">Plato de papas fritas con carne y cebolla, ideal para compartir.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>500g de carne de res en tiras</li>
            <li>4 papas grandes</li>
            <li>2 cebollas en rodajas</li>
            <li>Aceite para freír</li>
            <li>Sal y pimienta</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Freír las papas hasta dorar y reservar.</li>
            <li>Sofreír la cebolla y carne en una sartén con aceite.</li>
            <li>Mezclar todo en la sartén y servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal para Pescado al Horno -->
<div id="modalPescadoAlHorno" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Pescado al Horno</h2>
        <p class="descripcionReceta">Pescado fresco horneado con hierbas, ligero y sabroso.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>1 pescado entero limpio (preferiblemente merluza)</li>
            <li>Hierbas frescas (perejil, orégano, albahaca)</li>
            <li>Jugo de limón</li>
            <li>Sal y pimienta</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Precalentar el horno a 200°C.</li>
            <li>Sazonar el pescado con hierbas, limón, sal y pimienta.</li>
            <li>Hornear por 25 minutos o hasta que esté cocido.</li>
            <li>Servir con una guarnición de vegetales.</li>
        </ol>
    </div>
</div>

<!-- Modal para Pollo al Curry -->
<div id="modalPolloAlCurry" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 class="nombreReceta">Pollo al Curry</h2>
        <p class="descripcionReceta">Pechuga de pollo cocinada con especias y crema de coco.</p>
        <h3>Ingredientes:</h3>
        <ul class="ingredientesReceta">
            <li>2 pechugas de pollo</li>
            <li>2 cucharadas de curry en polvo</li>
            <li>200ml de crema de coco</li>
            <li>1 cebolla picada</li>
            <li>Sal y pimienta</li>
        </ul>
        <h3>Pasos:</h3>
        <ol class="pasosReceta">
            <li>Sofreír la cebolla en una sartén.</li>
            <li>Añadir el pollo y cocinar hasta dorar.</li>
            <li>Incorporar el curry y la crema de coco.</li>
            <li>Cocinar a fuego lento por 15 minutos.</li>
            <li>Servir con arroz basmati o naan.</li>
        </ol>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
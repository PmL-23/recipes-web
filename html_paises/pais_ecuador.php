<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ecuador</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>
    
    <h2 class="text-center pt-5">Las mejores recetas de Ecuador</h2>
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
    
    <!-- Recetas Ecuatorianas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Bolón de Verde.jpg" class="card-img-top" alt="bolon de verde">
                    <div class="card-body">
                        <h5 class="card-title">Bolón de Verde</h5>
                        <p class="card-text">Bolas de plátano verde rellenas con queso o chicharrón.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBolonDeVerde">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Mote con Chicharrón.jpg" class="card-img-top" alt="mote con chicharron">
                    <div class="card-body">
                        <h5 class="card-title">Mote con Chicharrón</h5>
                        <p class="card-text">Mote de maíz con chicharrón, acompañado de una salsa de tomate.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMoteConChicharron">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Empanadas de Viento.jpg" class="card-img-top" alt="empanadas de viento">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas de Viento</h5>
                        <p class="card-text">Empanadas fritas rellenas de queso, crujientes y deliciosas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadasDeViento">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Tigrillo.jpg" class="card-img-top" alt="tigrillo">
                    <div class="card-body">
                        <h5 class="card-title">Tigrillo</h5>
                        <p class="card-text">Puré de plátano verde con huevo y queso, un desayuno energético.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTigrillo">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Pan de Yuca.jpg" class="card-img-top" alt="pan de yuca">
                    <div class="card-body">
                        <h5 class="card-title">Pan de Yuca</h5>
                        <p class="card-text">Panecillos hechos de yuca, suaves y esponjosos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanDeYuca">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Café con Pan.png" class="card-img-top" alt="cafe con pan">
                    <div class="card-body">
                        <h5 class="card-title">Café con Pan</h5>
                        <p class="card-text">Café negro acompañado de pan fresco, un desayuno clásico.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCafeConPan">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Ceviche de Camarón.jpg" class="card-img-top" alt="ceviche de camaron">
                    <div class="card-body">
                        <h5 class="card-title">Ceviche de Camarón</h5>
                        <p class="card-text">Camarones marinados en limón, cebolla y cilantro, servido con chifles.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCevicheDeCamaron">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Seco de Chivo.png" class="card-img-top" alt="seco de chivo">
                    <div class="card-body">
                        <h5 class="card-title">Seco de Chivo</h5>
                        <p class="card-text">Guiso de carne de chivo con cerveza, especias y plátano.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSecoDeChivo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Fritada.jpg" class="card-img-top" alt="fritada">
                    <div class="card-body">
                        <h5 class="card-title">Fritada</h5>
                        <p class="card-text">Carne de cerdo frita, acompañada de mote, plátano y salsa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalFritada">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Locro de Papas.jpg" class="card-img-top" alt="locro de papas">
                    <div class="card-body">
                        <h5 class="card-title">Locro de Papas</h5>
                        <p class="card-text">Sopa cremosa de papas, queso y aguacate, ideal para días fríos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalLocroDePapas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Arroz con Menestra.jpg" class="card-img-top" alt="arroz con menestra">
                    <div class="card-body">
                        <h5 class="card-title">Arroz con Menestra</h5>
                        <p class="card-text">Arroz acompañado de menestra (frijoles o lentejas) y carne.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozConMenestra">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
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

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Tortillas de Maíz.jpg" class="card-img-top" alt="tortillas de maiz">
                    <div class="card-body">
                        <h5 class="card-title">Tortillas de Maíz</h5>
                        <p class="card-text">Tortillas de maíz acompañadas de queso o aguacate.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortillasDeMaiz">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Choclo con Queso.jpg" class="card-img-top" alt="choclo con queso">
                    <div class="card-body">
                        <h5 class="card-title">Choclo con Queso</h5>
                        <p class="card-text">Mazorcas de maíz con queso fresco, un snack delicioso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChocloConQueso">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Dulce de Guayaba.jpg" class="card-img-top" alt="dulce de guayaba">
                    <div class="card-body">
                        <h5 class="card-title">Dulce de Guayaba</h5>
                        <p class="card-text">Postre dulce de guayaba, ideal para acompañar el café.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalDulceDeGuayaba">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Cuca de Maíz.jpg" class="card-img-top" alt="cuca de maiz">
                    <div class="card-body">
                        <h5 class="card-title">Cuca de Maíz</h5>
                        <p class="card-text">Galletas de maíz, crujientes y perfectas para un picoteo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCucaDeMaiz">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Bocadillo de Frutas.jpg" class="card-img-top" alt="bocadillo de frutas">
                    <div class="card-body">
                        <h5 class="card-title">Bocadillo de Frutas</h5>
                        <p class="card-text">Mezcla de frutas frescas, ideal para una merienda ligera.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBocadilloDeFrutas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Paila de Frutas.jpg" class="card-img-top" alt="paila de frutas">
                    <div class="card-body">
                        <h5 class="card-title">Paila de Frutas</h5>
                        <p class="card-text">Refresco hecho con frutas tropicales, refrescante y delicioso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPailaDeFrutas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Salchipapas.jpg" class="card-img-top" alt="salchipapas">
                    <div class="card-body">
                        <h5 class="card-title">Salchipapas</h5>
                        <p class="card-text">Papas fritas acompañadas de salchichas, salsa y mayonesa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSalchipapas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Cuy Asado.jpg" class="card-img-top" alt="cuy asado">
                    <div class="card-body">
                        <h5 class="card-title">Cuy Asado</h5>
                        <p class="card-text">Cuy (cobayo) asado, un plato tradicional en algunas regiones.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCuyAsado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Tortilla de Papas.jpg" class="card-img-top" alt="tortilla de papas">
                    <div class="card-body">
                        <h5 class="card-title">Tortilla de Papas</h5>
                        <p class="card-text">Tortilla a base de papas y huevo, ideal para la cena.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortillaDePapas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Arroz con Pollo.jpg" class="card-img-top" alt="arroz con pollo">
                    <div class="card-body">
                        <h5 class="card-title">Arroz con Pollo</h5>
                        <p class="card-text">Arroz con pollo, un plato clásico y muy sabroso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozConPollo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Pescado Frito.jpg" class="card-img-top" alt="pescado frito">
                    <div class="card-body">
                        <h5 class="card-title">Pescado Frito</h5>
                        <p class="card-text">Pescado frito servido con ensalada y plátano frito.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPescadoFrito">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgEcuador/Sopa de Pescado.jpg" class="card-img-top" alt="sopa de pescado">
                    <div class="card-body">
                        <h5 class="card-title">Sopa de Pescado</h5>
                        <p class="card-text">Sopa a base de pescado, yuca y verduras, ligera y nutritiva.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopaDePescado">Ver Receta</a>
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>

<!-- Modal Bolón de Verde -->
<div id="modalBolonDeVerde" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bolón de Verde</h2>
        <p id="descripcionReceta">Bolas de plátano verde rellenas con queso o chicharrón.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 plátanos verdes</li>
            <li>200 g de queso fresco</li>
            <li>200 g de chicharrón (opcional)</li>
            <li>Sal al gusto</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hervir los plátanos en agua con sal hasta que estén suaves.</li>
            <li>Escurrir, pelar y hacer puré los plátanos.</li>
            <li>Mezclar el puré con el queso y chicharrón.</li>
            <li>Formar bolas y freír en aceite caliente hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Mote con Chicharrón -->
<div id="modalMoteConChicharron" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Mote con Chicharrón</h2>
        <p id="descripcionReceta">Mote de maíz con chicharrón, acompañado de una salsa de tomate.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de mote cocido</li>
            <li>200 g de chicharrón</li>
            <li>1 cebolla picada</li>
            <li>1 tomate picado</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Freír el chicharrón en una sartén.</li>
            <li>En la misma sartén, añadir la cebolla y tomate.</li>
            <li>Servir el mote con el chicharrón y salsa por encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Empanadas de Viento -->
<div id="modalEmpanadasDeViento" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Empanadas de Viento</h2>
        <p id="descripcionReceta">Empanadas fritas rellenas de queso, crujientes y deliciosas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de trigo</li>
            <li>1 taza de agua</li>
            <li>200 g de queso rallado</li>
            <li>Sal al gusto</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina, agua y sal hasta formar una masa.</li>
            <li>Formar círculos, colocar queso en el centro y doblar.</li>
            <li>Freír las empanadas hasta dorar y servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Tigrillo -->
<div id="modalTigrillo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tigrillo</h2>
        <p id="descripcionReceta">Puré de plátano verde con huevo y queso, un desayuno energético.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 plátanos verdes</li>
            <li>2 huevos</li>
            <li>200 g de queso fresco</li>
            <li>Sal y pimienta al gusto</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hervir los plátanos y hacer puré.</li>
            <li>Freír los huevos y mezclarlos con el puré.</li>
            <li>Añadir el queso y sazonar al gusto.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Pan de Yuca -->
<div id="modalPanDeYuca" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pan de Yuca</h2>
        <p id="descripcionReceta">Panecillos hechos de yuca, suaves y esponjosos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de yuca rallada</li>
            <li>1 taza de queso rallado</li>
            <li>2 huevos</li>
            <li>Sal al gusto</li>
            <li>Aceite para engrasar la bandeja</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes hasta obtener una masa homogénea.</li>
            <li>Formar bolitas y colocarlas en una bandeja engrasada.</li>
            <li>Hornear a 180°C por 20 minutos o hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Café con Pan -->
<div id="modalCafeConPan" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Café con Pan</h2>
        <p id="descripcionReceta">Café negro acompañado de pan fresco, un desayuno clásico.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Café negro</li>
            <li>Pan fresco</li>
            <li>Azúcar al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar el café a gusto.</li>
            <li>Servir con pan fresco.</li>
            <li>Endulzar al gusto.</li>
        </ol>
    </div>
</div>

<!-- Modal Ceviche de Camarón -->
<div id="modalCevicheDeCamaron" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ceviche de Camarón</h2>
        <p id="descripcionReceta">Camarones marinados en limón, cebolla y cilantro, servido con chifles.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de camarones</li>
            <li>Jugo de 5 limones</li>
            <li>1 cebolla morada</li>
            <li>Cilantro al gusto</li>
            <li>Chifles para acompañar</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar los camarones en el jugo de limón.</li>
            <li>Agregar cebolla y cilantro.</li>
            <li>Servir con chifles.</li>
        </ol>
    </div>
</div>

<!-- Modal Seco de Chivo -->
<div id="modalSecoDeChivo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Seco de Chivo</h2>
        <p id="descripcionReceta">Guiso de carne de chivo con cerveza, especias y plátano.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de carne de chivo</li>
            <li>1 botella de cerveza</li>
            <li>Especias al gusto</li>
            <li>1 plátano maduro</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar la carne con especias.</li>
            <li>Cocinar con cerveza hasta que esté tierna.</li>
            <li>Agregar plátano y servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Fritada -->
<div id="modalFritada" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Fritada</h2>
        <p id="descripcionReceta">Carne de cerdo frita, acompañada de mote, plátano y salsa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de carne de cerdo</li>
            <li>2 plátanos</li>
            <li>Mote cocido</li>
            <li>Salsa al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Freír la carne hasta dorar.</li>
            <li>Servir con mote y plátano.</li>
            <li>Añadir salsa al gusto.</li>
        </ol>
    </div>
</div>

<!-- Modal Locro de Papas -->
<div id="modalLocroDePapas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Locro de Papas</h2>
        <p id="descripcionReceta">Sopa cremosa de papas, queso y aguacate, ideal para días fríos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de papas</li>
            <li>200g de queso fresco</li>
            <li>1 aguacate</li>
            <li>Agua y sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer las papas en agua con sal.</li>
            <li>Hacer puré y añadir queso.</li>
            <li>Servir con aguacate.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz con Menestra -->
<div id="modalArrozConMenestra" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arroz con Menestra</h2>
        <p id="descripcionReceta">Arroz acompañado de menestra (frijoles o lentejas) y carne.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de arroz</li>
            <li>1 taza de menestra (frijoles o lentejas)</li>
            <li>500g de carne</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el arroz y la menestra por separado.</li>
            <li>Saltear la carne y servir.</li>
            <li>Acompañar el arroz con menestra.</li>
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

<!-- Modal Tortillas de Maíz -->
<div id="modalTortillasDeMaiz" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tortillas de Maíz</h2>
        <p id="descripcionReceta">Tortillas de maíz acompañadas de queso o aguacate.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de maíz</li>
            <li>1 taza de agua</li>
            <li>Sal al gusto</li>
            <li>Queso o aguacate para acompañar</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina de maíz con agua y sal.</li>
            <li>Amasar hasta obtener una masa suave.</li>
            <li>Formar bolitas y aplanar en forma de tortilla.</li>
            <li>Cocinar en una sartén caliente hasta dorar por ambos lados.</li>
        </ol>
    </div>
</div>

<!-- Modal Choclo con Queso -->
<div id="modalChocloConQueso" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Choclo con Queso</h2>
        <p id="descripcionReceta">Mazorcas de maíz con queso fresco, un snack delicioso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 mazorcas de choclo</li>
            <li>Queso fresco al gusto</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer las mazorcas en agua con sal hasta que estén tiernas.</li>
            <li>Servir caliente con trozos de queso fresco.</li>
        </ol>
    </div>
</div>

<!-- Modal Dulce de Guayaba -->
<div id="modalDulceDeGuayaba" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Dulce de Guayaba</h2>
        <p id="descripcionReceta">Postre dulce de guayaba, ideal para acompañar el café.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de guayabas</li>
            <li>500 g de azúcar</li>
            <li>Jugo de 1 limón</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Pelarlas y picar las guayabas.</li>
            <li>Cocinar con azúcar y jugo de limón a fuego lento.</li>
            <li>Revolver hasta obtener una mezcla espesa.</li>
            <li>Dejar enfriar y servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Cuca de Maíz -->
<div id="modalCucaDeMaiz" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Cuca de Maíz</h2>
        <p id="descripcionReceta">Galletas de maíz, crujientes y perfectas para un picoteo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de maíz</li>
            <li>1/2 taza de azúcar</li>
            <li>1/2 taza de mantequilla</li>
            <li>1 huevo</li>
            <li>1 cucharadita de polvo de hornear</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Precalentar el horno a 180°C.</li>
            <li>Mezclar todos los ingredientes hasta formar una masa.</li>
            <li>Formar bolitas y aplastarlas en la bandeja de horno.</li>
            <li>Hornear durante 15-20 minutos o hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Bocadillo de Frutas -->
<div id="modalBocadilloDeFrutas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bocadillo de Frutas</h2>
        <p id="descripcionReceta">Mezcla de frutas frescas, ideal para una merienda ligera.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de fresas</li>
            <li>1 plátano</li>
            <li>1 manzana</li>
            <li>1 naranja</li>
            <li>Jugo de 1 limón</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Picar todas las frutas en trozos pequeños.</li>
            <li>Mezclar en un tazón y añadir jugo de limón.</li>
            <li>Servir frío y disfrutar.</li>
        </ol>
    </div>
</div>

<!-- Modal Paila de Frutas -->
<div id="modalPailaDeFrutas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Paila de Frutas</h2>
        <p id="descripcionReceta">Refresco hecho con frutas tropicales, refrescante y delicioso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de frutas tropicales (mora, papaya, piña, etc.)</li>
            <li>1 taza de jugo de naranja</li>
            <li>1 cucharada de azúcar (opcional)</li>
            <li>Hielo al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Lavar y picar las frutas en trozos pequeños.</li>
            <li>Mezclar las frutas en un tazón grande.</li>
            <li>Agregar el jugo de naranja y el azúcar, si se desea.</li>
            <li>Servir en vasos con hielo y disfrutar.</li>
        </ol>
    </div>
</div>

<!-- Modal Salchipapas -->
<div id="modalSalchipapas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Salchipapas</h2>
        <p id="descripcionReceta">Papas fritas acompañadas de salchichas, salsa y mayonesa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 papas medianas</li>
            <li>4 salchichas</li>
            <li>Salsa de tomate al gusto</li>
            <li>Mayonesa al gusto</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Pelar y cortar las papas en tiras.</li>
            <li>Freír las papas hasta que estén doradas.</li>
            <li>Freír las salchichas y cortarlas en rodajas.</li>
            <li>Servir las papas en un plato y agregar las salchichas por encima.</li>
            <li>Agregar salsa y mayonesa al gusto.</li>
        </ol>
    </div>
</div>

<!-- Modal Cuy Asado -->
<div id="modalCuyAsado" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Cuy Asado</h2>
        <p id="descripcionReceta">Cuy (cobayo) asado, un plato tradicional en algunas regiones.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 cuy</li>
            <li>2 dientes de ajo</li>
            <li>Sal al gusto</li>
            <li>Pimienta al gusto</li>
            <li>2 cucharadas de aceite</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar el cuy con ajo, sal y pimienta.</li>
            <li>Calentar el aceite en una sartén y dorar el cuy.</li>
            <li>Asar el cuy a fuego lento hasta que esté cocido.</li>
            <li>Servir con ensalada y papas.</li>
        </ol>
    </div>
</div>

<!-- Modal Tortilla de Papas -->
<div id="modalTortillaDePapas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tortilla de Papas</h2>
        <p id="descripcionReceta">Tortilla a base de papas y huevo, ideal para la cena.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>3 papas medianas</li>
            <li>4 huevos</li>
            <li>1 cebolla pequeña</li>
            <li>Sal al gusto</li>
            <li>Pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Pelar y picar las papas y la cebolla.</li>
            <li>Freír las papas y la cebolla hasta que estén doradas.</li>
            <li>Batir los huevos y mezclar con las papas y cebolla.</li>
            <li>Verter la mezcla en una sartén y cocinar hasta que cuaje.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz con Pollo -->
<div id="modalArrozConPollo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arroz con Pollo</h2>
        <p id="descripcionReceta">Arroz con pollo, un plato clásico y muy sabroso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de arroz</li>
            <li>500g de pollo</li>
            <li>1 cebolla picada</li>
            <li>1 pimiento rojo picado</li>
            <li>2 tazas de caldo de pollo</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Calentar el aceite en una olla y dorar el pollo.</li>
            <li>Agregar la cebolla y el pimiento, y cocinar hasta que estén tiernos.</li>
            <li>Agregar el arroz y mezclar bien.</li>
            <li>Verter el caldo de pollo y cocinar a fuego lento hasta que el arroz esté listo.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Pescado Frito -->
<div id="modalPescadoFrito" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pescado Frito</h2>
        <p id="descripcionReceta">Pescado frito servido con ensalada y plátano frito.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pescado (tilapia o similar)</li>
            <li>Harina para empanizar</li>
            <li>Sal al gusto</li>
            <li>Aceite para freír</li>
            <li>Ensalada y plátano frito para acompañar</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Limpiar el pescado y sazonar con sal.</li>
            <li>Pasar el pescado por harina para empanizar.</li>
            <li>Freír en aceite caliente hasta que esté dorado.</li>
            <li>Servir con ensalada y plátano frito.</li>
        </ol>
    </div>
</div>

<!-- Modal Sopa de Pescado -->
<div id="modalSopaDePescado" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sopa de Pescado</h2>
        <p id="descripcionReceta">Sopa a base de pescado, yuca y verduras, ligera y nutritiva.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>300 g de filete de pescado</li>
            <li>1 taza de yuca pelada y cortada en trozos</li>
            <li>1 zanahoria en rodajas</li>
            <li>1 cebolla picada</li>
            <li>2 dientes de ajo picados</li>
            <li>1 litro de caldo de pescado</li>
            <li>Sal y pimienta al gusto</li>
            <li>Cilantro fresco al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>En una olla, calentar un poco de aceite y sofreír la cebolla y el ajo.</li>
            <li>Agregar el caldo de pescado y llevar a ebullición.</li>
            <li>Incorporar la yuca y la zanahoria; cocinar hasta que estén tiernas.</li>
            <li>Agregar el filete de pescado y cocinar por unos minutos.</li>
            <li>Rectificar la sal y pimienta, y servir caliente, decorando con cilantro fresco.</li>
        </ol>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
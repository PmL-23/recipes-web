<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Argentina</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        <script src="../index/manejarModal.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>

    <h2 class="text-center pt-5">Las mejores recetas argentinas</h2>
    
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

    <!-- Recetas Argentinas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/medialunas.jpg" class="card-img-top" alt="medialunas">
                    <div class="card-body">
                        <h5 class="card-title">Medialunas</h5>
                        <p class="card-text">Deliciosas medialunas que son croissants argentinos, ideales para acompañar
                            café con leche.</p>
                        <a id="verReceta" href="#" class="btn btn-primary verReceta" data-modal="modalReceta">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/facturas.jpg" class="card-img-top" alt="facturas">
                    <div class="card-body">
                        <h5 class="card-title">Facturas</h5>
                        <p class="card-text">Variedad de pasteles y panes dulces, perfectos para un desayuno tradicional
                            argentino.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalRecetaFacturas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/churros.jpg" class="card-img-top" alt="churros">
                    <div class="card-body">
                        <h5 class="card-title">Churros con Chocolate</h5>
                        <p class="card-text">Churros espolvoreados con azúcar y canela, acompañados de un espeso
                            chocolate caliente.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalRecetaChurros">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/bizcochitos.jpg" class="card-img-top" alt="bizcochitos">
                    <div class="card-body">
                        <h5 class="card-title">Bizcochitos</h5>
                        <p class="card-text">Pequeños panes salados o dulces, ideales para acompañar con café o mate en
                            la mañana.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBizcochitos">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/panqueques.jpg" class="card-img-top" alt="panqueques">
                    <div class="card-body">
                        <h5 class="card-title">Panqueques</h5>
                        <p class="card-text">Deliciosos panqueques que puedes rellenar con dulce de leche o mermelada,
                            perfectos para el desayuno.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanqueques">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/palitos.jpg" class="card-img-top" alt="palitos">
                    <div class="card-body">
                        <h5 class="card-title">Palitos</h5>
                        <p class="card-text">Crujientes palitos de pan con distintas semillas, ideales para acompañar
                            con queso o dulce de leche.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPalitos">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/milanesa napolitana.jpg" class="card-img-top" alt="milanesa napolitana">
                    <div class="card-body">
                        <h5 class="card-title">Milanesa a la Napolitana</h5>
                        <p class="card-text">Deliciosa milanesa empanada, cubierta con salsa de tomate y queso fundido,
                            un plato típico argentino.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMilanesa">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/locro.jpg" class="card-img-top" alt="locro">
                    <div class="card-body">
                        <h5 class="card-title">Locro</h5>
                        <p class="card-text">Guiso tradicional argentino a base de maíz, carne, y vegetales, ideal para
                            días festivos en Argentina.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalLocro">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/choripan.jpg" class="card-img-top" alt="Choripán">
                    <div class="card-body">
                        <h5 class="card-title">Choripán</h5>
                        <p class="card-text">Sándwich de chorizo a la parrilla servido con chimichurri y pan crujiente,
                            un clásico argentino.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChoripan">Ver receta</a>
                    </div>
                </div>
            </div>
            <!-- ACA -->

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/empanadas.png" class="card-img-top" alt="empanadas">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas</h5>
                        <p class="card-text">Deliciosas empanadas rellenas con carne, pollo, o verduras, ideales para un
                            almuerzo rápido.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadas">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/asado.jpg" class="card-img-top" alt="asado">
                    <div class="card-body">
                        <h5 class="card-title">Asado</h5>
                        <p class="card-text">El asado argentino es una parrillada de carne cocinada a la brasa,
                            acompañada de guarniciones.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAsado">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/pizza.jpg" class="card-img-top" alt="pizza">
                    <div class="card-body">
                        <h5 class="card-title">Pizza</h5>
                        <p class="card-text">La pizza argentina, con su masa gruesa y generosa cantidad de queso, es un
                            clásico irresistible.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPizza">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/tostadas.jpg" class="card-img-top" alt="tostadas">
                    <div class="card-body">
                        <h5 class="card-title">Tostadas con Dulce de Leche</h5>
                        <p class="card-text">Crujientes tostadas untadas con el inconfundible dulce de leche argentino.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTostadas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/chocotorta.jpg" class="card-img-top" alt="chocotorta">
                    <div class="card-body">
                        <h5 class="card-title">Chocotorta</h5>
                        <p class="card-text">Un postre simple y delicioso hecho con galletas de chocolate y dulce de
                            leche.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChocotorta">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/masitas.jpg" class="card-img-top" alt="masitas">
                    <div class="card-body">
                        <h5 class="card-title">Masitas</h5>
                        <p class="card-text">Variedad de dulces y bocados pequeños de harina, azucar y manteca.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMasitas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/bizcochuelo.jpg" class="card-img-top" alt="bizcochuelo">
                    <div class="card-body">
                        <h5 class="card-title">Bizcochuelo</h5>
                        <p class="card-text">Esponjoso bizcochuelo casero, perfecto para acompañar el mate o el café.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBizcochuelo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/tiramisu.jpg" class="card-img-top" alt="tiramisu">
                    <div class="card-body">
                        <h5 class="card-title">Tiramisu</h5>
                        <p class="card-text">Postre hecho con capas de vainilla remojadas en cafe.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTiramisu">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/tortasFritas.jpg" class="card-img-top" alt="tortasFritas">
                    <div class="card-body">
                        <h5 class="card-title">Tortas Fritas</h5>
                        <p class="card-text">Crujientes tortas fritas, perfectas para acompañar el mate en días de
                            lluvia.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortasFritas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/milanesasPure.jpg" class="card-img-top" alt="milanesa con pure">
                    <div class="card-body">
                        <h5 class="card-title">Milanesas con puré</h5>
                        <p class="card-text">Las milanesas de carne empanada, acompañadas de puré, clásico argentino.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMilanesasPure">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/puchero.jpg" class="card-img-top" alt="puchero">
                    <div class="card-body">
                        <h5 class="card-title">Puchero</h5>
                        <p class="card-text">Un guiso tradicional con carne, papas, zanahorias y otras verduras cocidas.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPuchero">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/pizzaPiedra.jpg" class="card-img-top" alt="pizza a la piedra">
                    <div class="card-body">
                        <h5 class="card-title">Pizza a la piedra</h5>
                        <p class="card-text">La pizza a la piedra con queso, jamón y morrones es una cena popular en
                            Argentina.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPizzaPiedra">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/tartaVerdura.jpg" class="card-img-top" alt="tarta de verdura">
                    <div class="card-body">
                        <h5 class="card-title">Tarta de verduras</h5>
                        <p class="card-text">Una opción ligera y sabrosa es la tarta de acelga o espinaca, ideal para la
                            cena.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTarta">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgArg/ñoki.jpg" class="card-img-top" alt="ñokis">
                    <div class="card-body">
                        <h5 class="card-title">Ñokis</h5>
                        <p class="card-text">Pasta Argentina elavorada con pure de papa harina y huevo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalÑokis">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
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

    <!-- Modal para facturas -->
    <div id="modalRecetaFacturas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreRecetaFacturas">Facturas</h2>
            <p id="descripcionRecetaFacturas">Deliciosas facturas esponjosas perfectas para el desayuno o la merienda.
            </p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesRecetaFacturas">
                <li>2 tazas de harina</li>
                <li>1/2 taza de azúcar</li>
                <li>1 taza de leche</li>
                <li>50g de mantequilla</li>
                <li>1 huevo</li>
                <li>Levadura al gusto</li>
                <li>1 pizca de sal</li>
                <li>Esencia de vainilla (opcional)</li>
                <li>Frutas abrillantadas o chocolate para decorar (opcional)</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosRecetaFacturas">
                <li>Mezclar la harina, el azúcar y la levadura en un bol grande.</li>
                <li>Agregar la leche tibia, el huevo, la mantequilla derretida y la sal.</li>
                <li>Amasar y dejar reposar por 30 minutos en un lugar cálido hasta que duplique su tamaño.</li>
                <li>Formar las facturas en distintas formas y colocarlas en una bandeja para hornear.</li>
                <li>Precalentar el horno a 180°C y hornear por 20 minutos.</li>
                <li>Decorar con frutas abrillantadas o chocolate, si se desea.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para churros -->
    <div id="modalRecetaChurros" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreRecetaChurros">Churros</h2>
            <p id="descripcionRecetaChurros">Exquisitos churros crujientes, perfectos para acompañar con chocolate
                caliente.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesRecetaChurros">
                <li>1 taza de agua</li>
                <li>1/2 taza de mantequilla</li>
                <li>1 taza de harina</li>
                <li>2 huevos</li>
                <li>1 pizca de sal</li>
                <li>Azúcar y canela para espolvorear</li>
                <li>Chocolate para servir (opcional)</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosRecetaChurros">
                <li>Hervir el agua con la mantequilla y la sal.</li>
                <li>Agregar la harina y mezclar hasta formar una masa.</li>
                <li>Retirar del fuego y añadir los huevos, uno a uno.</li>
                <li>Calentar el aceite y freír los churros en forma de tiras.</li>
                <li>Escurrir y espolvorear con azúcar y canela.</li>
                <li>Servir con chocolate caliente, si se desea.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para mostrar la receta de Bizcochitos -->
    <div id="modalBizcochitos" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Bizcochitos</h2>
            <p>Pequeños panes salados o dulces, ideales para acompañar con café o mate en la mañana.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesBizcochitos">
                <li>500g de harina</li>
                <li>200g de manteca</li>
                <li>1 huevo</li>
                <li>Sal al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosBizcochitos">
                <li>Mezclar la harina y la manteca hasta obtener una masa arenosa.</li>
                <li>Agregar el huevo y la sal, amasar bien.</li>
                <li>Cortar en porciones y hornear a 180°C hasta dorar.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para mostrar la receta de Panqueques -->
    <div id="modalPanqueques" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Panqueques</h2>
            <p>Deliciosos panqueques que puedes rellenar con dulce de leche o mermelada, perfectos para el desayuno.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesPanqueques">
                <li>1 taza de harina</li>
                <li>2 huevos</li>
                <li>1 taza de leche</li>
                <li>1 cucharada de azúcar</li>
                <li>Mantequilla para cocinar</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosPanqueques">
                <li>Batir todos los ingredientes hasta obtener una mezcla homogénea.</li>
                <li>Calentar una sartén con mantequilla y verter un poco de mezcla.</li>
                <li>Cocinar por ambos lados hasta dorar.</li>
                <li>Rellenar con dulce de leche o mermelada y servir.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>

    <!-- Modal para mostrar la receta de Palitos -->
    <div id="modalPalitos" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Palitos</h2>
            <p>Crujientes palitos de pan con distintas semillas, ideales para acompañar con queso o dulce de leche.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesPalitos">
                <li>2 tazas de harina</li>
                <li>1/2 taza de agua</li>
                <li>1/4 taza de aceite</li>
                <li>Semillas al gusto (sésamo, amapola)</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosPalitos">
                <li>Mezclar la harina con el agua y el aceite hasta obtener una masa.</li>
                <li>Cortar en tiras y espolvorear con semillas.</li>
                <li>Hornear a 180°C hasta dorar.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>

    <!-- Modal para mostrar la receta de Milanesa a la Napolitana -->
    <div id="modalMilanesa" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Milanesa a la Napolitana</h2>
            <p>Deliciosa milanesa empanada, cubierta con salsa de tomate y queso fundido, un plato típico argentino.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesMilanesa">
                <li>1 kg de carne de res</li>
                <li>2 huevos</li>
                <li>Pan rallado al gusto</li>
                <li>Salsa de tomate</li>
                <li>Queso mozzarella</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosMilanesa">
                <li>Empanar la carne en huevo y pan rallado.</li>
                <li>Freír en aceite caliente hasta dorar.</li>
                <li>Agregar salsa de tomate y queso por encima, y gratinar.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>

    <!-- Modal para mostrar la receta de Locro -->
    <div id="modalLocro" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Locro</h2>
            <p>Guiso tradicional argentino a base de maíz, carne, y vegetales, ideal para días festivos en Argentina.
            </p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesLocro">
                <li>1 taza de maíz</li>
                <li>500g de carne (cerdo, res)</li>
                <li>1 cebolla</li>
                <li>2 zanahorias</li>
                <li>Caldo de carne al gusto</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosLocro">
                <li>Cocinar el maíz en agua hasta que esté tierno.</li>
                <li>Añadir la carne y los vegetales, y cocinar a fuego lento.</li>
                <li>Agregar caldo y dejar cocinar hasta que espese.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>

    <!-- Modal para mostrar la receta de Choripán -->
    <div id="modalChoripan" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Choripán</h2>
            <p>Un clásico argentino, un chorizo asado servido en pan, acompañado de chimichurri.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesChoripan">
                <li>4 chorizos</li>
                <li>4 panes</li>
                <li>Chimichurri al gusto</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosChoripan">
                <li>Asar los chorizos a la parrilla hasta que estén dorados.</li>
                <li>Servir en panes con chimichurri.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>

    <!-- Modal para Empanadas -->
    <div id="modalEmpanadas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Empanadas</h2>
            <p>Deliciosas empanadas rellenas con carne, pollo, o verduras, ideales para un almuerzo rápido.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de harina</li>
                <li>250g de manteca</li>
                <li>1 huevo</li>
                <li>Relleno de carne, pollo o verduras</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Mezclar la harina con la manteca y el huevo.</li>
                <li>Estirar la masa y cortar círculos.</li>
                <li>Agregar el relleno y cerrar las empanadas.</li>
                <li>Cocinar en el horno a 180°C durante 25 minutos.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Asado -->
    <div id="modalAsado" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Asado</h2>
            <p>El asado argentino es una parrillada de carne cocinada a la brasa, acompañada de guarniciones.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>1 kg de carne (costilla, vacío)</li>
                <li>Sal gruesa</li>
                <li>Chimichurri</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Preparar la parrilla y encender el fuego.</li>
                <li>Condimentar la carne con sal y chimichurri.</li>
                <li>Cocinar la carne a fuego lento durante 1-2 horas.</li>
                <li>Servir con ensaladas y pan.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Pizza -->
    <div id="modalPizza" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Pizza</h2>
            <p>La pizza argentina, con su masa gruesa y generosa cantidad de queso, es un clásico irresistible.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de harina</li>
                <li>300ml de agua</li>
                <li>25g de levadura</li>
                <li>200g de queso</li>
                <li>Tomate, orégano al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Mezclar la harina, agua y levadura para hacer la masa.</li>
                <li>Dejar reposar 1 hora.</li>
                <li>Estirar la masa y agregar salsa de tomate y queso.</li>
                <li>Cocinar en el horno a 220°C durante 15-20 minutos.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Tostadas con Dulce de Leche -->
    <div id="modalTostadas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Tostadas con Dulce de Leche</h2>
            <p>Crujientes tostadas untadas con el inconfundible dulce de leche argentino.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>Pan de campo</li>
                <li>Dulce de leche al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Tostar el pan hasta que esté dorado.</li>
                <li>Untar con abundante dulce de leche.</li>
                <li>Servir caliente o tibio.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Chocotorta -->
    <div id="modalChocotorta" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Chocotorta</h2>
            <p>Un postre simple y delicioso hecho con galletas de chocolate y dulce de leche.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>2 paquetes de galletas de chocolate</li>
                <li>400g de dulce de leche</li>
                <li>400g de queso crema</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Mezclar el dulce de leche con el queso crema.</li>
                <li>Humedecer las galletas en leche y formar capas en un molde.</li>
                <li>Alternar capas de galletas y la mezcla de dulce de leche.</li>
                <li>Refrigerar durante 4 horas antes de servir.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Masitas -->
    <div id="modalMasitas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Masitas</h2>
            <p>Variedad de dulces y bocados pequeños de harina, azúcar y manteca.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de harina</li>
                <li>200g de manteca</li>
                <li>100g de azúcar</li>
                <li>1 huevo</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Mezclar la harina, manteca, azúcar y huevo hasta formar una masa.</li>
                <li>Formar pequeñas bolitas y colocar en una bandeja.</li>
                <li>Cocinar en el horno a 180°C durante 15 minutos.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Bizcochuelo -->
    <div id="modalBizcochuelo" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Bizcochuelo</h2>
            <p>Esponjoso bizcochuelo casero, perfecto para acompañar el mate o el café.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>4 huevos</li>
                <li>200g de azúcar</li>
                <li>200g de harina</li>
                <li>1 cucharadita de polvo de hornear</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Batir los huevos con el azúcar hasta que la mezcla sea espumosa.</li>
                <li>Agregar la harina y el polvo de hornear tamizados.</li>
                <li>Cocinar en un molde en el horno a 180°C durante 30 minutos.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Tiramisu -->
    <div id="modalTiramisu" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Tiramisu</h2>
            <p>Postre hecho con capas de vainilla remojadas en café.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>400g de queso mascarpone</li>
                <li>300g de galletas de vainilla</li>
                <li>2 tazas de café fuerte</li>
                <li>Cacao en polvo para decorar</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Batir el queso mascarpone hasta que esté suave.</li>
                <li>Remojar las galletas en el café y formar capas en un molde.</li>
                <li>Alternar capas de galletas y la mezcla de mascarpone.</li>
                <li>Refrigerar durante 6 horas y decorar con cacao antes de servir.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Tortas Fritas -->
    <div id="modalTortasFritas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Tortas Fritas</h2>
            <p>Crujientes tortas fritas, perfectas para acompañar el mate en días de lluvia.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de harina</li>
                <li>100g de grasa o aceite</li>
                <li>Agua, sal al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Mezclar la harina con la grasa derretida y agua hasta formar una masa.</li>
                <li>Estirar la masa y cortar en círculos.</li>
                <li>Freír en aceite caliente hasta dorar.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Milanesas con puré -->
    <div id="modalMilanesasPure" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Milanesas con puré</h2>
            <p>Las milanesas de carne empanada, acompañadas de puré, clásico argentino.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>4 milanesas de carne</li>
                <li>2 tazas de puré de papas</li>
                <li>1 taza de pan rallado</li>
                <li>2 huevos</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Batir los huevos con sal y pimienta.</li>
                <li>Pasar las milanesas por huevo y luego por pan rallado.</li>
                <li>Freír las milanesas hasta que estén doradas.</li>
                <li>Acompañar con puré de papas.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Puchero -->
    <div id="modalPuchero" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Puchero</h2>
            <p>Un guiso tradicional con carne, papas, zanahorias y otras verduras cocidas.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de carne de vaca</li>
                <li>4 papas medianas</li>
                <li>2 zanahorias</li>
                <li>1 cebolla</li>
                <li>1 calabaza</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Cocer la carne en agua con sal.</li>
                <li>Añadir las verduras troceadas y cocinar hasta que estén tiernas.</li>
                <li>Servir con caldo y un chorrito de aceite de oliva.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Pizza a la piedra -->
    <div id="modalPizzaPiedra" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Pizza a la piedra</h2>
            <p>La pizza a la piedra con queso, jamón y morrones es una cena popular en Argentina.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de harina</li>
                <li>25g de levadura fresca</li>
                <li>200ml de agua tibia</li>
                <li>200g de queso mozzarella</li>
                <li>100g de jamón</li>
                <li>1 pimiento rojo asado</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Mezclar la harina con la levadura y el agua.</li>
                <li>Amasar y dejar reposar la masa durante 1 hora.</li>
                <li>Extender la masa fina y hornear.</li>
                <li>Añadir el queso, jamón y morrones, y hornear nuevamente hasta que el queso se derrita.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Tarta de verduras -->
    <div id="modalTarta" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Tarta de verduras</h2>
            <p>Una opción ligera y sabrosa es la tarta de acelga o espinaca, ideal para la cena.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>1 paquete de masa para tarta</li>
                <li>500g de espinaca o acelga</li>
                <li>200g de queso crema</li>
                <li>2 huevos</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Cocer las verduras y escurrir.</li>
                <li>Mezclar con queso crema, huevos, sal y pimienta.</li>
                <li>Colocar en la masa y hornear a 180°C durante 40 minutos.</li>
            </ol>
        </div>
    </div>

    <!-- Modal para Ñokis -->
    <div id="modalÑokis" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2>Ñokis</h2>
            <p>Pasta argentina elaborada con puré de papa, harina y huevo.</p>
            <h3>Ingredientes:</h3>
            <ul>
                <li>500g de papas</li>
                <li>200g de harina</li>
                <li>1 huevo</li>
                <li>Sal y pimienta al gusto</li>
            </ul>
            <h3>Pasos:</h3>
            <ol>
                <li>Hacer puré con las papas cocidas.</li>
                <li>Mezclar con harina y huevo hasta formar una masa suave.</li>
                <li>Cortar en pequeños trozos y hervir los ñokis.</li>
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


    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
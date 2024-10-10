<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bolivia</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>

    <h2 class="text-center pt-5">Las mejores recetas de Bolivia</h2>
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

    <!-- Recetas Bolivianas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/salteñas.jpg" class="card-img-top" alt="empanadas salteñas">
                    <div class="card-body">
                        <h5 class="card-title">Salteñas</h5>
                        <p class="card-text">Empanadas jugosas rellenas de carne o pollo, acompañadas de papa y huevo
                            duro.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSalteñas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/buñuelos.jpg" class="card-img-top" alt="buñuelos">
                    <div class="card-body">
                        <h5 class="card-title">Buñuelos</h5>
                        <p class="card-text">Dulces fritos esponjosos, servidos con miel de caña.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBuñuelos">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/sonso.jpg" class="card-img-top" alt="sonso">
                    <div class="card-body">
                        <h5 class="card-title">Sonso</h5>
                        <p class="card-text">Palitos de yuca mezclados con queso, perfectos para el desayuno.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSonso">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
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
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/tucumanas.jpg" class="card-img-top" alt="empanadas tucumanas">
                    <div class="card-body">
                        <h5 class="card-title">Tucumanas</h5>
                        <p class="card-text">Empanadas fritas típicas de Bolivia, rellenas de carne, papa, zanahoria y
                            huevo duro, con un toque de picante.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTucumanas">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/humintas.jpg" class="card-img-top" alt="humintas">
                    <div class="card-body">
                        <h5 class="card-title">Humintas</h5>
                        <p class="card-text">Pasteles de maíz fresco cocidos al vapor, con un relleno dulce o salado,
                            típicos del altiplano.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalHumintas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/sajta.jpg" class="card-img-top" alt="sajta de pollo">
                    <div class="card-body">
                        <h5 class="card-title">Sajta de Pollo</h5>
                        <p class="card-text">Un guiso tradicional boliviano a base de pollo, papas y ají amarillo,
                            servido con arroz o chuño.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSajta">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/silpancho.jpg" class="card-img-top" alt="silpancho">
                    <div class="card-body">
                        <h5 class="card-title">Silpancho</h5>
                        <p class="card-text">Plato cruceño de carne apanada servida sobre arroz y papas, con huevo frito
                            y ensalada.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSilpancho">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/pique.jpg" class="card-img-top" alt="pique macho">
                    <div class="card-body">
                        <h5 class="card-title">Pique Macho</h5>
                        <p class="card-text">Un plato contundente de carne, papas fritas, salchichas, y huevo,
                            acompañado de pimientos y cebolla.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPique">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/sopaMani.jpg" class="card-img-top" alt="sopa de mani">
                    <div class="card-body">
                        <h5 class="card-title">Sopa de Maní</h5>
                        <p class="card-text">Sopa hecha a base de maní, carne, y papas, con un sabor cremoso y
                            delicioso, ideal para un almuerzo nutritivo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopa">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/fricase.jpg" class="card-img-top" alt="fricase">
                    <div class="card-body">
                        <h5 class="card-title">Fricasé</h5>
                        <p class="card-text">Estofado de cerdo preparado con maíz, ají amarillo, y especias, perfecto
                            para los días fríos en Bolivia.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalFricase">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/paceno.jpg" class="card-img-top" alt="plato paceño">
                    <div class="card-body">
                        <h5 class="card-title">Plato Paceño</h5>
                        <p class="card-text">Plato tradicional con choclo, papas, habas, queso frito y salsa llajwa,
                            típico de la región de La Paz.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPaceño">Ver receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/cunape.jpg" class="card-img-top" alt="cuñape">
                    <div class="card-body">
                        <h5 class="card-title">Cuñapé</h5>
                        <p class="card-text">Deliciosos pancitos de queso, crujientes por fuera y suaves por dentro.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCunape">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/masacoPlatano.jpg" class="card-img-top" alt="masaco de platano">
                    <div class="card-body">
                        <h5 class="card-title">Masaco de plátano</h5>
                        <p class="card-text">Un delicioso puré de plátano verde frito, mezclado con queso o carne.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMasaco">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/tawatawa.jpg" class="card-img-top" alt="tawa tawa">
                    <div class="card-body">
                        <h5 class="card-title">Tawa Tawa</h5>
                        <p class="card-text">Pequeños y esponjosos panes fritos, ideales para una merienda ligera y
                            deliciosa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTawaTawa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/empanadaQueso.jpg" class="card-img-top" alt="empanadas de queso ">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas de Queso</h5>
                        <p class="card-text">Empanadas rellenas de queso, servidas calientes y crujientes, una merienda
                            popular en todo Bolivia.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadasQueso">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/masaMaicillo.jpg" class="card-img-top" alt="masa maicillo">
                    <div class="card-body">
                        <h5 class="card-title">Masa Maicillo</h5>
                        <p class="card-text">Deliciosos panecillos elaborados a base de harina de maíz, con una textura
                            suave y un sabor ligeramente dulce.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMasaMaicillo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/pasankalla.jpg" class="card-img-top" alt="pasankalla">
                    <div class="card-body">
                        <h5 class="card-title">Pasankalla</h5>
                        <p class="card-text">Crujientes galletas de harina de trigo y maíz, una merienda tradicional
                            para acompañar con bebidas calientes.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPasankalla">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/calapurca.jpg" class="card-img-top" alt="calapurca">
                    <div class="card-body">
                        <h5 class="card-title">Calapurca</h5>
                        <p class="card-text">Una sopa tradicional boliviana de maíz, carne y papas, servida caliente y
                            espesa, perfecta para una cena reconfortante.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCalapurca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/ajiFideo.jpg" class="card-img-top" alt="aji de fideos">
                    <div class="card-body">
                        <h5 class="card-title">Ají de Fideos</h5>
                        <p class="card-text">Plato tradicional de pasta cocida con una salsa picante de ají amarillo,
                            acompañado de papas y queso rallado.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAjiFideos">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/Charquecán.jpg" class="card-img-top" alt="charquecán">
                    <div class="card-body">
                        <h5 class="card-title">Charquecán</h5>
                        <p class="card-text">Este plato consiste en carne deshidratada (charque) acompañada de mote,
                            papas y huevo frito, ideal para una cena sustanciosa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCharquecan">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/arrozQueso.jpg" class="card-img-top" alt="arroz con queso">
                    <div class="card-body">
                        <h5 class="card-title">Arroz con Queso</h5>
                        <p class="card-text">Un plato típico del oriente boliviano que combina arroz cremoso con queso
                            derretido, ideal para una cena ligera y deliciosa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozQueso">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBolivia/Ají de Lengua.jpg" class="card-img-top" alt="aji de lengua">
                    <div class="card-body">
                        <h5 class="card-title">Ají de Lengua</h5>
                        <p class="card-text">Un guiso hecho con lengua de res y salsa de ají amarillo, acompañado de
                            papas y arroz, ideal para una cena diferente y deliciosa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAjiLengua">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
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

        </div>

    </div>
    <!-- Modal para Salteñas -->
    <div id="modalSalteñas" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Salteñas</h2>
            <p id="descripcionReceta">Empanadas jugosas rellenas de carne o pollo, acompañadas de papa y huevo duro.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>500g de carne de res o pollo</li>
                <li>1 taza de cebolla picada</li>
                <li>2 cucharadas de aceite</li>
                <li>1/2 taza de papa cocida y picada</li>
                <li>1/2 taza de huevo duro picado</li>
                <li>Sal y pimienta al gusto</li>
                <li>1 paquete de masa para empanadas</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>En una sartén, calentar el aceite y añadir la cebolla hasta que esté dorada.</li>
                <li>Agregar la carne y cocinar hasta que esté bien hecha.</li>
                <li>Incorporar la papa y el huevo duro. Sazonar con sal y pimienta.</li>
                <li>Dejar enfriar la mezcla y rellenar las masas de empanadas.</li>
                <li>Hornear a 180°C durante 20 minutos o hasta doradas.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>

    <div id="modalBuñuelos" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <h2 id="nombreReceta">Buñuelos</h2>
            <p id="descripcionReceta">Dulces fritos esponjosos, servidos con miel de caña.</p>
            <h3>Ingredientes:</h3>
            <ul id="ingredientesReceta">
                <li>500g de carne de res o pollo</li>
                <li>1 taza de cebolla picada</li>
                <li>2 cucharadas de aceite</li>
                <li>1/2 taza de papa cocida y picada</li>
                <li>1/2 taza de huevo duro picado</li>
                <li>Sal y pimienta al gusto</li>
                <li>1 paquete de masa para empanadas</li>
                <!-- Agrega más ingredientes aquí -->
            </ul>
            <h3>Pasos:</h3>
            <ol id="pasosReceta">
                <li>En una sartén, calentar el aceite y añadir la cebolla hasta que esté dorada.</li>
                <li>Agregar la carne y cocinar hasta que esté bien hecha.</li>
                <li>Incorporar la papa y el huevo duro. Sazonar con sal y pimienta.</li>
                <li>Dejar enfriar la mezcla y rellenar las masas de empanadas.</li>
                <li>Hornear a 180°C durante 20 minutos o hasta doradas.</li>
                <!-- Agrega más pasos aquí -->
            </ol>
        </div>
    </div>

    <!-- Modal Sonso -->
<div id="modalSonso" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sonso</h2>
        <p id="descripcionReceta">Palitos de yuca mezclados con queso, perfectos para el desayuno.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de yuca</li>
            <li>200g de queso rallado</li>
            <li>1 huevo</li>
            <li>Sal al gusto</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar la yuca hasta que esté tierna.</li>
            <li>Machacar la yuca y mezclar con el queso y el huevo.</li>
            <li>Formar palitos y freír en aceite caliente.</li>
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

<!-- Modal Tucumanas -->
<div id="modalTucumanas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tucumanas</h2>
        <p id="descripcionReceta">Empanadas fritas típicas de Bolivia, rellenas de carne, papa, zanahoria y huevo duro, con un toque de picante.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de carne picada</li>
            <li>2 papas cocidas y picadas</li>
            <li>1 zanahoria rallada</li>
            <li>4 huevos duros picados</li>
            <li>Sal y ají al gusto</li>
            <li>1 paquete de masa para empanadas</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes del relleno.</li>
            <li>Rellenar las empanadas y freírlas hasta doradas.</li>
        </ol>
    </div>
</div>

<!-- Modal Humintas -->
<div id="modalHumintas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Humintas</h2>
        <p id="descripcionReceta">Pasteles de maíz fresco cocidos al vapor, con un relleno dulce o salado, típicos del altiplano.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de maíz fresco</li>
            <li>100g de queso fresco</li>
            <li>1/2 taza de azúcar (si es dulce)</li>
            <li>Sal al gusto</li>
            <li>Hojas de maíz para envolver</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Moler el maíz y mezclar con el queso y azúcar.</li>
            <li>Envolver en hojas de maíz y cocinar al vapor.</li>
        </ol>
    </div>
</div>

<!-- Modal Sajta de Pollo -->
<div id="modalSajta" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sajta de Pollo</h2>
        <p id="descripcionReceta">Un guiso tradicional boliviano a base de pollo, papas y ají amarillo, servido con arroz o chuño.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pollo cortado en trozos</li>
            <li>4 papas peladas</li>
            <li>1 cebolla picada</li>
            <li>2 cucharadas de ají amarillo</li>
            <li>Arroz o chuño para servir</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Freír la cebolla y añadir el pollo.</li>
            <li>Agregar las papas y el ají, cocinar hasta que esté todo tierno.</li>
        </ol>
    </div>
</div>


<!-- Modal para Silpancho -->
<div id="modalSilpancho" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaSilpancho">Silpancho</h2>
        <p id="descripcionRecetaSilpancho">Plato cruceño de carne apanada servida sobre arroz y papas, con huevo frito y ensalada.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaSilpancho">
            <li>500g de carne de res</li>
            <li>2 tazas de arroz</li>
            <li>4 papas</li>
            <li>2 huevos</li>
            <li>1 cebolla</li>
            <li>Sal y pimienta al gusto</li>
            <li>Pan rallado</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaSilpancho">
            <li>Cocinar el arroz y reservar.</li>
            <li>Hervir las papas y hacer puré.</li>
            <li>Empanar la carne y freír hasta dorar.</li>
            <li>Servir la carne sobre el arroz y acompañar con las papas y el huevo frito.</li>
        </ol>
    </div>
</div>

<!-- Modal para Pique Macho -->
<div id="modalPique" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaPique">Pique Macho</h2>
        <p id="descripcionRecetaPique">Un plato contundente de carne, papas fritas, salchichas, y huevo, acompañado de pimientos y cebolla.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaPique">
            <li>500g de carne de res</li>
            <li>200g de salchichas</li>
            <li>4 papas fritas</li>
            <li>1 pimiento rojo</li>
            <li>1 cebolla</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaPique">
            <li>Freír la carne y las salchichas.</li>
            <li>Agregar las papas fritas, pimientos y cebolla.</li>
            <li>Servir caliente y disfrutar.</li>
        </ol>
    </div>
</div>

<!-- Modal para Sopa de Maní -->
<div id="modalSopa" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaSopa">Sopa de Maní</h2>
        <p id="descripcionRecetaSopa">Sopa hecha a base de maní, carne, y papas, con un sabor cremoso y delicioso, ideal para un almuerzo nutritivo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaSopa">
            <li>250g de maní</li>
            <li>500g de carne de res</li>
            <li>3 papas</li>
            <li>1 cebolla</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaSopa">
            <li>Cocinar el maní y luego triturar hasta obtener una crema.</li>
            <li>Hervir la carne con agua y añadir las papas.</li>
            <li>Incorporar la crema de maní y sazonar.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal para Fricasé -->
<div id="modalFricase" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaFricase">Fricasé</h2>
        <p id="descripcionRecetaFricase">Estofado de cerdo preparado con maíz, ají amarillo, y especias, perfecto para los días fríos en Bolivia.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaFricase">
            <li>500g de cerdo</li>
            <li>1 taza de maíz</li>
            <li>1 ají amarillo</li>
            <li>1 cebolla</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaFricase">
            <li>Sellar la carne en una olla.</li>
            <li>Añadir cebolla y ají, y cocinar a fuego lento.</li>
            <li>Agregar el maíz y suficiente agua, y dejar cocer hasta que esté tierno.</li>
        </ol>
    </div>
</div>

<!-- Modal para Plato Paceño -->
<div id="modalPaceño" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaPaceño">Plato Paceño</h2>
        <p id="descripcionRecetaPaceño">Plato tradicional con choclo, papas, habas, queso frito y salsa llajwa, típico de la región de La Paz.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaPaceño">
            <li>2 choclos</li>
            <li>3 papas</li>
            <li>1 taza de habas</li>
            <li>200g de queso frito</li>
            <li>Salsa llajwa al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaPaceño">
            <li>Cocinar el choclo y las papas.</li>
            <li>Freír el queso.</li>
            <li>Servir todo junto y añadir salsa llajwa.</li>
        </ol>
    </div>
</div>


<!-- Modal Cuñapé -->
<div id="modalCunape" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaCunape">Cuñapé</h2>
        <p id="descripcionRecetaCunape">Deliciosos pancitos de queso, crujientes por fuera y suaves por dentro.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaCunape">
            <li>500g de queso fresco</li>
            <li>300g de harina de yuca</li>
            <li>2 huevos</li>
            <li>1 cucharadita de sal</li>
            <li>1/2 taza de leche</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaCunape">
            <li>Precalentar el horno a 180°C.</li>
            <li>Mezclar todos los ingredientes hasta formar una masa.</li>
            <li>Formar bolitas y colocarlas en una bandeja para hornear.</li>
            <li>Hornear durante 20-25 minutos hasta dorar.</li>
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

<!-- Modal Tawa Tawa -->
<div id="modalTawaTawa" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaTawaTawa">Tawa Tawa</h2>
        <p id="descripcionRecetaTawaTawa">Pequeños y esponjosos panes fritos, ideales para una merienda ligera y deliciosa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaTawaTawa">
            <li>500g de harina de trigo</li>
            <li>1 cucharadita de sal</li>
            <li>2 cucharadas de azúcar</li>
            <li>1/2 taza de leche</li>
            <li>1 huevo</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaTawaTawa">
            <li>Mezclar los ingredientes hasta formar una masa.</li>
            <li>Dejar reposar la masa durante 30 minutos.</li>
            <li>Formar bolitas y freír en aceite caliente.</li>
            <li>Escurrir sobre papel absorbente y servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Empanadas de Queso -->
<div id="modalEmpanadasQueso" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaEmpanadasQueso">Empanadas de Queso</h2>
        <p id="descripcionRecetaEmpanadasQueso">Empanadas rellenas de queso, servidas calientes y crujientes, una merienda popular en todo Bolivia.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaEmpanadasQueso">
            <li>300g de masa para empanadas</li>
            <li>200g de queso fresco</li>
            <li>1 huevo (para barnizar)</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaEmpanadasQueso">
            <li>Precalentar el horno a 200°C.</li>
            <li>Rellenar las masas con queso y cerrar bien.</li>
            <li>Barnizar con huevo batido.</li>
            <li>Hornear durante 25 minutos o hasta doradas.</li>
        </ol>
    </div>
</div>

<!-- Modal Masa Maicillo -->
<div id="modalMasaMaicillo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaMasaMaicillo">Masa Maicillo</h2>
        <p id="descripcionRecetaMasaMaicillo">Deliciosos panecillos elaborados a base de harina de maíz, con una textura suave y un sabor ligeramente dulce.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaMasaMaicillo">
            <li>250g de harina de maíz</li>
            <li>150g de azúcar</li>
            <li>100g de mantequilla</li>
            <li>1 huevo</li>
            <li>1 taza de leche</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaMasaMaicillo">
            <li>Precalentar el horno a 180°C.</li>
            <li>Mezclar todos los ingredientes hasta obtener una masa homogénea.</li>
            <li>Verter en moldes y hornear durante 30 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Pasankalla -->
<div id="modalPasankalla" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaPasankalla">Pasankalla</h2>
        <p id="descripcionRecetaPasankalla">Crujientes galletas de harina de trigo y maíz, una merienda tradicional para acompañar con bebidas calientes.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaPasankalla">
            <li>200g de harina de maíz</li>
            <li>100g de harina de trigo</li>
            <li>50g de mantequilla</li>
            <li>100g de azúcar</li>
            <li>1 huevo</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaPasankalla">
            <li>Mezclar las harinas, el azúcar y la mantequilla.</li>
            <li>Agregar el huevo y amasar bien.</li>
            <li>Formar galletas y hornear a 180°C durante 15 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Calapurca -->
<div id="modalCalapurca" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaCalapurca">Calapurca</h2>
        <p id="descripcionRecetaCalapurca">Una sopa tradicional boliviana de maíz, carne y papas, servida caliente y espesa, perfecta para una cena reconfortante.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaCalapurca">
            <li>200g de maíz</li>
            <li>300g de carne (puede ser pollo o res)</li>
            <li>2 papas</li>
            <li>1 cebolla picada</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaCalapurca">
            <li>Hervir el maíz hasta que esté tierno.</li>
            <li>Agregar la carne y las papas cortadas en cubos.</li>
            <li>Condimentar con cebolla, sal y pimienta.</li>
            <li>Cocinar hasta que todo esté bien cocido.</li>
        </ol>
    </div>
</div>

<!-- Modal Ají de Fideos -->
<div id="modalAjiFideos" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ají de Fideos</h2>
        <p id="descripcionReceta">Plato tradicional de pasta cocida con una salsa picante de ají amarillo, acompañado de papas y queso rallado.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de fideos</li>
            <li>2 cucharadas de ají amarillo molido</li>
            <li>1 taza de queso rallado</li>
            <li>2 papas cocidas y picadas</li>
            <li>1/2 taza de cebolla picada</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer los fideos en agua con sal y escurrir.</li>
            <li>En una sartén, calentar aceite y añadir la cebolla hasta que esté dorada.</li>
            <li>Agregar el ají amarillo y mezclar bien.</li>
            <li>Incorporar los fideos y mezclar con el ají y la cebolla.</li>
            <li>Servir con queso rallado y papas picadas.</li>
        </ol>
    </div>
</div>

<!-- Modal Charquecán -->
<div id="modalCharquecan" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Charquecán</h2>
        <p id="descripcionReceta">Este plato consiste en carne deshidratada (charque) acompañada de mote, papas y huevo frito, ideal para una cena sustanciosa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de charque</li>
            <li>2 tazas de mote cocido</li>
            <li>2 papas cocidas y picadas</li>
            <li>2 huevos</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Desmenuzar el charque y hervir hasta que esté tierno.</li>
            <li>Freír los huevos en una sartén.</li>
            <li>Servir el charque con mote, papas y el huevo frito encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz con Queso -->
<div id="modalArrozQueso" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arroz con Queso</h2>
        <p id="descripcionReceta">Un plato típico del oriente boliviano que combina arroz cremoso con queso derretido, ideal para una cena ligera y deliciosa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de arroz</li>
            <li>1 taza de queso rallado</li>
            <li>3 tazas de agua</li>
            <li>1/2 taza de leche</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer el arroz en agua con sal hasta que esté suave.</li>
            <li>Agregar la leche y el queso rallado al arroz.</li>
            <li>Mezclar hasta que el queso se derrita y sirva caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Ají de Lengua -->
<div id="modalAjiLengua" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ají de Lengua</h2>
        <p id="descripcionReceta">Un guiso hecho con lengua de res y salsa de ají amarillo, acompañado de papas y arroz, ideal para una cena diferente y deliciosa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de lengua de res</li>
            <li>2 cucharadas de ají amarillo molido</li>
            <li>2 papas cocidas y picadas</li>
            <li>2 tazas de arroz cocido</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer la lengua hasta que esté tierna y pelar.</li>
            <li>En una sartén, calentar aceite y añadir el ají amarillo.</li>
            <li>Agregar la lengua picada y mezclar bien.</li>
            <li>Servir con papas y arroz al lado.</li>
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

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
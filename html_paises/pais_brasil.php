<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Brasil</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>

    <h2 class="text-center pt-5">Las mejores recetas de Brasil</h2>
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

    <!-- Recetas Brasileras -->
    <div class="container mt-5">
        <div class="row">

            <!-- Desayuno -->
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

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Açaí Bowl.jpg" class="card-img-top" alt="açaí bowl">
                    <div class="card-body">
                        <h5 class="card-title">Açaí Bowl</h5>
                        <p class="card-text">Un desayuno refrescante y saludable, hecho con puré de açaí, frutas frescas
                            y granola.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAcaiBowl">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Tapioca.jpg" class="card-img-top" alt="tapioca">
                    <div class="card-body">
                        <h5 class="card-title">Tapioca</h5>
                        <p class="card-text">Tortillas de harina de yuca, típicas del noreste de Brasil, rellenas con
                            queso o dulce de coco.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTapioca">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Cuscuz de Milho.jpg" class="card-img-top" alt="cuscuz de milho">
                    <div class="card-body">
                        <h5 class="card-title">Cuscuz de Milho</h5>
                        <p class="card-text">Preparación hecha a base de harina de maíz al vapor, típica del noreste
                            brasileño.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCuscuzDeMilho">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Bolo de Fubá.jpg" class="card-img-top" alt="bolo de fuba">
                    <div class="card-body">
                        <h5 class="card-title">Bolo de Fubá</h5>
                        <p class="card-text">Pastel de maíz suave y esponjoso, perfecto para el desayuno o la merienda.
                        </p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBoloDeFuba">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Misto Quente.jpg" class="card-img-top" alt="misto quente">
                    <div class="card-body">
                        <h5 class="card-title">Misto Quente</h5>
                        <p class="card-text">Sándwich caliente de jamón y queso, una opción rápida y deliciosa para el
                            desayuno.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMistoQuente">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Moqueca.jpg" class="card-img-top" alt="moqueca">
                    <div class="card-body">
                        <h5 class="card-title">Moqueca</h5>
                        <p class="card-text">Un guiso de pescado y mariscos cocinado en leche de coco, típico del
                            noreste brasileño.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMoqueca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Feijoada.jpeg" class="card-img-top" alt="feijoada">
                    <div class="card-body">
                        <h5 class="card-title">Feijoada</h5>
                        <p class="card-text">El plato nacional de Brasil, un guiso de frijoles negros con carne de
                            cerdo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalFeijoada">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Churrasco.jpg" class="card-img-top" alt="churrasco">
                    <div class="card-body">
                        <h5 class="card-title">Churrasco</h5>
                        <p class="card-text">Carne asada a la parrilla, una tradición en el sur de Brasil.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChurrasco">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Vatapá.jpg" class="card-img-top" alt="vatapa">
                    <div class="card-body">
                        <h5 class="card-title">Vatapá</h5>
                        <p class="card-text">Un puré cremoso de pan, camarones y maní, típico de la región noreste.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalVatapa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Escondidinho.jpg" class="card-img-top" alt="escondidinho">
                    <div class="card-body">
                        <h5 class="card-title">Escondidinho</h5>
                        <p class="card-text">Plato gratinado con capas de carne y puré de yuca.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEscondidinho">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Arroz Carreteiro.jpg" class="card-img-top" alt="arroz carreteiro">
                    <div class="card-body">
                        <h5 class="card-title">Arroz Carreteiro</h5>
                        <p class="card-text">Un plato de arroz con carne seca, muy popular en el sur de Brasil.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozCarreteiro">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
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

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Pão de Mel.jpg" class="card-img-top" alt="pão de mel">
                    <div class="card-body">
                        <h5 class="card-title">Pão de Mel</h5>
                        <p class="card-text">Pan de miel suave, a menudo relleno de dulce de leche y cubierto de
                            chocolate.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPaoMel">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Coxinha.jpg" class="card-img-top" alt="coxinha">
                    <div class="card-body">
                        <h5 class="card-title">Coxinha</h5>
                        <p class="card-text">Deliciosas empanadas rellenas de pollo desmenuzado, típicas de fiestas y
                            meriendas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCoxinha">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Pão de Batata.jpg" class="card-img-top" alt="pão de batata">
                    <div class="card-body">
                        <h5 class="card-title">Pão de Batata</h5>
                        <p class="card-text">Pan suave y esponjoso, hecho con puré de papa, ideal para una merienda
                            deliciosa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPaoDeBatata">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Bolinho de Chuva.jpg" class="card-img-top" alt="bolinho de chuva">
                    <div class="card-body">
                        <h5 class="card-title">Bolinho de Chuva</h5>
                        <p class="card-text">Bollos fritos espolvoreados con azúcar y canela, perfectos para un café de
                            la tarde.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBolinhoDeChuva">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Torta de Limão.jpg" class="card-img-top" alt="torta de limão">
                    <div class="card-body">
                        <h5 class="card-title">Torta de Limão</h5>
                        <p class="card-text">Postre refrescante de limón con una base de galleta, ideal para los días
                            calurosos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortaDeLimao">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Bacalhau à Brás.jpg" class="card-img-top" alt="bacalhau à brás">
                    <div class="card-body">
                        <h5 class="card-title">Bacalhau à Brás</h5>
                        <p class="card-text">Plato de bacalao desmenuzado, mezclado con patatas y huevos revueltos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBacalhauABras">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Sopa de Feijão.jpg" class="card-img-top" alt="sopa de feijão">
                    <div class="card-body">
                        <h5 class="card-title">Sopa de Feijão</h5>
                        <p class="card-text">Sopa cremosa de frijoles, ideal para una cena ligera y nutritiva.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopaDeFeijao">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Bife à Cavalo.jpg" class="card-img-top" alt="bife à cavalo">
                    <div class="card-body">
                        <h5 class="card-title">Bife à Cavalo</h5>
                        <p class="card-text">Bife servido con un huevo frito encima, acompañado de arroz y frijoles.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBife">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Pollo al Curry.jpg" class="card-img-top" alt="pollo al curry">
                    <div class="card-body">
                        <h5 class="card-title">Pollo al Curry</h5>
                        <p class="card-text">Pollo cocido en una deliciosa salsa de curry, ideal para una cena
                            diferente.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolloCurry">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Picanha.jpg" class="card-img-top" alt="picanha">
                    <div class="card-body">
                        <h5 class="card-title">Picanha</h5>
                        <p class="card-text">Corte de carne asada, muy popular en Brasil, generalmente servido con arroz
                            y farofa.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPicanha">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgBrasil/Quibebe.jpg" class="card-img-top" alt="quibebe">
                    <div class="card-body">
                        <h5 class="card-title">Quibebe</h5>
                        <p class="card-text">Purés de calabaza acompañados de carne, un plato típico de las regiones
                            brasileñas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalQuibebe">Ver Receta</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- MODAL -->
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

<!-- Modal para Açaí Bowl -->
<div id="modalAcaiBowl" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Açaí Bowl</h2>
        <p id="descripcionReceta">Un desayuno refrescante y saludable, hecho con puré de açaí, frutas frescas y granola.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>200g de pulpa de açaí congelada</li>
            <li>1 plátano</li>
            <li>1/2 taza de leche (puede ser de almendra)</li>
            <li>Frutas frescas al gusto</li>
            <li>Granola al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Batir la pulpa de açaí con el plátano y la leche.</li>
            <li>Servir en un tazón y decorar con las frutas y la granola.</li>
        </ol>
    </div>
</div>

<!-- Modal para Tapioca -->
<div id="modalTapioca" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tapioca</h2>
        <p id="descripcionReceta">Tortillas de harina de yuca, típicas del noreste de Brasil, rellenas con queso o dulce de coco.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de harina de yuca</li>
            <li>Agua</li>
            <li>Sal al gusto</li>
            <li>Relleno de queso o dulce de coco</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina con agua y sal hasta obtener una masa.</li>
            <li>Calentar una sartén y añadir la masa para formar la tortilla.</li>
            <li>Rellenar con el queso o dulce de coco y doblar.</li>
            <li>Cocinar por algunos minutos hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal para Cuscuz de Milho -->
<div id="modalCuscuzDeMilho" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Cuscuz de Milho</h2>
        <p id="descripcionReceta">Preparación hecha a base de harina de maíz al vapor, típica del noreste brasileño.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de maíz</li>
            <li>Agua</li>
            <li>Sal al gusto</li>
            <li>Relleno de su elección (puede ser carne, verduras, etc.)</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Humedecer la harina de maíz con agua y sal.</li>
            <li>Colocar en una cuscusera y cocinar al vapor.</li>
            <li>Servir con el relleno elegido.</li>
        </ol>
    </div>
</div>

<!-- Modal para Bolo de Fubá -->
<div id="modalBoloDeFuba" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bolo de Fubá</h2>
        <p id="descripcionReceta">Pastel de maíz suave y esponjoso, perfecto para el desayuno o la merienda.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de maíz</li>
            <li>1 taza de azúcar</li>
            <li>3 huevos</li>
            <li>1 taza de leche</li>
            <li>1/2 taza de aceite</li>
            <li>1 cucharadita de polvo de hornear</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Precalentar el horno a 180°C.</li>
            <li>Batir los huevos con el azúcar, añadir la leche y el aceite.</li>
            <li>Incorporar la harina de maíz, el polvo de hornear y la sal.</li>
            <li>Verter en un molde y hornear por 30 minutos.</li>
        </ol>
    </div>
</div>
<!-- Modal para Misto Quente -->
<div id="modalMistoQuente" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaMistoQuente">Misto Quente</h2>
        <p id="descripcionRecetaMistoQuente">Sándwich caliente de jamón y queso, una opción rápida y deliciosa para el desayuno.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaMistoQuente">
            <li>2 rebanadas de pan de molde</li>
            <li>1 rebanada de jamón</li>
            <li>1 rebanada de queso</li>
            <li>1 cucharada de mantequilla</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaMistoQuente">
            <li>Calentar una sartén a fuego medio.</li>
            <li>Untar mantequilla en un lado de cada rebanada de pan.</li>
            <li>Colocar una rebanada de pan en la sartén con el lado de mantequilla hacia abajo.</li>
            <li>Agregar jamón y queso, y cubrir con la otra rebanada de pan.</li>
            <li>Cocinar hasta que el pan esté dorado y el queso se derrita, luego voltear y dorar el otro lado.</li>
        </ol>
    </div>
</div>

<!-- Modal para Moqueca -->
<div id="modalMoqueca" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaMoqueca">Moqueca</h2>
        <p id="descripcionRecetaMoqueca">Un guiso de pescado y mariscos cocinado en leche de coco, típico del noreste brasileño.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaMoqueca">
            <li>500g de pescado blanco</li>
            <li>300g de camarones</li>
            <li>1 cebolla picada</li>
            <li>2 tomates picados</li>
            <li>1 lata de leche de coco</li>
            <li>2 cucharadas de aceite de oliva</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaMoqueca">
            <li>Calentar el aceite en una olla y añadir la cebolla hasta que esté transparente.</li>
            <li>Agregar los tomates y cocinar hasta que estén suaves.</li>
            <li>Incorporar el pescado y los camarones, sazonar con sal y pimienta.</li>
            <li>Verter la leche de coco y dejar cocinar a fuego lento por 20 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal para Feijoada -->
<div id="modalFeijoada" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaFeijoada">Feijoada</h2>
        <p id="descripcionRecetaFeijoada">El plato nacional de Brasil, un guiso de frijoles negros con carne de cerdo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaFeijoada">
            <li>500g de frijoles negros</li>
            <li>300g de carne de cerdo</li>
            <li>200g de salchichas</li>
            <li>1 cebolla picada</li>
            <li>3 dientes de ajo picados</li>
            <li>Sal y pimienta al gusto</li>
            <li>Arroz y naranjas para servir</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaFeijoada">
            <li>Remojar los frijoles durante la noche.</li>
            <li>Cocinar los frijoles en una olla grande con agua.</li>
            <li>En otra sartén, dorar la cebolla y el ajo, luego añadir la carne y las salchichas.</li>
            <li>Agregar la mezcla de carne a los frijoles y cocinar todo junto por 2 horas.</li>
        </ol>
    </div>
</div>

<!-- Modal para Churrasco -->
<div id="modalChurrasco" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaChurrasco">Churrasco</h2>
        <p id="descripcionRecetaChurrasco">Carne asada a la parrilla, una tradición en el sur de Brasil.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaChurrasco">
            <li>1kg de carne de res (picanha o costilla)</li>
            <li>Sal gruesa al gusto</li>
            <li>Pimienta al gusto</li>
            <li>Opcional: ajo en polvo y hierbas</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaChurrasco">
            <li>Precalentar la parrilla a temperatura alta.</li>
            <li>Condimentar la carne con sal y pimienta.</li>
            <li>Colocar la carne en la parrilla y cocinar por 10-15 minutos de cada lado.</li>
            <li>Retirar del fuego, dejar reposar unos minutos y servir.</li>
        </ol>
    </div>
</div>

<!-- Modal para Vatapá -->
<div id="modalVatapa" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaVatapa">Vatapá</h2>
        <p id="descripcionRecetaVatapa">Un puré cremoso de pan, camarones y maní, típico de la región noreste.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaVatapa">
            <li>200g de pan viejo</li>
            <li>200g de camarones limpios</li>
            <li>200ml de leche de coco</li>
            <li>100g de maní</li>
            <li>1 cebolla picada</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaVatapa">
            <li>Humedecer el pan en agua y escurrir.</li>
            <li>En una sartén, calentar aceite y sofreír la cebolla y el maní.</li>
            <li>Agregar el pan, la leche de coco y los camarones, y cocinar por 15 minutos.</li>
            <li>Dejar enfriar y servir como acompañamiento.</li>
        </ol>
    </div>
</div>

<!-- Modal Escondidinho -->
<div id="modalEscondidinho" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaEscondidinho">Escondidinho</h2>
        <p id="descripcionRecetaEscondidinho">Plato gratinado con capas de carne y puré de yuca.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaEscondidinho">
            <li>500g de carne de res o pollo</li>
            <li>1 kg de yuca cocida y triturada</li>
            <li>1 taza de queso rallado</li>
            <li>1 cebolla picada</li>
            <li>2 cucharadas de aceite</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaEscondidinho">
            <li>Calentar el aceite en una sartén y añadir la cebolla hasta que esté dorada.</li>
            <li>Agregar la carne y cocinar hasta que esté bien hecha.</li>
            <li>En un molde, colocar una capa de puré de yuca, luego la carne y cubrir con más puré.</li>
            <li>Espolvorear con queso rallado y llevar al horno a gratinar por 20 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz Carreteiro -->
<div id="modalArrozCarreteiro" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaArrozCarreteiro">Arroz Carreteiro</h2>
        <p id="descripcionRecetaArrozCarreteiro">Un plato de arroz con carne seca, muy popular en el sur de Brasil.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaArrozCarreteiro">
            <li>2 tazas de arroz</li>
            <li>300g de carne seca deshidratada</li>
            <li>1 cebolla picada</li>
            <li>2 dientes de ajo picados</li>
            <li>4 tazas de agua</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaArrozCarreteiro">
            <li>Hervir la carne seca en agua hasta que esté tierna y desmenuzar.</li>
            <li>En una sartén, calentar aceite y sofreír la cebolla y el ajo.</li>
            <li>Agregar el arroz y dorar ligeramente.</li>
            <li>Incorporar la carne y el agua, y cocinar hasta que el arroz esté listo.</li>
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

<!-- Modal Pão de Mel -->
<div id="modalPaoMel" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaPaoMel">Pão de Mel</h2>
        <p id="descripcionRecetaPaoMel">Pan de miel suave, a menudo relleno de dulce de leche y cubierto de chocolate.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaPaoMel">
            <li>250g de miel</li>
            <li>200g de azúcar</li>
            <li>2 huevos</li>
            <li>400g de harina</li>
            <li>1 cucharadita de canela</li>
            <li>Chocolate para cubrir</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaPaoMel">
            <li>Mezclar la miel, el azúcar y los huevos hasta obtener una mezcla homogénea.</li>
            <li>Incorporar la harina y la canela, mezclando bien.</li>
            <li>Verter en un molde y hornear a 180°C durante 30 minutos.</li>
            <li>Dejar enfriar, rellenar con dulce de leche y cubrir con chocolate derretido.</li>
        </ol>
    </div>
</div>

<!-- Modal Coxinha -->
<div id="modalCoxinha" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreRecetaCoxinha">Coxinha</h2>
        <p id="descripcionRecetaCoxinha">Deliciosas empanadas rellenas de pollo desmenuzado, típicas de fiestas y meriendas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesRecetaCoxinha">
            <li>1 pollo cocido y desmenuzado</li>
            <li>2 tazas de harina de trigo</li>
            <li>1 taza de caldo de pollo</li>
            <li>1 cebolla picada</li>
            <li>2 huevos batidos</li>
            <li>Pan rallado para empanizar</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosRecetaCoxinha">
            <li>En una sartén, sofreír la cebolla y añadir el pollo desmenuzado.</li>
            <li>En una olla, mezclar la harina con el caldo hasta formar una masa.</li>
            <li>Formar pequeñas empanadas, rellenarlas con el pollo y empanizarlas.</li>
            <li>Freír hasta que estén doradas.</li>
        </ol>
    </div>
</div>

<!-- Modal Pão de Batata -->
<div id="modalPaoDeBatata" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pão de Batata</h2>
        <p id="descripcionReceta">Pan suave y esponjoso, hecho con puré de papa, ideal para una merienda deliciosa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de puré de papa</li>
            <li>500g de harina de trigo</li>
            <li>200ml de leche</li>
            <li>50g de azúcar</li>
            <li>50g de mantequilla</li>
            <li>1 huevo</li>
            <li>Sal al gusto</li>
            <li>10g de levadura seca</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes en un bol hasta formar una masa.</li>
            <li>Amasar durante 10 minutos y dejar reposar por 1 hora.</li>
            <li>Formar bolitas y dejarlas reposar durante 30 minutos.</li>
            <li>Hornear a 180°C durante 25 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Bolinho de Chuva -->
<div id="modalBolinhoDeChuva" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bolinho de Chuva</h2>
        <p id="descripcionReceta">Bollos fritos espolvoreados con azúcar y canela, perfectos para un café de la tarde.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de trigo</li>
            <li>1/2 taza de azúcar</li>
            <li>2 huevos</li>
            <li>1 taza de leche</li>
            <li>1 cucharada de levadura en polvo</li>
            <li>1 cucharadita de canela en polvo</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes hasta obtener una masa homogénea.</li>
            <li>Calentar el aceite en una sartén profunda.</li>
            <li>Formar bolitas y freír hasta dorar.</li>
            <li>Espolvorear con azúcar y canela antes de servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Torta de Limão -->
<div id="modalTortaDeLimao" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Torta de Limão</h2>
        <p id="descripcionReceta">Postre refrescante de limón con una base de galleta, ideal para los días calurosos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>200g de galletas de mantequilla</li>
            <li>100g de mantequilla derretida</li>
            <li>1 lata de leche condensada</li>
            <li>1 taza de jugo de limón</li>
            <li>1/2 taza de crema de leche</li>
            <li>Ralladura de limón al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar las galletas con la mantequilla y presionar en el fondo de un molde.</li>
            <li>Batir la leche condensada con el jugo de limón y la crema de leche.</li>
            <li>Verter la mezcla sobre la base de galleta y refrigerar por 2 horas.</li>
            <li>Decorar con ralladura de limón antes de servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Bacalhau à Brás -->
<div id="modalBacalhauABras" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bacalhau à Brás</h2>
        <p id="descripcionReceta">Plato de bacalao desmenuzado, mezclado con patatas y huevos revueltos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de bacalao desmenuzado</li>
            <li>300g de patatas paja</li>
            <li>4 huevos</li>
            <li>1 cebolla picada</li>
            <li>2 dientes de ajo picados</li>
            <li>Sal y pimienta al gusto</li>
            <li>Perejil picado para decorar</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Rehogar la cebolla y el ajo en una sartén con un poco de aceite.</li>
            <li>Agregar el bacalao y cocinar por unos minutos.</li>
            <li>Incorporar las patatas y mezclar bien.</li>
            <li>Batir los huevos y añadir a la mezcla, cocinando hasta que estén listos.</li>
            <li>Servir con perejil picado por encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Sopa de Feijão -->
<div id="modalSopaDeFeijao" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sopa de Feijão</h2>
        <p id="descripcionReceta">Sopa cremosa de frijoles, ideal para una cena ligera y nutritiva.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>300g de frijoles</li>
            <li>1 cebolla picada</li>
            <li>2 dientes de ajo picados</li>
            <li>1 zanahoria picada</li>
            <li>1 litro de caldo de verduras</li>
            <li>Sal y pimienta al gusto</li>
            <li>Perejil picado para decorar</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar los frijoles en el caldo hasta que estén tiernos.</li>
            <li>Rehogar la cebolla, el ajo y la zanahoria en una sartén.</li>
            <li>Agregar la mezcla a los frijoles y cocinar a fuego lento.</li>
            <li>Hacer puré si se desea una textura más cremosa.</li>
            <li>Servir caliente con perejil picado por encima.</li>
        </ol>
    </div>
</div>

<!-- Modal para Bife à Cavalo -->
<div id="modalBife" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bife à Cavalo</h2>
        <p id="descripcionReceta">Bife servido con un huevo frito encima, acompañado de arroz y frijoles.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de bife</li>
            <li>2 huevos</li>
            <li>1 taza de arroz</li>
            <li>1 taza de frijoles</li>
            <li>Sal y pimienta al gusto</li>
            <li>1 cucharada de aceite</li>
            <!-- Agrega más ingredientes aquí -->
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>En una sartén, calienta el aceite y cocina el bife al gusto.</li>
            <li>En otra sartén, fríe los huevos.</li>
            <li>Sirve el bife con el huevo frito encima y acompaña con arroz y frijoles.</li>
            <!-- Agrega más pasos aquí -->
        </ol>
    </div>
</div>

<!-- Modal para Pollo al Curry -->
<div id="modalPolloCurry" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pollo al Curry</h2>
        <p id="descripcionReceta">Pollo cocido en una deliciosa salsa de curry, ideal para una cena diferente.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de pollo</li>
            <li>2 cucharadas de curry en polvo</li>
            <li>1 taza de leche de coco</li>
            <li>1 cebolla picada</li>
            <li>2 cucharadas de aceite</li>
            <li>Sal al gusto</li>
            <!-- Agrega más ingredientes aquí -->
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>En una sartén, calienta el aceite y sofríe la cebolla.</li>
            <li>Agrega el pollo y cocina hasta que esté dorado.</li>
            <li>Incorpora el curry y la leche de coco. Cocina a fuego lento durante 20 minutos.</li>
            <!-- Agrega más pasos aquí -->
        </ol>
    </div>
</div>

<!-- Modal para Picanha -->
<div id="modalPicanha" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Picanha</h2>
        <p id="descripcionReceta">Corte de carne asada, muy popular en Brasil, generalmente servido con arroz y farofa.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de picanha</li>
            <li>Sal gruesa al gusto</li>
            <li>Arroz para acompañar</li>
            <li>Farofa para acompañar</li>
            <!-- Agrega más ingredientes aquí -->
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Precalienta la parrilla a alta temperatura.</li>
            <li>Coloca la picanha en la parrilla con la parte grasa hacia arriba.</li>
            <li>Cocina por 20 minutos y voltea. Cocina otros 20 minutos.</li>
            <li>Deja reposar antes de cortar y servir con arroz y farofa.</li>
            <!-- Agrega más pasos aquí -->
        </ol>
    </div>
</div>

<!-- Modal para Quibebe -->
<div id="modalQuibebe" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Quibebe</h2>
        <p id="descripcionReceta">Purés de calabaza acompañados de carne, un plato típico de las regiones brasileñas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de calabaza</li>
            <li>300g de carne picada</li>
            <li>1 cebolla picada</li>
            <li>2 cucharadas de aceite</li>
            <li>Sal y pimienta al gusto</li>
            <!-- Agrega más ingredientes aquí -->
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocina la calabaza en agua hirviendo hasta que esté suave.</li>
            <li>En una sartén, calienta el aceite y sofríe la cebolla.</li>
            <li>Agrega la carne y cocina hasta que esté dorada.</li>
            <li>Haz un puré con la calabaza y sirve con la carne encima.</li>
            <!-- Agrega más pasos aquí -->
        </ol>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
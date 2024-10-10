<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Uruguay</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>

    <h2 class="text-center pt-5">Las mejores recetas de Uruguay</h2>
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
    
    <!-- Recetas Uruguayas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/bizcochitos.jpg" class="card-img-top" alt="bizcochos">
                    <div class="card-body">
                        <h5 class="card-title">Bizcochos</h5>
                        <p class="card-text">Variedad de bizcochos, perfectos para acompañar con café o mate en las mañanas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBizcochos">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Tostadas con Dulce de Leche.jpg" class="card-img-top" alt="tostadas con dulce de leche">
                    <div class="card-body">
                        <h5 class="card-title">Tostadas con Dulce de Leche</h5>
                        <p class="card-text">Tostadas crujientes con el clásico dulce de leche uruguayo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTostadasDulceDeLeche">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Pan con Manteca y Mermelada.jpg" class="card-img-top" alt="pan con manteca y mermelada">
                    <div class="card-body">
                        <h5 class="card-title">Pan con Manteca y Mermelada</h5>
                        <p class="card-text">Un clásico del desayuno uruguayo, pan fresco con manteca y mermelada casera.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanMantecaMermelada">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Mate y Torta Frita.jpg" class="card-img-top" alt="mate y torta frita">
                    <div class="card-body">
                        <h5 class="card-title">Mate y Torta Frita</h5>
                        <p class="card-text">El mate con tortas fritas es ideal para disfrutar en un desayuno típico.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMateTortaFrita">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Churros con Dulce de Leche.jpg" class="card-img-top" alt="churros con dulce de leche">
                    <div class="card-body">
                        <h5 class="card-title">Churros con Dulce de Leche</h5>
                        <p class="card-text">Churros crocantes rellenos de dulce de leche, perfectos para el desayuno.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChurrosDulceDeLeche">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Refuerzo de jamon y queso.jpg" class="card-img-top" alt="refuerzo de jamon y queso">
                    <div class="card-body">
                        <h5 class="card-title">Refuerzo de jamon y queso</h5>
                        <p class="card-text">Un sandwich de jamon y queso que por costumbre se le llama refuerzo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalRefuerzoJamonQueso">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Chivito.jpg" class="card-img-top" alt="chivito">
                    <div class="card-body">
                        <h5 class="card-title">Chivito</h5>
                        <p class="card-text">Sándwich uruguayo de carne, huevo, lechuga y tomate, una verdadera delicia.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChivito">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Asado.jpg" class="card-img-top" alt="asado">
                    <div class="card-body">
                        <h5 class="card-title">Asado</h5>
                        <p class="card-text">El clásico asado uruguayo, con carne a la parrilla y chorizos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAsado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Milanesa con Papas Fritas.jpg" class="card-img-top" alt="milanesa con papas fritas">
                    <div class="card-body">
                        <h5 class="card-title">Milanesa con Papas Fritas</h5>
                        <p class="card-text">Milanesa de carne con crocantes papas fritas, un plato popular y delicioso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMilanesaConPapasFritas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Puchero.jpg" class="card-img-top" alt="puchero">
                    <div class="card-body">
                        <h5 class="card-title">Puchero</h5>
                        <p class="card-text">Un guiso de carne y verduras cocido a fuego lento, ideal para los días fríos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPuchero">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Cazuela de Mondongo.jpg" class="card-img-top" alt="cazuela de mondongo">
                    <div class="card-body">
                        <h5 class="card-title">Cazuela de Mondongo</h5>
                        <p class="card-text">Plato sustancioso a base de mondongo, papas y verduras.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCazuelaDeMondongo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Tarta de Verduras.jpg" class="card-img-top" alt="tarta de verduras">
                    <div class="card-body">
                        <h5 class="card-title">Tarta de Verduras</h5>
                        <p class="card-text">Deliciosa tarta rellena de espinacas y ricota, ideal para el almuerzo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTartaDeVerduras">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Tortas Fritas.jpg" class="card-img-top" alt="tortas fritas">
                    <div class="card-body">
                        <h5 class="card-title">Tortas Fritas</h5>
                        <p class="card-text">Frituras crujientes, perfectas para acompañar el mate.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortasFritas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Galletitas de Manteca.jpg" class="card-img-top" alt="galletitas de manteca">
                    <div class="card-body">
                        <h5 class="card-title">Galletitas de Manteca</h5>
                        <p class="card-text">Suaves galletitas de manteca, perfectas para la merienda.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalGalletitasDeManteca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Bollos de Manteca.jpg" class="card-img-top" alt="bollos de manteca">
                    <div class="card-body">
                        <h5 class="card-title">Bollos de Manteca</h5>
                        <p class="card-text">Pequeños panes dulces con un sabor a manteca, perfectos con café.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBollosDeManteca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Torta de Manzana.jpeg" class="card-img-top" alt="torta de manzana">
                    <div class="card-body">
                        <h5 class="card-title">Torta de Manzana</h5>
                        <p class="card-text">Deliciosa torta hecha con manzanas frescas, ideal para la merienda.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortaDeManzana">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Torta de Mil Hojas.jpg" class="card-img-top" alt="torta de mil hojas">
                    <div class="card-body">
                        <h5 class="card-title">Torta de Mil Hojas</h5>
                        <p class="card-text">Postre elaborado con capas de masa y crema pastelera.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortaDeMilHojas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
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

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Sopa de Pescado.jpg" class="card-img-top" alt="sopa de pescado">
                    <div class="card-body">
                        <h5 class="card-title">Sopa de Pescado</h5>
                        <p class="card-text">Reconfortante sopa de pescado con hierbas aromáticas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopaPescado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Pasta con Salsa.jpg" class="card-img-top" alt="pasta con salsa">
                    <div class="card-body">
                        <h5 class="card-title">Pasta con Salsa</h5>
                        <p class="card-text">Pasta casera acompañada de una rica salsa de tomate y carne.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPastaSalsa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Pescado a la Parrilla.jpg" class="card-img-top" alt="pescado a la parrilla">
                    <div class="card-body">
                        <h5 class="card-title">Pescado a la Parrilla</h5>
                        <p class="card-text">Pescado fresco asado a la parrilla, generalmente servido con ensalada.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPescadoParrilla">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Ravioles Caseros.jpg" class="card-img-top" alt="ravioles caseros">
                    <div class="card-body">
                        <h5 class="card-title">Ravioles Caseros</h5>
                        <p class="card-text">Ravioles rellenos de carne o espinaca, servidos con salsa de tomate.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalRaviolesCaseros">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Ensalada César.jpg" class="card-img-top" alt="ensalada cesar">
                    <div class="card-body">
                        <h5 class="card-title">Ensalada César</h5>
                        <p class="card-text">Ensalada con lechuga, pollo, crutones y aderezo César.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEnsaladaCesar">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgUruguay/Tortilla de Papas.jpg" class="card-img-top" alt="tortilla de papas">
                    <div class="card-body">
                        <h5 class="card-title">Tortilla de Papas</h5>
                        <p class="card-text">Tortilla a base de papas y huevos, ideal como plato principal.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortillaPapas">Ver Receta</a>
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>

<!-- Modal Bizcochos -->
<div class="modal" id="modalBizcochos">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bizcochos</h2>
        <p id="descripcionReceta">Variedad de bizcochos, perfectos para acompañar con café o mate en las mañanas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de Harina</li>
            <li>200g de Manteca</li>
            <li>Levadura fresca</li>
            <li>Azúcar y sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina con la levadura.</li>
            <li>Añadir la manteca y amasar.</li>
            <li>Formar bizcochos y hornear hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Tostadas con Dulce de Leche -->
<div class="modal" id="modalTostadasDulceDeLeche">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tostadas con Dulce de Leche</h2>
        <p id="descripcionReceta">Tostadas crujientes con el clásico dulce de leche uruguayo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Pan de molde</li>
            <li>Dulce de leche</li>
            <li>Manteca</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Tostar el pan de molde.</li>
            <li>Untar manteca y dulce de leche sobre las tostadas.</li>
        </ol>
    </div>
</div>

<!-- Modal Pan con Manteca y Mermelada -->
<div class="modal" id="modalPanMantecaMermelada">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pan con Manteca y Mermelada</h2>
        <p id="descripcionReceta">Un clásico del desayuno uruguayo, pan fresco con manteca y mermelada casera.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Pan fresco</li>
            <li>Manteca</li>
            <li>Mermelada casera</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar el pan fresco.</li>
            <li>Untar con manteca y mermelada al gusto.</li>
        </ol>
    </div>
</div>

<!-- Modal Mate y Torta Frita -->
<div class="modal" id="modalMateTortaFrita">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Mate y Torta Frita</h2>
        <p id="descripcionReceta">El mate con tortas fritas es ideal para disfrutar en un desayuno típico.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1/2kg de Harina</li>
            <li>Agua y sal</li>
            <li>Aceite para freír</li>
            <li>Yerba mate</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina con agua y sal.</li>
            <li>Formar pequeñas tortas y freír.</li>
            <li>Preparar el mate a gusto.</li>
        </ol>
    </div>
</div>

<!-- Modal Churros con Dulce de Leche -->
<div class="modal" id="modalChurrosDulceDeLeche">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Churros con Dulce de Leche</h2>
        <p id="descripcionReceta">Churros crocantes rellenos de dulce de leche, perfectos para el desayuno.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de Harina</li>
            <li>1 taza de Agua</li>
            <li>Dulce de leche</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hervir agua y añadir la harina.</li>
            <li>Freír en forma de churros.</li>
            <li>Rellenar con dulce de leche.</li>
        </ol>
    </div>
</div>

<!-- Modal Refuerzo de Jamon y Queso -->
<div class="modal" id="modalRefuerzoJamonQueso">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Refuerzo de Jamon y Queso</h2>
        <p id="descripcionReceta">Un sandwich de jamón y queso que por costumbre se le llama refuerzo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Pan</li>
            <li>Jamón</li>
            <li>Queso</li>
            <li>Manteca</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Untar el pan con manteca.</li>
            <li>Colocar jamón y queso entre las rebanadas.</li>
            <li>Tostar ligeramente el sandwich.</li>
        </ol>
    </div>
</div>

<!-- Modal Chivito -->
<div class="modal" id="modalChivito">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Chivito</h2>
        <p id="descripcionReceta">Sándwich uruguayo de carne, huevo, lechuga y tomate, una verdadera delicia.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pan tipo ciabatta</li>
            <li>200g de carne de ternera</li>
            <li>1 huevo</li>
            <li>Lechuga, tomate y mayonesa</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Asar la carne a la parrilla o sartén.</li>
            <li>Freír el huevo.</li>
            <li>Montar el sándwich con la carne, el huevo, lechuga, tomate y mayonesa.</li>
        </ol>
    </div>
</div>

<!-- Modal Asado -->
<div class="modal" id="modalAsado">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Asado</h2>
        <p id="descripcionReceta">El clásico asado uruguayo, con carne a la parrilla y chorizos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de costillas de res</li>
            <li>2 chorizos</li>
            <li>Sal gruesa</li>
            <li>Carbón para la parrilla</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar la parrilla con el carbón.</li>
            <li>Colocar las costillas y los chorizos en la parrilla caliente.</li>
            <li>Cocinar hasta que estén dorados y crujientes.</li>
        </ol>
    </div>
</div>

<!-- Modal Milanesa con Papas Fritas -->
<div class="modal" id="modalMilanesaConPapasFritas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Milanesa con Papas Fritas</h2>
        <p id="descripcionReceta">Milanesa de carne con crocantes papas fritas, un plato popular y delicioso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 filetes de carne</li>
            <li>2 huevos</li>
            <li>Pan rallado</li>
            <li>Papas</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Empanar los filetes de carne con huevo y pan rallado.</li>
            <li>Freír hasta que estén dorados.</li>
            <li>Cortar las papas y freírlas hasta que estén crujientes.</li>
        </ol>
    </div>
</div>

<!-- Modal Puchero -->
<div class="modal" id="modalPuchero">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Puchero</h2>
        <p id="descripcionReceta">Un guiso de carne y verduras cocido a fuego lento, ideal para los días fríos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>300g de carne</li>
            <li>Zanahorias, papas y zapallo</li>
            <li>1 choclo</li>
            <li>Caldo de carne</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar la carne con el caldo a fuego lento.</li>
            <li>Añadir las verduras y continuar cocinando.</li>
            <li>Servir caliente con las verduras bien tiernas.</li>
        </ol>
    </div>
</div>

<!-- Modal Cazuela de Mondongo -->
<div class="modal" id="modalCazuelaDeMondongo">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Cazuela de Mondongo</h2>
        <p id="descripcionReceta">Plato sustancioso a base de mondongo, papas y verduras.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>300g de mondongo</li>
            <li>Papas, zanahorias y cebolla</li>
            <li>Caldo de carne</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar el mondongo en tiras y cocerlo en el caldo.</li>
            <li>Añadir las verduras y cocinar a fuego lento.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Tarta de Verduras -->
<div class="modal" id="modalTartaDeVerduras">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tarta de Verduras</h2>
        <p id="descripcionReceta">Deliciosa tarta rellena de espinacas y ricota, ideal para el almuerzo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Masa de tarta</li>
            <li>300g de espinacas</li>
            <li>Ricota</li>
            <li>2 huevos</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Saltear las espinacas y mezclarlas con la ricota y los huevos.</li>
            <li>Rellenar la masa de tarta con la mezcla.</li>
            <li>Hornear hasta que esté dorada.</li>
        </ol>
    </div>
</div>

<!-- Modal Tortas Fritas -->
<div class="modal" id="modalTortasFritas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tortas Fritas</h2>
        <p id="descripcionReceta">Frituras crujientes, perfectas para acompañar el mate.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de harina</li>
            <li>200ml de agua</li>
            <li>1 cucharada de sal</li>
            <li>Grasa o aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina con agua y sal para formar una masa.</li>
            <li>Estirar la masa y cortar en círculos.</li>
            <li>Freír en grasa caliente hasta que estén doradas.</li>
        </ol>
    </div>
</div>

<!-- Modal Galletitas de Manteca -->
<div class="modal" id="modalGalletitasDeManteca">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Galletitas de Manteca</h2>
        <p id="descripcionReceta">Suaves galletitas de manteca, perfectas para la merienda.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>250g de manteca</li>
            <li>200g de azúcar</li>
            <li>1 huevo</li>
            <li>300g de harina</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Batir la manteca con el azúcar hasta que quede suave.</li>
            <li>Añadir el huevo y luego la harina, mezclando bien.</li>
            <li>Formar las galletitas y hornear hasta que estén doradas.</li>
        </ol>
    </div>
</div>

<!-- Modal Bollos de Manteca -->
<div class="modal" id="modalBollosDeManteca">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bollos de Manteca</h2>
        <p id="descripcionReceta">Pequeños panes dulces con un sabor a manteca, perfectos con café.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de harina</li>
            <li>100g de manteca</li>
            <li>100g de azúcar</li>
            <li>Levadura, leche y sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina con azúcar, levadura y sal.</li>
            <li>Incorporar la manteca y la leche hasta formar una masa.</li>
            <li>Dejar reposar y luego hornear hasta que estén dorados.</li>
        </ol>
    </div>
</div>

<!-- Modal Torta de Manzana -->
<div class="modal" id="modalTortaDeManzana">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Torta de Manzana</h2>
        <p id="descripcionReceta">Deliciosa torta hecha con manzanas frescas, ideal para la merienda.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>3 manzanas</li>
            <li>200g de harina</li>
            <li>100g de azúcar</li>
            <li>100g de manteca</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Pelar y cortar las manzanas en rodajas.</li>
            <li>Mezclar la manteca con el azúcar y la harina para formar la masa.</li>
            <li>Colocar las manzanas en la masa y hornear.</li>
        </ol>
    </div>
</div>

<!-- Modal Torta de Mil Hojas -->
<div class="modal" id="modalTortaDeMilHojas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Torta de Mil Hojas</h2>
        <p id="descripcionReceta">Postre elaborado con capas de masa y crema pastelera.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Masa de hojaldre</li>
            <li>Crema pastelera</li>
            <li>Azúcar impalpable</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hornear la masa de hojaldre en capas finas.</li>
            <li>Rellenar con crema pastelera entre las capas de masa.</li>
            <li>Espolvorear con azúcar impalpable.</li>
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

<!-- Modal Sopa de Pescado -->
<div class="modal" id="modalSopaPescado">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sopa de Pescado</h2>
        <p id="descripcionReceta">Reconfortante sopa de pescado con hierbas aromáticas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de pescado</li>
            <li>Hierbas aromáticas al gusto</li>
            <li>Caldo de pescado</li>
            <li>Verduras al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer el pescado en el caldo.</li>
            <li>Añadir hierbas y verduras.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Pasta con Salsa -->
<div class="modal" id="modalPastaSalsa">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pasta con Salsa</h2>
        <p id="descripcionReceta">Pasta casera acompañada de una rica salsa de tomate y carne.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de pasta</li>
            <li>200g de carne molida</li>
            <li>Salsa de tomate</li>
            <li>Queso parmesano al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer la pasta.</li>
            <li>Cocinar la carne y mezclar con la salsa.</li>
            <li>Servir con queso.</li>
        </ol>
    </div>
</div>

<!-- Modal Pescado a la Parrilla -->
<div class="modal" id="modalPescadoParrilla">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pescado a la Parrilla</h2>
        <p id="descripcionReceta">Pescado fresco asado a la parrilla, generalmente servido con ensalada.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 filetes de pescado fresco</li>
            <li>Sal y pimienta al gusto</li>
            <li>Limón</li>
            <li>Ensalada para acompañar</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar el pescado con sal, pimienta y limón.</li>
            <li>Asar en la parrilla hasta que esté cocido.</li>
            <li>Servir con ensalada.</li>
        </ol>
    </div>
</div>

<!-- Modal Ravioles Caseros -->
<div class="modal" id="modalRaviolesCaseros">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ravioles Caseros</h2>
        <p id="descripcionReceta">Ravioles rellenos de carne o espinaca, servidos con salsa de tomate.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de ravioles frescos</li>
            <li>Carne o espinaca para el relleno</li>
            <li>Salsa de tomate casera</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar los ravioles con el relleno de tu elección.</li>
            <li>Cocer los ravioles en agua hirviendo.</li>
            <li>Servir con salsa de tomate.</li>
        </ol>
    </div>
</div>

<!-- Modal Ensalada César -->
<div class="modal" id="modalEnsaladaCesar">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ensalada César</h2>
        <p id="descripcionReceta">Ensalada con lechuga, pollo, crutones y aderezo César.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Lechuga romana</li>
            <li>Pechuga de pollo asada</li>
            <li>Crutones</li>
            <li>Aderezo César</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar la lechuga y el pollo.</li>
            <li>Añadir crutones y aderezo.</li>
            <li>Mezclar y servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Tortilla de Papas -->
<div class="modal" id="modalTortillaPapas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tortilla de Papas</h2>
        <p id="descripcionReceta">Tortilla a base de papas y huevos, ideal como plato principal.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>5 papas medianas</li>
            <li>4 huevos</li>
            <li>Aceite de oliva</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer las papas y cortarlas en rodajas.</li>
            <li>Batir los huevos y mezclar con las papas.</li>
            <li>Cocinar en una sartén con aceite hasta dorar.</li>
        </ol>
    </div>
</div>


    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>

    <link rel="stylesheet" href="./categorias1.css">
    <link rel="stylesheet" href="../html_paises/formatoRecetasPaises.css">
    <script src="categorias.js" defer></script>

    <?php include '../includes/head.php' ?>

</head>

<body class="min-vh-100">

    <main class="flex-grow-1">
        <?php
        include '../includes/header.php';
        include './consultas.php';
        ?>

        <div class="container d-flex flex-column align-items-center">
            <h1 class="my-5">Filtrar categorias</h1>
            <div class="w-75">
                <ul class="d-flex d-column w-100 justify-content-around flex-wrap">
                    <li class="filtro-item item-active">Todas</li>
                    <li class="filtro-item">Saladas</li>
                    <li class="filtro-item">Ocasiones especiales</li>
                    <li class="filtro-item">Dietas especiales</li>
                    <li class="filtro-item">Bebidas</li>
                    <li class="filtro-item">Dulces</li>
                </ul>
            </div>
        </div>



        <!-- seccion saladas -->
        <div id="saladas-seccion" class="container filtro-seccion">
            <div class="container mt-3">
                <h2 class="my-4">Saladas</h2>
                <div class="paises-contenedor">
                    <?php foreach ($saladas as $receta): ?>
                        <?php
                        $stmt = $conn->prepare("SELECT nombre_imagen FROM categorias WHERE id_categoria = :id_categoria");
                        $stmt->execute(['id_categoria' => $receta['id_categoria']]);
                        $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div>
                            <img src="../categorias/imgs/<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['nombre_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                                class="bandera" width="100" height="auto"
                                alt="<?= htmlspecialchars($receta['nombre_imagen'], ENT_QUOTES, 'UTF-8') ?>">
                            <h5 class="card-title receta-titulo m-0"><?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?></h5>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        </div>

        <!-- seccion ocasiones especiales -->
        <div id="ocasiones-esp-seccion" class="container filtro-seccion">
            <div class="container mt-3">
                <h2 class="my-4">Ocaciones Especiales</h2>
                <div class="paises-contenedor">
                    <?php foreach ($especiales as $receta): ?>
                        <?php
                        $stmt = $conn->prepare("SELECT nombre_imagen FROM categorias WHERE id_categoria = :id_categoria");
                        $stmt->execute(['id_categoria' => $receta['id_categoria']]);
                        $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div>
                            <img src="../categorias/imgs/<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['nombre_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                                class="bandera" width="100" height="auto"
                                alt="<?= htmlspecialchars($receta['nombre_imagen'], ENT_QUOTES, 'UTF-8') ?>">
                            <h5 class="card-title receta-titulo m-0"><?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?></h5>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- seccion dietas especiales -->
        <div id="dietas-esp-seccion" class="container filtro-seccion">
            <h2 class="my-4">Dietas especiales</h2>

            <div class="paises-contenedor">
                <?php foreach ($dietas as $receta): ?>
                    <?php
                    $stmt = $conn->prepare("SELECT nombre_imagen FROM categorias WHERE id_categoria = :id_categoria");
                    $stmt->execute(['id_categoria' => $receta['id_categoria']]);
                    $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div>
                        <img src="../categorias/imgs/<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['nombre_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                            class="bandera" width="100" height="auto"
                            alt="<?= htmlspecialchars($receta['nombre_imagen'], ENT_QUOTES, 'UTF-8') ?>">
                        <h5 class="card-title receta-titulo m-0"><?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?></h5>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- seccion bebidas -->
        <div id="bebidas-seccion" class="container filtro-seccion">
            <h2 class="my-4">Bebidas</h2>
            <div class="paises-contenedor">
                <?php foreach ($bebidas as $receta): ?>
                    <?php
                    $stmt = $conn->prepare("SELECT nombre_imagen FROM categorias WHERE id_categoria = :id_categoria");
                    $stmt->execute(['id_categoria' => $receta['id_categoria']]);
                    $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div>
                        <img src="../categorias/imgs/<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['nombre_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                            class="bandera" width="100" height="auto"
                            alt="<?= htmlspecialchars($receta['nombre_imagen'], ENT_QUOTES, 'UTF-8') ?>">
                        <h5 class="card-title receta-titulo m-0"><?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?></h5>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- seccion dulces -->
        <div id="dulces-seccion" class="container filtro-seccion">
            <h2 class="my-4">Dulces</h2>
            <div class="paises-contenedor">
                <?php foreach ($dulces as $receta): ?>
                    <?php
                    $stmt = $conn->prepare("SELECT nombre_imagen FROM categorias WHERE id_categoria = :id_categoria");
                    $stmt->execute(['id_categoria' => $receta['id_categoria']]);
                    $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div>
                        <img src="../categorias/imgs/<?= !empty($imagenes) ? htmlspecialchars($imagenes[0]['nombre_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg" ?>"
                            class="bandera" width="100" height="auto"
                            alt="<?= htmlspecialchars($receta['nombre_imagen'], ENT_QUOTES, 'UTF-8') ?>">
                        <h5 class="card-title receta-titulo m-0"><?= htmlspecialchars($receta['titulo'], ENT_QUOTES, 'UTF-8') ?></h5>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="mt-5"></div>
    </main>

    <?php include '../includes/footer.php' ?>
import { obtenerCategorias } from "./Scripts-Categorias/obtenerCategorias.js";
import { obtenerEtiquetas } from "./Scripts-Etiquetas/obtenerEtiquetas.js";
import { obtenerIngredientes } from "./Scripts-Ingredientes/obtenerIngredientes.js";
import { obtenerUsuariosReportados } from "./Scripts-Usuarios/obtenerUsuariosReportados.js";

//OBJETOS QUE USO PARA SIMULAR DATOS PROVENIENTES DE UNA BASE DE DATOS

const usuariosReportados = [
    {
        id: 1,
        email: "PmL23@gmail.com",
        nombreUsuario: "PatriMJ23",
        fotoPerfil: "https://i.pinimg.com/564x/d5/83/be/d583beeae1f9def909f332224247f3a6.jpg",
        fechaCreacionCuenta: "11-04-2010",
        publicaciones: 7,
        reportes: 120,
        seguidores: 54
    },
    {
        id: 2,
        email: "mati_amongus@gmail.com",
        nombreUsuario: "mati777",
        fotoPerfil: "https://i.redd.it/aozj4qmgq0o51.jpg",
        fechaCreacionCuenta: "19-02-2016",
        publicaciones: 30,
        reportes: 87,
        seguidores: 40
    },
    {
        id: 3,
        email: "pepe_lol@gmail.com",
        nombreUsuario: "pepe87",
        fotoPerfil: "https://tr.rbxcdn.com/d1bfa838115f5643d1d2946f9aae0095/420/420/Hat/Webp",
        fechaCreacionCuenta: "06-08-2001",
        publicaciones: 10,
        reportes: 15,
        seguidores: 5430
    },
    {
        id: 4,
        email: "sash_medina@gmail.com",
        nombreUsuario: "sash4321",
        fotoPerfil: "https://www.66autocolor.com/cdn/shop/products/11.GRA0898SleekGray_838x.jpg?v=1630091688",
        fechaCreacionCuenta: "02-08-2010",
        publicaciones: 6,
        reportes: 19,
        seguidores: 63
    },
    {
        id: 5,
        email: "mati_camara@gmail.com",
        nombreUsuario: "mat1_camara_YT",
        fotoPerfil: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMaJ7xOt3ipD13Dhc0FW09PILR5KamQ7xv5w&s",
        fechaCreacionCuenta: "12-12-2012",
        publicaciones: 1,
        reportes: "+999",
        seguidores: 5
    }
];

const comentariosReportados = [
    {
        id: 1,
        usuarioAutor: "Tomas75",
        fotoPerfil: "https://i.pinimg.com/736x/94/39/0b/94390b50e16145523416e45d1924e296.jpg",
        fechaPublicacion: "23-09-2024",
        horaPublicacion: "03:50:12",
        texto: "Hola",
        cantidadReportes: 54
    },
    {
        id: 2,
        usuarioAutor: "Emilio777",
        fotoPerfil: "https://avatarfiles.alphacoders.com/130/thumb-1920-130018.jpg",
        fechaPublicacion: "11-03-2021",
        horaPublicacion: "17:53:18",
        texto: "Buenas soy nuevo",
        cantidadReportes: 21
    },
    {
        id: 3,
        usuarioAutor: "NicoGarrido24",
        fotoPerfil: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Netflix_icon.svg/2048px-Netflix_icon.svg.png",
        fechaPublicacion: "20-09-2024",
        horaPublicacion: "11:42:33",
        texto: "Buenas tardes, La clase de hoy comenzará a las 18:15 hs",
        cantidadReportes: 82
    }
];

const publicacionesReportadas = [
    {
        id: 1,
        titulo: "Pizza con anana",
        fotoPortada: "https://hacermasapizza.com/img/foto-pizza-hawaiana-icon-pina-936.webp",
        descripcion: "Es una delicia, queda con un contraste de sabores sorprendente y además es facilísima de preparar. Si te gustan las pizzas y ya has probado nuestra pizza carbonara, hoy nueva receta, pizza con sabor tropical con piña.",
        fecha: "05-04-2023",
        cantidadReportes: 213
    },
    {
        id: 2,
        titulo: "Helado de menta",
        fotoPortada: "https://danzadefogones.com/wp-content/uploads/2018/09/Helado-de-chocolate-y-menta-vegano-4-1.jpg",
        descripcion: "En esta semana donde solo he subido helados estoy absolutamente feliz de los resultados. Eso quiere decir que el helado, como ya sabíamos, nos hace felices, jaja. Este helado de menta con chocolate es increíble. El sabor de la menta es 100% natural de menta fresca y queda muy bueno.",
        fecha: "01-02-2021",
        cantidadReportes: 85
    },
    {
        id: 3,
        titulo: "Locro",
        fotoPortada: "https://www.196flavors.com/wp-content/uploads/2023/01/Locro-1.jpg",
        descripcion: "Para todas las fechas patrias, los platos típicos de nuestro floclore nos llaman a celebrar. El locro, también en esta época del año, resulta una buena opción. Hay muchísimas formas de hacer el locro, una comida típicamente argentina, originaria del norte del país.",
        fecha: "05-09-2024",
        cantidadReportes: 132
    }
];

const modalElement1 = document.getElementById('modalGestionCategoria');
const modalBootstrapCategorias = new bootstrap.Modal(modalElement1);

const modalElement2 = document.getElementById('modalGestionEtiqueta');
const modalBootstrapEtiquetas = new bootstrap.Modal(modalElement2);

const modalElement3 = document.getElementById('modalGestionIngrediente');
const modalBootstrapIngredientes = new bootstrap.Modal(modalElement3);

const modalElement4 = document.getElementById('modalEliminarItem');
const modalBootstrapEliminarItem = new bootstrap.Modal(modalElement4);

document.addEventListener("DOMContentLoaded", function (){

    verificarSeccion();

    actualizarContadores();

    /* document.querySelectorAll('.list-group a').forEach(item => {

        item.addEventListener('click', function() {

            limpiarDashboard();

            const seccion = item.getAttribute('href');

            manejarContenido(seccion);

            if (seccion != "#") item.classList.add('item-activo');
        });
    }); */

    window.addEventListener('hashchange', function () {
        limpiarDashboard();
        manejarContenido(location.hash);
    });

    document.getElementById("btn-add-item").addEventListener("click", function (){

        if(location.hash == "#admin-categorias" || location.hash == "#" || location.hash == ""){

            document.getElementById("modalGestionCategoriaTitulo").textContent = "Crear categoría";
            document.getElementById("inputCategoriaTitulo").value = '';

            const imgPreviaCategoria = document.getElementById("imgPreviaCategoria");
            imgPreviaCategoria.classList.add("d-none");
            document.getElementById("seccion").value = '';

            document.getElementById("formulario-gestion-categorias").dataset.accion = 'crear';
            document.getElementById("categoriaID").value = '';

        }else if(location.hash == "#admin-etiquetas"){

            document.getElementById("modalGestionEtiquetaTitulo").textContent = "Crear etiqueta";
            document.getElementById("inputEtiquetaTitulo").value = '';

            document.getElementById("formulario-gestion-etiquetas").dataset.accion = 'crear';
            document.getElementById("etiquetaID").value = '';

        }else if(location.hash == "#admin-ingredientes"){

            document.getElementById("modalGestionIngredienteTitulo").textContent = "Añadir ingrediente";
            document.getElementById("inputIngredienteTitulo").value = '';

            document.getElementById("formulario-gestion-ingredientes").dataset.accion = 'crear';
            document.getElementById("ingredienteID").value = '';
        }
    });

    document.getElementById("formulario-gestion-categorias").addEventListener("submit", function (e){

        e.preventDefault();

        let urlActual = window.location.href;
        let palabraClave = "recipes-web/";

            // Encuentra el índice de la palabra "recipes-web/" en la URL
        let indice = urlActual.indexOf(palabraClave);

        if (e.target.dataset.accion == "crear") {

            if (indice !== -1) {

                // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
                let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                fetch(urlCortada + "admin/Scripts-Categorias/crearCategoria.php", {
            
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {

                    if (data.success == true) {
                        console.log("Categoria creada con éxito");
                    }else{
                        console.log("Error al crear categoría");
                    }

                    obtenerCategorias();

                    modalBootstrapCategorias.hide();

                });

            } else {
                console.log("La cadena 'recipes-web/' no se encontró en la URL.");
            }
        }else if(e.target.dataset.accion == "editar"){

            if (indice !== -1) {

                // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
                let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                fetch(urlCortada + "admin/Scripts-Categorias/editarCategoria.php", {
            
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {

                    if (data.success == true) {
                        console.log("Categoria editada con éxito");
                    }else{
                        console.log("Error al editar categoría");
                    }

                    obtenerCategorias();

                    modalBootstrapCategorias.hide();

                });

            } else {
                console.log("La cadena 'recipes-web/' no se encontró en la URL.");
            }
        }
    });

    document.getElementById("formulario-gestion-etiquetas").addEventListener("submit", function (e){
        e.preventDefault();

        let urlActual = window.location.href;
        let palabraClave = "recipes-web/";

            // Encuentra el índice de la palabra "recipes-web/" en la URL
        let indice = urlActual.indexOf(palabraClave);

        if (e.target.dataset.accion == "crear") {

            if (indice !== -1) {

                // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
                let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                fetch(urlCortada + "admin/Scripts-Etiquetas/crearEtiqueta.php", {
            
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {

                    if (data.success == true) {
                        console.log("Etiqueta creada con éxito");
                    }else{
                        console.log("Error al crear etiqueta");
                    }

                    obtenerEtiquetas();

                    modalBootstrapEtiquetas.hide();

                });

            } else {
                console.log("La cadena 'recipes-web/' no se encontró en la URL.");
            }
        }else if(e.target.dataset.accion == "editar"){

            if (indice !== -1) {

                // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
                let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                fetch(urlCortada + "admin/Scripts-Etiquetas/editarEtiqueta.php", {
            
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {

                    if (data.success == true) {
                        console.log("Etiqueta editada con éxito");
                    }else{
                        console.log("Error al editar etiqueta");
                    }

                    obtenerEtiquetas();

                    modalBootstrapEtiquetas.hide();

                });

            } else {
                console.log("La cadena 'recipes-web/' no se encontró en la URL.");
            }
        }
    });

    document.getElementById("formulario-gestion-ingredientes").addEventListener("submit", function (e){
        e.preventDefault();

        let urlActual = window.location.href;
        let palabraClave = "recipes-web/";

            // Encuentra el índice de la palabra "recipes-web/" en la URL
        let indice = urlActual.indexOf(palabraClave);

        if (e.target.dataset.accion == "crear") {

            if (indice !== -1) {

                // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
                let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                fetch(urlCortada + "admin/Scripts-Ingredientes/crearIngrediente.php", {
            
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {

                    if (data.success == true) {
                        console.log("Ingrediente añadido con éxito");
                    }else{
                        console.log("Error al añadir ingrediente");
                    }

                    obtenerIngredientes();

                    modalBootstrapIngredientes.hide();

                });

            } else {
                console.log("La cadena 'recipes-web/' no se encontró en la URL.");
            }
        }else if(e.target.dataset.accion == "editar"){

            if (indice !== -1) {

                // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
                let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                fetch(urlCortada + "admin/Scripts-Ingredientes/editarIngrediente.php", {
            
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {

                    if (data.success == true) {
                        console.log("Ingrediente editado con éxito");
                    }else{
                        console.log("Error al editar ingrediente");
                    }

                    obtenerIngredientes();

                    modalBootstrapIngredientes.hide();

                });

            } else {
                console.log("La cadena 'recipes-web/' no se encontró en la URL.");
            }
        }
    });

    document.getElementById("formulario-eliminar-item").addEventListener("submit", function(e){

        e.preventDefault();

        let urlActual = window.location.href;
        let palabraClave = "recipes-web/";

            // Encuentra el índice de la palabra "recipes-web/" en la URL
        let indice = urlActual.indexOf(palabraClave);

        if (indice !== -1) {

            // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
            let urlCortada = urlActual.substring(0, indice + palabraClave.length);

            if (location.hash == "#admin-categorias" || location.hash == "#" || location.hash == "") {
                fetch(urlCortada + "admin/Scripts-Categorias/eliminarCategoria.php", {
        
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {
    
                    if (data.success == true) {
                        console.log("Categoria eliminada con éxito");
                    }else{
                        console.log("Error al eliminar categoría");
                    }
    
                    obtenerCategorias();
    
                    modalBootstrapEliminarItem.hide();
    
                });

            }else if(location.hash == "#admin-etiquetas"){

                fetch(urlCortada + "admin/Scripts-Etiquetas/eliminarEtiqueta.php", {
        
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {
    
                    if (data.success == true) {
                        console.log("Etiqueta eliminada con éxito");
                    }else{
                        console.log("Error al eliminar etiqueta");
                    }
    
                    obtenerEtiquetas();
    
                    modalBootstrapEliminarItem.hide();
    
                });

            }else if(location.hash == "#admin-ingredientes"){

                fetch(urlCortada + "admin/Scripts-Ingredientes/eliminarIngrediente.php", {
        
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {
    
                    if (data.success == true) {
                        console.log("Ingrediente eliminado con éxito");
                    }else{
                        console.log("Error al eliminar ingrediente");
                    }
    
                    obtenerIngredientes();
    
                    modalBootstrapEliminarItem.hide();
    
                });
            }else if(location.hash == "#admin-usuarios"){

                fetch('../admin/Scripts-Usuarios/ignorarReportesUsuario.php', {
        
                    method: "POST",
                    body: new FormData(e.target)
                })
                .then(res => res.json())
                .then(data => {
    
                    if (data.success == true) {
                        console.log("Reportes de usuario eliminados con éxito");
                    }else{
                        console.log("Error al eliminar reportes de usuario");
                    }
    
                    obtenerUsuariosReportados();
    
                    modalBootstrapEliminarItem.hide();
    
                });
            }

        } else {
            console.log("La cadena 'recipes-web/' no se encontró en la URL.");
        }
    });

    document.getElementById("formulario-ban").addEventListener("submit", function(e){

        e.preventDefault();


    });

    document.getElementById("inputPermaBan").addEventListener("change", function (e){

        const inputDuracionBan = document.getElementById("inputDuracionBan");

        e.target.checked ?inputDuracionBan.setAttribute('disabled', '') :inputDuracionBan.removeAttribute('disabled');
    });

});

function verificarSeccion(){

    // Obtenengo el fragmento de la URL después del #
    const seccion = location.hash;

    // Verificar si existe el fragmento de la URL
    if (seccion) {
        manejarContenido(seccion);
    }else{
        manejarContenido('#');
    }

};

function adaptarDashboard(href){
    const itemsDashboard = document.querySelectorAll(".list-group-item");

    itemsDashboard.forEach((e) => {
        //console.log("#" + e.href.split("#")[1]);
        //console.log(href);
        if ( ("#" + e.href.split("#")[1]) == href) {
            e.classList.add('item-activo');
        }else{
            e.classList.remove('item-activo');
        }
    });
};

function obtenerComentariosReportados(){

    const panelContenido = document.querySelector(".panel-body");

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'border', 'overflow-y-auto');

    comentariosReportados.forEach((comentario) => {

        contenedorCards.innerHTML += `
            <div class="card m-5">
                <div class="card-header">
                    <div class="d-flex flex-row">

                        <div class="w-100 p-2 d-flex flex-row align-items-center">

                            <img class="w-25 img-thumbnail rounded-circle" src="${comentario.fotoPerfil}"/>
                            <h5 class="text-secondary ms-3">${comentario.usuarioAutor}</h5>

                        </div>

						<div class="w-100 p-2 d-flex flex-column align-items-end justify-content-center">

						    <span class="text-secondary">Fecha ${comentario.fechaPublicacion}</span>
						    <span class="text-body-tertiary">Hora ${comentario.horaPublicacion}</span>

                        </div>
					</div>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0 m-3">
                        <h4>"${comentario.texto}"</h4>
                    </blockquote>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0 ms-2">
                        <p>Cantidad de reportes: ${comentario.cantidadReportes}</p>
                    </blockquote>

                    <button class="btn btn-custom-bg btn-sm ms-1 m-2 btn-ver-comentario">Ver en publicacion</button>
                    <button class="btn btn-danger btn-sm ms-1 m-2 btn-eliminar-comentario">Eliminar comentario</button>
                    <button class="btn btn-secondary btn-sm m-2 btn-ignorar-comentario" data-bs-toggle="modal" data-bs-target="#asdasd">Ignorar comentario</button>
                </div>
            </div>
        `;
    });

    panelContenido.appendChild(contenedorCards);
}

function obtenerPublicacionesReportadas(){

    const panelContenido = document.querySelector(".panel-body");

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'border', 'overflow-y-auto');

    publicacionesReportadas.forEach((publicacion) => {
        contenedorCards.innerHTML += `
            <div class="card m-5">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="${publicacion.fotoPortada}" class="img-fluid rounded-start" alt="${publicacion.titulo}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">${publicacion.titulo}</h4>
                            <p class="card-text">${publicacion.descripcion}</p>
                            <p class="card-text"><small class="text-body-secondary">${publicacion.fecha}</small></p>
                            <h5 class="card-title">Cantidad de reportes: ${publicacion.cantidadReportes}</h5>
                            <button class="btn btn-custom-bg btn-sm ms-1 m-2 btn-ver-publicacion">Ir a publicacion</button>
                            <button class="btn btn-danger btn-sm ms-1 m-2 btn-eliminar-publicacion">Eliminar publicación</button>
                            <button class="btn btn-secondary btn-sm m-2 btn-ignorar-publicacion" data-bs-toggle="modal" data-bs-target="#asdasd">Ignorar publicación</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    panelContenido.appendChild(contenedorCards);
}

function actualizarContadores(){

    let urlActual = window.location.href;
    let palabraClave = "recipes-web/";

    // Encuentra el índice de la palabra "recipes-web/" en la URL
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {

        // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        fetch(urlCortada + "admin/PHPextras/contador.php", {
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(res => {
            // Verifico si la respuesta fue exitosa
            if (!res.ok) {
                throw new Error('Error en la solicitud: ' + res.status);
            }

            // Verifico si hay contenido en la respuesta
            if (res.headers.get('content-length') === '0') {
                return null; // No hay contenido
            }

            // Convierto a JSON
            return res.json();
        })
        .then(data => {

            /* const ContadorCategorias = document.getElementById("cont-categorias");
            const ContadorEtiquetas = document.getElementById("cont-etiquetas");
            const ContadorIngredientes = document.getElementById("cont-ingredientes");

            if (data.totalCategorias > 0) {
                ContadorCategorias.classList.remove("d-none");
                ContadorCategorias.innerText = data.totalCategorias;
            }else{
                ContadorCategorias.classList.add("d-none");
            }

            if (data.totalEtiquetas > 0) {
                ContadorEtiquetas.classList.remove("d-none");
                ContadorEtiquetas.innerText = data.totalEtiquetas;
            }else{
                ContadorEtiquetas.classList.add("d-none");
            }

            if (data.totalIngredientes > 0) {
                ContadorIngredientes.classList.remove("d-none");
                ContadorIngredientes.innerText = data.totalIngredientes;
            }else{
                ContadorIngredientes.classList.add("d-none");
            } */

        });

    } else {
        console.log("La cadena 'recipes-web/' no se encontró en la URL.");
    }
}

function actualizarContadoresAnterior() {

    const contadores = [
        { element: document.getElementById("cont-usuarios-report"), items: usuariosReportados },
        { element: document.getElementById("cont-comentarios-report"), items: comentariosReportados },
        { element: document.getElementById("cont-publicaciones-report"), items: publicacionesReportadas }
    ];
    
    contadores.forEach( (contador) => {

        if (contador.items.length > 0) {
            contador.element.classList.remove("d-none");
            contador.element.innerText = contador.items.length;
        } else {
            contador.element.classList.add("d-none");
        }
    });
    
}

function manejarContenido(seccion){

    const panelTitulo = document.querySelector(".panel-title");
    const panelBtn = document.querySelector(".btn-add-item");
    const panelContenido = document.querySelector(".panel-body");

    panelContenido.innerHTML = ``;

    switch (seccion) {

        //Modifico la interfaz según la seccion

        case '#admin-categorias':

            panelTitulo.textContent = "Categorías";
            panelBtn.classList.remove("d-none");
            panelBtn.textContent = "Añadir categoría";
            panelBtn.setAttribute("data-bs-target", "#modalGestionCategoria");
            panelContenido.innerHTML = ``;
            
            obtenerCategorias();
            adaptarDashboard("#admin-categorias");

            break;
            
        case '#admin-etiquetas':

            panelTitulo.textContent = "Etiquetas";
            panelBtn.classList.remove("d-none");
            panelBtn.textContent = "Añadir Etiqueta";
            panelBtn.setAttribute("data-bs-target", "#modalGestionEtiqueta");
            panelContenido.innerHTML = ``;
            
            obtenerEtiquetas();
            adaptarDashboard("#admin-etiquetas");

            break;
                
        case '#admin-ingredientes':

            panelTitulo.textContent = "Ingredientes";
            panelBtn.classList.remove("d-none");
            panelBtn.textContent = "Añadir Ingrediente";
            panelContenido.innerHTML = ``;
            BotonAgregar.setAttribute("data-bs-target", "#modalGestionIngrediente");
            
            obtenerIngredientes();
            adaptarDashboard("#admin-ingredientes");

            break;
                    
        case '#admin-usuarios':

            panelTitulo.textContent = "Gestión de usuarios reportados";
            panelBtn.classList.add("d-none");
            panelContenido.innerHTML = ``;

            obtenerUsuariosReportados();
            adaptarDashboard("#admin-usuarios");

            break;
            
        case '#admin-comentarios':

            panelBtn.classList.add("d-none");
            panelTitulo.textContent = "Gestion de comentarios reportados";
            panelContenido.innerHTML = ``;
            
            obtenerComentariosReportados();
            adaptarDashboard("#admin-comentarios");

            break;
            
        case '#admin-publicaciones':
                
            panelBtn.classList.add("d-none");
            panelTitulo.textContent = "Gestion de publicaciones reportadas";
            panelContenido.innerHTML = ``;

            obtenerPublicacionesReportadas();
            adaptarDashboard("#admin-publicaciones");

            break;

        default:

            const firstItemDashboard = document.querySelector(".list-group-item");
            const HashURL = firstItemDashboard.href.split("#")[1];
            location.hash = HashURL;

            break;
    }
}

function limpiarDashboard() {
    const enlacesDashboard = document.querySelectorAll('.list-group-item');
    enlacesDashboard.forEach(item => {
        item.classList.remove('item-activo');
    });
}
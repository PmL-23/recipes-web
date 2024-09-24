//ARRAYS QUE USO PARA SIMULAR DATOS PROVENIENTES DE UNA BASE DE DATOS
const categorias = ["Vegano", "Bebidas", "Ensaladas", "Postres"];
const etiquetas = ["Cena", "Invierno"];
const ingredientes = ["Harina", "Azucar", "Chocolate"];

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

const modalElement = document.getElementById('modalGestionItem');
const modalBootstrap = new bootstrap.Modal(modalElement);

document.addEventListener("DOMContentLoaded", function (){

    verificarSeccion();

    document.querySelectorAll('.list-group a').forEach(item => {

        item.addEventListener('click', function() {

            limpiarDashboard();

            const seccion = item.getAttribute('href');

            manejarContenido(seccion);

            if (seccion != "#") item.classList.add('item-activo');
        });
    });

    // Agrego listening para capturar cambios en el hash dinámicamente
    window.addEventListener('hashchange', function () {
        manejarContenido(location.hash);
    });

    document.querySelector(".btn-add-item").addEventListener("click", modificarModalCrear);

    document.getElementById("formulario").addEventListener("submit", function(e){
        e.preventDefault();

        if (e.target.dataset.accion == "crear") {
            agregarItem();
        }else if(e.target.dataset.accion == "editar"){
            editarItem();
        }
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
        manejarContenido('#admin-categorias');
    }

    actualizarContadores();

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

function actualizarTabla(arrayDeItems){

    const tabla = document.getElementById('tabla-items').getElementsByTagName('tbody')[0];

    tabla.innerHTML = ``;

    arrayDeItems.forEach((itemNombre, index) => {
        const nuevaFila = tabla.insertRow();

        // Crear las celdas para la fila
        const celdaNombre = nuevaFila.insertCell(0);
        const celdaBoton = nuevaFila.insertCell(1);

        // Asignar los valores a las celdas
        celdaNombre.textContent = itemNombre;

        // Asignar contenido a las celdas usando innerHTML
        celdaBoton.innerHTML = `<button class="btn btn-custom-bg btn-sm btn-editar-item" data-bs-toggle="modal" data-bs-target="#modalGestionItem">Editar</button><button class="btn btn-danger btn-sm ms-1 btn-eliminar-item">Eliminar</button>`;

        // Seleccionar el botón recién creado y añadir la funcionalidad de eliminar
        const botonEliminar = nuevaFila.querySelector('.btn-eliminar-item');
        botonEliminar.addEventListener('click', function() {
            eliminarItemDeTabla(arrayDeItems, index);
        });

        // Seleccionar el botón recién creado y añadir la funcionalidad de eliminar
        const botonEditar = nuevaFila.querySelector('.btn-editar-item');
        botonEditar.addEventListener('click', function() {
            modificarModalEditar(index);
        });
    });

    //actualizo los contadores del dashboard
    actualizarContadores();
}

function obtenerUsuariosReportados(){

    const panelContenido = document.querySelector(".panel-body");

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'border', 'overflow-y-auto');

    usuariosReportados.forEach((usuario) => {

        contenedorCards.innerHTML += `
            <div class="card m-5">
                
                <div class="card-body d-flex flex-row">

                    <img class="w-25 m-2 rounded-circle" src="${usuario.fotoPerfil}"/>

                    <div class="container-sm d-flex flex-column align-items-center">
                        <h3>${usuario.nombreUsuario}</h3>

                        <div class="w-100 p-2 mt-4 d-flex flex-row justify-content-around">

                            <div class="d-flex flex-column align-items-center">
                                <h4>${usuario.publicaciones}</h4>
                                <h6>Publicaciones</h6>
                            </div>

                            <div class="d-flex flex-column align-items-center">
                                <h4>${usuario.reportes}</h4>
                                <h6>Reportes</h6>
                            </div>

                            <div class="d-flex flex-column align-items-center">
                                <h4>${usuario.seguidores}</h4>
                                <h6>Seguidores</h6>
                            </div>

                        </div>

                        <div class="m-2 d-flex flex-row">

                            <button class="btn btn-custom-bg btn-sm ms-1 m-2 btn-ver-usuario">Ir a perfil</button>
                            <button class="btn btn-danger btn-sm ms-1 m-2 btn-suspender-usuario" data-bs-toggle="modal" data-bs-target="#modalSuspenderUsuario">Suspender usuario</button>
                            <button class="btn btn-secondary btn-sm m-2 btn-ignorar-usuario" data-bs-toggle="modal" data-bs-target="#asdasd">Ignorar usuario</button>

                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="d-flex flex-row">

                        <div class="w-100 p-2 d-flex flex-row align-items-center">

                            <p class="text-secondary m-0">${usuario.email}</p>

                        </div>

						<div class="w-100 p-2 d-flex flex-column align-items-end justify-content-center">

						    <span class="text-secondary">Miembro desde</span>
						    <span class="text-body-tertiary">${usuario.fechaCreacionCuenta}</span>

                        </div>
					</div>
                </div>
            </div>
        `;
    });

    panelContenido.appendChild(contenedorCards);
}

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

// Función para eliminar un item del array y actualizar la tabla
function eliminarItemDeTabla(arrayDeItems, index) {

    // Eliminar el item del array usando el índice segun la tabla
    const seccionActual = location.hash;

    if (seccionActual == "#admin-categorias" || seccionActual == "" || seccionActual == "#") {
        
        categorias.splice(index, 1);

    }else if(seccionActual == "#admin-etiquetas"){

        etiquetas.splice(index, 1);

    }else if(seccionActual == "#admin-ingredientes"){

        ingredientes.splice(index, 1);

    }

    // Actualizo la tabla para reflejar los cambios
    actualizarTabla(arrayDeItems);

}

// Función para preparar el modal para agregar un item a la tabla
function modificarModalCrear() {
    
    const seccionActual = location.hash;

    if (seccionActual == "#admin-categorias" || seccionActual == "" || seccionActual == "#") {
        
        document.querySelector(".modal-title").textContent = "Agregar una categoría";
        document.querySelector(".form-label").textContent = "Nombre de la categoría";

    }else if(seccionActual == "#admin-etiquetas"){
        
        document.querySelector(".modal-title").textContent = "Agregar una etiqueta";
        document.querySelector(".form-label").textContent = "Nombre de la etiqueta";
        
    }else if(seccionActual == "#admin-ingredientes"){
        
        document.querySelector(".modal-title").textContent = "Agregar un ingrediente";
        document.querySelector(".form-label").textContent = "Nombre del ingrediente";
    }

    document.getElementById("inputNombreItem").value = "";
    document.getElementById("formulario").dataset.accion = "crear";

}

// Función para preparar el modal para editar un item de la tabla
function modificarModalEditar(index) {
    
    const seccionActual = location.hash;

    if (seccionActual == "#admin-categorias" || seccionActual == "" || seccionActual == "#") {
        
        document.querySelector(".modal-title").textContent = "Modificar categoria";
        document.querySelector(".form-label").textContent = "Nombre de la categoría";
        document.getElementById("inputNombreItem").value = categorias[index];

    }else if(seccionActual == "#admin-etiquetas"){

        document.querySelector(".modal-title").textContent = "Modificar etiqueta";
        document.querySelector(".form-label").textContent = "Nombre de la etiqueta";
        document.getElementById("inputNombreItem").value = etiquetas[index];

    }else if(seccionActual == "#admin-ingredientes"){

        document.querySelector(".modal-title").textContent = "Modificar ingrediente";
        document.querySelector(".form-label").textContent = "Nombre del ingrediente";
        document.getElementById("inputNombreItem").value = ingredientes[index];

    }

    document.getElementById("formulario").dataset.accion = "editar";
    document.getElementById("itemID").value = index;

}

function actualizarContadores() {

    const contadores = [
        { element: document.getElementById("cont-categorias"), items: categorias },
        { element: document.getElementById("cont-etiquetas"), items: etiquetas },
        { element: document.getElementById("cont-ingredientes"), items: ingredientes },
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

function agregarItem(){

    // Obtener el valor del campo de nombre
    const nombreItem = document.getElementById('inputNombreItem').value.trim();

    //Obtengo la seccion actual que se va a modificar
    const seccion = location.hash;

    if (nombreItem !== "") {

        if(seccion == "#admin-categorias" || seccion == "" || seccion == "#"){
            categorias.push(nombreItem);
            actualizarTabla(categorias);
        }else if(seccion == "#admin-etiquetas"){
            etiquetas.push(nombreItem);
            actualizarTabla(etiquetas);
        }else if(seccion == "#admin-ingredientes"){
            ingredientes.push(nombreItem);
            actualizarTabla(ingredientes);
        }

        // Limpio el campo de texto
        document.getElementById('inputNombreItem').value = "";
    }
}

function editarItem(){

    //Obtengo el id del item desde un hidden input
    const itemIndex = document.getElementById("itemID").value;

    // Obtener el valor del campo de nombre
    const nombreItem = document.getElementById('inputNombreItem').value.trim();

    //Obtengo la seccion actual que se va a modificar
    const seccion = location.hash;

    if (nombreItem !== "") {

        if(seccion == "#admin-categorias" || seccion == "" || seccion == "#"){

            categorias[itemIndex] = nombreItem;
            actualizarTabla(categorias);

        }else if(seccion == "#admin-etiquetas"){

            etiquetas[itemIndex] = nombreItem;
            actualizarTabla(etiquetas);

        }else if(seccion == "#admin-ingredientes"){

            ingredientes[itemIndex] = nombreItem;
            actualizarTabla(ingredientes);
        }

        //Escondo modal de bootstrap
        modalBootstrap.hide();

        // Limpio el campo de texto
        document.getElementById('inputNombreItem').value = "";
    }

}

function manejarContenido(seccion){

    const panelTitulo = document.querySelector(".panel-title");
    const panelBtn = document.querySelector(".btn-add-item");
    const panelContenido = document.querySelector(".panel-body");

    panelContenido.innerHTML = `<table class="table table-bordered" id="tabla-items">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Aca van los items dinámicos -->
                                            </tbody>
                                        </table>`;

    switch (seccion) {

        case '#admin-categorias':

            //Modifico la interfaz según la seccion
            panelTitulo.textContent = "Categorías";
            panelBtn.classList.remove("d-none");
            panelBtn.textContent = "Añadir categoría";
            
            adaptarDashboard("#admin-categorias");
            actualizarTabla(categorias);
            break;
            
        case '#admin-etiquetas':
                
            //Modifico la interfaz según la seccion
            panelTitulo.textContent = "Etiquetas";
            panelBtn.classList.remove("d-none");
            panelBtn.textContent = "Añadir etiqueta";

            adaptarDashboard("#admin-etiquetas");
            actualizarTabla(etiquetas);
            break;
                
        case '#admin-ingredientes':

            //Modifico la interfaz según la seccion
            panelTitulo.textContent = "Ingredientes";
            panelBtn.classList.remove("d-none");
            panelBtn.textContent = "Añadir ingrediente";

            adaptarDashboard("#admin-ingredientes");
            actualizarTabla(ingredientes);
            break;
                    
        case '#admin-usuarios':

            panelBtn.classList.add("d-none");
            panelTitulo.textContent = "Gestion de usuarios reportados";
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

            //Modifico la interfaz según la seccion
            panelTitulo.textContent = "Categorías";
            document.querySelector(".btn-add-item").textContent = "Añadir categoría";
            
            adaptarDashboard("#admin-categorias");
            actualizarTabla(categorias);
            break;
    }
}

function limpiarDashboard() {
    const enlacesDashboard = document.querySelectorAll('.list-group-item');
    enlacesDashboard.forEach(item => {
        item.classList.remove('item-activo');
    });
}
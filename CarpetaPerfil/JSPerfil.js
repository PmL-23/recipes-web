//objeto para el usuario
let IDSesion;
let Usuario = {
    id_usuario: null, 
    id_rol: null,
    username: null,
    nom_completo: null,
    email: null,
    google_email: null,
    fecha_nacimiento: null,
    id_pais: null
};

//array de objetos para las publicaciones
let Publicacion = [];
//para tener en memoria la cantidad de publicaciones que tiene el usuario
let CantidadPublicaciones = 0;

const ProcesarInformacionLLenarEncabezado = function(data) {
    //console.log("en ProcesarInformacionLLenarEncabezado");
    //console.log(data);
    let IDNombreCompletoDeUsuario = document.getElementById('IDNombreCompletoDeUsuario');
    let IDNombreDeUsuario = document.getElementById('IDNombreDeUsuario');


    //faltaria actualizar lo de los seguidores

    if (data.length === 0) {
        // mostrar warning
        console.log("No se encontró al Usuario");
    } else {
        for (let usuarioBDD of data) {
            // Actualiza las variables globales
            Usuario.nom_completo = usuarioBDD.nom_completo;
            Usuario.username = usuarioBDD.username;
            Usuario.id_usuario = usuarioBDD.id_usuario; 
            Usuario.id_rol = usuarioBDD.id_rol; 
            Usuario.email = usuarioBDD.email;
            Usuario.google_email = usuarioBDD.google_email;
            Usuario.fecha_nacimiento = usuarioBDD.fecha_nacimiento;
            Usuario.id_pais = usuarioBDD.id_pais;

            // actualizamos los <p>
            IDNombreCompletoDeUsuario.textContent = Usuario.nom_completo;
            IDNombreDeUsuario.textContent = '@' + Usuario.username;

            //faltaria actualizar lo de los seguidores
        }
    }
}

const LLenarEncabezado = async function () {

    let url = window.location.origin + '/RECIPES-WEB/CarpetaPerfil/TraerUsuario.php?IDUsuario=' + IDSesion;
    try {
        let respuesta = await fetch (url, {
        method : 'get',
    });
    ProcesarInformacionLLenarEncabezado(await respuesta.json());
    }
    catch (error) {
        console.log('FALLO FETCH!');
        console.log(error);
    }
}

const ProcesarInformacionTraerValoraciones = function(data, index) {
    if (data.length === 0) {
//        console.log("No se encontraron comentarios");
        Publicacion[index].cant_valoraciones = 0;
        Publicacion[index].prom_valoracion = "-";
    } else {
        let PuntajeValoraciones =0;
        for(publi of data){
            PuntajeValoraciones += publi.puntuacion;
        }
    Publicacion[index].cant_valoraciones = data.length;
    Publicacion[index].prom_valoracion = (PuntajeValoraciones / data.length).toFixed(1);
}
}

const TraerValoraciones = async function (IDPublicacion, index) {
    let url = window.location.origin + '/RECIPES-WEB/CarpetaPerfil/TraerValoraciones.php?IDPublicacion=' + IDPublicacion;
    try {
        let respuesta = await fetch(url, {
            method: 'get',
        });
        ProcesarInformacionTraerValoraciones(await respuesta.json(), index);
    } catch (error) {
        console.log('FALLO FETCH DE TRAER VALORACIONES!');
        console.log(error);
    }
}

const ProcesarInformacionTraerCantComentarios = function(data, index) {
    if (data.length === 0) {
//        console.log("No se encontraron comentarios");
        Publicacion[index].cant_comentarios = 0;
    } else {
        Publicacion[index].cant_comentarios = data.length;
    }
}


const TraerCantComentarios = async function (IDPublicacion, index) {
    let url = window.location.origin + '/RECIPES-WEB/CarpetaPerfil/TraerCantComentarios.php?IDPublicacion=' + IDPublicacion;
    try {
        let respuesta = await fetch(url, {
            method: 'get',
        });
        ProcesarInformacionTraerCantComentarios(await respuesta.json(), index);
    } catch (error) {
        console.log('FALLO FETCH DE TRAER CATEGORIAS!');
        console.log(error);
    }
}


const ProcesarInformacionTraerCategoria = function(data, index) {
    if (data.length === 0) {
        console.log("No se encontró la categoria");
    } else {
        Publicacion[index].nom_categoria = data[0].titulo;  // Asegúrate de que se está asignando correctamente
        //console.log("Categoria asignada:", Publicacion[index].nom_categoria);
    }
}


const TraerCategoria = async function (IDCategoria, index) {
    let url = window.location.origin + '/RECIPES-WEB/CarpetaPerfil/TraerCategoriaPublicacion.php?IDCategoria=' + IDCategoria;
    try {
        let respuesta = await fetch(url, {
            method: 'get',
        });
        ProcesarInformacionTraerCategoria(await respuesta.json(), index);
    } catch (error) {
        console.log('FALLO FETCH DE TRAER CATEGORIAS!');
        console.log(error);
    }
}

const ProcesarInformacionTraerPublicaciones = async function(data) {
    if (data.length === 0) {
        console.log("No se encontraron publicaciones");
    } else {
        let promesasCategorias = [];
        let promesasComentarios = [];
        let promesasValoraciones = [];
        for (let publi of data) {
            Publicacion[CantidadPublicaciones] = {
                id_publicacion: publi.id_publicacion,
                id_usuario_autor: publi.id_usuario_autor,
                titulo: publi.titulo,
                descripcion: publi.descripcion,
                fecha_publicacion: publi.fecha_publicacion,
                dificultad: publi.dificultad,
                minutos_prep: publi.minutos_prep,
                nom_categoria: null,
                cant_comentarios: null,
                cant_valoraciones: null,
                prom_valoracion: null
            };

            promesasCategorias.push(TraerCategoria(publi.id_categoria, CantidadPublicaciones)); //si usamos un away en el for, se rompe, por eso hacemos esto
            promesasComentarios.push(TraerCantComentarios(publi.id_publicacion, CantidadPublicaciones));
            promesasValoraciones.push(TraerValoraciones(publi.id_publicacion, CantidadPublicaciones));
            CantidadPublicaciones += 1;
        }
        // Esperar a que todas las promesas se resuelvan
        await Promise.all(promesasCategorias);
        await Promise.all(promesasComentarios);
        await Promise.all(promesasValoraciones);
        //console.log("en el for de las publicaciones");
        //console.log(CantidadPublicaciones);
        console.log(Publicacion);
    }
    LLenarDivPublicaciones();
}


const TraerPublicaciones = async function () {

    let url = window.location.origin + '/RECIPES-WEB/CarpetaPerfil/TraerPublicaciones.php?IDUsuario=' + IDSesion;
    try {
        let respuesta = await fetch (url, {
        method : 'get',
    });
    ProcesarInformacionTraerPublicaciones(await respuesta.json());
    }
    catch (error) {
        console.log('FALLO FETCH!');
        console.log(error);
    }
}








//usamos un query selector con data-background-image para obtener la imagen actual de cada
//carrousel. Despues aplicamos estilos desde este JS, no se pudo encontrar otra solución por
//el momento

document.querySelectorAll('.slide').forEach(function (slide) {
    var imgSrc = slide.getAttribute('data-background-image');
    slide.style.setProperty('--background-image', `url(${imgSrc})`);
    slide.style.backgroundImage = `url(${imgSrc})`;
});

//pequeño codigo para mostrar la vista previa de una nueva foto de perfil
function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block'; // Mostrar la imagen
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        imagePreview.src = "#"; // Restablecer la vista previa si no hay archivo
        imagePreview.style.display = 'none'; // Ocultar la imagen
    }
}

//funcion para copiar en enlace para compartir el perfil.
function CopiarEnlacePerfil() {
    const profileLink = 'https://RecetasDeAmerica.com/MiPerfil';
    navigator.clipboard.writeText(profileLink).then(() => {
    }).catch(err => {
        console.error('Error al copiar el enlace: ', err);
    });
}

//funcion para copiar en enlace para compartir el perfil.
function LLenarDivPublicaciones() {
    const contenedor = document.getElementById("IDContenedorPublicacionesPropias"); // Selecciona el contenedor
    console.log("sdaasd");
    if(CantidadPublicaciones==0){
        const fragmentoHTML =`
        <div class="container-fluid row d-flex justify-content-center align-items-center">
            <div class="col-1"></div>
            <div class="col-10 text-center">
                <p class="h2">Todavia no hay publicaciones!</p>
            </div>
            <div class="col-1"></div>
            <br>
        </div>`;
        // Agregar el fragmento de HTML al contenedor
        contenedor.innerHTML = fragmentoHTML;  
    }
    
    else{
    for (let i = 0; i < CantidadPublicaciones; i++) {
            //falta la logica para poner tantas imagenes como tenga la publicacion.


//            <div class="container-fluid row" id="DivPublicacion${i}">
            const fragmentoHTML =`


                
                <div class="card p-3 mt-2 col-lg-4 mb-3" id="DivPublicacion${i}">
                        <div class="DivEncabezadoPublicacion d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img class="d-inline" alt="Fperfil" src="" width="25" height="25">
                                <p class="d-inline mb-0" id="IDNombreCompletoDeUsuarioEnPublicacion">${Usuario.nom_completo}</p>
                                <p class="d-inline text-secondary mb-0" id="IDNombreDeUsuarioEnPublicacion">@${Usuario.username}</p>
                            </div>
                            <p class="text-secondary mb-0" id="IDFechaPublicacion">${Publicacion[i].fecha_publicacion}</p>
                        </div>

    
                        <div id="carouselExampleIndicators${i}" class="carousel slide carouselPerfil bg-black">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner"> <!---buscar manera para que el tamaño de una imagen no perjudique la UX-->
                                <div class="carousel-item active slide" data-background-image="">
                                    <img src="" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item slide" data-background-image="">
                                    <img src="" class="d-block w-100 " alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        
                        <div class="card-body ">
                            <h5 class="card-title ">${Publicacion[i].titulo}</h5>
                            <p class="card-text">${Publicacion[i].descripcion}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item mt-3">
                                <p class="card-text EstilosCategorias">${Publicacion[i].nom_categoria}</p>
                                    
                            </li>
                            <li class="list-group-item">
                                <ul>
                                    <li><p class="card-text"></p></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Valoración y cantidad de valoraciones -->
                                <div class="valoracion">
                                    <p> Valoracion ${Publicacion[i].prom_valoracion} (${Publicacion[i].cant_valoraciones} valoraciones)</p>
                                </div>
                                
                                <!-- Cantidad de comentarios -->
                                <div class="comentarios">
                                    <p> ${Publicacion[i].cant_comentarios} comentarios</p>
                                </div>
                            </div>
                            
                            <!-- Botones de acción -->
                            <div class="d-flex justify-content-end mt-2">
                                <!-- Botón para compartir -->
                                <button class="btn btn-outline-primary me-2" type="button">
                                    Compartir
                                </button>
                        
                                <!-- Botón para guardar en favoritos -->
                                <button class="btn btn btn-outline-dark" type="button">
                                    Guardar en Favoritos
                                </button>
                            </div>
                        </div>
                </div>
    

    
            </div>

            `;
            // Agregar el fragmento de HTML al contenedor
            contenedor.innerHTML += fragmentoHTML;  
    
        }
    }
}
document.addEventListener("DOMContentLoaded", async function () {
    IDSesion = document.body.getAttribute('data-id-usuario');
    console.log("viendo");
    console.log(IDSesion);
    let promesasDOM = [];
    promesasDOM.push(LLenarEncabezado()); //si usamos un away en el for, se rompe, por eso hacemos esto
    promesasDOM.push(TraerPublicaciones()); //si usamos un away en el for, se rompe, por eso hacemos esto
    await Promise.all(promesasDOM);
});

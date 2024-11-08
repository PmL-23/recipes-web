//variables globales
let id_usuario;
let urlVariable;

//objeto para el usuario
let Usuario = [];

//array de objetos para las publicaciones
let Publicacion = [];
//para tener en memoria la cantidad de publicaciones que tiene el usuario
let CantidadPublicaciones = 0;


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
    let url = urlVariable + '/../CarpetaPerfil/TraerValoraciones.php?IDPublicacion=' + IDPublicacion;
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
    let url = urlVariable + '/../CarpetaPerfil/TraerCantComentarios.php?IDPublicacion=' + IDPublicacion;
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
    let url = urlVariable + '/../CarpetaPerfil/TraerCategoriaPublicacion.php?IDCategoria=' + IDCategoria;
    
    //console.log(url);
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


const ProcesarInformacionTraerUsuarios = function(data, index) {
    if (data.length === 0) {
        console.log("No se encontró al Usuario");
    } else {
        for(publi of data){
            Usuario[index] = {
                username: publi.username,
                nom_completo: publi.nom_completo,
                foto_usuario: publi.foto_usuario
            };
        }
}
}

const TraerUsuarios = async function (IDUsuario, index) {
    let url = urlVariable + '/TraerUsuario.php?IDUsuario=' + IDUsuario;
    //console.log(url);
    try {
        let respuesta = await fetch(url, {
            method: 'get',
        });
        ProcesarInformacionTraerUsuarios(await respuesta.json(), index);
    } catch (error) {
        console.log('FALLO FETCH DE TRAER VALORACIONES!');
        console.log(error);
    }
}

const ProcesarInformacionTraerImagenes = function(data, index) {
    if (data.length === 0) {
        console.log("No se encontró la imagen en " + index );
    } else {
        let i =0;
        for(publi  of data){
            Publicacion[index].ruta_imagen[i] = publi.ruta_imagen;
            i += 1;
        }
    }
}


const TraerImagenes = async function (IDPublicacion, index) {
    let url = urlVariable + '/../CarpetaPerfil/TraerImagenesPublicacion.php?IDPublicacion=' + IDPublicacion;
    try {
        let respuesta = await fetch(url, {
            method: 'get',
        });
        ProcesarInformacionTraerImagenes(await respuesta.json(), index);
    } catch (error) {
        console.log('FALLO FETCH DE TRAER IMAGENES!');
        console.log(error);
    }
}

const ProcesarInformacionTraerEtiquetas = function(data, index) {
    //console.log("me taje en el " + index + " ");
    //console.log(data);
    if (data.length === 0) {
        console.log("No se encontró la etiqueta en " + index);
    } else {
        let i =0;
        for(publi  of data){
            Publicacion[index].etiquetas[i] = publi.nombre_etiqueta;
            i += 1;
        }
    }
}


const TraerEtiquetas = async function (IDPublicacion, index) {
    let url = urlVariable + '/../CarpetaPerfil/TraerEtiquetas.php?IDPublicacion=' + IDPublicacion;
    try {
        let respuesta = await fetch(url, {
            method: 'get',
        });
        ProcesarInformacionTraerEtiquetas(await respuesta.json(), index);
    } catch (error) {
        console.log('FALLO FETCH DE TRAER IMAGENES!');
        console.log(error);
    }
}

const ProcesarInformacionTraerPaises = function(data, index) {
    //console.log("me taje en el " + index + " ");
    //console.log(data);
    if (data.length === 0) {
        console.log("No se encontró el pais en " + index);
    } else {
        let i = 0;
        for (let publi of data) {
            Publicacion[index].paises[i] = publi.ruta_imagen_pais;
            i += 1;

            // Asegúrate de que `Publicacion[index].paises` es un array y luego agrega el objeto en la posición `i`
            /*Publicacion[index].paises[i] = {
                nombre: publi.nombre,
                ruta_imagen_pais: publi.ruta_imagen_pais
            };
            i += 1;*/
        }
        
    }
}


const TraerPaises = async function (IDPublicacion, index) {
    let url = urlVariable + '/../CarpetaPerfil/TraerPaises.php?IDPublicacion=' + IDPublicacion;
    try {
        let respuesta = await fetch(url, {
            method: 'get',
        });
        ProcesarInformacionTraerPaises(await respuesta.json(), index);
    } catch (error) {
        console.log('FALLO FETCH DE TRAER IMAGENES!');
        console.log(error);
    }
}


const ProcesarInformacionTraerPublicaciones = async function(data) {
    console.log(data);
    
    if (data.length === 0) {
        console.log("No se encontraron publicaciones favoritas ");
    } else {
        let promesasComentarios = [];
        let promesasValoraciones = [];
        let promesasImagenes = [];
        let promesasEtiquetas = [];
        let promesasPaises = [];
        let promesasUsuario = [];
        for (let publi of data) {
            Publicacion[CantidadPublicaciones] = {
                id_publicacion: publi.id_publicacion,
                id_usuario_autor: publi.id_usuario_autor,
                titulo: publi.titulo,
                descripcion: publi.descripcion,
                fecha_publicacion: publi.fecha_publicacion,
                dificultad: publi.dificultad,
                minutos_prep: publi.minutos_prep,
                nom_categoria: publi.nombre_categoria,
                cant_comentarios: null,
                cant_valoraciones: null,
                prom_valoracion: null,
                ruta_imagen:[],
                etiquetas:[],
                paises:[]
            };

            promesasComentarios.push(TraerCantComentarios(publi.id_publicacion, CantidadPublicaciones));//si usamos un away en el for, se rompe, por eso hacemos esto
            promesasValoraciones.push(TraerValoraciones(publi.id_publicacion, CantidadPublicaciones));
            promesasImagenes.push(TraerImagenes(publi.id_publicacion, CantidadPublicaciones)); //si usamos un away en el for, se rompe, por eso hacemos esto
            promesasEtiquetas.push(TraerEtiquetas(publi.id_publicacion, CantidadPublicaciones));
            promesasPaises.push(TraerPaises(publi.id_publicacion, CantidadPublicaciones));
            promesasUsuario.push(TraerUsuarios(publi.id_usuario_autor, CantidadPublicaciones));
            CantidadPublicaciones += 1;
        }
        // Esperar a que todas las promesas se resuelvan
        await Promise.all(promesasComentarios);
        await Promise.all(promesasValoraciones);
        await Promise.all(promesasImagenes);
        await Promise.all(promesasEtiquetas);
        await Promise.all(promesasPaises);
        await Promise.all(promesasUsuario);
        //console.log("en el for de las publicaciones");
        //console.log(CantidadPublicaciones);
        console.log(Publicacion);
        console.log(Usuario);
    }
    LLenarPagina();
}


function LLenarPagina() {

    const contenedor = document.getElementById("IDContenedorPublicacionesFavoritas"); // Selecciona el contenedor
    const cantRecetasFavoritas = document.getElementById("IDCantidadPublicaciones"); // Selecciona el contenedor
    
    if(CantidadPublicaciones==0){
        cantRecetasFavoritas.textContent = '(' + CantidadPublicaciones + ')';

        const fragmentoHTML =`
        <div class="container-fluid row d-flex justify-content-center align-items-center mt-5">
            <div class="col-1"></div>
            <div class="col-10 text-center mt-5">
                <p class="h2">Todavia no tienes recetas favoritas!</p>
            </div>
            <div class="col-1"></div>
            <br>
        </div>`;
    // Agregar el fragmento de HTML al contenedor
    contenedor.innerHTML = fragmentoHTML;
    }
    
    else{
        cantRecetasFavoritas.textContent = '(' + CantidadPublicaciones + ')';
    for (let i = 0; i < CantidadPublicaciones; i++) {
        let indicatorsCarrouselHTML = '';
        let imagesCarrouselHTML = '';
        // Solo se crea el carrusel si hay imágenes en ruta_imagen
        if (Publicacion[i].ruta_imagen && Publicacion[i].ruta_imagen.length > 0) {
            Publicacion[i].ruta_imagen.forEach((ruta, index) => {
                // Crear indicadores
                //hace un pequeño if es las lineas para saber si es el primero para poner distintos atributos
                indicatorsCarrouselHTML += `
                    <button type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide-to="${index}" 
                            class="${index === 0 ? 'active' : ''}" aria-current="${index === 0 ? 'true' : 'false'}" aria-label="Slide ${index + 1}">
                    </button>`;
    
            // Crear elementos de imagen en el carrusel
            imagesCarrouselHTML += `
                <div class="carousel-item ${index === 0 ? 'active' : ''}">
                    <img src="${ruta}" class="d-block w-100 custom-carousel-image" alt="Imagen ${index + 1}">
                </div>`;

                    
            });
        }
        // HTML del carrusel (solo se incluirá si hay imágenes)
        const carouselHTML = (indicatorsCarrouselHTML && imagesCarrouselHTML) ? `
            <div id="carouselExampleIndicators${i}" class="carousel slide carouselPerfil">
                <div class="carousel-indicators">
                    ${indicatorsCarrouselHTML}
                </div>
                <div class="carousel-inner">
                    ${imagesCarrouselHTML}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>` : ''; // Dejar vacío si no hay imágenes

        let EtiquetaIndividualHTML = '';
        // Solo se ponen las etiquetas si la publicacion las tiene 
        if (Publicacion[i].etiquetas && Publicacion[i].etiquetas.length > 0) {
            Publicacion[i].etiquetas.forEach((titulo, s) => {
                EtiquetaIndividualHTML += `
                    <p class="etiqueta-style d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">${titulo}</p>`;
            });
        }
        let PaisesHTML = '';
        // Solo se ponen las etiquetas si la publicacion las tiene 
        if (Publicacion[i].paises && Publicacion[i].paises.length > 0) {
            Publicacion[i].paises.forEach((ruta, s) => {
                PaisesHTML += `
                    <img src="../svg/${ruta}" alt="Bandera" width="27" class="bandera" id="bandera-receta">`;
            });
        }

        const fragmentoHTML = `
            <div class="p-3 mt-2 col-xxl-4 col-xl-6 col-md-12 mx-auto" id="DivPublicacion${i}">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="card">
                            <div class="DivEncabezadoPublicacion d-flex justify-content-between align-items-center p-2">
                                <div class="d-flex align-items-center">
                                    <img class="d-inline" alt="Fperfil" src="${Usuario[i].foto_usuario}" width="35" height="35">
                                    <p class="d-inline p-1 mb-0" id="IDNombreCompletoDeUsuarioEnPublicacion">${Usuario[i].nom_completo}</p>
                                    <p class="d-inline text-secondary mb-0" id="IDNombreDeUsuarioEnPublicacion">  @${Usuario[i].username}</p>
                                </div>
                                <p class="text-secondary mb-0" id="IDFechaPublicacion">${Publicacion[i].fecha_publicacion}</p>
                            </div>
    
                            ${carouselHTML} <!-- Solo se muestra el carrusel si hay imágenes -->
    
                            <div class="card-body ">
                                <h5 class="card-title fs-5">${Publicacion[i].titulo}</h5>
                                <p class="">${Publicacion[i].descripcion}</p>
                            </div>
                            <ul class="list-group list-group-flush p-0">
                                <li class="list-group-item mt-3">
                                    <p class="categoria-style2 d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">${Publicacion[i].nom_categoria}</p>
                                    ${EtiquetaIndividualHTML}
                                </li>
                                <li class="list-group-item">
                                    <div class="contenedor-detalles container text-center ">
                                        <div class="row align-items-start">
                                            <div class="col-4">
                                                <div class="align-items-center box-paises mt-3">
                                                    ${PaisesHTML}
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="align-items-center box-icons">
                                                    <img src="../svg/bar-chart-line-fill.svg" width="20px" class="icono-item" alt="Dificultad icon">
                                                    <p class="TextoCaracteristicasPublicacion mb-0">Dificultad</p>
                                                    <p class="">${Publicacion[i].dificultad}</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="align-items-center box-icons">
                                                    <img src="../svg/alarm.svg" width="25px" class="icono-item" alt="Dificultad icon">
                                                    <p class="TextoCaracteristicasPublicacion mb-0">Tiempo</p>
                                                    <p class="tiempo">${Publicacion[i].minutos_prep} min</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="valoracion">
                                        <p>
                                            <i class="bi bi-star-fill text-warning"></i> <!-- Ícono de estrella para la valoración -->
                                            Valoración ${Publicacion[i].prom_valoracion} (${Publicacion[i].cant_valoraciones} valoraciones)
                                        </p>
                                    </div>
                                    <div class="comentarios">
                                        <p>
                                            <i class="bi bi-chat-fill text-primary"></i> <!-- Ícono de chat para comentarios -->
                                            ${Publicacion[i].cant_comentarios} comentarios
                                        </p>
                                    </div>
                                </div>
<div class="d-flex justify-content-end mt-2">
<!-- Botón de Guardar en Favoritos -->

    <button type="button" id="btn-favorito" class="btn btn-outline-danger me-1">
        <i class="bi bi-heart-fill fs-5"></i>
    </button>
    <button type="button" class="btn btn-outline-primary bg-none" id="btnCompartir">
        <i class="bi bi-share-fill fs-5"></i>
    </button>
</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        `;
    
        // Agregar el fragmento de HTML al contenedor
        contenedor.innerHTML += fragmentoHTML;
    }
}

}


const TraerPublicaciones = async function () {

    let url = urlVariable + '/TraerPublicacionesFavoritas.php?IDUsuario=' + id_usuario;
    //console.log(url);
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


document.addEventListener("DOMContentLoaded", async function () {
    id_usuario = document.body.getAttribute('data-IDUsuario');
    urlVariable = document.body.getAttribute('data-urlbase');
    //console.log(urlVariable);
    let promesasDOM = [];
    promesasDOM.push(TraerPublicaciones()); //si usamos un away en el for, se rompe, por eso hacemos esto
    await Promise.all(promesasDOM);
});

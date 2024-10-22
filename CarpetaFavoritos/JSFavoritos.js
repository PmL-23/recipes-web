//usamos un query selector con data-background-image para obtener la imagen actual de cada
//carrousel. Despues aplicamos estilos desde este JS, no se pudo encontrar otra solución por
//el momento

document.querySelectorAll('.slide').forEach(function (slide) {
    var imgSrc = slide.getAttribute('data-background-image');
    slide.style.setProperty('--background-image', `url(${imgSrc})`);
    slide.style.backgroundImage = `url(${imgSrc})`;
});

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
            };
        }
}
}

const TraerUsuarios = async function (IDUsuario, index) {
    let url = urlVariable + '/TraerUsuario.php?IDUsuario=' + IDUsuario;
    console.log(url);
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


const ProcesarInformacionTraerPublicaciones = async function(data) {
    if (data.length === 0) {
        console.log("No se encontraron publicaciones");
    } else {
        let promesasCategorias = [];
        let promesasComentarios = [];
        let promesasValoraciones = [];
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
                nom_categoria: null,
                cant_comentarios: null,
                cant_valoraciones: null,
                prom_valoracion: null
            };

            promesasCategorias.push(TraerCategoria(publi.id_categoria, CantidadPublicaciones)); //si usamos un away en el for, se rompe, por eso hacemos esto
            promesasComentarios.push(TraerCantComentarios(publi.id_publicacion, CantidadPublicaciones));
            promesasValoraciones.push(TraerValoraciones(publi.id_publicacion, CantidadPublicaciones));
            promesasUsuario.push(TraerUsuarios(publi.id_usuario_autor, CantidadPublicaciones));
            CantidadPublicaciones += 1;
        }
        // Esperar a que todas las promesas se resuelvan
        await Promise.all(promesasCategorias);
        await Promise.all(promesasComentarios);
        await Promise.all(promesasValoraciones);
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
    for (let i = 0; i < CantidadPublicaciones; i++) {
            //falta la logica para poner tantas imagenes como tenga la publicacion.
            cantRecetasFavoritas.textContent = '(' + CantidadPublicaciones + ')';


            const fragmentoHTML =`

<div class="p-3 mt-2 col-xxl-4 col-xl-6 col-md-12 mx-auto" id="DivPublicacion${i}">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
        <div class="card">
            <div class="DivEncabezadoPublicacion d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img class="d-inline" alt="Fperfil" src="" width="25" height="25">
                    <p class="d-inline mb-0" id="IDNombreCompletoDeUsuarioEnPublicacion">${Usuario[i].nom_completo}</p>
                    <p class="d-inline text-secondary mb-0" id="IDNombreDeUsuarioEnPublicacion">@${Usuario[i].username}</p>
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
                    <p class="categoria-style2 d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">${Publicacion[i].nom_categoria}</p>
                    <p class="etiqueta-style d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">etiqueta nashe</p>
                    <p class="etiqueta-style d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">etiqueta nashe2</p>
                    <p class="etiqueta-style d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">etiqueta nashe3</p>
                </li>
                <li class="list-group-item">
                        <div class="contenedor-detalles container text-center ">
                        <div class="row align-items-start">
                            <div class="col-4">
                                <div class="align-items-center box-icons">
                                    <img src="../svg/argentina.svg" alt="Bandera" width="35" class="bandera" id="bandera-receta">
                                    <p class="TextoCaracteristicasPublicacion">Argentina</p> 
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="align-items-center box-icons">
                                    <img src="../svg/bar-chart-line-fill.svg" width="25px" class="icono-item" alt="Dificultad icon">
                                    <p class="TextoCaracteristicasPublicacion mb-0">Dificultad</p>
                                    <p class="">Media</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="align-items-center box-icons">
                                    <img src="../svg/alarm.svg" width="25px" class="icono-item" alt="Dificultad icon">
                                    <p class="TextoCaracteristicasPublicacion mb-0">Tiempo</p>
                                    <p class="tiempo">30 min</p>
                                </div>
                            </div>
                        </div>
                        </div>
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


    //let promesasDOM2 = [];// esperamos al encabezado para seguir
    //promesasDOM2.push(TraerPublicaciones()); 
    //await Promise.all(promesasDOM2);

    
});

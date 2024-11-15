//variables globales
let Nombre_Usuario_Perfi;
let urlVariable;
let SessionIDUsuario;

//objeto para el usuario
let Usuario = {
    id_usuario: null, 
    id_rol: null,
    username: null,
    nom_completo: null,
    email: null,
    google_email: null,
    fecha_nacimiento: null,
    id_pais: null,
    foto_usuario: null
};

//array de objetos para las publicaciones
let Publicacion = [];
//para tener en memoria la cantidad de publicaciones que tiene el usuario
let CantidadPublicaciones = 0;

const TraerSeguidoresoSeguidos = async function (id_usuario, accion) {
    console.log("entroTraerSeguidoresoSeguidos");
    try {
        // Llamada a la base de datos usando fetch
        let url = urlVariable + '/TraerSeguidoresoSeguidos.php'  
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                accion: accion, // "TraerSeguidos" o "TraerSeguidores";
                iDUsuario: id_usuario,
            }),
        });
    
        const result = await response.json();
        

            console.log(result.length);
            
            if(accion === "TraerSeguidos"){
                let IDCantidadSeguidos = document.getElementById('IDCantidadSeguidos');
                IDCantidadSeguidos.textContent = result.length;
            }
            else if(accion === "TraerSeguidores"){
                let IDCantidadSeguidores = document.getElementById('IDCantidadSeguidores');
                IDCantidadSeguidores.textContent = result.length;
            }
            
    } catch (error) {
        console.log("disculpe las molestias, ocurrio un error");
    }
}

const EsFavorito = async function (idPublicacion, id_usuario, index) {
    const accion = "consultar";
    console.log("entro");
    try {
        // Llamada a la base de datos usando fetch
        let url = urlVariable + '/../CarpetaFavoritos/Agregar-Sacar-fav.php'  
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                accion: accion, // `agregar` o `eliminar`
                iDPublicacion: idPublicacion, // El ID de la publicación
                iDUsuario: id_usuario,
            }),
        });
    
        const result = await response.json();

        if (result.success==true){
            Publicacion[index].esFavorito = true;
        }
        else if (result.success==false){
            Publicacion[index].esFavorito = false;
        }
        else{
            console.log("Ocurrio un error al verificar si es favorito");
            
        }
    } catch (error) {
        console.log("disculpe las molestias, ocurrio un error");
    }
}
async function toggleSeguir(id_usuarioSession, id_usuarioPerfil) {
    
    if(id_usuarioSession == id_usuarioPerfil){
        showModalSinRedireccion("No puedes seguir a tu propia cuenta!", false);

    }
    else{
    const btnSeguir = document.getElementById("btn-SeguirPerfil");
    const esSeguidor = btnSeguir.classList.contains("seguir-activo");
    const accion = esSeguidor ? "Siguiendo" : "Seguir";

    console.log(accion);
    console.log("entro a toggle seguir");

    // Alternar visualmente el estado del botón
    btnSeguir.classList.toggle("seguir-activo");

    try {
        // Llamada a la base de datos usando fetch
        let url = urlVariable + '/Seguir-DejarDeSeguir.php';
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                accion: accion,
                IDUsuarioSession: Number(id_usuarioSession),
                IDUsuarioASeguir: Number(id_usuarioPerfil)
            }),
        });

        const result = await response.json();
        console.log(result);
        
        if (!result.success) {
            // Revertir visualmente si ocurre un error
            btnSeguir.classList.toggle("seguir-activo");
            console.log("Disculpe las molestias, no se pudo actualizar el registro.");
        } else {
            // Actualizar el texto del botón si la acción se realizó con éxito
            btnSeguir.querySelector("span").textContent = esSeguidor ? "Seguir" : "Siguiendo";
            console.log("La actualización fue exitosa.");
        }
    } catch (error) {
        // Revertir visualmente si la solicitud falla
        btnSeguir.classList.toggle("seguir-activo");
        console.log("Disculpe las molestias, ocurrió un error.");
    }
}
}

const EsSeguido = async function (id_usuarioSession, id_usuarioPerfil) {
    const accion = "consultar";


    try {
        // Llamada a la base de datos usando fetch
        let url = urlVariable + '/Seguir-DejarDeSeguir.php'  
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                accion: accion, 
                IDUsuarioSession: Number(id_usuarioSession),
                IDUsuarioASeguir: Number(id_usuarioPerfil)
            }),
        });
        const result = await response.json();
        let btnSeguir = document.getElementById("btn-SeguirPerfil");
        if (result.success==true){
            btnSeguir.querySelector("span").textContent= "Siguiendo"
            btnSeguir.classList.add("seguir-activo");
        }
        else if (result.success==false){
            btnSeguir.querySelector("span").textContent= "Seguir"
            btnSeguir.classList.remove("seguir-activo");
        }
        
        else{
            console.log("Ocurrio un error al verificar si es seguidor");
        }
        btnSeguir.addEventListener("click", () => toggleSeguir(id_usuarioSession, id_usuarioPerfil));
    } catch (error) {
        console.log("disculpe las molestias, ocurrio un error");
    }
}

async function toggleFavorito(idPublicacion, id_usuario,index) {
    const btnFavorito = document.getElementById(`btn-favorito-${index}`);
    const esFavorito = btnFavorito.classList.contains("favorito-activo");
    const accion = esFavorito ? "eliminar" : "agregar";

    // Alternar visualmente el estado del botón
    btnFavorito.classList.toggle("favorito-activo");
//console.log(accion);

    try {
        // Llamada a la base de datos usando fetch
        let url = urlVariable + '/../CarpetaFavoritos/Agregar-Sacar-fav.php'  
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                accion: accion, // `agregar` o `eliminar`
                iDPublicacion: idPublicacion, // El ID de la publicación
                iDUsuario: id_usuario,
            }),
        });

        const result = await response.json();

        if (!result.success) {
            // Revertir visualmente si ocurre un error
            btnFavorito.classList.toggle("favorito-activo");
            console.log("disculpe las molestias, no se pudo actualizar el registro");
        }
    } catch (error) {
        // Revertir visualmente si la solicitud falla
        btnFavorito.classList.toggle("favorito-activo");
        console.log("disculpe las molestias, ocurrio un error");
        
    }
}




function showModal(message, isSuccess) {
    const modalContent = document.getElementById('modalContent');
    const modalMessage = document.getElementById('modalMessage');
    const modalIcon = document.getElementById('modalIcon');

    // Limpiar clases previas
    modalContent.classList.remove('success', 'error');
    modalIcon.classList.remove('success-icon', 'error-icon');

    if (isSuccess) {
        modalContent.classList.add('success');
        modalIcon.classList.add('success-icon');
    } else {
        modalContent.classList.add('error');
        modalIcon.classList.add('error-icon');
    }

    modalMessage.textContent = message;
    
    // Configurar el modal principal
    const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
    
    // Cambia la opacidad del modal anterior y añade fondo oscuro
    document.querySelectorAll('.modal.show').forEach(modal => {
        modal.style.opacity = '0.76'; // Aplica opacidad al modal anterior
    });

    // Mostrar el modal con la opacidad del fondo
    resultModal.show();

    // Restablece la opacidad cuando se cierra el modal principal
    document.getElementById('resultModal').addEventListener('hidden.bs.modal', () => {
        document.querySelectorAll('.modal').forEach(modal => {
            modal.style.opacity = ''; // Restaurar opacidad original
        });
        // Redirigir al usuario al index al cerrar el modal
        //console.log(urlVariable + '/../index/index.php');
        


        window.location.href = urlVariable + '/../index/index.php'; // Cambia 'index.php' a la ruta correcta si es necesario
    });
}
function showModalSinRedireccion(message, isSuccess) {
    const modalContent = document.getElementById('modalContent');
    const modalMessage = document.getElementById('modalMessage');
    const modalIcon = document.getElementById('modalIcon');

    // Limpiar clases previas
    modalContent.classList.remove('success', 'error');
    modalIcon.classList.remove('success-icon', 'error-icon');

    if (isSuccess) {
        modalContent.classList.add('success');
        modalIcon.classList.add('success-icon');
    } else {
        modalContent.classList.add('error');
        modalIcon.classList.add('error-icon');
    }

    modalMessage.textContent = message;
    
    // Configurar el modal principal
    const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
    
    // Cambia la opacidad del modal anterior y añade fondo oscuro
    document.querySelectorAll('.modal.show').forEach(modal => {
        modal.style.opacity = '0.76'; // Aplica opacidad al modal anterior
    });

    // Mostrar el modal con la opacidad del fondo
    resultModal.show();

    // Restablece la opacidad cuando se cierra el modal principal
    document.getElementById('resultModal').addEventListener('hidden.bs.modal', () => {
        document.querySelectorAll('.modal').forEach(modal => {
            modal.style.opacity = ''; // Restaurar opacidad original
        });
        // Redirigir al usuario al index al cerrar el modal
        //console.log(urlVariable + '/../index/index.php');
        


    });
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
    let url = urlVariable + '/TraerValoraciones.php?IDPublicacion=' + IDPublicacion;
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
    let url = urlVariable + '/TraerCantComentarios.php?IDPublicacion=' + IDPublicacion;
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
    let url = urlVariable + '/TraerImagenesPublicacion.php?IDPublicacion=' + IDPublicacion;
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
    let url = urlVariable + '/TraerEtiquetas.php?IDPublicacion=' + IDPublicacion;
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
        }
        
    }
}


const TraerPaises = async function (IDPublicacion, index) {
    let url = urlVariable + '/TraerPaises.php?IDPublicacion=' + IDPublicacion;
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



const Redireccionar = function (TipoDePestaña, url) {
        try {
    if(TipoDePestaña=='EnMismaVentana'){
        window.location.href = url;
    }
    if(TipoDePestaña=='EnOtraVentana'){
        window.open(url, '_blank');
    }
        }
        catch (error) {
    
        }
    }


const ProcesarInformacionTraerPublicaciones = async function(data) {

    //console.log(data);
    if (data.length === 0) {
        console.log("No se encontraron publicaciones");
    } else {
        let promesasComentarios = [];
        let promesasValoraciones = [];
        let promesasImagenes = [];
        let promesasEtiquetas = [];
        let promesasEsFavorito = [];
        let promesasPaises = [];
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
                paises:[],
                esFavorito: null
            };

            
            promesasComentarios.push(TraerCantComentarios(publi.id_publicacion, CantidadPublicaciones));
            promesasValoraciones.push(TraerValoraciones(publi.id_publicacion, CantidadPublicaciones));
            promesasImagenes.push(TraerImagenes(publi.id_publicacion, CantidadPublicaciones)); //si usamos un away en el for, se rompe, por eso hacemos esto
            promesasEtiquetas.push(TraerEtiquetas(publi.id_publicacion, CantidadPublicaciones));
            promesasPaises.push(TraerPaises(publi.id_publicacion, CantidadPublicaciones));
            promesasEsFavorito.push(EsFavorito(publi.id_publicacion, SessionIDUsuario, CantidadPublicaciones));
            CantidadPublicaciones += 1;
        }
        // Esperar a que todas las promesas se resuelvan
        await Promise.all(promesasComentarios);
        await Promise.all(promesasValoraciones);
        await Promise.all(promesasImagenes);
        await Promise.all(promesasEtiquetas);
        await Promise.all(promesasPaises);
        await Promise.all(promesasEsFavorito);
        console.log(Publicacion);
    }
    LLenarDivPublicaciones();
}

    
const TraerPublicaciones = async function () {

    let url = urlVariable + '/TraerPublicaciones.php?IDUsuario=' + Usuario.id_usuario;
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


const ProcesarInformacionLLenarEncabezado = function(data) {
    //console.log("en ProcesarInformacionLLenarEncabezado");
    //console.log(data);
    let IDNombreCompletoDeUsuario = document.getElementById('IDNombreCompletoDeUsuario');
    let IDNombreDeUsuario = document.getElementById('IDNombreDeUsuario');
    let IDFotoPerfil = document.getElementById('IDFotoPerfil');

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
            Usuario.foto_usuario = usuarioBDD.foto_usuario;
            // actualizamos los <p>
            IDNombreCompletoDeUsuario.textContent = Usuario.nom_completo;
            IDNombreDeUsuario.textContent = '@' + Usuario.username;
            IDFotoPerfil.src = Usuario.foto_usuario;
        }
    }
}
const LLenarEncabezado = async function () {

    let url = urlVariable + '/TraerUsuario.php?NombreUsuario=' + Nombre_Usuario_Perfi;
    //console.log(url);
    try {
        let respuesta = await fetch (url, {
        method : 'get',
    });
    ProcesarInformacionLLenarEncabezado(await respuesta.json());
    await TraerSeguidoresoSeguidos(SessionIDUsuario,"TraerSeguidos");
    await TraerSeguidoresoSeguidos(SessionIDUsuario,"TraerSeguidores");
    //console.log("el id es ", Usuario.id_usuario);
    await EsSeguido(SessionIDUsuario, Usuario.id_usuario);
    
    }
    catch (error) {
        console.log('FALLO FETCH!');
        console.log(error);
    }
}




function LLenarDivPublicaciones() {
    const contenedor = document.getElementById("IDContenedorPublicacionesPropias"); // Selecciona el contenedor
    if(CantidadPublicaciones==0){
        const fragmentoHTML =`
        <div class="container-fluid row d-flex justify-content-center align-items-center mt-5">
            <div class="col-1"></div>
            <div class="col-10 text-center mt-5">
                <p class="h2 mt-5">Todavia no hay publicaciones!</p>
            </div>
            <div class="col-1"></div>
            <br>
        </div>`;
    // Agregar el fragmento de HTML al contenedor
    contenedor.innerHTML = fragmentoHTML;
    }
    
    else{

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
        let footerHTML = '';
        //await esFavorito();
        //if(esFavorito(Publicacion[i].id_publicacion) === true){
    if(Publicacion[i].esFavorito === true){
            footerHTML = `
            <button type="button" id="btn-favorito-${i}" class="btn btn-outline-danger me-1 favorito-activo" onclick="toggleFavorito(${Publicacion[i].id_publicacion}, ${SessionIDUsuario}, ${i})"> <i class="bi bi-heart-fill fs-5"></i></button>`; 
        }
        else{
            footerHTML = `
            <button type="button" id="btn-favorito-${i}" class="btn btn-outline-danger me-1" onclick="toggleFavorito(${Publicacion[i].id_publicacion},${SessionIDUsuario}, ${i})"> <i class="bi bi-heart-fill fs-5"></i></button>`; 
        }
        
        // Solo se ponen las etiquetas si la publicacion las tiene 

        const fragmentoHTML = `
            <div class="p-3 mt-2 col-xxl-4 col-xl-6 col-md-12 mx-auto" id="DivPublicacion${i}">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="card">
                            <div class="DivEncabezadoPublicacion d-flex justify-content-between align-items-center p-2">
                                <div class="d-flex align-items-center">
                                    <img class="d-inline" alt="Fperfil" src="${Usuario.foto_usuario}" width="35" height="35">
                                    <p class="d-inline p-1 mb-0" id="IDNombreCompletoDeUsuarioEnPublicacion">${Usuario.nom_completo}</p>
                                    <p class="d-inline text-secondary mb-0" id="IDNombreDeUsuarioEnPublicacion">  @${Usuario.username}</p>
                                </div>
                                <p class="text-secondary mb-0" id="IDFechaPublicacion">${Publicacion[i].fecha_publicacion}</p>
                            </div>
    
                            ${carouselHTML} <!-- Solo se muestra el carrusel si hay imágenes -->
    
                            <div class="card-body ">
                                <h5 class="card-title fs-5 aparecer-cursor d-inline" onclick="Redireccionar('EnMismaVentana','../recetas/receta-plantilla.php?id=${Publicacion[i].id_publicacion}')">${Publicacion[i].titulo}</h5>
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
${footerHTML}
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


document.addEventListener("DOMContentLoaded", async function () {
    Nombre_Usuario_Perfi = document.body.getAttribute('data-Nombre_Usuario');
    SessionIDUsuario = document.body.getAttribute('data-Session-IDUsuario');
    
    urlVariable = document.body.getAttribute('data-url-base');
    console.log(urlVariable);

    //si no se especifico un username valido, mostramos modal de error y lo redirigimos.
    if(Nombre_Usuario_Perfi === ""){
        CantidadPublicaciones = 0;
        LLenarDivPublicaciones();
        console.log("el cant es " + CantidadPublicaciones);
        showModal("Perfil no encontrado",false);
    }
    else{
        await LLenarEncabezado();
        await TraerPublicaciones();

    }

    document.getElementById("formReportarUsuario").addEventListener("submit", function (e){

        e.preventDefault();

        try {

            fetch('../CarpetaPerfil/reportarUsuario.php', {
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {
    
                /* console.log(data); */

                if (data.success == true) {

                    e.target.reset();
                    console.log("Usuario reportado con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Usuario reportado con éxito..";
    
                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
    
                }else{
                    
                    /* console.log(data); */


                    // Mostrar el toast de error
                    var toastElement = document.getElementById('formToastError');
                    document.getElementById("toast-error-msg").textContent = data.message;
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }
    
            });

        } catch (error) {
            console.error(error);
        }

    });
});



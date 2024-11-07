import { obtenerCategorias } from "./Scripts-Categorias/obtenerCategorias.js";
import { obtenerEtiquetas } from "./Scripts-Etiquetas/obtenerEtiquetas.js";
import { obtenerIngredientes } from "./Scripts-Ingredientes/obtenerIngredientes.js";
import { obtenerUsuariosReportados } from "./Scripts-Usuarios/obtenerUsuariosReportados.js";
import { obtenerComentariosReportados } from "./Scripts-Comentarios/obtenerComentariosReportados.js";
import { obtenerPublicacionesReportadas } from "./Scripts-Publicaciones/obtenerPublicacionesReportadas.js";

//Modales que muestro durante la gestión administrativa

const modalElement1 = document.getElementById('modalGestionCategoria');
const modalBootstrapCategorias = new bootstrap.Modal(modalElement1);

const modalElement2 = document.getElementById('modalGestionEtiqueta');
const modalBootstrapEtiquetas = new bootstrap.Modal(modalElement2);

const modalElement3 = document.getElementById('modalGestionIngrediente');
const modalBootstrapIngredientes = new bootstrap.Modal(modalElement3);

const modalElement4 = document.getElementById('modalEliminarItem');
const modalBootstrapEliminarItem = new bootstrap.Modal(modalElement4);

const modalElement5 = document.getElementById('modalEliminarObj');
const modalBootstrapEliminarObj = new bootstrap.Modal(modalElement5);

const modalElement6 = document.getElementById('modalSuspenderUsuario');
const modalBootstrapBaneos = new bootstrap.Modal(modalElement6);

//Listeners y lógica general

document.addEventListener("DOMContentLoaded", function (){

    verificarSeccion();

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

            fetch('../admin/Scripts-Categorias/crearCategoria.php', {
            
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

        }else if(e.target.dataset.accion == "editar"){

            fetch('../admin/Scripts-Categorias/editarCategoria.php', {
            
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
        }
    });

    document.getElementById("formulario-gestion-etiquetas").addEventListener("submit", function (e){

        e.preventDefault();

        if (e.target.dataset.accion == "crear") {

            fetch('../admin/Scripts-Etiquetas/crearEtiqueta.php', {
            
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

        }else if(e.target.dataset.accion == "editar"){

            fetch('../admin/Scripts-Etiquetas/editarEtiqueta.php', {
            
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

        }
    });

    document.getElementById("formulario-gestion-ingredientes").addEventListener("submit", function (e){
        e.preventDefault();

        let urlActual = window.location.href;
        let palabraClave = "recipes-web/";

            // Encuentra el índice de la palabra "recipes-web/" en la URL
        let indice = urlActual.indexOf(palabraClave);

        if (e.target.dataset.accion == "crear") {

            fetch('../admin/Scripts-Ingredientes/crearIngrediente.php', {
            
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

        }else if(e.target.dataset.accion == "editar"){

            fetch('../admin/Scripts-Ingredientes/editarIngrediente.php', {
            
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

        }
    });

    document.getElementById("formulario-eliminar-item").addEventListener("submit", function(e){

        e.preventDefault();

        if (location.hash == "#admin-categorias" || location.hash == "#" || location.hash == "") {

            fetch('../admin/Scripts-Categorias/eliminarCategoria.php', {
    
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                if (data.success == true) {
                    console.log("Categoria eliminada con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Categoria eliminada con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }else{
                    console.log("Error al eliminar categoría..");
                    document.getElementById("toast-error-msg").textContent = "Error al eliminar categoría..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                obtenerCategorias();

                modalBootstrapEliminarItem.hide();

            });

        }else if(location.hash == "#admin-etiquetas"){

            fetch('../admin/Scripts-Etiquetas/eliminarEtiqueta.php', {
    
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                if (data.success == true) {
                    console.log("Etiqueta eliminada con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Etiqueta eliminada con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }else{
                    console.log("Error al eliminar etiqueta..");
                    document.getElementById("toast-error-msg").textContent = "Error al eliminar etiqueta..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                obtenerEtiquetas();

                modalBootstrapEliminarItem.hide();

            });

        }else if(location.hash == "#admin-ingredientes"){

            fetch('../admin/Scripts-Ingredientes/eliminarIngrediente.php', {
    
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                if (data.success == true) {
                    console.log("Ingrediente eliminado con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Ingrediente eliminado con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }else{
                    console.log("Error al eliminar ingrediente..");
                    document.getElementById("toast-error-msg").textContent = "Error al eliminar ingrediente..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
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
                    console.log("Reportes de usuario eliminados con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Reportes de usuario eliminados con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }else{
                    console.log("Error al eliminar reportes de usuario..");
                    document.getElementById("toast-error-msg").textContent = "Error al eliminar reportes de usuario..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                obtenerUsuariosReportados();

                modalBootstrapEliminarItem.hide();

            });

        }else if(location.hash == "#admin-comentarios"){

            fetch('../admin/Scripts-Comentarios/ignorarReportesComentario.php', {
    
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                if (data.success == true) {
                    console.log("Reportes de comentario eliminados con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Reportes de comentario eliminados con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }else{
                    console.log("Error al eliminar reportes de comentario..");
                    document.getElementById("toast-error-msg").textContent = "Error al eliminar reportes de comentario..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                obtenerComentariosReportados();

                modalBootstrapEliminarItem.hide();

            });

        }else if(location.hash == "#admin-publicaciones"){

            fetch('../admin/Scripts-Publicaciones/ignorarReportesPublicacion.php', {
    
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                if (data.success == true) {
                    console.log("Reportes de publicacion eliminados con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Reportes de publicacion eliminados con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }else{
                    console.log("Error al eliminar reportes de publicación..");
                    document.getElementById("toast-error-msg").textContent = "Error al eliminar reportes de publicación..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                obtenerPublicacionesReportadas();

                modalBootstrapEliminarItem.hide();

            });
        }
    });
    
    document.getElementById("formulario-eliminar-obj").addEventListener("submit", function(e){

        e.preventDefault();

        if(location.hash == "#admin-comentarios"){

            fetch('../admin/Scripts-Comentarios/eliminarComentario.php', {
    
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                if (data.success == true) {
                    console.log("Comentario eliminado con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Comentario eliminado con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();

                }else{
                    console.log("Error al eliminar comentario..");

                    document.getElementById("toast-error-msg").textContent = "Error al eliminar comentario..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                obtenerComentariosReportados();

                modalBootstrapEliminarObj.hide();

            });

        }else if(location.hash == "#admin-publicaciones"){

            fetch('../admin/Scripts-Publicaciones/eliminarPublicacion.php', {
    
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                if (data.success == true) {
                    console.log("Publicación eliminada con éxito..");
                    document.getElementById("toast-success-msg").textContent = "Publicación eliminada con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }else{
                    console.log("Error al eliminar publicación..");
                    document.getElementById("toast-error-msg").textContent = "Error al eliminar publicación..";

                    var toastElement = document.getElementById('formToastError');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                obtenerPublicacionesReportadas();

                modalBootstrapEliminarObj.hide();

            });
        }

    });

    document.getElementById("formulario-ban").addEventListener("submit", function(e){

        e.preventDefault();

        fetch('../admin/Scripts-Usuarios/suspenderUsuario.php', {
    
            method: "POST",
            body: new FormData(e.target)
        })
        .then(res => res.json())
        .then(data => {

            /* console.log(data); */
            const inputDuracionBan = document.getElementById("inputDuracionBan");
            const inputPermaBan = document.getElementById("inputPermaBan");

            if (data.success == true) {

                e.target.reset();
                inputDuracionBan.removeAttribute('disabled');
                inputPermaBan.classList.add("bg-light");
                inputPermaBan.classList.remove("bg-danger");

                if (data.ban_permanente == true) {
                    
                    console.log("Usuario suspendido permanentemente..");
                    document.getElementById("toast-success-msg").textContent = "Usuario suspendido permanentemente..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                    
                }else{

                    console.log("Usuario suspendido temporalmente..");
                    document.getElementById("toast-success-msg").textContent = "Usuario suspendido temporalmente..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }

                modalBootstrapBaneos.hide();

            }else{
                console.log("Error al suspender usuario: " + data.message);
                document.getElementById("toast-error-msg").textContent = "Error al suspender usuario..";

                var toastElement = document.getElementById('formToastError');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }

            obtenerUsuariosReportados();

        });
    });

    document.getElementById("inputPermaBan").addEventListener("change", function (e){

        const inputDuracionBan = document.getElementById("inputDuracionBan");
        const inputPermaBan = document.getElementById("inputPermaBan");

        if (e.target.checked) {
            inputDuracionBan.value = '';
            inputDuracionBan.setAttribute('disabled', '');
            inputPermaBan.classList.remove("bg-light");
            inputPermaBan.classList.add("bg-danger");
        }else{
            inputDuracionBan.removeAttribute('disabled');
            inputPermaBan.classList.add("bg-light");
            inputPermaBan.classList.remove("bg-danger");
        }
        
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

function actualizarContadores(){

    fetch('../admin/PHPextras/contador.php', {
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

        console.log(data);

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
            panelBtn.setAttribute("data-bs-target", "#modalGestionIngrediente");
            
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
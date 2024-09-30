const inicio = function() {
    const tipoFiltro = document.getElementById("tipoFiltro");

    tipoFiltro.addEventListener("change", function() {
        const filtroSelect = tipoFiltro.value;

        ocultarFcategoria();
        ocultarFetiqueta();
        ocultarFingrediente();
        ocultarFpublicacion();
    

        if (filtroSelect === "ingredientes") {
            mostrarFingrediente();
        } else if (filtroSelect === "categoria") {
            mostrarFcategoria();
        } else if (filtroSelect === "publicacion") {
            mostrarFpublicacion();
        } else if (filtroSelect === "etiquetas") {
            mostrarFetiqueta();
        }
    });
}

function mostrarFingrediente() {
    const fingrediente = document.getElementById("ingrediente-filtro");
    fingrediente.classList.remove("d-none");
}

function ocultarFingrediente() {
    const fingrediente = document.getElementById("ingrediente-filtro");
    fingrediente.classList.add("d-none");
}

function mostrarFcategoria() {
    const fcategoria = document.getElementById("categoria-filtro");
    fcategoria.classList.remove("d-none");
}

function ocultarFcategoria() {
    const fcategoria = document.getElementById("categoria-filtro");
    fcategoria.classList.add("d-none");
}

function mostrarFpublicacion() {
    const fpublicacion = document.getElementById("publicacion-filtro");
    fpublicacion.classList.remove("d-none");
}

function ocultarFpublicacion() {
    const fpublicacion = document.getElementById("publicacion-filtro");
    fpublicacion.classList.add("d-none");
}

function mostrarFetiqueta() {
    const fetiqueta = document.getElementById("etiqueta-filtro");
    fetiqueta.classList.remove("d-none");
}

function ocultarFetiqueta() {
    const fetiqueta = document.getElementById("etiqueta-filtro");
    fetiqueta.classList.add("d-none");
}


window.onload = inicio;
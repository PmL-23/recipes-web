const inicio = function() {
    const tipoFiltro = document.getElementById("tipoFiltro");
    const filtroDiv = document.getElementById("filtro");
    const toggleFiltro = document.getElementById('toggleFiltro');

    // Muestra/oculta el filtro cuando se hace clic en el botón de filtro
    toggleFiltro.addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el clic se propague al documento
        if (filtroDiv.style.display === 'none' || filtroDiv.style.display === '') {
            filtroDiv.style.display = 'block';
        } else {
            filtroDiv.style.display = 'none';
        }
    });

    // Cierra el filtro si se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (!filtroDiv.contains(event.target) && !toggleFiltro.contains(event.target)) {
            filtroDiv.style.display = 'none';
        }
    });

    // Maneja los cambios en el select de filtro
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
document.addEventListener('click', function (event) {
    const filtroDiv = document.getElementById('filtro');
    const toggleFiltroButton = document.getElementById('toggleFiltro');

    if (!filtroDiv.contains(event.target) && !toggleFiltroButton.contains(event.target)) {
        filtroDiv.style.display = 'none'; // Oculta el filtro
    }
});

document.getElementById('toggleFiltro').addEventListener('click', function () {
    const filtroDiv = document.getElementById('filtro');
    if (!filtro.style.display === "none" || filtro.style.display === "") {
        filtro.style.display = "block";
    } else {
        filtro.style.display = "none";
    }
});

window.onload = inicio;

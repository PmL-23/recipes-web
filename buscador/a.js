const searchContainer = document.querySelector('.search-input-box');
const inputSearch = document.getElementById("campo");
const boxSuggestions = document.querySelector('.container-suggestions');
const content = document.getElementById("content"); // Asegúrate de tener este contenedor en tu HTML
const filtroDiv = document.getElementById('filtro');
const toggleFiltroButton = document.getElementById('toggleFiltro');

// Evento para buscar datos cuando se escribe en el campo de búsqueda
inputSearch.addEventListener("keyup", function () {
    let input = this.value.trim(); // Remover espacios

    // Solo ejecuta la búsqueda si el campo no está vacío
    if (input !== "") {
        getData(input); // Llama a la función para obtener datos de la DB
        getData2(); // Llama a la función adicional para obtener más datos
    } else {
        boxSuggestions.innerHTML = ""; // Limpia las sugerencias
        searchContainer.classList.remove('active'); // Oculta el contenedor de sugerencias
    }
});

// Función para obtener datos de la base de datos
function getData(input) {
    let url = "buscar.php"; // Ruta al archivo PHP
    let formData = new FormData();
    formData.append('campo', input);
    
    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Inserta los resultados en el contenedor
        boxSuggestions.innerHTML = data; // Ahora se inserta directamente

        // Mostrar contenedor de sugerencias
        if (data.trim() !== '<li>No se encontraron resultados.</li>') {
            searchContainer.classList.add('active');
        } else {
            searchContainer.classList.remove('active');
        }
    })
    .catch(err => console.log(err));
}

// Función para seleccionar un elemento de las sugerencias
function select(element) {
    let selectUserData = element.textContent;
    inputSearch.value = selectUserData;
    boxSuggestions.innerHTML = ""; // Limpia las sugerencias
    searchContainer.classList.remove('active'); // Oculta el contenedor de sugerencias
}

// Evento para cerrar el contenedor de sugerencias al hacer clic fuera
document.addEventListener('click', function (event) {
    if (!searchContainer.contains(event.target)) {
        boxSuggestions.innerHTML = ""; // Limpia las sugerencias
        searchContainer.classList.remove('active'); // Oculta el contenedor de sugerencias
    }
});

// Evento para mostrar el filtro cuando se hace clic en el botón 'Filtrar'
toggleFiltroButton.addEventListener('click', function () {
    // Alterna la visibilidad del filtro
    if (filtroDiv.style.display === "none" || filtroDiv.style.display === "") {
        filtroDiv.style.display = "block";
    } else {
        filtroDiv.style.display = "none";
    }
});

// Función para obtener datos adicionales
function getData2() {
    let input = document.getElementById("campo").value;
    let url = "buscar2.php";
    let formaData = new FormData();
    formaData.append('campo', input);
    
    fetch(url, {
        method: "POST",
        body: formaData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data; // Inserta el HTML generado
    })
    .catch(err => console.log(err));
}

// Función para mostrar la receta seleccionada
function mostrarReceta(id) {
    let url = "buscar2.php";
    let formData = new FormData();
    formData.append('campo', id); // Enviar el ID de la publicación como campo

    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data; // Inserta el HTML generado en el contenedor
        content.classList.remove('oculto'); // Mostrar el contenedor si estaba oculto
        document.querySelector('.buscador2').classList.add('ocultar'); // Ocultar el buscador
    })
    .catch(err => console.log(err));
}

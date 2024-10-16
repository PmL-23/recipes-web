const searchContainer = document.querySelector('.search-input-box');
const inputSearch = document.getElementById("campo");
const boxSuggestions = document.querySelector('.container-suggestions');

inputSearch.addEventListener("keyup", function () {
    let input = this.value.trim(); // Remover espacios

    // Solo ejecuta la búsqueda si el campo no está vacío
    if (input !== "") {
        getData(input); // Llama a la función para obtener datos de la DB
    } else {
        boxSuggestions.innerHTML = ""; // Limpia las sugerencias
        searchContainer.classList.remove('active'); // Oculta el contenedor de sugerencias
    }
});

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

function select(element) {
    let selectUserData = element.textContent;
    inputSearch.value = selectUserData;
    boxSuggestions.innerHTML = ""; // Limpia las sugerencias
    searchContainer.classList.remove('active'); // Oculta el contenedor de sugerencias
}
document.addEventListener('click', function (event) {
    const filtroDiv = document.getElementById('filtro');
    const toggleFiltroButton = document.getElementById('toggleFiltro');

    // Verifica si el clic ocurrió fuera del div 'filtro' y del botón 'Filtrar'
    if (!filtroDiv.contains(event.target) && !toggleFiltroButton.contains(event.target)) {
        filtroDiv.style.display = 'none'; // Oculta el filtro
    }
});

// Evento para mostrar el filtro cuando se hace clic en el botón 'Filtrar'
document.getElementById('toggleFiltro').addEventListener('click', function () {
    const filtroDiv = document.getElementById('filtro');
     // Alterna la visibilidad del filtro
     if (!filtro.style.display === "none" || filtro.style.display === "") {
        filtro.style.display = "block";
    } else {
        filtro.style.display = "none";
    }
}); 
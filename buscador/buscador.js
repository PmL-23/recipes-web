// Agregar el listener para el formulario
document.getElementById('buscarReceta').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

    let formData = new FormData(this); // Obtener los datos del formulario

    // Hacer la solicitud a buscar2.php usando AJAX (fetch)
    fetch('recetas.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text()) // Convertir la respuesta a texto
        .then(data => {
            document.getElementById('resultados').innerHTML = data; // Mostrar los resultados en el contenedor
        })
        .catch(err => console.log('Error:', err)); // Mostrar errores en la consola
});

// Agregar el listener para el botón Filtrar
document.querySelector('.filtrar-btn').addEventListener('click', function () {
    window.location.href = 'filtrar.php'; // Redirigir a filtrar.php
});
// Agregar el listener para el enlace con el ID 'pantallasChicas'
const pantallasChicas = document.getElementById('pantallasChicas');
const modalFiltros = document.getElementById('modalFiltros');
const closeModal = document.querySelector('.close-modal');

// Función para mostrar el modal
pantallasChicas.addEventListener('click', function(event) {
    event.preventDefault(); // Prevenir el comportamiento por defecto del enlace
    modalFiltros.classList.remove('oculto'); // Mostrar el modal
});

// Función para cerrar el modal al hacer clic en el botón de cierre
closeModal.addEventListener('click', function() {
    modalFiltros.classList.add('oculto'); // Ocultar el modal
});

// Función para cerrar el modal al hacer clic fuera del contenido del modal
window.addEventListener('click', function(event) {
    if (event.target === modalFiltros) {
        modalFiltros.classList.add('oculto'); // Ocultar el modal si se hace clic fuera de él
    }
});

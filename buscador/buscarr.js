document.addEventListener("DOMContentLoaded", function () {
    let buscarReceta = document.getElementById('buscarReceta'); 
    let pantallasChicas = document.getElementById('pantallasChicas');
    let pantallaGrande = document.getElementById('pantallaGrande');
    let modalFiltros = document.getElementById('modalFiltros');
    let cerrarModal = document.querySelector('.close-modal');
    let resultados = document.getElementById("resultados");
    let botonFiltro = document.querySelector('.filtrar-btn'); 
    let aplicarModalFiltros = document.getElementById("aplicarModalFiltros");

    buscarReceta.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(this); 

        fetch('recetas.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                resultados.innerHTML = data;
                console.log("Contenido recibido:", data);
                if (data.trim() !== "") { 
                    pantallaGrande.classList.remove('oculto');
                    console.log("pantallaGrande se muestra");
                }
            })
            .catch(err => console.log('Error:', err));
    });

    // Mostrar filtro para pantallas grandes al hacer clic en el botón de filtro
    botonFiltro.addEventListener('click', function () {
        pantallaGrande.classList.toggle('oculto'); // Muestra/oculta el div pantallaGrande
    });

    // modal
    pantallasChicas.addEventListener('click', function (event) {
        event.preventDefault(); 
        modalFiltros.classList.remove('oculto'); 
    });
    cerrarModal.addEventListener('click', function () {
        modalFiltros.classList.add('oculto'); 
    });
    aplicarModalFiltros.addEventListener('click', function () {
        modalFiltros.classList.add('oculto'); 
    });

    // Cerrar el modal al hacer clic fuera del contenido del modal
    window.addEventListener('click', function (event) {
        if (event.target === modalFiltros) {
            modalFiltros.classList.add('oculto'); 
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {

    let buscarReceta = document.getElementById('buscarReceta'); //buscador que tenemos como form
    let pantallasChicas = document.getElementById('pantallasChicas');
    let pantallaGrande = document.getElementById('pantallaGrande');
    let modalFiltros = document.getElementById('modalFiltros');
    let cerrarModal = document.querySelector('.close-modal');
    let resultados = document.getElementById("resultados");

    buscarReceta.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(this); //datos del formulario

        fetch('recetas.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                resultados.innerHTML = data; // resultados en el contenedor
                // Depuración en la consola para ver el contenido recibido
                console.log("Contenido recibido:", data);
                if (data.trim() !== "") { 
                    pantallaGrande.classList.remove('oculto');
                    console.log("pantallaGrande se muestra"); // Verificar en la consola
                }
            })
            .catch(err => console.log('Error:', err));


    });
    
    //modal
    pantallasChicas.addEventListener('click', function (event) {
        event.preventDefault(); 
        modalFiltros.classList.remove('oculto'); 
    });
    cerrarModal.addEventListener('click', function () {
        modalFiltros.classList.add('oculto'); 
    });

    // cerrar el modal al hacer clic fuera del contenido del modal
    window.addEventListener('click', function (event) {
        if (event.target === modalFiltros) {
            modalFiltros.classList.add('oculto'); 
        }
    });

});
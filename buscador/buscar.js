document.addEventListener("DOMContentLoaded", function () {

    let buscarReceta = document.getElementById('buscarReceta');
    let pantallasChicas = document.getElementById('pantallasChicas');
    let pantallaGrande = document.getElementById('pantallaGrande');
    let modalFiltros = document.getElementById('modalFiltros');
    let modalBuscarIngrediente = document.getElementById('modalBuscarIngrediente');
    let buscarIngrediente = document.getElementById("buscarIngrediente");
    let buscarIngredientePantallaChica = document.getElementById("buscarIngredientePantallaChica");
    let cerrarModalBuscar = document.getElementById("cerrarModal");
    let cerrarModal = document.querySelector('.close-modal');
    let resultados = document.getElementById("resultados");
    let botonFiltro = document.querySelector('.filtrar-btn');
    let aplicarModalFiltros = document.getElementById("aplicarModalFiltros");
    let aplicarModalFiltrosBuscar = document.getElementById("aplicarModalFiltrosBuscar");
    let filtrarRecetaModal = document.getElementById('filtrarRecetaModal');
    let filtrarBusquedaIngrediente = document.getElementById('filtrarBusquedaIngrediente');
    let filtrarBusquedaIngredienteChico = document.getElementById('filtrarBusquedaIngredienteChico');
    let limpiarFiltrosModal = document.getElementById('limpiarFiltrosModal');
    let limpiarFiltros = document.getElementById('limpiarFiltros');
    let formFiltros = document.getElementById('filtrarReceta');

    // restablece los selects
    limpiarFiltros.addEventListener('click', function () {
        const selects = formFiltros.querySelectorAll('select');
        selects.forEach(select => select.selectedIndex = 0);
        console.log('click');

    });

    //restablece los selects
    limpiarFiltrosModal.addEventListener('click', function () {
        const selects = filtrarRecetaModal.querySelectorAll('select');
        selects.forEach(select => select.selectedIndex = 0);
        console.log('click');

    });

    filtrarRecetaModal.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch('aplicandoFiltros.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                resultados.innerHTML = data;
            })
            .catch(err => console.error('Error en el filtrado:', err));
    });

    aplicarModalFiltrosBuscar.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch('ingredientes.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                resultados.innerHTML = data;
            })
            .catch(err => console.error('Error en el filtrado:', err));
    });

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

    // mostrar filtro para pantallas grandes al hacer clic en el boton de filtro
    botonFiltro.addEventListener('click', function () {
        pantallaGrande.classList.toggle('oculto'); // muestra/oculta el div pantallaGrande
    });

    // modal para buscar ingredientes
    buscarIngrediente.addEventListener('click', function (event) {
        console.log('click');

        event.preventDefault();
        modalBuscarIngrediente.classList.remove('oculto');
    });

    cerrarModalBuscar.addEventListener('click', function () {
        modalBuscarIngrediente.classList.add('oculto');
    });

    // modal para buscar ingredientes
    buscarIngredientePantallaChica.addEventListener('click', function (event) {
        console.log('click');

        event.preventDefault();
        modalBuscarIngrediente.classList.remove('oculto');
        filtrarBusquedaIngrediente.classList.add('oculto');
        filtrarBusquedaIngredienteChico.classList.remove('oculto');
    });

    cerrarModalBuscar.addEventListener('click', function () {
        modalBuscarIngrediente.classList.add('oculto');
    });


    filtrarBusquedaIngrediente.addEventListener('click', function () {
        modalBuscarIngrediente.classList.add('oculto');
    });

    filtrarBusquedaIngredienteChico.addEventListener('click', function () {
        modalBuscarIngrediente.classList.add('oculto');
        modalFiltros.classList.add('oculto');
    });

    // Cerrar el modal al hacer clic fuera del contenido del modal
    window.addEventListener('click', function (event) {
        if (event.target === modalBuscarIngrediente) {
            modalBuscarIngrediente.classList.add('oculto');
        }
    });

    // modal pantalla chica
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

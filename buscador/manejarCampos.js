document.addEventListener("DOMContentLoaded", () => {
    
    const agregarIngredienteBtn = document.getElementById("agregar-ingrediente");
    const limiteMensaje = document.getElementById("limite-mensaje");
    const campos = ["mostrarCampo3", "mostrarCampo4", "mostrarCampo5"];
    const eliminarUltimoCampoBtn = document.getElementById("eliminarUltimoCampo");
    let campoActual = 0;

    // filtrar por mas ingredientes
    const mostrarCampo = () => {
        if (campoActual < campos.length) {
            document.getElementById(campos[campoActual]).classList.remove("oculto");
            campoActual++;
            limiteMensaje.classList.add("d-none"); 
        } else {
            limiteMensaje.classList.remove("d-none"); // mensaje de limite 
        }
        actualizarBotonEliminar(); 
    };

    // eliminar los inputs
    const eliminarUltimoCampo = () => {
        if (campoActual > 0) {
            campoActual--; 
            const ultimoCampo = document.getElementById(campos[campoActual]);
            const input = ultimoCampo.querySelector("input");

            input.value = ""; 
            ultimoCampo.classList.add("oculto"); 
            limiteMensaje.classList.add("d-none"); 
        }
        actualizarBotonEliminar(); 
    };

    // manejar boton eliminar input
    const actualizarBotonEliminar = () => {
        if (campoActual > 0) { 
            eliminarUltimoCampoBtn.classList.remove("d-none");
        } else {
            eliminarUltimoCampoBtn.classList.add("d-none");
        }
    };

    // agregar campos de ingredientes
    agregarIngredienteBtn.addEventListener("click", mostrarCampo);

    // eliminar el último campo
    eliminarUltimoCampoBtn.addEventListener("click", eliminarUltimoCampo);

    actualizarBotonEliminar();
});

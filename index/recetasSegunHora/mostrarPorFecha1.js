document.addEventListener("DOMContentLoaded", function() {

    const saludoDiv = document.getElementById('saludoDia');
    const mensajeRecetasDiv = document.getElementById('mensajeRecetas'); // Nuevo div para el mensaje adicional

    // Obtener la hora actual
    const horaActual = new Date().getHours();

    // Cambiar el saludo y la clase según la hora
    if (horaActual >= 6 && horaActual < 11) {
        saludoDiv.textContent = "Buenos días";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >"; // Mostrar mensaje adicional
    } else if (horaActual >= 11 && horaActual < 15) {
        saludoDiv.textContent = "Buenas tardes";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >";
    } else if (horaActual >= 15 && horaActual < 18) {
        saludoDiv.textContent = "Buenas tardes";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >";
    } else if (horaActual >= 18 && horaActual <= 23) {
        saludoDiv.textContent = "Buenas noches";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >";
    } else {
        mostrarSecciones('madrugada');
        saludoDiv.textContent = "Ya es de madrugada!";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >";
    }
    // Función para mostrar las secciones correctas
    function mostrarSecciones(comida) {
        const seccionesComida = document.querySelectorAll(`.seccion.${comida}`);
        seccionesComida.forEach(seccion => {
            seccion.classList.remove('oculto');
        });
    }

});

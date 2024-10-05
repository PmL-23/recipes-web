document.addEventListener("DOMContentLoaded", function() {
    const secciones = document.querySelectorAll('.seccion');
    const saludoDiv = document.getElementById('saludoDia');
    const mensajeRecetasDiv = document.getElementById('mensajeRecetas'); // Nuevo div para el mensaje adicional

    // Ocultar todas las secciones inicialmente
    secciones.forEach(seccion => {
        seccion.classList.add('oculto');
    });

    // Obtener la hora actual
    const horaActual = new Date().getHours();

    // Cambiar el saludo y la clase según la hora
    if (horaActual >= 6 && horaActual < 11) {
        // Desayuno (6:00 AM - 10:59 AM)
        mostrarSecciones('desayuno');
        saludoDiv.textContent = "Buenos días";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >"; // Mostrar mensaje adicional
    } else if (horaActual >= 11 && horaActual < 15) {
        // Almuerzo (11:00 AM - 2:59 PM)
        mostrarSecciones('almuerzo');
        saludoDiv.textContent = "Buenas tardes";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >";
    } else if (horaActual >= 15 && horaActual < 18) {
        // Merienda (3:00 PM - 5:59 PM)
        mostrarSecciones('merienda');
        saludoDiv.textContent = "Buenas tardes";
        mensajeRecetasDiv.textContent = "Estas son nuestras recetas para ti >";
    } else if (horaActual >= 18 && horaActual <= 23) {
        // Cena (6:00 PM - 11:59 PM)
        mostrarSecciones('cena');
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

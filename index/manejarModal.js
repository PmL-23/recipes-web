document.addEventListener("DOMContentLoaded", function() {
// Mostrar el modal al hacer clic en "Ver Receta"
const verRecetaButtons = document.querySelectorAll(".btn.btn-primary");
const modal = document.querySelectorAll(".modal"); // Selecciona todos los modales
const cerrarModal = document.querySelectorAll(".cerrar"); // Selecciona todos los botones de cerrar

verRecetaButtons.forEach(button => {
    button.addEventListener("click", function (event) {
        event.preventDefault(); // Evita que el enlace realice una acción por defecto

        // Obtener el ID del modal desde el atributo data-modal
        const modalId = button.getAttribute("data-modal");
        const modalToShow = document.getElementById(modalId);

        // Mostrar el modal correspondiente
        modalToShow.classList.add("mostrar"); // Agrega la clase para mostrar el modal
        document.body.classList.add("no-scroll"); // Desactiva el scroll
    });
});

// Cerrar el modal
cerrarModal.forEach(cerrar => {
    cerrar.addEventListener("click", function () {
        const modalToHide = cerrar.closest(".modal"); // Encuentra el modal padre
        modalToHide.classList.remove("mostrar"); // Quita la clase para ocultar el modal
        document.body.classList.remove("no-scroll"); // Reactiva el scroll
    });
});

// Cerrar el modal si se hace clic fuera del contenido del modal
window.addEventListener("click", function (event) {
    modal.forEach(m => {
        if (event.target === m) {
            m.classList.remove("mostrar"); // Quita la clase para ocultar el modal
            document.body.classList.remove("no-scroll"); // Reactiva el scroll
        }
    });
});
});


function seccion(seccionAMostrar) {

    const desayunoSeccion = document.querySelectorAll('.desayuno');
    const almuerzoSeccion = document.querySelectorAll('.almuerzo');
    const meriendaSeccion = document.querySelectorAll('.merienda');
    const cenaSeccion = document.querySelectorAll('.cena');

    //mostrar todo desde un principio
    if (seccionAMostrar === 'todos') {
        desayunoSeccion.forEach(elemento => elemento.classList.remove('ocultar'));//removemos la clase ocultar de cada elemento osea cada recete de el sector desayuno
        almuerzoSeccion.forEach(elemento => elemento.classList.remove('ocultar'));
        meriendaSeccion.forEach(elemento => elemento.classList.remove('ocultar'));
        cenaSeccion.forEach(elemento => elemento.classList.remove('ocultar'));
    } else {
        // primero mostramos todas las secciones para ir ocultando segun lo seleccionado
        desayunoSeccion.forEach(elemento => elemento.classList.remove('ocultar'));
        almuerzoSeccion.forEach(elemento => elemento.classList.remove('ocultar'));
        meriendaSeccion.forEach(elemento => elemento.classList.remove('ocultar'));
        cenaSeccion.forEach(elemento => elemento.classList.remove('ocultar'));

        // una vez que se oculta se muestra el correspondiente 
        if (seccionAMostrar !== 'desayuno') desayunoSeccion.forEach(elemento => elemento.classList.add('ocultar'));
        if (seccionAMostrar !== 'almuerzo') almuerzoSeccion.forEach(elemento => elemento.classList.add('ocultar'));
        if (seccionAMostrar !== 'merienda') meriendaSeccion.forEach(elemento => elemento.classList.add('ocultar'));
        if (seccionAMostrar !== 'cena') cenaSeccion.forEach(elemento => elemento.classList.add('ocultar'));
    }
}
function mostrar() {
    let todos = document.getElementById("todos");
    let desayuno = document.getElementById("desayuno");
    let almuerzo = document.getElementById("almuerzo");
    let merienda = document.getElementById("merienda");
    let cena = document.getElementById("cena");

    todos.addEventListener('click', function () {
        seccion('todos');
    });
    desayuno.addEventListener('click', function () {
        seccion('desayuno');
    });
    almuerzo.addEventListener('click', function () {
        seccion('almuerzo');
    });
    merienda.addEventListener('click', function () {
        seccion('merienda');
    });
    cena.addEventListener('click', function () {
        seccion('cena');
    });
    //llevar a pagina principal
    let titulo = document.getElementById("tituloRecetas");
    titulo.addEventListener("click", function () {
        // redirige a index.html que está en la carpeta general proyecto_lp
        window.location.href = "../../index.html";
    });

    //añadir menu
    const menuToggle = document.getElementById("menuToggle");
    const menuList = document.querySelector(".menu-list");

    // Agregar evento de clic al ícono del menú
    menuToggle.addEventListener("click", function () {
        menuList.classList.toggle("active");
    });

    //MODAL

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
}
window.onload = mostrar;

function toggleMenu(event) {

    // Evitar que el evento de clic se propague fuera del menú
    event.stopPropagation();
      
    const menu = event.target.closest('.comentario-header').querySelector('.acciones-menu');
    const isMenuVisible = menu.style.display === 'block';
      
    // Ocultar todos los menús antes de mostrar el menú seleccionado
    document.querySelectorAll('.acciones-menu').forEach( (element) => {
        element.style.display = 'none';
    });
      
    // Mostrar u ocultar el menú específico
    menu.style.display = isMenuVisible ? 'none' : 'block';
      
    // Agregar un evento para cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', closeMenuOnOutsideClick);
      
    function closeMenuOnOutsideClick(e) {

        if (!menu.contains(e.target)) {
            menu.style.display = 'none';
            document.removeEventListener('click', closeMenuOnOutsideClick);
        }

    }
}
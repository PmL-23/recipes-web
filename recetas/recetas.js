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



    const confirmarEliminar= document.getElementById('confirmar-eliminar');
    confirmarEliminar.addEventListener('click', function(e) {

            e.preventDefault();
        
            let urlActual = window.location.href;
            let palabraClave = "recipes-web/";
            let indice = urlActual.indexOf(palabraClave);
            let urlParams = new URLSearchParams(window.location.search); 
            let id_publicacion = urlParams.get('id'); 
        
            if (indice !== -1) {
                    let urlCortada = urlActual.substring(0, indice + palabraClave.length);
        
                            if (id_publicacion) {  
        
                            fetch(urlCortada + "recetas/procesar-eliminar-receta.php?id=" + id_publicacion, {
                                    method: "POST",
                            })
                            .then(res => res.json())
                            .then(data => {
                                console.log("data", data);
                                if (data.success == true) {
                                console.log("Receta eliminada con éxito");
                                window.location.href = "../index/index.php";
        
                                }else{

                                    console.log('Errores:', data.errors);
                                    console.log('Errores:', data.message);
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                            });
                            
                    
                }
            }
        
        });


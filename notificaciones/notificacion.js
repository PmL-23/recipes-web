document.addEventListener('DOMContentLoaded', function() {
    const btnNotificaciones = document.querySelector('#btnNotificaciones'); 
    const contenidoNotificaciones = document.querySelector('.dropdown-menu'); 

    if (btnNotificaciones) {
        btnNotificaciones.addEventListener('click', function() {
            fetch('../notificaciones/cargar_notificaciones.php')
                .then(response => response.json())
                .then(data => {

                    contenidoNotificaciones.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(notificacion => {
                            const notificacionElement = document.createElement('li');
                            notificacionElement.innerHTML = `<a class='dropdown-item' href='#'>${notificacion.username} publicó una receta: "${notificacion.titulo}" el ${notificacion.fecha}</a>`;
                            contenidoNotificaciones.appendChild(notificacionElement);
                        });
                    } else {
                        contenidoNotificaciones.innerHTML = '<li><a class="dropdown-item" href="#">No tienes nuevas notificaciones.</a></li>';
                    }
                })
                .catch(error => console.error('Error al cargar notificaciones:', error));
        });
    } else {
        console.error('no hay botón de notificaciones');
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const btnNotificaciones = document.querySelector('#btnNotificaciones');
    const contenidoNotificaciones = document.querySelector('.notificacion');

    if (btnNotificaciones) {
        btnNotificaciones.addEventListener('click', function() {
            fetch('../notificaciones/cargar_notificaciones.php')
                .then(response => response.json())
                .then(data => {
                    contenidoNotificaciones.innerHTML = ''; 

                    if (data.length > 0) {
                        data.forEach(notificacion => {
                            const notificacionElement = document.createElement('li');
                            let notificacionMensaje = '';
                            let enlace = '';

                            switch (notificacion.tipo) {
                                case 'nuevo_seguidor':
                                    notificacionMensaje = `<strong>${notificacion.username}</strong> te ha seguido`;
                                    enlace = `<a class='dropdown-item' href='../CarpetaPerfil/perfil.php?id=${notificacion.id_seguidor}' data-id="${notificacion.id_notificacion}">
                                                ${notificacionMensaje}<br><small class='text-muted'>${notificacion.fecha}</small></a>`;
                                    break;
                                case 'nuevo_comentario':
                                    notificacionMensaje = `<strong>${notificacion.username}</strong> comentó en tu receta: <em>"${notificacion.titulo}"</em>`;
                                    enlace = `<a class='dropdown-item' href='../recetas/receta-plantilla.php?id=${notificacion.id_publicacion}' data-id="${notificacion.id_notificacion}">
                                                ${notificacionMensaje}<br><small class='text-muted'>${notificacion.fecha}</small></a>`;
                                    break;
                                case 'nueva_publicacion':
                                    notificacionMensaje = `<strong>${notificacion.username}</strong> publicó una receta: <em>"${notificacion.titulo}"</em>`;
                                    enlace = `<a class='dropdown-item' href='../recetas/receta-plantilla.php?id=${notificacion.id_publicacion}' data-id="${notificacion.id_notificacion}">
                                                ${notificacionMensaje}<br><small class='text-muted'>${notificacion.fecha}</small></a>`;
                                    break;
                            }

                            notificacionElement.innerHTML = enlace; 
                            contenidoNotificaciones.appendChild(notificacionElement);
                        });
                    } else {
                        contenidoNotificaciones.innerHTML = '<li><a class="dropdown-item" href="#">No tienes nuevas notificaciones.</a></li>';
                    }
                })
                .catch(error => console.error('Error al cargar notificaciones:', error));
        });      
    } else {
        console.error('No hay botón de notificaciones');
    }
});

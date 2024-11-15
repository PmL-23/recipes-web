// marcarNotificacionVista.js
document.addEventListener('DOMContentLoaded', function() {
    console.log('El DOM ha sido cargado');

    const enlacesNotificaciones = document.querySelectorAll('.dropdown-menu a[data-id]');

    enlacesNotificaciones.forEach(notificacionLink => {
        notificacionLink.addEventListener('click', function(event) {
            event.preventDefault(); 

            const idNotificacion = notificacionLink.getAttribute('data-id');
            //console.log('ID de la notificación al hacer clic:', idNotificacion); 
            fetch('../notificaciones/notificacion_vista.php?id_notificacion=' + idNotificacion, {
                method: 'GET', 
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(response => response.json())
            .then(result => {
                console.log('Resultado de marcar la notificación:', result);
                if (result.success) {
                    console.log('Notificación marcada como vista');
                } else {
                    console.error('Error al marcar notificación como vista');
                }
            })
            .catch(error => console.error('Error al hacer la solicitud:', error));
            window.location.href = notificacionLink.href;
        });
    });
});

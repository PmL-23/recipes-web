document.addEventListener('DOMContentLoaded', function() {
    //console.log('El DOM ha sido cargado'); 

    const dropdownMenu = document.querySelector('.dropdown-menu.notificacion'); 
    
  
    dropdownMenu.addEventListener('click', function(event) {
        const notificacionLink = event.target.closest('a[data-id]'); 
        
        if (notificacionLink) {
            //console.log('Clic en notificación');

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
                //console.log('Resultado de marcar la notificación:', result);
                if (result.success) {
                    //console.log('Notificación marcada como vista');
                } else {
                    //console.error('Error al marcar la notificación como vista');
                }
            })
            .catch(error => console.error('Error al hacer la solicitud:', error));
        }
    });
});

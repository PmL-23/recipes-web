function showModal(message, isSuccess) {
    const modalContent = document.getElementById('modalContent');
    const modalMessage = document.getElementById('modalMessage');
    const modalIcon = document.getElementById('modalIcon');

    // Limpiar clases previas
    modalContent.classList.remove('success', 'error');
    modalIcon.classList.remove('success-icon', 'error-icon');

    if (isSuccess) {
        modalContent.classList.add('success');
        modalIcon.classList.add('success-icon');
    } else {
        modalContent.classList.add('error');
        modalIcon.classList.add('error-icon');
    }

    modalMessage.textContent = message;
    const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
    resultModal.show();
    document.getElementById('resultModal').addEventListener('hidden.bs.modal', () => {
        //window.location.href =
    });
}

function eliminarPublicacion(id) {
    let boton_eliminar = document.getElementById('boton_eliminar');
    boton_eliminar.textContent = "";
    if (confirm('¿Estás seguro de que deseas eliminar esta publicación?')) {
        fetch('eliminar_publicacion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + encodeURIComponent(id)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.text(); 
        })
        .then(data => {
            console.log('Respuesta del servidor:', data);
            try {
            
                const jsonData = JSON.parse(data);
                if (jsonData.status === 'success') {
                    boton_eliminar.textContent = "Publicación eliminada";
                    showModal("Publicación eliminada exitosamente!", true, true);
                    //location.reload();
                } else {
                    boton_eliminar.textContent = "Error al eliminar";
                    showModal("Error al eliminar!",false, false);
                }
            } catch (error) {
                console.error('Error al parsear JSON:', error);
                boton_eliminar.textContent = "Error al intentar procesar la solicitud";   // Mostrar un mensaje al usuario
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function compartirReceta(idPublicacion) {
    const enlaceReceta = `http://localhost/xampp/proyecto_final/recipes-web/recetas/receta-plantilla.php?id=${idPublicacion}`;  //Link de la receta
    
    navigator.clipboard.writeText(enlaceReceta) //Para copiar el link en el portapapeles
        .then(() => {
            boton_eliminar.textContent = "Enlace copiado en el portapapeles";
        })
        .catch(err => {
            console.error("Error al copiar el enlace: ", err);
        });
}





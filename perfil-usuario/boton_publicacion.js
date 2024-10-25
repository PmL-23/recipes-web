function eliminarPublicacion(id) {
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
                    alert('¡Publicación eliminada correctamente!'); // Mostrar un mensaje al usuario
                    location.reload(); 
                } else {
                    alert(jsonData.message);
                }
            } catch (error) {
                console.error('Error al parsear JSON:', error);
                alert('Ocurrió un error al procesar la respuesta.');    // Mostrar un mensaje al usuario
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error: ' + error.message); // Mostrar un mensaje al usuario
        });
    }
}

function compartirReceta(idPublicacion) {
    const enlaceReceta = `http://localhost/xampp/proyecto_final/recipes-web/recetas/receta.php?id=${idPublicacion}`;  //Link de la receta
    
    navigator.clipboard.writeText(enlaceReceta) //Para copiar el link en el portapapeles
        .then(() => {
            alert("El enlace de la receta ha sido copiado al portapapeles."); 
        })
        .catch(err => {
            console.error("Error al copiar el enlace: ", err);
        });
}





document.addEventListener('DOMContentLoaded', () => {
    const imagenUsuario = document.getElementById('imagenPerfil');
    const btnCambiar = document.getElementById('btnCambiarImagen');
    const modal = new bootstrap.Modal(document.getElementById('modalCambiarImagen'));
    const imagenError = document.getElementById('imagenError'); 

    // Para que el botón aparezca oculto
    btnCambiar.style.display = 'none';

    // Mostrar / ocultar boton "cambiar imagen"
    const mostrarBoton = () => {
        btnCambiar.style.display = 'block';
    };

    const ocultarBoton = () => {
        btnCambiar.style.display = 'none';
    };

    // Eventos para la imagen
    imagenUsuario.addEventListener('mouseenter', mostrarBoton);
    imagenUsuario.addEventListener('mouseleave', ocultarBoton);

    // Eventos para el botón
    btnCambiar.addEventListener('mouseenter', mostrarBoton);
    btnCambiar.addEventListener('mouseleave', ocultarBoton);

    btnCambiar.addEventListener('click', () => {
        modal.show();
    });

    const inputImagen = document.getElementById('inputImagen');
    const nombreImagen = document.getElementById('nombreImagen');

    inputImagen.addEventListener('change', () => {
        if (inputImagen.files.length > 0) {
            nombreImagen.textContent = inputImagen.files[0].name;
        } else {
            nombreImagen.textContent = '';
        }
    });

    const btnConfirmar = document.getElementById('btnConfirmar');

    btnConfirmar.addEventListener('click', () => {
        const form = document.getElementById('formCambiarImagen');
        const formData = new FormData(form);

        imagenError.textContent = '';

        fetch('cambiar_imagen.php', { // ruta a donde se envía la imagen cargada en el modal
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualiza el URL de la imagen de perfil
                imagenUsuario.src = '../fotos_usuario/' + data.foto_usuario;
                modal.hide(); 
            } else {
                imagenError.textContent = data.error || 'Error desconocido al cambiar la imagen.';
            }
        })
        .catch(error => {

            console.error('Error:', error);
            imagenError.textContent = 'Error en la comunicación con el servidor.';
        });
    });
});

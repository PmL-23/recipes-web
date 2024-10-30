function editarDescripcion() {
    const descripcionText = document.getElementById('descripcionText');
    const descripcionInput = document.getElementById('descripcionInput');
    const descripcionButtons = document.getElementById('descripcionButtons');

    
    descripcionInput.value = descripcionText.innerText; 
    descripcionText.style.display = 'none';
    descripcionInput.style.display = 'block';
    descripcionButtons.style.display = 'block';
}

function cancelarEdicion() {
    const descripcionText = document.getElementById('descripcionText');
    const descripcionInput = document.getElementById('descripcionInput');
    const descripcionButtons = document.getElementById('descripcionButtons');

    descripcionText.style.display = 'block';
    descripcionInput.style.display = 'none';
    descripcionButtons.style.display = 'none';
}

function guardarDescripcion(usuarioId) {
    const nuevaDescripcion = document.getElementById('descripcionInput').value;

    fetch('guardar_descripcion.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: usuarioId, descripcion: nuevaDescripcion })
    })
    .then(response => response.text()) 
    .then(data => {
        try {
            const jsonData = JSON.parse(data);
            if (jsonData.success) {
                document.getElementById('descripcionText').innerText = nuevaDescripcion;
                cancelarEdicion();
            } else {
                alert('Error al guardar la descripción: ' + (jsonData.message || ''));
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error);
            alert('Error inesperado.'); 
        }
    })
    .catch(error => console.error('Error:', error));
}


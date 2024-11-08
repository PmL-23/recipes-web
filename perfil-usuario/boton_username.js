function editarUsername() {
    const usernameText = document.getElementById('usernameText');
    const usernameInput = document.getElementById('usernameInput');
    const usernameButtons = document.getElementById('usernameButtons');

    usernameInput.value = usernameText.innerText.trim().substring(1);
    usernameText.style.display = 'none';
    usernameInput.style.display = 'block';
    usernameButtons.style.display = 'block';
}

function cancelarEdicion() {
    const usernameText = document.getElementById('usernameText');
    const usernameInput = document.getElementById('usernameInput');
    const usernameButtons = document.getElementById('usernameButtons');

    usernameText.style.display = 'block';
    usernameInput.style.display = 'none';
    usernameButtons.style.display = 'none';
}

function guardarUsername(usuarioId) {
    const nuevoUsername = document.getElementById('usernameInput').value;
    const usernameError = document.getElementById('usernameError');

    usernameError.textContent = '';

    fetch('guardar_username.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: usuarioId, username: nuevoUsername }) 
    })
    .then(response => response.text()) 
    .then(data => {
        try {
            const jsonData = JSON.parse(data);
            if (jsonData.success) {
                document.getElementById('usernameText').innerText = '@' + nuevoUsername;
                cancelarEdicion();
            } else {
                usernameError.textContent = jsonData.message || 'Error al guardar el nombre de usuario.';
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error);
            usernameError.textContent = 'Error inesperado al guardar el nombre de usuario.';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        usernameError.textContent = 'Error en la comunicación con el servidor.';
    });
}



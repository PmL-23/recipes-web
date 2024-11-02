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
    const error_username = document.getElementById('error-username');

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
                alert('Error al guardar el nombre de usuario: ' + (jsonData.message || ''));
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error);
            alert('Error inesperado.'); 
        }
    })
    .catch(error => console.error('Error:', error));
}

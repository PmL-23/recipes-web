document.addEventListener('DOMContentLoaded', function() { 
    const borrarCuentaBtn = document.getElementById('borrarCuenta');
    const confirmBorrarBtn = document.getElementById('confirmarBorrarBtn');
    const modalBorrar = new bootstrap.Modal(document.getElementById('confirmBorrarModal'));

    borrarCuentaBtn.addEventListener('click', function() {
        modalBorrar.show();
    });

    confirmBorrarBtn.addEventListener('click', function() {

        modalBorrar.hide();
        fetch('./borrarCuenta.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.success) {

                alert('Cuenta borrada exitosamente');
                window.location.href = '../index/index.php'; 
            } else {
                alert('No se pudo borrar la cuenta.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error.');
        });
    });
});

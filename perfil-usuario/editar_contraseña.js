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
    
    // Configurar el modal principal
    const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
    
    // Cambia la opacidad del modal anterior y añade fondo oscuro
    document.querySelectorAll('.modal.show').forEach(modal => {
        modal.style.opacity = '0.76'; // Aplica opacidad al modal anterior
    });

    // Mostrar el modal con la opacidad del fondo
    resultModal.show();

    // Restablece la opacidad cuando se cierra el modal principal
    document.getElementById('resultModal').addEventListener('hidden.bs.modal', () => {
        document.querySelectorAll('.modal').forEach(modal => {
            modal.style.opacity = ''; // Restaurar opacidad original
        });
    });
}

function CambiarContraseñaUsuario(urlVariable, ContraseñaActual, NuevaContraseña, ConfirmaciónNuevaContraseña, IDUsuario){

    //console.log('estoy en la funcion ' + ContraseñaActual + NuevaContraseña + ConfirmaciónNuevaContraseña + IDUsuario);

    const data = {
        ContraseñaActual: ContraseñaActual,
        NuevaContraseña: NuevaContraseña,
        ConfirmaciónNuevaContraseña: ConfirmaciónNuevaContraseña,
        IDUsuario: IDUsuario
    };
    let url = urlVariable + '/editar_contraseña.php';
    fetch(url, {
        method: 'POST', // Especifica el método HTTP
        headers: {
            'Content-Type': 'application/json' // Configura el tipo de contenido como JSON
        },
        body: JSON.stringify(data) // Convierte los datos a JSON y los envía en el cuerpo de la solicitud
    })
    .then(response => response.json()) // Parsear la respuesta como JSON
    .then(result => {
        // Manejar la respuesta del servidor
        if (result.success) {
            console.log('Contraseña cambiada exitosamente');
            showModal(`Contraseña cambiada exitosamente`, true);
        } else {
            if(result.error==false){
                showModal(`Contraseña incorrecta`, false);
            }
            else{
            showModal(`${result.error} `, false);
            //showModal(`Error: ${result.error}`, false);
            }
        }
    })
    .catch(error => {
        console.log('Error en la solicitud de cambiar contraseña', error);
        showModal(`Error en la solicitud al servidor.`, false);
    });

}

function togglePasswordVisibility(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}


document.getElementById("FormCambiarContraseña").addEventListener("submit", function(e) {

    //alert('HOL312A');
    const FormCambiarContraseña = document.getElementById('FormCambiarContraseña');
    const urlVariable = document.body.getAttribute('data-url-base');
    const IDUsuario = FormCambiarContraseña.getAttribute('data-IDUsuario');
    console.log('url variable es ', urlVariable);

    e.preventDefault(); //Se anula el envio del formulario

    //Capturar los elementos del formulario:
    const ContraseñaActual = document.getElementById("ContraseñaActual").value;
    const NuevaContraseña = document.getElementById("NuevaContraseña").value;
    const ConfirmaciónNuevaContraseña = document.getElementById("ConfirmaciónNuevaContraseña").value;

    const ContraseñaActualError = document.getElementById("ContraseñaActualError");
    const NuevaContraseñaError = document.getElementById("NuevaContraseñaError");
    const ConfirmaciónNuevaContraseñaError = document.getElementById("ConfirmaciónNuevaContraseñaError");
    
    ContraseñaActualError.textContent = "";
    NuevaContraseñaError.textContent = "";
    ConfirmaciónNuevaContraseñaError.textContent = "";

    let bandera = 0;
    if (ContraseñaActual.length <= 4) {
        ContraseñaActualError.textContent = "La contraseña debe tener al menos 5 caracteres.";
        bandera += 1;
    }


    if (NuevaContraseña.length <= 4) {
        NuevaContraseñaError.textContent = "La contraseña debe tener al menos 5 caracteres.";
        bandera += 1;
    }

    if (ConfirmaciónNuevaContraseña != NuevaContraseña) {
        ConfirmaciónNuevaContraseñaError.textContent = "Las contraseñas no coinciden.";
        bandera += 1;
    }


    if(bandera==0){
        if(ContraseñaActual == ConfirmaciónNuevaContraseña && ContraseñaActual == NuevaContraseña){
            showModal('Debe cambiar la contraseña.',false);
        }
        else{
        CambiarContraseñaUsuario(urlVariable, ContraseñaActual, NuevaContraseña, ConfirmaciónNuevaContraseña, IDUsuario);
        //this.submit();
        }

    }
    if(bandera>0){

    }
});
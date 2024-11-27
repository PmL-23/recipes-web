function inicio() {

    const formulario=  document.getElementById("frm-usuario");
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        validar();
        procesarRegistro(e.target);
    });
}



function validarUsername() {
    const regex = /^(?=.*[a-z])[a-z0-9]*$/;
    const username = document.getElementById("username");
    const errorUsername = document.getElementById("error-username");
    errorUsername.textContent = "";

    if (username.value.trim() === "") {
        errorUsername.textContent = "Debe ingresar un nombre de usuario";
        username.classList.add("is-invalid");
        return false;
    } else if (!regex.test(username.value)) {
        errorUsername.textContent = "EL nombre de usuario debe tener al menos una letra y solo puede contener letras minusculas y numeros";
        username.classList.add("is-invalid");
        return false;
    } else if (username.value.length < 6 || username.value.length > 12) {
        errorUsername.textContent = "El nombre de usuario debe tener entre 6 y 12 caracteres";
        username.classList.add("is-invalid");
        return false;
    } else {
        username.classList.remove("is-invalid");
        return true;
    }
}




function validarPassword() {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]*$/;

    const password = document.getElementById("password");
    const errorPassword = document.getElementById("error-password");
    errorPassword.textContent = "";
    const confirmar = document.getElementById("confirm_password");
    const errorConfirmar = document.getElementById("error-confirm-password");
    errorConfirmar.textContent= "";

    if (password.value.trim() === "" || confirmar.value.trim() === "") {
        errorPassword.textContent = "Debe ingresar una contraseña y la confirmación de la contraseña";
        errorConfirmar.textContent = "Debe ingresar una contraseña y la confirmación de la contraseña";
        password.classList.add("is-invalid");
        confirmar.classList.add("is-invalid");
        return false;
        
    } else if (password.value.length < 8 || password.value.length > 16) {
        errorPassword.textContent = "La longitud de la contraseña debe ser de 8 a 16 caracteres";
        password.classList.add("is-invalid");
        confirmar.classList.add("is-invalid");
        return false;
    } else if (!regex.test(password.value)) {
        errorPassword.textContent = "La contraseña debe tener al menos una letra y número";
        password.classList.add("is-invalid");
        confirmar.classList.add("is-invalid");
        return false;
    } else {
        if (password.value !== confirmar.value) {
            errorPassword.textContent = "Las contraseñas no coinciden";
            password.classList.add("is-invalid");
            errorConfirmar.textContent = "Las contraseñas no coinciden";
            confirmar.classList.add("is-invalid");
            return false;
        } else 
        {
            password.classList.remove("is-invalid");
            confirmar.classList.remove("is-invalid");
            errorPassword.textContent = "";
            errorConfirmar.textContent = "";
    
            return true;
        }
    }

}



function validarNombre() {
    const regex = /^[a-zA-ZÁÉÍÓÚáéíóúñÑäÄëËïÏöÖüÜçÇ]+$/;
    const nombre = document.getElementById("nomCompleto");
    const errorNombre = document.getElementById("error-nombre");
    errorNombre.textContent = "";
    const palabras = nombre.value.split(" ").filter(palabra => palabra !== "");

    if (nombre.value.trim() === "") {
        errorNombre.textContent = "Debe ingresar un nombre";
        nombre.classList.add("is-invalid");
        return false;
    } else if (nombre.value.length < 5 || nombre.value.length > 30) {
        errorNombre.textContent = "Este campo requiere de 5 a 30 caracteres";
        nombre.classList.add("is-invalid");
        return false;
    } else if (palabras.length != 2) {
        errorNombre.textContent = "Debe ingresar un nombre y un apellido";
        nombre.classList.add("is-invalid");
        return false;
    }  else {
        for (let i = 0; i < palabras.length; i++) {
            if (!regex.test(palabras[i])) {
                errorNombre.textContent = "Caracteres inválidos";
                nombre.classList.add("is-invalid");
                return false;
            }
        }
        nombre.classList.remove("is-invalid");
        errorNombre.textContent = "";
        return true;
    }  
}


function validarEmail() {
    const email = document.getElementById("email");
    const errorEmail = document.getElementById("error-email");
    errorEmail.textContent = "";
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (email.value.trim() === "") {
        errorEmail.textContent = "Debe ingresar su email";
        email.classList.add("is-invalid");
        return false;
    } else if (!emailRegex.test(email.value)) {
        errorEmail.textContent = "Debe ingresar un email válido";
        email.classList.add("is-invalid");
        return false;
    } else {
        email.classList.remove("is-invalid");
        return true;
    }
}

function validarFecha()
{
    const fecha = document.getElementById("fecha_nacimiento");
    const errorFecha = document.getElementById("error-fecha-nacimiento");
    errorFecha.textContent = "";

    if (fecha.value.trim() === "") {
        errorFecha.textContent = "Debe ingresar una fecha de nacimiento";
        fecha.classList.add("is-invalid");
        return false;
    }

    const fechaIngresada = new Date(fecha.value);
    const fechaRango = new Date(1900, 1, 1);
    const fechaRango2 = new Date(2010, 1, 1);
    

    if ((fechaIngresada > fechaRango2) || fechaIngresada < fechaRango) {
        errorFecha.textContent = "La fecha de nacimiento no es valida";
        fecha.classList.add("is-invalid");
        return false;
    }
    
    fecha.classList.remove("is-invalid");
    return true;
}

function validarPais() {
    const pais = document.getElementById("id_pais");
    const errorPais = document.getElementById("error-pais");
    errorPais.textContent = "";

    if (pais.value === "") { 
        errorPais.textContent = "Debe seleccionar un país";
        pais.classList.add("is-invalid");
        return false;
    } else {
        pais.classList.remove("is-invalid");
        return true;
    }
}



function validar() {
    validarUsername();
    validarPassword();
    validarEmail();
    validarNombre();
    validarFecha();
    validarPais();
}

const limpiarMensajes = function () {
    let cartelError = document.getElementById('cartel-error');
    cartelError.classList.add('d-none');
    let listaError = document.getElementById("lista-error");
    listaError.innerHTML = '';
}

const respuestaRegistro = function (data) {
    let cartelError = document.getElementById('cartel-error');
    let listaError = document.getElementById('lista-error');
    limpiarMensajes();

    if (data.success) {
        
        window.location.href = "../perfil-usuario/mi_perfil.php?id=" + data.nuevo_usuario_id;


    } else {
        cartelError.classList.remove('d-none');
        for (let i = 0; i < data.errors.length; i++) {
            let error = data.errors[i];
          //  listaError.innerHTML += '<li>' + error + '</li>';
            let item = document.createElement("li");
           // item.classList.add("list-group-item","pb-3");
            item.textContent = error;
            
            listaError.appendChild(item);
        }
    }
}

function procesarRegistro(form) {
    let urlActual = window.location.href;
    let palabraClave = "recipes-web/";
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        fetch(urlCortada + "inicio_sesion/procesar_registro.php", {
            method: "POST",
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            console.log("data",data);
            respuestaRegistro(data);
            
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
}

window.onload = inicio;

function validarLetras(nickname) {
    for (let index = 0; index < nickname.length; index++) {
        const caracter = nickname[index];
        if (!((caracter >= 'A' && caracter <= 'Z') || (caracter >= 'a' && caracter <= 'z') || caracter === ' ')) {
            return false;
        }
    }
    return true;
}

function validarNumText(nickname) {
    for (let index = 0; index < nickname.length; index++) {
        const caracter = nickname[index];
        if (!((caracter >= 'A' && caracter <= 'Z') || (caracter >= 'a' && caracter <= 'z') || (caracter >= '0' && caracter <= '9'))) {
            return false; // Retorna false si hay caracteres no permitidos
        }
    }
    return true; // Retorna true si solo hay letras y números
}

function validarNickname() {
    let nickname = document.getElementById("nickname").value.trim();
    let errorNickname = document.getElementById("error-nickname");
    let palabras = nickname.split(" ").filter(palabra => palabra !== "");

    errorNickname.textContent = "";
    if (nickname === "") {
        errorNickname.textContent = "Debe ingresar un nombre";
    } else if (palabras.length > 1) {
        errorNickname.textContent = "Debe ingresar solo una palabra";
    } else if (!validarNumText(nickname)) {
        errorNickname.textContent = "Debe ingresar solo letras sin acentos";
    } else if (nickname.length > 10 || nickname.length < 7) {
        errorNickname.textContent = "Debe ingresar un nickname que tenga entre 7 y 10 caracteres";
    }
    else {
        errorNickname.textContent = "";
    }
    errorNickname.classList.toggle("text-danger", errorNickname.textContent !== "");
}

function validarPassword() {
    let password = document.getElementById("password").value.trim();
    let errorPassword = document.getElementById("error-password");
    let palabras = password.split(" ").filter(palabra => palabra !== "");

    errorPassword.textContent = "";
    if (password === "") {
        errorPassword.textContent = "Debe ingresar una contraseña";
    } else if (palabras.length > 1) {
        errorPassword.textContent = "Debe ingresar solo una palabra";
    } else if (!validarNumText(password)) {
        errorPassword.textContent = "Debe ingresar solo letras sin acentos y numeros";
    } else if (nickname.length > 7 || nickname.length < 7) {
        errorPassword.textContent = "Debe ingresar una contraseña que tenga 7 caracteres";
    }
    else {
        errorPassword.textContent = "";
    }
    errorPassword.classList.toggle("text-danger", errorPassword.textContent !== "");
}

function validarNombreApellido() {
    let nombre = document.getElementById("nombre").value.trim();
    let apellido = document.getElementById("apellido").value.trim();
    let errorNombre = document.getElementById("error-nombre");
    let errorApellido = document.getElementById("error-apellido");
    let palabras = nombre.split(" ").filter(palabra => palabra !== "");
    let palabras2 = apellido.split(" ").filter(palabra => palabra !== "");

    errorNombre.textContent = "";
    errorApellido.textContent = "";

    if (nombre === "") {
        errorNombre.textContent = "Debe ingresar su nombre";
    } else if (palabras.length > 2 || palabras.length < 2) {
        errorNombre.textContent = "Debe ingresar dos nombres";
    } else if (!validarLetras(nombre)) {
        errorNombre.textContent = "Debe ingresar solo letras";
    }
    else {
        errorNombre.textContent = "";
    }

    if (apellido === "") {
        errorApellido.textContent = "Debe ingresar su apellido";
    } else if (palabras2.length > 2 || palabras2.length < 2) {
        errorApellido.textContent = "Debe ingresar dos apellido";
    } else if (!validarLetras(apellido)) {
        errorApellido.textContent = "Debe ingresar solo letras";
    }
    else {
        errorApellido.textContent = "";
    }

    errorNombre.classList.toggle("text-danger", errorNombre.textContent !== "");
    errorApellido.classList.toggle("text-danger", errorApellido.textContent !== "");
}

function validarEmail() {
    let email = document.getElementById("email").value.trim();
    let emailError = document.getElementById("error-email");
    let palabras = email.split(" ").filter(palabra => palabra !== "");
    emailError.textContent = "";

    // Expresión regular para validar el formato de un email
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (email === "") {
        emailError.textContent = "Debe ingresar su email";
    } else if (palabras.length > 1) {
        emailError.textContent = "Debe ingresar solo un email";
    } else if (!emailRegex.test(email)) {
        emailError.textContent = "Debe ingresar un email válido (ej: ejemplo@correo.com)";
    }
    else {
        emailError.textContent = "";
    }
    emailError.classList.toggle("text-danger", emailError.textContent !== "");
}

function validarEdad() {
    let edad = document.getElementById("edad");
    let errorEdad = document.getElementById("error-edad");
    errorEdad.textContent = "";
    if (edad.value === "") {
        errorEdad.textContent = "Debe ingresar una edad";
    } else if (!isNaN(edad)) {
        errorEdad.textContent = "Debe ingresar numeros";
    } else if (edad.value < 18) {
        errorEdad.textContent = "Debe ser mayor de 18 años";
    }
    else {
        errorEdad.textContent = "";
    }
    errorEdad.classList.toggle("text-danger", errorEdad.textContent !== "");
}

function validarDescripcion() {
    let descripcion = document.getElementById("descripcion").value.trim();
    let errorDescripcion = document.getElementById("error-descripcion");
    let palabras = descripcion.split(" ").filter(palabra => palabra !== "");

    errorDescripcion.textContent = "";
    if (descripcion === "") {
        errorDescripcion.textContent = "Debe ingresar una descripcion";
    } else if (palabras.length < 20 || palabras.length > 50) {
        errorDescripcion.textContent = "Debe ingresar entre 20 y 50 palabras";
    } else if (!validarLetras(descripcion)) {
        errorDescripcion.textContent = "Debe ingresar solo letras";
    }
    else {
        errorDescripcion.textContent = "";
    }
    errorDescripcion.classList.toggle("text-danger", errorDescripcion.textContent !== "");
}

function validar() {
    let enviar = document.getElementById("enviar");
    enviar.addEventListener("click", function (event) {
        event.preventDefault();

        validarNickname();
        validarPassword();
        validarNombreApellido();
        validarEmail();
        validarEdad();
        validarDescripcion();

        let errores = document.querySelectorAll(".text-danger");
        console.log(errores);

        if (errores.length === 0) {
            console.log(errores);
            alert("bien");
        }

    });
    //llevar a pagina principal
    let titulo = document.getElementById("tituloRecetas");
    titulo.addEventListener("click", function () {
        // redirige a index.html que está en la carpeta general proyecto_lp
        window.location.href = "../../index.html";
    });
}
window.onload = validar;
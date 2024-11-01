function inicio() {
    const formulario = document.getElementById("frm-sesion");
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();
        validar()
        procesarSesion(e.target);
    
    });
}

function validar() {
    const password = document.getElementById("password");
    const email = document.getElementById("email");
    let validar = true;

    if (password.value.trim() === "") {
        password.classList.add("is-invalid");
        validar = false;
    } else {
        password.classList.remove("is-invalid");
    }

    if (email.value.trim() === "") {
        email.classList.add("is-invalid");
        validar = false;
    } else {
        email.classList.remove("is-invalid");
    }

    return validar;
}

const limpiarMensajes = function () {
    let cartelError = document.getElementById("cartel-error");
    cartelError.classList.add("d-none");
}

const respuestaSesion = function (data) {
    let cartelError = document.getElementById("cartel-error");
    limpiarMensajes();
    if (data.success) {
        window.location.href = "../index/index.php";
    } else {
        cartelError.classList.remove('d-none');
        cartelError.textContent = data.errors.join(', ') || "Se produjo un error desconocido.";
        mostrarErrores(data.errors);
    }
}

function mostrarErrores(errores) {
    const password = document.getElementById("password");
    const email = document.getElementById("email");

    if (errores.includes("Acceso inválido. Email, usuario o contraseña no válidos") || errores.includes("Campos obligatorios")) {
        password.classList.add("is-invalid");
        email.classList.add("is-invalid");
    }
}

function procesarSesion(form) {
    let urlActual = window.location.href;
    let palabraClave = "recipes-web/";
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        fetch(urlCortada + "inicio_sesion/procesar_sesion.php", {
            method: "POST",
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            console.log("data", data);
            respuestaSesion(data);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
}

window.onload = inicio;

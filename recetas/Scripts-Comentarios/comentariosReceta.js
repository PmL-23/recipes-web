document.addEventListener("DOMContentLoaded", function (){

    cargarComentariosReceta();

    document.getElementById("form-comentario").addEventListener("submit", function (e){
        e.preventDefault();

        fetch('../recetas/Scripts-Comentarios/postComentarioReceta.php', {
            method: "POST",
            body: new FormData(e.target)
        })
        .then(res => res.json())
        .then(data => {
            console.log(data);

            if (data.success == true) {

                cargarComentariosReceta();

                document.getElementById("comment-error-msg").textContent = '';
                document.getElementById("comentarioText").value = '';
                document.getElementById("contadorCaracteres").textContent = 'Límite de caracteres: 0/255';

            }else{
                document.getElementById("comment-error-msg").textContent = data.message;
            }
        });
    });

    const textAreaComentario = document.getElementById("comentarioText");
    const cantidadCharRestantes = document.getElementById("contadorCaracteres");

    textAreaComentario.addEventListener("input", function () {
        cantidadCharRestantes.textContent = 'Límite de caracteres: ' + textAreaComentario.value.length + '/255';
    });

});

export function cargarComentariosReceta() {

    const IDReceta = document.getElementById("id_publicacion_receta").value;

    fetch('../recetas/Scripts-Comentarios/getComentariosReceta.php?id_publicacion_receta=' + IDReceta, {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(res => {
        // Verifico si la respuesta fue exitosa
        if (!res.ok) {
            throw new Error('Error en la solicitud: ' + res.status);
        }

        // Verifico si hay contenido en la respuesta
        if (res.headers.get('content-length') === '0') {
            return null; // No hay contenido
        }

        // Convierto a JSON
        return res.json();
    })
    .then(data => {

        const comentariosCounter = document.getElementById("comentariosContador");

        if (data.length > 0) {
            console.log(data);

            comentariosCounter.textContent = `Comentarios (${data.length})`;

            const listaComentarios = document.getElementById("listaComentarios");
            listaComentarios.innerHTML = ``;

            data.forEach(e => {
                const nuevoComentario = document.createElement('li');
                nuevoComentario.className = 'comentario list-group-item';

                nuevoComentario.innerHTML = `
                    <div class="comentario-header d-flex justify-content-between align-items-center">
                        <div class="w-100 d-flex flex-row align-items-center">
                            <span class="username" data-user-comment${e.idComentario}>${e.nombre}</span>
                            <span class="timestamp ms-2 text-muted">${e.fechaPublicacion}</span>
                        </div>
                        <div class="acciones">
                            <button class="btn btn-light" onclick="toggleMenu(event)">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <div class="acciones-menu" style="display: none;">
                                <button class="btn btn-light rounded-0" data-comment="${e.idComentario}" onclick="reportarComentario(this.dataset.comment)" data-bs-toggle="modal" data-bs-target="#modalReportarComentario">
                                    <i class="bi bi-exclamation-circle"></i> Reportar
                                </button>
                                <button class="btn btn-light rounded-0" data-comment="${e.idComentario}" onclick="eliminarComentario(this.dataset.comment)">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="comentario-body">${e.textoComentario}</div>
                `;

                listaComentarios.appendChild(nuevoComentario);

                if (e.puntuacion > 0) {

                    const ContenedorValoracion = document.createElement("div");

                    ContenedorValoracion.className = "ms-2 d-flex flex-row";

                    for (let index = 1; index <= 5; index++) {

                        const estrella = document.createElement("span");

                        estrella.innerHTML = "&#9733;";

                        if (index <= e.puntuacion) {
                            estrella.className = "estrella hover fs-5"
                        }else{
                            estrella.className = "estrella fs-5";
                        }

                        ContenedorValoracion.appendChild(estrella);

                    }
                    
                    document.querySelector(`[data-user-comment${e.idComentario}]`).insertAdjacentElement("afterend", ContenedorValoracion);
                }

            });
            
        }else{
            //No hay comentarios
            comentariosCounter.textContent = `Comentarios (0)`;
        }
    });

}
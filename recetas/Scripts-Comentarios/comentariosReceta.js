document.addEventListener("DOMContentLoaded", function (){

    cargarComentariosReceta();

    document.getElementById("form-comentario").addEventListener("submit", function (e){
        e.preventDefault();

        try {
            
            fetch('../recetas/Scripts-Comentarios/postComentarioReceta.php', {
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {
    
                /* console.log(data); */
    
                if (data.success == true) {
    
                    cargarComentariosReceta();
    
                    document.getElementById("comment-error-msg").textContent = '';
                    document.getElementById("comentarioText").value = '';
                    document.getElementById("contadorCaracteres").textContent = 'Límite de caracteres: 0/255';
    
                }else{
                    document.getElementById("comment-error-msg").textContent = data.message;
                }
            });

        } catch (error) {
            console.error(error);
        }
    });

    document.getElementById("formulario-eliminar-comentario").addEventListener("submit", function(e){

        e.preventDefault();

        try {
            
            fetch('../recetas/Scripts-Comentarios/eliminarComentarioPropio.php', {
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                /* console.log(data); */
    
                if (data.success == true) {
    
                    cargarComentariosReceta();
                    document.getElementById("toast-success-msg").textContent = "Comentario eliminado con éxito..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
    
                }else{
                    document.getElementById("comment-error-msg").textContent = data.message;
                }
            });

        } catch (errorMsj) {
            console.error(errorMsj);
        }
    });

    const textAreaComentario = document.getElementById("comentarioText");
    const cantidadCharRestantes = document.getElementById("contadorCaracteres");

    textAreaComentario.addEventListener("input", function () {
        cantidadCharRestantes.textContent = 'Límite de caracteres: ' + textAreaComentario.value.length + '/255';
    });

});

export function cargarComentariosReceta() {

    const IDReceta = document.getElementById("id_publicacion_receta").value;

    try {
        
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
            const UsuarioLogueado = document.getElementById("logged_in_user").value;
            const listaComentarios = document.getElementById("listaComentarios");
            listaComentarios.innerHTML = ``;
    
            if (data.length > 0) {
    
                /* console.log(data); */
    
                comentariosCounter.textContent = `Comentarios (${data.length})`;
    
                data.forEach(e => {
                    const nuevoComentario = document.createElement('li');
                    nuevoComentario.className = 'comentario list-group-item';
    
                    const fechaHora = e.fechaPublicacion;
                    const [fecha] = fechaHora.split(" "); // Extrae solo la parte de la fecha
                    const [year, month, day] = fecha.split("-"); // Divide en año, mes y día
                    const fechaFormateada = `${day}-${month}-${year}`; // Reordena a formato DD-MM-YYYY
    
                    nuevoComentario.innerHTML = `
                        <div class="comentario-header d-flex justify-content-between align-items-center">
                            <div class="w-100 d-flex flex-row align-items-center">
                                <span class="username" data-user-comment${e.idComentario}>${e.nombre}</span>
                                <span class="timestamp ms-2 text-muted">${fechaFormateada} a las ${(e.fechaPublicacion.split(" ")[1]).slice(0, 5)}</span>
                            </div>
                            <div class="acciones">
    
                                <button class="btn btn-light" onclick="toggleMenu(event)">
                                    <i class="bi bi-three-dots"></i>
                                </button>
    
                                <div class="acciones-menu btns-comment-${e.idComentario}" style="display: none;"></div>
    
                            </div>
                        </div>
                        <div class="comentario-body">${e.textoComentario}</div>
                    `;
    
                    const reportBtn = document.createElement("button");
                    reportBtn.className = "btn btn-light rounded-0";
                    reportBtn.setAttribute("data-bs-toggle", "modal");
                    reportBtn.setAttribute("data-bs-target", "#modalReportarComentario");
                    reportBtn.innerHTML = `<i class="bi bi-exclamation-circle"></i> Reportar`;
                    reportBtn.addEventListener("click", function (){ document.getElementById("id_comentario").value = e.idComentario; });
    
                    const deleteBtn = document.createElement("button");
                    deleteBtn.className = "btn btn-light rounded-0";
                    deleteBtn.setAttribute("data-bs-toggle", "modal");
                    deleteBtn.setAttribute("data-bs-target", "#modalEliminarComentario");
                    deleteBtn.innerHTML = `<i class="bi bi-trash"></i> Eliminar`;
                    deleteBtn.addEventListener("click", function (){ 
    
                        document.getElementById("ComentarioID").value = e.idComentario;
                        document.getElementById("mensajeModalEliminarComentario").innerHTML = `¿Está seguro de que deseas eliminar tu comentario: "<strong>${e.textoComentario}</strong>" ?`;
    
                    });
    
                    listaComentarios.appendChild(nuevoComentario);
    
                    UsuarioLogueado == e.nombre ?document.querySelector(`.btns-comment-${e.idComentario}`).appendChild(deleteBtn) : document.querySelector(`.btns-comment-${e.idComentario}`).appendChild(reportBtn);
    
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
    } catch (error) {
        console.error(error);
    }

}
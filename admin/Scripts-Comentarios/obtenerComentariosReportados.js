export function obtenerComentariosReportados(){

    const panelContenido = document.querySelector(".panel-body");
    panelContenido.innerHTML = ``;

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'overflow-y-auto');

    panelContenido.innerHTML = ``;
    contenedorCards.id = "contenedor-comentarios";

    try {

        fetch('../admin/Scripts-Comentarios/obtenerComentariosReportados.php', {
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

            /* console.log(data); */
        
            const ContenedorDeComentarios = document.getElementById('contenedor-comentarios');

            ContenedorDeComentarios.classList.add("pb-3");

            if (data.comentarios.length > 0) {
                
                data.comentarios.forEach( (comentario) => {

                    const fechaHora = comentario.fecha_comentario;
                    const [fecha] = fechaHora.split(" "); // Extrae solo la parte de la fecha
                    const [year, month, day] = fecha.split("-"); // Divide en año, mes y día
                    const fechaFormateada = `${day}-${month}-${year}`; // Reordena a formato DD-MM-YYYY

                    const divPadre = document.createElement('div');
                    divPadre.classList.add('card', 'm-5');
        
                        divPadre.innerHTML = `
                            <div class="card-header">
                                <div class="d-flex flex-row">

                                    <div class="w-100 p-2 d-flex flex-row align-items-center">

                                        <img class="w-25 img-thumbnail rounded-circle" src="${comentario.foto_usuario}"/>
                                        <h5 class="text-secondary ms-3">${comentario.nombre_usuario}</h5>

                                    </div>

                                    <div class="w-100 p-2 d-flex flex-column align-items-end justify-content-center">

                                        <span class="text-secondary">${fechaFormateada}</span>
                                        <span class="text-body-tertiary">${ (comentario.fecha_comentario.split(" ")[1]).slice(0, 5) }</span>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <blockquote class="blockquote mb-0 m-3">
                                    <h4>"${comentario.texto_comentario}"</h4>
                                </blockquote>
                            </div>

                            <div class="card-body">
                                <blockquote class="blockquote mb-0 ms-2">
                                    <p>Cantidad de reportes: ${comentario.cant_reportes}</p>
                                </blockquote>
                                
                            </div>

                            <div class="card-footer d-flex flex-row justify-content-evenly btns-${comentario.id_comentario}">
                                <a href="../recetas/receta-plantilla.php?id=${comentario.id_publicacion}" target="_blank" ><button class="btn btn-custom-bg btn-sm ms-1 m-2">Ver en publicacion</button></a>
                            </div>
                        `;
                    const btnEliminar = document.createElement("button");
                    btnEliminar.type = "submit";
                    btnEliminar.className = "btn btn-danger btn-sm ms-1 m-2";
                    btnEliminar.setAttribute("data-bs-toggle", "modal");
                    btnEliminar.setAttribute("data-bs-target", "#modalEliminarObj");
                    btnEliminar.textContent = "Eliminar comentario";
        
                    btnEliminar.addEventListener("click", function (){
                        document.getElementById("modalEliminarObjTitulo").innerHTML = `¿Eliminar comentario del sistema?`;
                        document.getElementById("modalEliminarObjMensaje").innerHTML = `Comentario: "<strong>${comentario.texto_comentario}</strong>".`;
                        document.getElementById("ObjID").value = comentario.id_comentario;
                    });

                    const btnListarReportes = document.createElement("button");
                    btnListarReportes.type = "submit";
                    btnListarReportes.className = "btn btn-primary btn-sm m-2 btn-listar-reportes";
                    btnListarReportes.setAttribute("data-bs-toggle", "modal");
                    btnListarReportes.setAttribute("data-bs-target", "#modalListaReportes");
                    btnListarReportes.setAttribute("data-id", comentario.id_comentario);
                    btnListarReportes.textContent = "Ver reportes";

                    const btnIgnorarReportes = document.createElement("button");
                    btnIgnorarReportes.type = "submit";
                    btnIgnorarReportes.className = "btn btn-secondary btn-sm m-2";
                    btnIgnorarReportes.setAttribute("data-bs-toggle", "modal");
                    btnIgnorarReportes.setAttribute("data-bs-target", "#modalEliminarItem");
                    btnIgnorarReportes.textContent = "Ignorar reportes";
    
                    btnIgnorarReportes.addEventListener("click", function (){
                        document.getElementById("modalEliminarItemTitulo").textContent = "Ignorar reportes de comentario";
                        document.getElementById("modalEliminarItemMensaje").innerHTML = `¿Está seguro de eliminar los reportes y conservar el comentario "<strong>${comentario.texto_comentario}</strong>" ?`;
                        document.getElementById("ItemID").value = comentario.id_comentario;
                    });
                    
                    ContenedorDeComentarios.appendChild(divPadre);

                    const buttonsContainer = document.querySelector(`.btns-${comentario.id_comentario}`);

                    buttonsContainer.appendChild(btnEliminar);
                    buttonsContainer.appendChild(btnListarReportes);
                    buttonsContainer.appendChild(btnIgnorarReportes);

                });

                document.querySelectorAll(".btn-listar-reportes").forEach( (e) => {

                    e.addEventListener("click", function(){
            
                        listarReportesComentarios(e.dataset.id);
                    });

                });

            }else{

                ContenedorDeComentarios.innerHTML = `<h3 class="w-100 text-center py-5">No hay comentarios reportados</h3>`;

            }

        });

    } catch (error) {

        console.error(error);

    }

    panelContenido.appendChild(contenedorCards);
}

function listarReportesComentarios(id_comentario){

    try {
                
        fetch('../admin/Scripts-Comentarios/listarReportesComentarios.php?id_comentario=' + id_comentario, {
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

            console.log(data);
            const reportesContainer = document.getElementById("listadoDeReportes");
            reportesContainer.innerHTML = ``;

            if (data.success == true) {
                
                data.reportes.forEach( (e) => {

                    const fechaHora = e.fecha_reporte;
                    const [fecha] = fechaHora.split(" "); // Extrae solo la parte de la fecha
                    const [year, month, day] = fecha.split("-"); // Divide en año, mes y día
                    const fechaFormateada = `${day}-${month}-${year}`; // Reordena a formato DD-MM-YYYY

                    reportesContainer.innerHTML += `
                        <li class="w-100 mb-5">
                            <span class="text-dark fw-bolder">Reportado por:</span> <a href="../CarpetaPerfil/Perfil.php?NombreDeUsuario=${e.usuario_reportante}"><span class="text-primary">${e.usuario_reportante}</span></a>
                            <p class="mb-0"><span class="text-dark fw-bolder">Motivo:</span> <span class="text-dark">${e.motivo_reporte}</span></p>
                            <p class="mb-0"><span class="text-dark fw-bolder">Fecha:</span> <span class="text-dark">${fechaFormateada}</span></p>
                            <p class="mb-0"><span class="text-dark fw-bolder">Hora:</span> <span class="text-dark">${(e.fecha_reporte.split(" ")[1]).slice(0, 5)}</span></p>
                            <p class="mb-0"><span class="text-dark fw-bolder">Detalles:</span> <span class="text-dark">${e.detalles_reporte}</span></p>
                        </li>
                    `;
                });
            }
        });


    } catch (er) {
        console.error(er);
    }

}
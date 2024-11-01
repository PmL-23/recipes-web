export function obtenerUsuariosReportados(){

    const panelContenido = document.querySelector(".panel-body");
    panelContenido.innerHTML = ``;

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'overflow-y-auto');

    panelContenido.innerHTML = ``;
    contenedorCards.id = "contenedor-usuarios";

    let urlActual = window.location.href;
    let palabraClave = "recipes-web/";

    // Encuentra el índice de la palabra "recipes-web/" en la URL
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {

        // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        fetch(urlCortada + "admin/Scripts-Usuarios/obtenerUsuariosReportados.php", {
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
        
            const ContenedorDeUsuarios = document.getElementById('contenedor-usuarios');

            ContenedorDeUsuarios.classList.add("pb-3");

            if (data.usuarios.length > 0) {
                
                data.usuarios.forEach( (usuario) => {

                    const divPadre = document.createElement('div');
                    divPadre.classList.add('card', 'm-5');
        
                        divPadre.innerHTML = `
                            <div class="card-body d-flex flex-row">
    
                                <img class="w-25 h-25 m-2 rounded-circle border" src="${usuario.foto_usuario}"/>
    
                                <div class="container-sm d-flex flex-column align-items-center">
                                    <h3>${usuario.nombre_usuario}</h3>
    
                                    <div class="w-100 p-2 mt-4 d-flex flex-row justify-content-around">
    
                                        <div class="d-flex flex-column align-items-center">
                                            <h4>${usuario.cant_publicaciones}</h4>
                                            <h6>Publicaciones</h6>
                                        </div>
    
                                        <div class="d-flex flex-column align-items-center">
                                            <h4>${usuario.cant_reportes}</h4>
                                            <h6>Reportes</h6>
                                        </div>
    
                                        <div class="d-flex flex-column align-items-center">
                                            <h4>${usuario.cant_seguidores}</h4>
                                            <h6>Seguidores</h6>
                                        </div>
    
                                    </div>
    
                                    <div class="m-2 d-flex flex-row btns-${usuario.id_usuario}">
    
                                        <a href="../CarpetaPerfil/Perfil.php?NombreDeUsuario=${usuario.nombre_usuario}" target="_blank"><button class="btn btn-custom-bg btn-sm ms-1 m-2 btn-ver-usuario">Ir a perfil</button></a>
    
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="card-footer">
                                <div class="d-flex flex-row">
    
                                    <div class="w-100 p-2 d-flex flex-row align-items-center">
    
                                        <span class="text-secondary">${usuario.nombre_completo}</span>
    
                                    </div>
    
                                    <div class="w-100 p-2 d-flex flex-column align-items-end justify-content-center">
    
                                        
                                        <p class="text-secondary m-0">${usuario.correo}</p>
    
                                    </div>
                                </div>
                            </div>
                        `;
                    const BanearBtn = document.createElement("button");
                    BanearBtn.type = "submit";
                    BanearBtn.className = "btn btn-danger btn-sm ms-1 m-2 btn-suspender-usuario";
                    BanearBtn.setAttribute("data-bs-toggle", "modal");
                    BanearBtn.setAttribute("data-bs-target", "#modalSuspenderUsuario");
                    BanearBtn.textContent = "Suspender usuario";
        
                    BanearBtn.addEventListener("click", function (){
                        document.getElementById("modalSuspenderUsuarioTitle").innerHTML = `Aplicar suspensión a "<strong>${usuario.nombre_usuario}</strong>"`;
                        document.getElementById("cuentaID").value = usuario.id_usuario;
                    });

                    const ignoreButton = document.createElement("button");
                    ignoreButton.type = "submit";
                    ignoreButton.className = "btn btn-secondary btn-sm m-2 btn-ignorar-usuario";
                    ignoreButton.setAttribute("data-bs-toggle", "modal");
                    ignoreButton.setAttribute("data-bs-target", "#modalEliminarItem");
                    ignoreButton.textContent = "Ignorar usuario";
    
                    ignoreButton.addEventListener("click", function (){
                        document.getElementById("modalEliminarItemTitulo").textContent = "Ignorar reportes";
                        document.getElementById("modalEliminarItemMensaje").innerHTML = `¿Está seguro de que desea ignorar reportes del usuario '<strong>${usuario.nombre_usuario}</strong>' ?`;
                        document.getElementById("ItemID").value = usuario.id_usuario;
                    });
                    
                    ContenedorDeUsuarios.appendChild(divPadre);

                    document.querySelector(`.btns-${usuario.id_usuario}`).appendChild(BanearBtn);
                    document.querySelector(`.btns-${usuario.id_usuario}`).appendChild(ignoreButton);

                });

            }else{

                ContenedorDeUsuarios.innerHTML = `<h3 class="w-100 text-center py-5">No hay usuarios reportados</h3>`;

            }

        });

    } else {
        console.log("La cadena 'recipes-web/' no se encontró en la URL.");
    }

    panelContenido.appendChild(contenedorCards);
}
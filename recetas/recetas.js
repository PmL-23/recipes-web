document.addEventListener("DOMContentLoaded", function() {
    const recetas = document.querySelectorAll('.receta-item');

    recetas.forEach(receta => {
        const cardInfo = receta.querySelector('.card_info');

        receta.addEventListener('mouseenter', function() {
            cardInfo.style.transform = 'translateX(0)'; // Mostrar al hacer hover
        });

        receta.addEventListener('mouseleave', function() {
            cardInfo.style.transform = 'translateX(100%)'; 
        });
    });

    // Por el tema de los comentarios
    const btnEnviarComentario = document.getElementById('btnEnviarComentario');
    const listaComentarios = document.getElementById('listaComentarios');
    const comentarioText = document.getElementById('comentarioText');

    // Para agregar comentario
    function agregarComentario(texto) {
        const nuevoComentario = document.createElement('li');
        nuevoComentario.className = 'comentario list-group-item';

        // Fecha y hora 
        const ahora = new Date();
        const opciones = { hour: '2-digit', minute: '2-digit' };
        const hora = ahora.toLocaleTimeString([], opciones);

        nuevoComentario.innerHTML = `
            <div class="comentario-header d-flex justify-content-between align-items-center">
                <div>
                    <span class="username">Nombre de Usuario</span>
                    <span class="timestamp text-muted">${hora}</span>
                </div>
                <div class="acciones">
                    <button class="btn btn-light" onclick="toggleMenu(event)">
                        <i class="bi bi-three-dots"></i>
                    </button>
                    <div class="acciones-menu" style="display: none;">
                        <button class="btn btn-light" onclick="reportarComentario(this)">
                            <i class="bi bi-exclamation-circle"></i> Reportar
                        </button>
                        <button class="btn btn-light" onclick="eliminarComentario(this)">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </div>
                </div>
            </div>
            <div class="comentario-body">${texto}</div>
        `;

        listaComentarios.appendChild(nuevoComentario);
    }

    //Para que al presionar el enter se envíe el comentario
    btnEnviarComentario.addEventListener('click', function() {
        const textoComentario = comentarioText.value.trim();
        if (textoComentario) {
            agregarComentario(textoComentario);
            comentarioText.value = ''; 
        }
    });

    
    comentarioText.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); 
            btnEnviarComentario.click(); 
        }
    });
});


function toggleMenu(event) {
    const menu = event.target.closest('.comentario-header').querySelector('.acciones-menu');
    menu.style.display = menu.style.display === 'none' || !menu.style.display ? 'block' : 'none';
}

function reportarComentario(btn) {
    alert('Comentario reportado');
}

function eliminarComentario(btn) {
    const comentario = btn.closest('.comentario');
    comentario.remove();
}


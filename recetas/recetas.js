document.addEventListener("DOMContentLoaded", function() {
    const recetas = document.querySelectorAll('.receta-item');
  
    recetas.forEach(receta => {
        const cardInfo = receta.querySelector('.card_info');
  
        receta.addEventListener('mouseenter', function() {
            cardInfo.style.transform = 'translateX(0)'; // Mostrar al hacer hover
        });
  
        receta.addEventListener('mouseleave', function() {
            cardInfo.style.transform = 'translateX(100%)'; // Ocultar al salir
        });
    });
  });


let comentarios = [];
        const btnEnviarComentario = document.getElementById('btnEnviarComentario');
        const listaComentarios = document.getElementById('listaComentarios');
        const listaComentariosAnteriores = document.getElementById('listaComentariosAnteriores');
        const barraLateral = document.getElementById('barraLateral');
        const totalValoraciones = 5;

        btnEnviarComentario.addEventListener('click', () => {
            const comentarioText = document.getElementById('comentarioText').value;
            if (comentarioText) {
                comentarios.push(comentarioText);
                actualizarComentarios();
                document.getElementById('comentarioText').value = '';
            }
        });

        function actualizarComentarios() {
            listaComentarios.innerHTML = '';
            comentarios.forEach((comentario, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.innerText = comentario;
                listaComentarios.appendChild(li);
            });

            if (comentarios.length > 3) {
                barraLateral.classList.remove('d-none');
                listaComentariosAnteriores.innerHTML = '';
                comentarios.forEach((comentario) => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item';
                    li.innerText = comentario;
                    listaComentariosAnteriores.appendChild(li);
                });
            } else {
                barraLateral.classList.add('d-none');
            }
            //algún día completaré acá, lo prometo
            const promedio = calcularPromedio();
            mostrarPromedio(promedio);
        }

        function calcularPromedio() {
            //algún día completaré acá, lo prometo
            return 3.0;
        }

        function mostrarPromedio(promedio) {
            const stars = document.querySelectorAll('#promedioCalificaciones .star');
            stars.forEach((star, index) => {
                star.style.color = index < promedio ? 'gold' : 'lightgray';
            });
            document.getElementById('puntajePromedio').innerText = promedio.toFixed(1);
            document.getElementById('countValoraciones').innerText = comentarios.length;
        }

        document.getElementById('btnReportar').addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalReportar'));
            modal.show();
        });

        document.getElementById('formReportar').addEventListener('submit', (event) => {
            event.preventDefault();
            bootstrap.Modal.getInstance(document.getElementById('modalReportar')).hide();
        });

        document.getElementById('btnComentar').addEventListener('click', () => {
            document.getElementById('comentarioText').focus();
        });
        
document.addEventListener("DOMContentLoaded", function () {
    const selectsDificultad = document.querySelectorAll('#dificultad');
    const selectsCategoria = document.querySelectorAll('#categoria');
    const selectsEtiqueta = document.querySelectorAll("#etiqueta");
    let filtrarReceta = document.getElementById('filtrarReceta');
    let resultados = document.getElementById("resultados");
    let pantallaGrande = document.getElementById('pantallaGrande');

    const url = 'filtrosBuscador.php';

    async function cargarDificultades(data) {
        try {
            selectsDificultad.forEach(select => {
                data.dificultades.forEach(dificultad => {
                    const option = document.createElement('option');
                    option.value = dificultad.dificultad;
                    option.textContent = dificultad.dificultad;
                    select.appendChild(option);
                });
            });
        } catch (error) {
            console.error('Error al cargar dificultades:', error);
        }
    }

    async function cargarCategorias(data) {
        try {
            selectsCategoria.forEach(select => {
                data.categorias.forEach(categoria => {
                    const option = document.createElement('option');
                    option.value = categoria.titulo;
                    option.textContent = categoria.titulo;
                    select.appendChild(option);
                });
            });
        } catch (error) {
            console.error('Error al cargar categorias:', error);
        }
    }
    async function cargarEtiquetas(data) {
        try {
            selectsEtiqueta.forEach(select => {
                data.etiquetas.forEach(etiqueta => {
                    const option = document.createElement('option');
                    option.value = etiqueta.titulo;
                    option.textContent = etiqueta.titulo;
                    select.appendChild(option);
                });
            })
            
        } catch (error) {
            console.error('Error al cargar etiquetas:', error);
        }
    }

    async function cargarFiltros() {
        try {
            const response = await fetch(url, { method: 'GET' });
            if (!response.ok) {
                throw new Error('Error en la solicitud');
            }
            const data = await response.json();

            if (data.error) {
                console.error(data.error);
                return;
            }

            cargarDificultades(data);
            cargarCategorias(data);
            cargarEtiquetas(data);

        } catch (error) {
            console.error('Error en cargarFiltros:', error);
        }
    }
    cargarFiltros();

    filtrarReceta.addEventListener('submit', function(event) {
        event.preventDefault();
    
        let formData = new FormData(this);
        console.log([...formData]);  // Verifica el contenido de FormData
    
        fetch('aplicandoFiltros.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            resultados.innerHTML = data;
            console.log('contenido recibido:', data); // Verificar el contenido recibido
            if (data.trim() !== "") { 
                pantallaGrande.classList.remove('oculto');
                console.log("pantallaGrande se muestra"); // Verificar si se muestra correctamente
            } else {
                console.log("No se encontró contenido para mostrar.");
            }
        })
        .catch(err => console.log('Error:', err));
    });
    
});

document.addEventListener("DOMContentLoaded", function () {
    const selectsDificultad = document.querySelectorAll('#dificultad');
    const selectsCategoria = document.querySelectorAll('#categoria');
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
            console.error('Error al cargar categorías:', error);
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

        } catch (error) {
            console.error('Error en cargarFiltros:', error);
        }
    }

    cargarFiltros();
});

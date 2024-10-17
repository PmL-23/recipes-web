<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar</title>
    <?php include '../includes/head.php' ?>
</head>
<body>
<?php include '../includes/header.php'; ?>
    <?php include '../includes/conec_db.php';?>
    <div class="caja-principal">
    <div class="contenedor-grande">
        <h1 class="titulo-grande">Buscá por ingredientes</h1>
        <p class="descripcion-grande">Agregá los ingredientes que tienes en tu cocina</p>
        
        <div class="input-dinamico">
            <label for="ingrediente1">1</label>
            <input type="text" id="ingrediente1" class="input-dinamico" placeholder="Papa">
            <div class="toggle-dinamico">
                <button>CON</button>
                <button>SIN</button>
            </div>
           

        </div>
        
        <div class="input-dinamico">
            <label for="ingrediente2">2</label>
            <input type="text" id="ingrediente2" class="input-dinamico" placeholder="Carne de Pollo">
            <div class="toggle-dinamico">
                <button>CON</button>
                <button>SIN</button>
            </div>
           

        </div>
        
        <div class="input-dinamico">
            <label for="ingrediente3">3</label>
            <input type="text" id="ingrediente3" class="input-dinamico" placeholder="Leche">
            <div class="toggle-dinamico">
                <button>CON</button>
                <button>SIN</button>
            </div>
           

        </div>
        <button id="agregar-ingrediente" class="boton-grande">Agregar Ingrediente</button>

        <button class="boton-grande">Buscar</button>
    </div>
</div>


    
        
    
</div>
<style>
.caja-principal {
    font-family: 'Montserrat', sans-serif; /* Mantiene la fuente Montserrat */
    background-color: #fafafa; /* Fondo suave para el contenedor principal */
    padding: 20px; /* Añadido un padding general */
}

.contenedor-grande {
    max-width: 800px; /* Caja más grande */
    margin: 50px auto; /* Centrado y más espacio arriba y abajo */
    padding: 40px; /* Aumentado el padding */
    background-color: #fff5e6; /* Fondo suave */
    border-radius: 20px; /* Bordes redondeados */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Sombra pronunciada */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animación suave al hacer hover */
}

.contenedor-grande:hover {
    transform: scale(1.05); /* Aumenta el tamaño al pasar el ratón */
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); /* Sombra más profunda en hover */
}

.titulo-grande {
    font-size: 36px; /* Título más grande */
    color: #663300; /* Color de título */
    text-align: center; /* Texto centrado */
    margin-bottom: 20px; /* Espaciado inferior */
    text-transform: uppercase; /* Título en mayúsculas */
    letter-spacing: 2px; /* Mayor espacio entre letras */
    animation: fadeIn 1s ease-in-out; /* Animación suave */
}

.descripcion-grande {
    font-size: 20px; /* Texto más grande */
    color: #666666; /* Color de descripción */
    text-align: center; /* Centrado */
    margin-bottom: 30px; /* Espacio inferior */
    line-height: 1.5; /* Separación entre líneas */
    animation: fadeIn 1.5s ease-in-out; /* Animación suave al aparecer */
}

.boton-grande {
    display: block;
    width: 100%;
    max-width: 200px; /* Tamaño máximo del botón */
    margin: 20px auto; /* Centrado horizontal */
    padding: 15px 0; /* Más padding vertical */
    background-color: #ff6600; /* Color naranja brillante */
    color: white;
    font-size: 18px; /* Fuente más grande */
    border: none;
    border-radius: 50px; /* Bordes redondeados */
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.boton-grande:hover {
    background-color: #e65c00; /* Cambio de color al hacer hover */
    transform: translateY(-5px); /* Efecto de levantarse al pasar el ratón */
}

/* Animaciones */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px); /* Comienza más arriba */
    }
    to {
        opacity: 1;
        transform: translateY(0); /* Vuelve a su posición original */
    }
}

/* Inputs dinámicos */
.input-dinamico {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 2px solid #66cc33; /* Bordes verdes */
    border-radius: 5px;
    font-size: 18px; /* Tamaño de texto mayor */
    transition: border-color 0.3s ease;
}

.input-dinamico:focus {
    border-color: #339900; /* Bordes más oscuros al enfocar */
    outline: none;
}

/* Botones CON/SIN estilos */
.toggle-dinamico {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
}

.toggle-dinamico button {
    background-color: #66cc33; /* Botón verde por defecto */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 30px;
    margin: 0 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.toggle-dinamico button:hover {
    background-color: #339900; /* Verde más oscuro al hacer hover */
}

/* Botón eliminar */
.boton-eliminar-dinamico {
    background-color: transparent;
    border: none;
    color: #ff3300; /* Color rojo */
    cursor: pointer;
    font-size: 20px;
    margin-left: 10px;
    transition: color 0.3s ease;
}

.boton-eliminar-dinamico:hover {
    color: #cc2900; /* Rojo más oscuro al hacer hover */
}

</style>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const agregarIngredienteBtn = document.getElementById("agregar-ingrediente");
    const contenedorGrande = document.querySelector(".contenedor-grande");

    // Inicializa el índice desde el 4
    let nextIndex = 4;

    // Función para crear un nuevo input dinámico
    function crearInputDinamico(index) {
        const inputContainer = document.createElement("div");
        inputContainer.classList.add("input-dinamico");

        const label = document.createElement("label");
        label.setAttribute("for", `ingrediente${index}`);
        label.textContent = `Ingrediente ${index}`;
        
        const input = document.createElement("input");
        input.type = "text";
        input.id = `ingrediente${index}`;
        input.classList.add("input-dinamico");
        input.placeholder = `Ingrediente ${index}`;

        const toggleContainer = document.createElement("div");
        toggleContainer.classList.add("toggle-dinamico");

        const conButton = document.createElement("button");
        conButton.textContent = "CON";
        const sinButton = document.createElement("button");
        sinButton.textContent = "SIN";

        toggleContainer.appendChild(conButton);
        toggleContainer.appendChild(sinButton);

        const deleteButton = document.createElement("button");
        deleteButton.classList.add("boton-eliminar-dinamico");
        deleteButton.innerHTML = "&#128465;";

        deleteButton.addEventListener("click", function () {
            inputContainer.remove();
        });

        inputContainer.appendChild(label);
        inputContainer.appendChild(input);
        inputContainer.appendChild(toggleContainer);
        inputContainer.appendChild(deleteButton);

        contenedorGrande.insertBefore(inputContainer, agregarIngredienteBtn); // Inserta antes del botón de agregar
    }

    // Agregar evento para añadir nuevos ingredientes
    agregarIngredienteBtn.addEventListener("click", function () {
        crearInputDinamico(nextIndex);
        nextIndex++;  // Incrementa el índice para el siguiente ingrediente
    });
});



</script>
</body>
</html>





<?php include '../includes/footer.php' ?>

const verPortada = function() {
    const inputFotoPortada = document.getElementById('foto-portada');
    const previewPortada = document.getElementById('preview-portada');

    inputFotoPortada.addEventListener('change', function(event) {

        if (event.target.files && event.target.files[0]) {
            const file = event.target.files[0]; 

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewPortada.src = e.target.result;
                };

    
                reader.readAsDataURL(file);
            } else {
                
                alert('Por favor, seleccione una imagen válida.');
            }
        }
    });
}



verPortada();

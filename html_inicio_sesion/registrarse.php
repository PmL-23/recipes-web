<?php include '../includes/header.php'?>
    <div class="pt-5"></div>

    <!-- Registrarse -->
    <section id="formulario" class="d-flex justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <form name="Nuevo Usuario" method="POST" action="../php/conexionCrearUsuario.php">
                <div class="mb-3">
                    <label for="nickname" class="form-label">Nickname:</label>
                    <input id="nickname" type="text" class="form-control" name="nickname" pattern="[a-zA-Z0-9]+" placeholder="Ingrese su Nickname" required>
                    <div class="form-text" id="error-nickname"></div>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input id="password" type="password" class="form-control" name="contraseña" maxlength="20" autocomplete="new-password" placeholder="Ingrese su contraseña" required>
                    <div class="form-text" id="error-password"></div>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" required>
                    <div class="form-text" id="error-nombre"></div>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Ingrese su apellido" required>
                    <div class="form-text" id="error-apellido"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Ingrese su email" required>
                    <div class="form-text" id="error-email"></div>
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad:</label>
                    <input id="edad" type="number" class="form-control" name="edad" min="18" placeholder="Ingrese su edad" required>
                    <div class="form-text" id="error-edad"></div>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <textarea id="descripcion" class="form-control" name="descripcion" placeholder="Ingrese su descripcion" rows="5" required></textarea>
                    <div class="form-text" id="error-descripcion"></div>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <input id="enviar" type="submit" name="enviar" class="btn btn-primary" value="Registrate">
                    <input id="borrar" type="reset" class="btn btn-secondary" value="Borrar">
                </div>
            </form>
        </div>
    </section>
    <div class="pt-2"></div>

<?php include '../includes/footer.php'?>

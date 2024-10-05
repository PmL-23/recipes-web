<?php include '../includes/header.php'?>
    <div class="pt-5"></div>

    <!-- Inicio de Sesion -->
    <section id="formulario2" class="d-flex justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-4">
            <h2 class="text-center">Iniciar Sesion</h2>
            <form name="contacto" method="POST" action="/php/iniciarSesion.php">
                <div class="mb-3">
                    <label for="nicknameLogin" class="form-label">Nickname:</label>
                    <input  id="nickname" type="text" class="form-control" name="nickname" pattern="[a-zA-Z0-9]+"
                        placeholder="Ingrese su Nickname" required>
                        <div class="form-text" id="error-nickname"></div>

                </div>
                <div class="mb-3">
                    <label for="contraseñaLogin" class="form-label">Contraseña:</label>
                    <input  id="password" type="password" class="form-control" name="contraseña" maxlength="20" autocomplete="off"
                        placeholder="Ingrese su contraseña" required>
                        <div class="form-text" id="error-password"></div>
                </div>
                <hr>
                <input id="enviar" type="submit" name="enviar" class="btn btn-primary" value="Iniciar Sesion">
            </form>
        </div>
    </section>

<?php include '../includes/footer.php'?>
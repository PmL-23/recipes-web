<?php 

session_start();

$loginOK = null;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 
    include '../includes/conec_db.php';
    $msg = '';
    $varClass = '';
    $queryCheckLogin = "SELECT * FROM test WHERE email = :email AND password = :password";
    $resultadoQuery = $conn ->prepare($queryCheckLogin);
    $resultadoQuery->bindParam(':email', $_POST['email']);
    $resultadoQuery->bindParam(':password', $_POST['password']);
    $resultadoQuery->execute();
    if($row = $resultadoQuery->fetch(PDO::FETCH_ASSOC))
    {
        $_SESSION['nomCompleto'] = $row['nomCompleto'];
        $_SESSION['id'] = $row['id'];
        header('Location: ../index/index.php');
        die;
        $loginOK = true;

    }
    else
    {

        $loginOK = false;
        $msg = 'Algo está mal >:/ ';
        $varClass = 'alert-danger';
    }
}
?>
<?php
include '../includes/header.php';
?>
 
 <div class="pt-5"></div>

    <!-- Inicio de Sesion -->
    <section id="formulario2" class="d-flex justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-4">
            <h2 class="text-center">Iniciar Sesion</h2>
            <?php
            if ( $loginOK !== null) {
            ?>
                <div class="alert <?= $varClass ?>" role="alert">
                    <?= $msg ?>
                </div>
            <?php
            }
        ?>
            <form name="contacto" method="POST" action="">
                <div class="mb-3">
                    <label for="nicknameLogin" class="form-label">Email:</label>
                    <input  id="email" type="email" class="form-control" name="email" placeholder="Ingrese su email" required>
                        <div class="form-text" id="error-nickname"></div>

                </div>
                <div class="mb-3">
                    <label for="contraseñaLogin" class="form-label">Contraseña:</label>
                    <input  id="password" type="password" class="form-control" name="password" maxlength="20" autocomplete="off"
                        placeholder="Ingrese su contraseña" required>

                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>

<?php include '../includes/footer.php'?>
<?php require_once('_head.php'); ?>

<title>Registro | Objective Food</title>
  </head>
<?php 
require_once('controllers/registerControllers.php');
require_once('controllers/validationControllers.php');
require_once('controllers/filesControllers.php');
require_once('controllers/helpers.php');
?>

<?php require_once('_header.php'); ?>
<main class="signin-back">
        <section class="back-blur">
                <article class="signin container">
                <h3>Crea una cuenta</h3>
                <p>Registrarme con:</p>
                <div class="login-extern">
                  <a href=""><img src="img/fb-icon.png" alt="Facebook"></a>
                  <a href=""><img src="img/go-icon.png" alt="Google"></a>
                </div>
                        <form class="signin-form" action="" method="post">
                                <div class="signin-group-form">
                                        <label for="firts-name">Nombre</label>
                                                <input class="form-input" type="text" id="firts-name" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>" name="nombre">
                                 <!--En esta parte hay php embebido, si existe el error del input, aparece un span conteniendo el error respectivo.  -->
                                                <?php if (isset($errores['emptyName'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['emptyName']; ?></span>
                                                <?php endif ?>
                                </div>
                                <div class="signin-group-form">
                                        <label for="last-name">Apellido</label>
                                                <input class="form-input" type="text" id="last-name" value="<?php if(isset($_POST['apellido'])) echo $_POST['apellido']; ?>" name="apellido">
                                 <!--En esta parte hay php embebido, si existe el error del input, aparece un span conteniendo el error respectivo.  -->
                                                <?php if (isset($errores['emptyLastName'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['emptyLastName']; ?></span>
                                                <?php endif ?>
                                </div>
                                <div class="signin-group-form">
                                        <label for="email">Email</label>
                                        <input class="form-input" type="text" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email">
                                 <!--En esta parte hay php embebido, si existe el error del input, aparece un span conteniendo el error respectivo.  -->
                                        <?php if (isset($errores['emptyEmail'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['emptyEmail']; ?></span>
                                                <?php endif ?>
                                                <?php if (isset($errores['invalidEmail'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['invalidEmail']; ?></span>
                                                <?php endif ?>
                                                <?php if (isset($errores['usuarioExiste'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['usuarioExiste']; ?></span>
                                                <?php endif ?>
                                </div>
                                <div class="signin-group-form">
                                        <label for="password">Contraseña</label>
                                                <input class="form-input" type="password" id="password" value="" name="password">
                                 <!--En esta parte hay php embebido, si existe el error del input, aparece un span conteniendo el error respectivo.  -->
                                                <?php if (isset($errores['emptyPassword'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['emptyPassword']; ?></span>
                                                <?php endif ?>
                                                <?php if (isset($errores['passwordLength'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['passwordLength']; ?></span>
                                                <?php endif ?>
                                                <?php if (isset($errores['passwordlower'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['passwordlower']; ?></span>
                                                <?php endif ?>
                                </div>
                                <div class="politics">
                                        <div class="tyc">
                                                <input type="checkbox" id="politics" name="tyc">
                                                <label for="politics">Estoy de acuerdo con los <a href="">términos y condiciones.</a></label>
                                        </div>
                                  <!--En esta parte hay php embebido, si existe el error del input, aparece un span conteniendo el error respectivo.  -->   
                                                <?php if (isset($errores['emptyTyc'])):?>
                                                <span class="error-container"><i class="fas fa-exclamation-circle"></i><?php echo $errores['emptyTyc']; ?></span>
                                                <?php endif ?>
                                </div>
                                <button class="form-row form-button" type="submit" name="send-signin">Crear cuenta</button>
                        </form>
                </article>
                <!-- fin <article class="signin container"> -->
        </section>
</main>
<!-- fin class="main-registro" -->

<?php
//convoca al footer
require_once('_footer.php');

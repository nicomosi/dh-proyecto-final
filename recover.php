<?php require_once('_head.php'); ?>
<title>Log-in | Objective Food</title>
  </head>
<?php
//convoca al header
require_once('_header.php');
require_once('controllers/recoverControllers.php'); 

//si hay sesion iniciada, e intentar acceder al de reestablecer contraseña, este redirecciona al perfil del usuario
if (status()) { 
  header('location: userProfile.php');
    exit();
}
?>
<main class="login-back">
  <section class="back-blur">
        <article class="login container">
            <h3>Reestablecer contraseña</h3>

            <form class="" action="" method="post">
                <label for="account">Email:</label>
                <input class="form-input form-row" type="text" id="account"  name="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                  <?php if (isset($errores["email"])) { ?><span class="error-container">
                      <i class="fas fa-exclamation-circle"></i>
                      <?php echo $errores["email"]; ?>
                    </span>
                  <?php } ?>
                <label for="password">Nueva Contraseña:</label>
                
                <input class="form-input form-row" type="password" name="password" >
                  <?php if (isset($errores["password"])) { ?><span class="error-container">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo $errores["password"]; ?>
                </span>
                <?php } ?>
                <button class="form-row form-button" type="submit" name="submit">Enviar</button>
            </form>
        </article>
        <!-- fin article class="login container"  -->
  </section>

</main>

<?php
//convoca al footer
require_once('_footer.php');

?>
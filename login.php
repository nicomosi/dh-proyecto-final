<?php require_once('_head.php'); ?>
<title>Login</title>
  </head>
<?php
//convoca al header
require_once('_header.php');
?>
<main class="login-back">
  <section class="back-blur">
        <article class="login container">
            <h3>Ingresar</h3>
            <div class="login-extern">  
              <img src="img/fb-icon.png" alt="Facebook">
              <img src="img/go-icon.png" alt="Google">
            </div>

            <form class="" action="">
                <label for="account">Cuenta:</label>
                <input class="form-input form-row" type="text" id="account" placeholder="" required>
                <label for="password">Contraseña:</label>
                <a href="#">Olvidé mi Contraseña</a>
                <input class="form-input form-row" type="password" id="password" placeholder="" required>
                <input type="checkbox" name="connect">
                <label for="connect">Mantenerme conectado</label>
                <button class="form-row form-button" type="submit" id="send-login">Enviar</button>
            </form>
        </article>
        <!-- fin article class="login container"  -->
  </section>
  
</main>

<?php
//convoca al footer
require_once('_footer.php');

?>

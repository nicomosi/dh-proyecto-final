<?php require_once('_head.php'); ?>
<title>Registro</title>
  </head>
<?php
//convoca al header
require_once('_header.php');
?>
<main class="signin-back">
        <section class="back-blur">
                <article class="signin container">
                <h3>Crea una cuenta</h3>
                <div class="login-extern">
                  <a href=""><img src="img/fb-icon.png" alt="Facebook"></a>
                  <a href=""><img src="img/go-icon.png" alt="Google"></a>
                </div>
                        <form class="signin-form" action="">

                                <div class="signin-group-form">
                                        <label for="firts-name">Nombre:</label>
                                        <input class="form-input" type="text" id="firts-name" placeholder="" required>
                                </div>
                                <div class="signin-group-form">
                                        <label for="last-name">Apellido:</label>
                                        <input class="form-input" type="text" id="last-name" placeholder="" required>
                                </div>
                                <div class="signin-group-form">
                                        <label for="email">Email:</label>
                                        <input class="form-input" type="email" id="email" placeholder="" required>
                                </div>
                                <div class="signin-group-form">
                                        <label for="password">Contraseña:</label>
                                        <input class="form-input" type="password" id="password" placeholder="" required>
                                </div>
                                <div class="politics">
                                        <input type="checkbox" id="politics">
                                        <label for="politics">Al crear tu cuenta, estás aceptando los términos de servicio y la política de privacidad de ##.</label>
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

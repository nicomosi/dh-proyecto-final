<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="¡ACÁ escribir máximo 160 caracteres!">
  <meta name="author" content="Nicolas Mosi">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos-nico.css">
  <link rel="stylesheet" href="css/estilos-francis.css">
  <link rel="stylesheet" href="css/estilos-juan.css">
  <title>Login</title>
</head>



<?php
//convoca al header
require_once('_header.php');

?>
<main>
        <section class="login container">
            <h3>Ingresar</h3>
            <div class="login-extern">
              <img src="img/fb-icon.png" alt="Facebook">
              <img src="img/go-icon.png" alt="Google">
            </div>

            <form class="login-form" action="">
                <label for="account">Cuenta:</label>
                <input class="form-input form-row" type="text" name="account" placeholder="" required>
                <label for="password">Contraseña:</label>
                <a href="#">Olvidé mi Contraseña</a>
                <input class="form-input form-row" type="password" name="password" placeholder="" required>
                <input type="checkbox" name="connect">
                <label for="connect">Mantenerme conectado</label>
                <button class="form-row" type="submit" name="send">Enviar</button>
            </form>
        </section>
        <!-- fin section class="login container"  -->
</main>

<?php
//convoca al footer
require_once('_footer.php');

?>

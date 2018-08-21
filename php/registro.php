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
    <link rel="stylesheet" href="../css/estilos-nico.css">
    <link rel="stylesheet" href="../css/estilos-francis.css">
    <link rel="stylesheet" href="../css/estilos-juan.css">
    <title>Home</title>
  </head>


<?php
//convoca al header
require_once('header.php');
?>
<main class="main-registro">
        <section class="signin container">
            <h3>Crea una cuenta</h3>
        <form class="signin-form" action="">

            <div class="signin-group-form">
                    <label for="firts-name">Nombre:</label>
                    <input class="form-input" type="text" name="firts-name" placeholder="" required>
            </div>
            <div class="signin-group-form">
                    <label for="last-name">Apellido:</label>
                    <input class="form-input" type="text" name="last-name" placeholder="" required>
            </div>
            <div class="signin-group-form">
                    <label for="email">Email:</label>
                    <input class="form-input" type="email" name="email" placeholder="" required>
            </div>
            <div class="signin-group-form">
                    <label for="password">Contraseña:</label>
                    <input class="form-input" type="password" name="password" placeholder="" required>
            </div>
            <div class="politics">
            <input type="checkbox" name="politics">
            <label for="politics">Al crear tu cuenta, estás aceptando los términos de servicio y la política de privacidad de ##.</label>
            </div>
            <button class="form-row" type="submit" name="send">Crear cuenta</button>
        </form>
    </section>
    </main>

<?php
//convoca al footer
require_once('footer.php');

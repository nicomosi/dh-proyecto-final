<?php require_once('_head.php'); 
require_once('controllers/validationControllers.php');
require_once('controllers/filesControllers.php');
require_once('controllers/helpers.php');
require_once('controllers/profileImageControllers.php');
?>
<?php
//si no hay sesion iniciada, e intentar acceder al perfil, este redirecciona al login
if (!status()) { 
  header('location: login.php');
    exit();
}
//GUARDAR FOTO EN USER
if ($_FILES){
  
  $filesErrores = validarFotoPerfil($_SESSION['usuario']);
  modificarFotoUsuario($_SESSION['usuario']['email']);
}


?>
<title>Perfil | Objective Food</title>
  </head>
<?php
//convoca al header
require_once('_header.php');
?>
<body>

    <section class="contact-container">
      <!-- <nav class="nav-perfil">
        <ul>
          <a href=""><li>Cuenta</li></a>
          <a href=""><li>Informes</li></a>
          <a href=""><li>Ventas</li></a>
          <a href=""><li>Configuración</li></a>
        </ul>
      </nav> -->
      <section class="file">
        <article>
          <h3>Hola <?= user()['nombre'];?></h3>
          <img src="<?= user()['fotoperfil']?>" alt="">
          <form class="file-form"action="" method="post" enctype="multipart/form-data">
            <label for="file">Foto de Perfil</label>
            <input type="file" name="subirFotoPerfil">
            <button type="subit">Subir</button>
          </form>
        </article>

        <article class="">
          <form class="contact-form" method="post">
            <label for="nombre">Nombre:</label>
            <input  class="form-input" name ="nombre" type="text" value="<?= user()['nombre'];?>">
            <label for="apellido">Apellido:</label>
            <input  class="form-input" name="apellido" type="text" value="<?= user()['apellido'];?>">
            <label for="email">Email:</label>
            <input  class="form-input" name="email" type="email" value="<?= user()['email'];?>">
            <!-- <button type ="submit" name="submit">Actualizar</button> -->
          </form>
        </article>

       
      </section>
    </section>
</body>
<?php
//convoca al footer
require_once('_footer.php');
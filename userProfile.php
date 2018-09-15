<?php require_once('_head.php'); 
require_once('controllers/validationControllers.php');
require_once('controllers/filesControllers.php');
require_once('controllers/helpers.php');
require_once('controllers/profileImageControllers.php');
?>
<?php
// if (!status()) { 
//   header('location: login.php');
//     exit();
// }
var_dump(user());
//GUARDAR FOTO EN USER
if ($_FILES){
  
  $filesErrores = validarFotoPerfil($_SESSION['usuario']);
  modificarFotoUsuario($_SESSION['usuario']['email']);
  var_dump($_FILES);
}


?>
<title>Perfil | Objective Food</title>
  </head>
<?php
//convoca al header
require_once('_header.php');
?>
<body>

    <section class="profile">
      <nav class="nav-perfil">
        <ul>
          <a href=""><li>Cuenta</li></a>
          <a href=""><li>Informes</li></a>
          <a href=""><li>Ventas</li></a>
          <a href=""><li>Configuración</li></a>
        </ul>
      </nav>
      <section class="profile-content">
        <article>
          <!-- <h3><?= user()['nombre'];?></h3> -->
          <p><?= user()['email'];?></p>
          <img src="<?= user()['fotoperfil']?>" alt="">
          <form action="" method="post" enctype="multipart/form-data">
            <label for="file">Foto de Perfil</label>
            <input type="file" name="subirFotoPerfil">
            <button type="submit">Subir</button>
          </form>
        </article>
      </section>
    </section>
</body>
<?php
//convoca al footer
require_once('_footer.php');
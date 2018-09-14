<?php require_once('_head.php'); 
require_once('controllers/filesControllers.php');
require_once('controllers/helpers.php');
?>
<?php
if (!status()) { 
  header('location: login.php');
    exit();
}

//GUARDAR FOTO EN USER
if ($_FILES){
  $filesErrores = validarFotoPerfil();
  $fotoPerfil = $_FILES['fotoPerfil'];
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
          <h3>Juan Spada</h3>
          <!-- <h3><?= user()['nombre'];?></h3> -->
          <p><?= user()['email'];?></p>
          <img src="img/profile.svg" alt="Foto de Perfil">
          <form action="" method="post">
            <label for="file">Foto de Perfil</label>
            <input type="file">
            <button type="submit">Subir</button>
          </form>
        </article>
      </section>
    </section>
</body>
<?php
//convoca al footer
require_once('_footer.php');
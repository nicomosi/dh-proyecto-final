<?php
require_once('controllers/sessionControllers.php'); 

?> 
<header>
  <section class="header-top">
    <article class="contenedor-logo-header">LOGO</article>
    <nav>
      <ul class="nav-principal"><!--Nav principal es el de la izq-->
        <li><a href="index.php">Home</a></li>
        <li><a href="">¿Quienes Somos?</a></li>
        <li><a href="">Productos</a></li>
        <li><a href="faq.php">Ayuda</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav-secundario"><!--El nav secundario es el de los botones de ingreso y registro -->
      <?php if (!status()) { ?>
        <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>Ingresar</a></li>
        <li><a href="registro.php"><i class="fas fa-user-plus"></i>Registrarme</a></li>
      <?php } else { ?>
        <li><a href="userProfile.php"><i class="fas fa-user-plus"></i>Perfil</a></li>
        <li><a href="logout.php"><i class="fas fa-user-plus"></i>Logout</a></li>
      <?php } ?>
      </ul>
    </nav>
    <article class="contenedor-btn-header">
      <i class="fas fa-bars"></i>
    </article>
  </section>

</header>

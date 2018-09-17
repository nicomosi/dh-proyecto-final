<?php
require_once('controllers/filesControllers.php');
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
      <?php if (!status()) { //hace referencia a si esta conectado o no?> 
        <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>Ingresar</a></li>
        <li><a href="registro.php"><i class="fas fa-user-plus"></i>Registrarme</a></li>
      <?php } else { ?>
        <li><a href="userProfile.php"><i class="fas fa-user-cog"></i><?= status() ? (userName($_SESSION['usuario'])) : ""; ?></a></li>
        <li><a href="logout.php"><i class="fas fa-user-times"></i>Salir</a></li>
      <?php } ?>
      </ul>
    </nav>
    <article class="contenedor-btn-header">
      <button onclick='toggleMenu()'><i class="fas fa-bars"></i></button>
      <script>
        function toggleMenu() {
          var x = document.getElementById("side-navbar");
          
          if (x.style.display === "none") {
            x.style.transition = "0.5s";
            x.style.display = "flex";
          } else {
            x.style.display = "none";
          }
          
      }
      </script>
    </article>
  </section>
  <section id="side-navbar">
    <ul class="nav-principal"><!--Nav principal es el de la izq-->
        <li><a href="index.php">Home</a></li>
        <li><a href="">¿Quienes Somos?</a></li>
        <li><a href="">Productos</a></li>
        <li><a href="faq.php">Ayuda</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>Ingresar</a></li>
        <li><a href="registro.php"><i class="fas fa-user-plus"></i>Registrarme</a></li>
      </ul>
  </section>
</header>

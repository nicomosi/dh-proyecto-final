<?php require_once('_head.php'); 
require_once('controllers/filesControllers.php');
?>
<?php
if (!status()) { 
  header('location: index.php');
    exit();
}
?>
<title>Log-in | Objective Food</title>
  </head>
<?php
//convoca al header
require_once('_header.php');
?>
<body>
    <h1>BIENVENIDO!</h1>
</body>
<?php
//convoca al footer
require_once('_footer.php');
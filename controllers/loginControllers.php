<?php 
require_once('controllers/validationLoginControllers.php'); 
require_once('controllers/filesControllers.php'); 
require_once('controllers/sessionControllers.php'); 

require_once('controllers/helpers.php'); 

// si se recibio datos del form login
if ($_POST) {
    
    $errores = validationLogin($_POST); //se envian los datos recibidos por POST a la funcion encargada de validar los datos
    

// si no hay errores, se guarda el usuario en un array
    if (!$errores) 
    {

        $usuarioLogin = traerUsuario($_POST['email']);

        //funcion que se encarga de iniciar sesion y de mantenerla abierta si el usuario tildo la opcion de recordar, para ello, se le pasa el array que devuelve la funcion loginUser
        rememberSession($usuarioLogin);
        
        //por ultimo, la pagina del login, redirecciona a la principal
        header('Location: index.php'); 
        exit();
        
    }
        
}
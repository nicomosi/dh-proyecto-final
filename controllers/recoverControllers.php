<?php 
require_once('controllers/validationRecoverControllers.php'); 
require_once('controllers/filesControllers.php'); 
require_once('controllers/sessionControllers.php'); 
 

// si se recibio datos del form para crear una nueva contraseña
if ($_POST) {
    
    $errores = validarRecover($_POST); //se envian los datos recibidos por POST a la funcion encargada de validar los datos
    

// si no hay errores, se modifica el archivon Json con la funcion modificarJson
    if (!$errores) 
    {

        $recoverPassword =password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
       
        //Esta funcion se encuetra en el archivo validatioRecoverControllers, la misma recibe como parametro el email y la nueva contraseña. El email para poder verificar el usuario donde se cambiara la contraseña.
        modificarJson($email, $recoverPassword);

        //se cierra la sesion si hay una abierta. Si closeSession no se ejecuta, se evidencian errores  en el menu del header.
        closeSession();
        
        //luego se direcciona a la pagina de login
        header('Location: login.php'); 
        exit();

        
        
    }
        
}
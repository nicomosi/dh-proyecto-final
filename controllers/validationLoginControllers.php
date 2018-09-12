<?php
require_once('controllers/filesControllers.php'); 

// retorna el error
function loginError($dato){

    switch ($dato) {
        
        case 'email':
            $error = "Debes ingresar tu email para poder iniciar sesión";
            return $error;
            break;
        case 'email-invalidates':
            $error = "La dirección de E-mail ingresada no es válida!";
            return $error;
            break; 
        case 'password':
            $error = "Debes ingresar tu contraseña para poder iniciar sesión";
            return $error;
            break;
        case 'password-invalidates':
            $error = "La contraseña ingresada no es válida!";
            return $error;
            break;
    }

}

//Recibe por post los datos introducidos en el form de login y realiza la validacion. Si consigue algun error, se llama a la funcion loginError encargada de devolver el error especifico. Esta funcion devuelve un array asociativo si hay errores
function validationLogin($post){
$error = [];
    
    if (isset($_POST['email'])) {               
        $email = ($_POST['email']);
        if (empty($email)) {            
            $error['email'] = loginError('email');
        }
        elseif (searchUser($email) !== $email){                 
            
            $error['email'] = loginError('email-invalidates');
        }

    }

    if (isset($_POST['password'])) {               
        $password = ($_POST['password']);

        if (empty($password)) {            
           $error['password'] = loginError('password');
        }
            
        elseif (searchPassword($password) !== $password){                 
            $error['password'] = loginError('password-invalidates');
        }
        

    }
   

    return $error;
    
}

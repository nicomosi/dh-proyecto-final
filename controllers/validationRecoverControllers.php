<?php
require_once('controllers/filesControllers.php'); 

// retorna el error
function recoverError($dato){

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
            $error = "Debes ingresar una contraseña";
            return $error;
            break;
        case 'passwordLength':
            $error = "La contraseña debe tener un minimo de 8 caracteres!";
            return $error;
            break;
        case 'passwordlower':
            $error = "La contraseña debe tener una letra mayuscula!";
            return $error;
            break;
    }

}

function validarRecover($post){
    $error = [];
        
        if (isset($_POST['email'])) {               
            $email = ($_POST['email']);
            if (empty($email)) {            
                $error['email'] = recoverError('email');
            }
            elseif (searchUser($email) !== $email){                 
                
                $error['email'] = recoverError('email-invalidates');
            }
    
        }
    
        if (isset($_POST['password'])) {               
            $password = ($_POST['password']);
    
            if (empty($password)) {            
               $error['password'] = recoverError('password');
            } elseif (strlen($_POST['password'])<8) {
                $error['password'] = recoverError('passwordLength');
            } elseif ($_POST['password'] === strtolower($_POST['password'])) {// si son iguales es porque no hay mayuscula y muestra error
                $error['password'] = recoverError('passwordlower');
            
            }
    
        }
       
    
        return $error;
        
    }
    
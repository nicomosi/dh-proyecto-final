<?php 
function validarErrores(){
    //+ la variable $errores es un array asociativo que empieza vacio, a medida que aparecen errores
    //+ este va a ir acumulandolos en sus respectivas posiciones.
$errores=[];

    if (isset($_POST['nombre'])) {
        if ($_POST['nombre']==="") {
            $errores['emptyName']='Debes ingresar tu nombre para poder registrarte!';
         }
    }
    
    if (isset($_POST['apellido'])) {
        if ($_POST['apellido']==="") {
            $errores['emptyLastName']='Debes ingresar tu apellido para poder registrarte!';
        }
    }

    if (isset($_POST['email'])) {
        if ($_POST['email']==="") {
            $errores['emptyEmail']='Debes ingresar una direccion de E-mail para poder registrarte!';
        }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['invalidEmail']='La dirección de E-mail ingresada no es válida!';
        }
    }

    if (isset($_POST['password'])) {
        if ($_POST['password']==="") {
            $errores['emptyPassword']='Debes ingresar una contraseña para poder registrarte!';
        }elseif (strlen($_POST['password'])<8) {
            $errores['passwordLength']='La contraseña debe tener un minimo de 8 caracteres!';
        }
    }

    if (!isset($_POST['tyc'])) {
        $errores['emptyTyc']='Debes aceptar los términos y condiciones para poder registrarte!';
    }

    return $errores;
}

?>
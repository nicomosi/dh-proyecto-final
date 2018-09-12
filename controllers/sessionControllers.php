<?php
require_once('controllers/loginControllers.php'); 


function closeSession()
{
    if (!$_SESSION) {
        session_start();
    }

    session_destroy();

    // Seteamos la cookie de usuario con valor null y tiempo en negativo.
    setcookie('usuario', null, time()-1);
}
//Ayuda a conocer el estado de la sesion. Es implementada principalmente en el header para mostrar u ocultar opciones del menu
function status()
{
    if (isset($_SESSION['usuario'])) {
        return true;
    }
    else {
        return false;
    }
   
}

//Es implementada en el login para iniciar sesion y mantenerla si el usuario tildo la opcion de recordar
function rememberSession($usuarioLogin)
{
    $_SESSION['usuario'] = $usuarioLogin;
    if (isset($_POST['remember'])) {
        $time = time() + 3600 * 24 * 7;

        setcookie('nombre', json_encode($usuarioLogin), $time);
        setcookie('email', $usuarioLogin['email'], $time);
    } else
    {
        setcookie('email', null, time()-1);
    }
}

function hayCookie($dato)
{
    if (isset($_COOKIE[$dato])) {
        if (json_decode($_COOKIE[$dato]) !== NULL) {
            return json_decode($_COOKIE[$dato], true);
        } else{
            return $_COOKIE[$dato];
        }
    } else 
    {
        return false;
    }
}

function mantenerSesion()
{
    if ((isset($_POST['remember'])) && !isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = hayCookie('nombre');

        //setea la sesion a un nuevo tiempo
        setcookie('nombre', $_COOKIE['nombre'], time()+3600*24*7);
    }

}
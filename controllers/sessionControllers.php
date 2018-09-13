<?php
require_once('controllers/loginControllers.php'); 


function closeSession()
{
    if (!$_SESSION) {
        session_start();
    }

    session_destroy();

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
        $time = time() + 3600 * 24 * 30;    //30 dias para que se mantenga la sesion

        setcookie('nombre', json_encode($usuarioLogin), $time);
        setcookie('email', $usuarioLogin['email'], $time);
    } else
    {
        setcookie('email', null, time()-1);
    }
}
//si se tilda elcheckbox recordarme, se setea la cookie
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
//funcion que es invocada en el index para mantener abierta la sesion
function mantenerSesion()
{
    if ((isset($_POST['remember'])) && !isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = hayCookie('nombre');

        //reinicia la sesion a unos 30 dias mas
        setcookie('nombre', $_COOKIE['nombre'], time()+3600 * 24 * 30);
    }

}
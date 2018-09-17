<?php 
require_once('sessionControllers.php');
function guardarFoto($fotoPerfil)
{

    // Ponemos el nombre original de la foto en una variable.
    $nombre = $fotoPerfil["name"];

    // Ponemos el nombre nuevo en otra variable (el que php pone en la carpeta /tmp).
    $archivo = $fotoPerfil["tmp_name"];

    // Ponemos la extensión del archivo en una variable.
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);

    // Generamos el nuevo nombre de la imagen usando un id único con la función uniqid
    $nombreFinal = uniqid() . "." . $ext;

    // Generamos el nuevo path completo de la imagen, usando realpath para permitirnos volver una carpeta hacia atrás.
    $miArchivo = realpath(dirname(__FILE__) . '/..');
    $miArchivo = $miArchivo . "/img/";
    $miArchivo = $miArchivo . $nombreFinal;


    // Movemos el archivo de nuestro /tmp a la nueva locación (en este caso, la carpeta /img)
    move_uploaded_file($archivo, $miArchivo);

    return $nombreFinal;
}

function modificarFotoUsuario($email){
    $recurso=fopen('usuarios.json', 'r');

    $usuarios=file_get_contents('usuarios.json');
    $usuarios = explode(PHP_EOL, $usuarios);
    array_pop($usuarios);

    foreach ($usuarios as $llave => $valor) {
        $usuarioJson=json_decode($valor, true);
        if ($usuarioJson['email']===$email) {
            $nuevaFoto = 'img/' . guardarFoto($_FILES["subirFotoPerfil"]);
            $usuarioJson["fotoperfil"] = $nuevaFoto;
            $usuarios[$llave] = json_encode($usuarioJson);
            $_SESSION["usuario"]["fotoperfil"] = $nuevaFoto;
        }
    }
    file_put_contents('usuarios.json', implode(PHP_EOL, $usuarios) . PHP_EOL);
    // var_dump(modificarFotoUsuario($_SESSION['usuario']['email']));
    
}

?>

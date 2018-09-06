<?php 
//+ la funcion traer usuario recibe un parametro email que en realidad va a ser la variable 
//+ $_POST['email]. Al recibir el email, primero declara al usuario como null( osea no existe).
//+ luego, hace un fopen del archivo 'usuarios.json' y lo recorre linea por linea decodificando
//+ cada usuario. Si el email recibido por post concuerda con un email del archivo json quiere decir
//+ que el usuario ya existía entonces deja de ser null. Cierra el archivo y retorna $usuario.
function traerUsuario($email){
    $usuario=null;

    $recurso=fopen('usuarios.json', 'r');
    while (($linea = fgets($recurso))!==false) {
        $usuarioActual=json_decode($linea, true);

        if ($usuarioActual['email']===$email) {
            $usuario=$usuarioActual;
            break;
        }
    } 
    fclose($recurso);
    return $usuario;
}

//+ la funcion guardarUsuario recibe como parametro un usuario, hace un json_encode de este y luego
//+ lo guarda en el archivo usuarios.json.

function guardarUsuario($usuario){
    $jsonUsuarioNuevo=json_encode($usuario);
    file_put_contents('usuarios.json', $jsonUsuarioNuevo.PHP_EOL, FILE_APPEND);
}
?>
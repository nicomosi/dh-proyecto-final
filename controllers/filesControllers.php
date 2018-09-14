<?php 
//+ la funcion traer usuario recibe un parametro email que en realidad va a ser la variable 
//+ $_POST['email]. Al recibir el email, primero declara al usuario como null( osea no existe).
//+ luego, hace un fopen del archivo 'usuarios.txt' y lo recorre linea por linea decodificando
//+ cada usuario. Si el email recibido por post concuerda con un email del archivo json quiere decir
//+ que el usuario ya existía entonces deja de ser null. Cierra el archivo y retorna $usuario.
function traerUsuario($email){
    $usuario=null;
   
    if (isset($recurso)) {
        $recurso = fopen('usuarios.txt', 'a+');
    } else {
        $recurso = fopen('usuarios.txt', 'r');
    }
    

    while (($linea = fgets($recurso))!==false) {
        $usuarioActual=json_decode($linea, true);

        if ($usuarioActual['email'] === $email) {
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
    file_put_contents('usuarios.txt', $jsonUsuarioNuevo . PHP_EOL, FILE_APPEND);
}

//busca si el usuario existe y si es asi, devuelve true. Esta funcion es usada en el login para verificar si el email introducido existe 
function searchUser($email){
    
    $emailDecod = [];
    
    if (isset($archivo)) {
        $archivo = fopen('usuarios.txt', 'r');  //abre en modo lectura
    } else {
        $archivo = fopen('usuarios.txt', 'r');
    }    
                
        while (($linea = fgets($archivo)) !== false) {
            $emailDecod = json_decode($linea, true);     
                               
                if ($emailDecod['email'] === $email) {  
                    return $email;
                    break;
                } 
                
            
        }
        fclose($archivo);
     
   
        
}
//Verifica contraseña en el archivo json. Esta funcion es usada en el login para verificar si el password introducido coincide con el guardado en el registro 
function searchPassword($password){
    
    $passwordDecod = [];
    
    if (isset($archivo)) {
        $archivo = fopen('usuarios.txt', 'r');
    } else {
        $archivo = fopen('usuarios.txt', 'r');
    }  
        
        while (($linea = fgets($archivo)) !== false) {
            $passwordDecod = json_decode($linea, true);
                
            if (password_verify($password, $passwordDecod['password'])) {  //Si la verificacion es true, devuelve el valor introducido. Luego este valor se compara con el mismo en la funcion de validationLogin como indicativo de que son iguales.
                return true;
                break;
            }                 
            
        }
        fclose($archivo);
        
        return false;
       
}

//Funcion que devuelve un array asociativo con la informacion de lo recibido por POST en el formulario login, luego de la validacion.
function loginUser($email, $password, $remember){
    $usuario = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT), //se realiza el hash del password, luego de validar
        'remember'=> $remember
    ];
    return $usuario;
}

//Esta funcion es usada para mostrar el nombre de la persona que inició sesion 
function userName($usuario){
    
    $usuarioDecod = [];
    
    if (isset($archivo)) {
        $archivo = fopen("usuarios.txt", "r");
    } else {
        $archivo = fopen("usuarios.txt", "r");
    }

        
        while (($linea = fgets($archivo)) !== false) {
            $usuarioDecod = json_decode($linea, true);
            
            if ($usuario['email'] === $usuarioDecod['email']) { 
                return $usuarioDecod['nombre'];
                break;
            }
            
        }
        fclose($archivo);
     
        
}




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

?>
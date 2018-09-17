<?php 
//+ la funcion traer usuario recibe un parametro email que en realidad va a ser la variable 
//+ $_POST['email]. Al recibir el email, primero declara al usuario como null( osea no existe).
//+ luego, hace un fopen del archivo 'usuarios.txt' y lo recorre linea por linea decodificando
//+ cada usuario. Si el email recibido por post concuerda con un email del archivo json quiere decir
//+ que el usuario ya existía entonces deja de ser null. Cierra el archivo y retorna $usuario.
function traerUsuario($email){
    $usuario=null;
    
    $recurso = fopen('usuarios.json', 'r');
    

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
    file_put_contents('usuarios.json', $jsonUsuarioNuevo . PHP_EOL, FILE_APPEND);
}

//busca si el usuario existe y si es asi, devuelve true. Esta funcion es usada en el login para verificar si el email introducido existe 
function searchUser($email){
    
    $emailDecod = [];
    
    if (isset($archivo)) {
        $archivo = fopen('usuarios.json', 'r');  //abre en modo lectura
    } else {
        $archivo = fopen('usuarios.json', 'r');
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
function searchPassword($password, $email){
    
    $passwordDecod = [];
    
    if (isset($archivo)) {
        $archivo = fopen('usuarios.json', 'r');
    } else {
        $archivo = fopen('usuarios.json', 'r');
    }  
        
        while (($linea = fgets($archivo)) !== false) {
            $passwordDecod = json_decode($linea, true);
            if ($passwordDecod['email']===$email) {
                
                if (password_verify($password, $passwordDecod['password'])) {  //devuelve true si la verificacion lo es
                    return true;
                    break;
                }  
            }               
            
        }
        fclose($archivo);
        
        return false;
       
}

//Funcion que devuelve un array asociativo con la informacion de lo recibido por POST en el formulario login, luego de la validacion.
// function loginUser($email, $password, $remember){
//     $usuario = [
//         'email' => $email,
//         'password' => password_hash($password, PASSWORD_DEFAULT), //se realiza el hash del password, luego de validar
//         'remember'=> $remember
//     ];
//     return $usuario;
// }

//Esta funcion es usada para mostrar el nombre de la persona que inició sesion 
function userName($usuario){
    
    $usuarioDecod = [];
    
    if (isset($archivo)) {
        $archivo = fopen("usuarios.json", "r");
    } else {
        $archivo = fopen("usuarios.json", "r");
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

function modificarJson($email,$recover){  
    $recurso=fopen('usuarios.json', 'r');

    $usuarios=file_get_contents('usuarios.json');
    $usuarios = explode(PHP_EOL, $usuarios);
    array_pop($usuarios);

    foreach ($usuarios as $llave => $valor) {
        $usuarioJson=json_decode($valor, true);
        if ($usuarioJson['email']===$email) {
        
         $nuevoPassword = $recover;
         $usuarioJson["password"] = $nuevoPassword;
         $usuarios[$llave] = json_encode($usuarioJson);
         $_SESSION["usuario"]["password"] = $nuevoPassword;
        }
    }
    file_put_contents('usuarios.json', implode(PHP_EOL, $usuarios) . PHP_EOL);
    
    
}




?>
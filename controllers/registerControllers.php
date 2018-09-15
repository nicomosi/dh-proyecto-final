<?php 
require_once('controllers/validationControllers.php');
require_once('controllers/filesControllers.php');
//+ la funcion crearUsuario recibe parametros desde $_POST y $_FILES y crea un 
//+ array asociativo con ellos. Devuelve la variable $usuario.

if ($_POST) {
    //+ Si recibo datos por $_POST, primero checkeo si con el dato ingresado por  
    //+ email existe un usuario viejo y lo guardo en la variable $usuarioViejo. 
    //+ Si no se encuentra un mail igual, el usuario no existe ($usuarioViejo===null).
    //+ Si no existe, creo un usuario nuevo con los datos que recibo por POST, la variable
    //+ $usuarioNuevo va a guardar el array asociativo proveniente de la funcion crearUsuario.

    $errores=validarErrores();
    $usuarioViejo=traerUsuario($_POST['email']);
    if ($usuarioViejo===null) {
            
    //+ Una vez creado el usuario nuevo, verifico si no hay errores y si checkeo el terminos y condiciones.
            if (count($errores)===0 && isset($_POST['tyc'])) {
                $usuarioNuevo=crearUsuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password']);
    //+ si no existen errores, hasheo la contraseña y la guardo.
                     $hashedPassword=password_hash($_POST['password'], PASSWORD_DEFAULT);
                     $usuarioNuevo['password']=$hashedPassword;
    //+ se procede a guardar los datos del usuario en el archivo JSON para luego crear una 
    //+ sesion con su usuario y redirigirlo a la página del usuario.
                    guardarUsuario($usuarioNuevo);
                    $_SESSION['usuario']=$usuarioNuevo;
                    redirect();
            }
    }else {
            //+ si el usuario existe, se crea un error.
            $errores['usuarioExiste']='Este email ya pertenece a una cuenta registrada!';
    }
}

function crearUsuario($nombre, $apellido, $email, $password, $fotoPerfil="img/profile.svg"){
    $usuario=[
    'nombre'=>ucwords(strtolower($nombre)),  //Guarda con mayuscula el primer caracter y el resto en minuscula
    'apellido'=>ucwords(strtolower($apellido)), 
    'email'=>strtolower($email),  //guarda el email en mayuscula
    'password' => $password,
    'fotoperfil'=>$fotoPerfil
    ];
    return $usuario;
} 

?>
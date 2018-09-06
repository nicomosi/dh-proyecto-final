<?php 
//+ la funcion crearUsuario recibe parametros desde $_POST y $_FILES y crea un 
//+ array asociativo con ellos. Devuelve la variable $usuario.


function crearUsuario($nombre, $apellido, $email, $password){
$usuario=[
'nombre'=>$nombre,    
'apellido'=>$apellido,
'email'=>$email,
'password'=>$password
];
    return $usuario;
} 
?>
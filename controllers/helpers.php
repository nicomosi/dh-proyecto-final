<?php 
function redirect(){
    header('location: userProfile.php');
    exit();
}
function old($name){
        echo $_POST[$name];
}

?>
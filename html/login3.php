<?php

session_unset(); //cerramos la sesión. También podemos hacer session_destroy();
session_start(); //indicamos que vamos a usar sesiones

//Recogemos las variables que nos envía por post
$username = $_POST['usser']; 

//en principio, si llegamos hasta aquí es que el usuario sí que existe, por tanto, iniciamos sesión directamente, guardando el nombre de usuario en la sesión

$_SESSION['username'] = $username;


?>

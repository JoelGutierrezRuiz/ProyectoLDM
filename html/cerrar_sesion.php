<?php
session_start(); //indicamos que vamos a usar sesiones

session_unset(); //cerramos la sesión. También podemos hacer session_destroy();

//redirigimos a la página principal
header("Location: ../index.php");
die();
?>

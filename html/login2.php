<?php
session_start(); //indicamos que vamos a usar sesiones

//Recogemos las variables que nos envía en el formulario
$username = $_POST['usser']; //dentro de los corchetes, debes poner el "name" que le pusiste al input en el form
$password = $_POST['pass'];

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script>
//obtienes el XML donde están los perfiles de usuariado y llamas a la función que lo procesa
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myFunction(this);
    }
};
xhttp.open("GET", "../xml/usuariado.xml", true);
xhttp.send();

function myFunction(xml) {
	
    let user_introducido = '<?php echo $username; ?>';
    let pass_introducido = '<?php echo $password; ?>';

    console.log(user_introducido)
    console.log(pass_introducido)
    console.log(xml.responseXML)
  
    /* 
        aquí pones el código para comprobar si la combinación de usuario y contraseña que han introducido, existe en tu XML.
        Si es incorrecto, mostrarás un mensaje de error (puedes hacerlo de varias formas).
        Si es correcto, debes hacer una petición XMLHttpRequest a login3.php, por post, enviando usuario y contraseña, y cuando esté ejecutada redirigir a la página de inicio. Algo parecido a esto:"
    */


    /*

    let data = new FormData();
    data.append('user', user_introducido);
    data.append('pass', pass_introducido);
    
    var xhttp = new XMLHttpRequest();
	
	//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function() {
		if (this.readyState === 4 || this.status === 200){ 
			location.href = 'index.php';
		}       
	};
    xhttp.open("POST", "login3.php", true);
	xhttp.send(data);


    */

}
</script>

</body>
</html>

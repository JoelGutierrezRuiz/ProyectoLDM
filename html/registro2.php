<?php
session_start(); //indicamos que vamos a usar sesiones
$name = $_POST['name'];
$mail = $_POST['mail'];
$username = $_POST['usser']; 
$password = $_POST['password'];
$totalUsuarios;



if(strlen($username)<3){
	header("Location: registro.php");
}
if(strlen($password)<3){
	header("Location: registro.php");
}
if(strlen($name)<3){
	header("Location: registro.php");
}



if(strlen($username)>15){
	header("Location: registro.php");
}
if(strlen($password)>15){
	header("Location: registro.php");
}
if(strlen($name)>10){
	header("Location: registro.php");
}




echo $mail;
echo $username;
echo $password

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

function myFunction(response) {
	var name_introducido = "<?php echo $name; ?>";
    var mail_introducido = "<?php echo $mail; ?>";
	var user_introducido = "<?php echo $username; ?>";
    var pass_introducido = "<?php echo $password; ?>";

	if(!(comprobarUsuario(response,user_introducido))){
		
		registerUsser(response,name_introducido,mail_introducido,user_introducido,pass_introducido)


	}
	else{
		location.href = 'registro.php';
	}


}

	function comprobarUsuario(response,usuario){

		let xml = response.responseXML

		let ussers = xml.getElementsByTagName("usuario");
		let passwords = xml.getElementsByTagName("contrasenya");

		let repetido = false;
		let index = 0;

		do{
				
			let aux = ussers[index].childNodes[0].nodeValue;
								
			if(aux===usuario){
				return true;
			}
			console.log(usuario)

			index++;


		}while(index<ussers.length);

		return false;



	}

	
	function registerUsser(response,name_introducido,mail_introducido,user_introducido,pass_introducido){
		
		
		let xmlDoc = response.responseXML;

		let allUssers = xmlDoc.getElementsByTagName("perfil");

		// Obtener el elemento <usuariado>
		let usuariadoElement = xmlDoc.getElementsByTagName("usuariado")[0];

		// Crear el nuevo perfil
		let newUsser = xmlDoc.createElement("perfil");

		// Crear y configurar elementos para el nuevo perfil
		let nameElement = xmlDoc.createElement("nombre");
		let nameText = xmlDoc.createTextNode(name_introducido);
		nameElement.appendChild(nameText);

		let mailElement = xmlDoc.createElement("mail");
		let mailText = xmlDoc.createTextNode(mail_introducido);
		mailElement.appendChild(mailText);

		let usserElement = xmlDoc.createElement("usuario");
		let usserText = xmlDoc.createTextNode(user_introducido);
		usserElement.appendChild(usserText);

		let passwordElement = xmlDoc.createElement("contrasenya");
		let passwordText = xmlDoc.createTextNode(pass_introducido);
		passwordElement.appendChild(passwordText);

		let imgElement = xmlDoc.createElement("imagen");
		imgElement.setAttribute("src","../img/usser.png")

		// Añadir elementos al nuevo perfil
		newUsser.appendChild(nameElement);
		newUsser.appendChild(mailElement);
		newUsser.appendChild(usserElement);
		newUsser.appendChild(passwordElement);
		newUsser.appendChild(imgElement);

		// Añadir el nuevo perfil al elemento <usuariado>
		usuariadoElement.appendChild(newUsser);

		// Asignar un id único al nuevo perfil
		newUsser.setAttribute("id", allUssers.length-1);

		// Actualizar el XML
		refreshXml(xmlDoc);


	}

	function refreshXml(response){

		console.log(response)



		var xhttp2 = new XMLHttpRequest();
		xhttp2.open("POST", "registro3.php", true);
		xhttp2.setRequestHeader("Content-type", "application/xml");
		xhttp2.onreadystatechange = function() {
			if (this.readyState === 4 || this.status === 200){ 
				location.href = 'inicioDeSesion.php';
			}       
		};
		xhttp2.send(response);
	}
	









	
  
    /* 
        aquí pones el código para insertar un nuevo nodo en el XML de usuariado con los datos que ha introducido, SIEMPRE Y CUANDO NO EXISTA EL MISMO USUARIO. 
		Si se repite el nombre de usuario, mostrarás un aviso y redirigirás a registro.php
		Si no se repite, debes hacer una petición XMLHttpRequest a registro3.php, por post, enviando el XML entero modificado, y una vez ejecutada redirigir a la página de login. Algo parecido a esto:"
    */




</script>

</body>
</html>

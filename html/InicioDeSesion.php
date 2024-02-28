
<?php
    session_start(); //indicamos que vamos a usar sesiones


	if (isset($_SESSION["username"])){
		
		echo $_SESSION["username"];

		header("Location: catalogo.php");
	}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Movie</title>
</head>
<body>


	<header class="container-navbar">

		<div class="container-cabecera container-cabecera-sesion">
			
			<div class="cabecera-logo-container">

				<a href="../index.php">
					<h2>HULU</h2>
				</a>
				
			</div>

			<div class="cabecera-usuario-container">
				
				<div class="cabecera-inicio-container">
					<a href="registro.php">
						<h3>Regístrate</h3>
					</a>		
				</div>



			</div>

			<div class="container-idiomas">
				
				<img src="../img/idiomas/world.png">

				<div class="container-idiomas-options">
					
					<a href="Ingles/index.html" >
						<img src="../img/idiomas/usa.png">
					</a>

					<a href="Valenciano/index.html" >
						<img src="../img/idiomas/valenciano.png">
					</a>

				</div>

			</div>
			
			
		</div>

	</header>



	<section class="login" >

		<img class="loginback" src="../img/loginback.jpg"/>


		<div class="login-form">

			<h2>Inicia sesión</h2>

			<div class="login-container">

				<input id="usser" placeholder="Nombre de usuario" type="text">
				<input id="password" placeholder="Contraseña" type="password">
				<button onclick="iniciarSesion()" class="boton-login">Inicia sesión</button>

				<p id="fallologin"style="color:red;margin-top:50px;font-size:15px;opacity:0;">Usuario o contraseña incorrectos</p>

			</div>

		</div>




	</section>

	<footer>


		<section class="infofooter">

			<a>Soporte</a>
			<a>Cuenta</a>
			<a>Privacidad</a>
			<a>Contacto</a>
			<a>Sobre el proyecto</a>
			<a>1 DAW IES La Vereda</a>
			<a>Joel Gutierrez Ruiz</a>
			
		</section>
		



		<section class="tecnologiasUsadas">


			<div class="container-imgstec">
				
				<img src="../img/footer/js.png"/>
				<img src="../img/footer/php.png"/>
				<img src="../img/footer/css.png"/>
				<img src="../img/footer/html.png"/>


			</div>


		</section>
		
		

	</foter>

	<script>

		var timestamp = new Date().getTime();

		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "../xml/usuariado.xml?timestamp=" + timestamp, true);
		xhttp.send();


		function iniciarSesion(){
			let xml = xhttp.responseXML

			console.log(xml)

			let falloLogin = document.getElementById("fallologin");

			let usser = document.getElementById("usser");
			let password = document.getElementById("password");

			let ussers = xml.getElementsByTagName("usuario");
			let passwords = xml.getElementsByTagName("contrasenya");

			let login =usser.value+password.value;

			let entrado = false;
			let index = 0;

			do{
				
				let aux = ussers[index].childNodes[0].nodeValue+passwords[index].childNodes[0].nodeValue;
				console.log( "Tamaño array: "+ussers.length)
				console.log( "Iteracion: "+index)
				if(aux===login){
					falloLogin.style.opacity=0;
					entrado=true;
					if(entrado){
						inicioDeSesion(login);
					}

					
				}else{
					falloLogin.style.opacity=1;
					usser.value="";
					password.value="";
					console.log("no has podido entrar")
				}

				index++;


			}while(!entrado && index<ussers.length)


		}

		
		function inicioDeSesion(ussername){


			
			let data = new FormData();
			data.append('usser', ussername);
			var xhttp2 = new XMLHttpRequest();
			
			//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp2.onreadystatechange = function() {
				if (this.readyState === 4 || this.status === 200){ 
					location.href = 'catalogo.php';
				}       
			};
			xhttp2.open("POST", "login3.php", true);
			xhttp2.send(data);


		}





	</script>




</body>
</html>
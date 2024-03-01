
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
					<h2>QueVeo</h2>
				</a>
				
			</div>

			<div class="cabecera-usuario-container">
				
				<div class="cabecera-inicio-container">
					<a href="InicioDeSesion.php">
						<h3>Inicia sesión</h3>
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

			<h2>Registrate</h2>

			<form  method="POST" action="registro2.php" class="login-container">
				<input name="name" placeholder="Nombre" type="text">
				<input name="usser" placeholder="Nombre de usuario" type="text">
				<input name="mail" placeholder="Dirección de correo electrónico" type="email">
				<input name="password" placeholder="Contraseña" type="password">
				<button type="submit" class="boton-login">Registrate</button>

			</form>




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




</body>
</html>
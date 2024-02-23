
<?php
    session_start(); //indicamos que vamos a usar sesiones


	if (isset($_SESSION["username"])){
		
		echo $_SESSION["username"];

		header("Location: html/catalogo.php");
	}



?>








<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Movie</title>
</head>
<body>

	<header class="container-navbar ">

		<div class="container-cabecera ">
			
			<div class="cabecera-logo-container">
				<h2>HULU</h2>
			</div>

			<div class="cabecera-usuario-container">
				
				<div class="cabecera-inicio-container">
					<a href="html/InicioDeSesion.php">
						<h3>Inicia sesion</h3>
					</a>
					
				</div>

			</div>

			<div class="container-idiomas">
				
				<img src="img/idiomas/world.png">

				<div class="container-idiomas-options">
					
					<a href="Ingles/index.html" >
						<img src="img/idiomas/usa.png">
					</a>

					<a href="Valenciano/index.html" >
						<img src="img/idiomas/valenciano.png">
					</a>

				</div>

			</div>
			
			
		</div>

	</header>


	<section class="container-contenido">


		
		<div id="portada" class="container-img-principal">

			<div class="blured-img"></div>

			<div class="paper-img">

				<p>Disfruta de los mayores extitos del cine ahora y en cualquier parte.</p>

				<div class="cabecera-registro-container">

					<a href="html/registro.php">
						<h3>Registrate</h3>
					</a>
					
				</div>

			</div>
			<img loading="lazy" src="img/background.jpg">

		</div>
	
	</section>



	<section class="temporal">



		<div class="studiosbanner">

			<img src="img/logos/disney"/>

			<img src="img/logos/marvel.png"/>

			<img src="img/logos/paramount.png"/>

			<img src="img/logos/hbo.png"/>

			<img src="img/logos/warner.png"/>



		</div>

		

	</section>



	<section class="visual">

		<div class="casinocontainer">
			<img src="img/casino.jpg" />
		</div>

		

		<div class="tvcontainer">


			<video class="tvvideo" loop autoplay muted >
				<source src="video/publicidad/coca.mp4">
			</video>

			<img class="visualtv" src="img/tv.png"/>
		</div>
		

	</section>




	<div class="container-anuncios">



				<a class="anuncio" target="_blank" href="https://www.coca-cola.com/es/es">
					<video loop autoplay muted >
						<source src="video/publicidad/coca.mp4">
					</video>
				</a>

				<a class="anuncio" target="_blank" href="https://www.coca-cola.com/es/es">
					<video loop autoplay muted >
						<source src="video/publicidad/cupra.mp4">
						</video>
				</a>
				
			

	</div>




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
				
				<img src="img/footer/js.png"/>
				<img src="img/footer/php.png"/>
				<img src="img/footer/css.png"/>
				<img src="img/footer/html.png"/>


			</div>


		</section>
		
		

	</foter>





</body>
</html>
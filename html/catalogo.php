


<?php
	session_start(); //indicamos que vamos a usar sesiones
	//comprobamos si la sesión está iniciada

	$ussername = "..";
	if (!(isset($_SESSION["username"]))){
	   
		header("Location: ../index.php");
		
	}else{
		$ussername =$_SESSION["username"];
		echo $ussername;
	}

	$xml = simplexml_load_file("../xml/peliculas.xml");


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


	<header class="cabecera">

		<div class="cabecera-comp comp-logo">
		<a href="catalogo.php"><h2>HULU</h2></a>
		</div>

		<div class="cabecera-comp comp-usser ">
			<h3 class="buscar">Buscar</h3>
			<img src="../img/usser.png">
			<ul>
				<li><a href="settings.html">Configuración</a></li>
					<?php

						if($ussername=="root123456"){
							echo "<li><a href='gestorvideos.php'>Añadir peli</a></li>";
						}
					
					?>
				<li><form method="POST" action="cerrar_sesion.php">
                <button type="submit">Cerrar Sesión</button></form></li>
			</ul>
		</div>
	</header>







	<?php
			// 1. Abrir el archivo XML

		


			$pelis = array();

			


		foreach ($xml->categoria as $categoria) {

			foreach ($categoria->pelicula as $pelicula) {
				array_push($pelis,$pelicula);


			}
				
		}

		$tamaño = count($pelis)-1;
		$random = (rand(0,$tamaño));
		$pelirecomend = $pelis[$random];

		$banner = $pelirecomend->banner['src'];
		$titulo = $pelirecomend->titulo;
		$sipnosis = $pelirecomend->sipnosis;
		$anyo = $pelirecomend->anyo;
		$id = $pelirecomend->id;

		echo "<section id='$id' onclick='verpeli(this)' class='recomendation'>

		<div class='recomendation-info'>

			<h2 class='recomendation-title'>$titulo</h2>
			<h3 class='recomendation-sipnosis'>$sipnosis.</h3>
			<p class='recomendation-year'>$anyo</p>
		</div>

		<div  style='background-image: url($banner);' class='recomendation-banner'> <div class='recomendation-bannervisual'></div> </div>

		</section>";

			
	?>







	<?php
			// 1. Abrir el archivo XML

		foreach ($xml->categoria as $categoria) {

			$nombre_categoria = $categoria['nombre'];

			echo "<h2 class='titulocat'>$nombre_categoria</h2>";
			echo "<section class='catalogo'>";

				foreach ($categoria->pelicula as $pelicula) {

					$banner = $pelicula->banner['src'];
					$portada = $pelicula->portada['src'];
					$titulo = $pelicula->titulo;
					$sipnosis = $pelicula->sipnosis;
					$anyo = $pelicula->anyo;
					$id = $pelicula->id;

					echo "<div onclick='verpeli(this)' id='$id' style='background-image: url($portada);' class='peli-catalogo'></div>";
				}
				
				echo "</section>";
			}

			
	?>

	<script>
		function verpeli(peli){
			

        	var urlDestino = "reproductor.php?id=" + encodeURIComponent(peli.getAttribute("id"));

        	window.location.href = urlDestino;

		}
	</script>




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
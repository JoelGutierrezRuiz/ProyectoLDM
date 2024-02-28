
<?php
	session_start(); //indicamos que vamos a usar sesiones

	echo $_SESSION["username"];
	if (!(isset($_SESSION["username"]))){
	   
		header("Location: ../index.php");
		
	}

	$id = $_GET["id"]; 
	$xml = simplexml_load_file("../xml/peliculas.xml");

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Document</title>
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
				<li><form method="POST" action="cerrar_sesion.php">
                <button type="submit">Cerrar Sesión</button></form></li>
			</ul>
		</div>
	</header>

	<?php
			// 1. Abrir el archivo XML

		foreach ($xml->categoria as $categoria) {


			foreach ($categoria->pelicula as $pelicula) {

				if($id == $pelicula->id){
					$banner = $pelicula->banner['src'];
					$portada = $pelicula->portada['src'];
					$titulo = $pelicula->titulo;
					$sipnosis = $pelicula->sipnosis;
					$video = $pelicula->video['src'];
					$anyo = $pelicula->anyo;
					echo "    
						<section class='reproductor'>
							<div class='reproductorcontenedor'>
				
								<h2>$titulo</h2>
							
								<iframe class='creadorpelisvideo' src=$video frameborder='0' allow='autoplay' allowfullscreen></iframe>
					
							</div>
						</section>";
					}

				}
				
			}

			
	?>

	


  





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

<?php
	session_start(); //indicamos que vamos a usar sesiones

	$ussername = "..";
	if (!(isset($_SESSION["username"]))){
	   
		header("Location: ../index.php");
		
	}else{
		$ussername =$_SESSION["username"];
		echo $ussername;
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
			<img class="headerfoto" src="../img/usser.png">
			<ul>
				<li><a href="settings.html">Configuración</a></li>
				<li><a href="settings.php">Configuración</a></li>
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

	


  <script>



		var timestamp = new Date().getTime();
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "../xml/usuariado.xml?timestamp=" + timestamp, true);
		xhttp.onreadystatechange = function() {
		if (this.readyState === 4 || this.status === 200){ 
			verPerfil(this)
		}       
		};
		xhttp.send();




	function verPerfil(response){

		let foto = document.getElementsByClassName("headerfoto")[0];
		let xml = response.responseXML;



		let ussers = xml.getElementsByTagName("usuario");
		let passwords = xml.getElementsByTagName("contrasenya");


		let login = '<?php echo $ussername; ?>';

		let entrado = false;
		let index = 0;

		do{	
			let aux = ussers[index].childNodes[0].nodeValue+passwords[index].childNodes[0].nodeValue;
			if(aux===login){
				entrado=true;
				if(entrado){
					//la iteracion acertada es el id 
					let perfil = xml.getElementById(index);
					foto.setAttribute("src",perfil.childNodes[9].getAttribute("src"));
				}
			}

			index++;


		}while(!entrado && index<ussers.length)



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
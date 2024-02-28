<?php
	session_start(); //indicamos que vamos a usar sesiones
	//comprobamos si la sesión está iniciada

	$ussername = "..";
	if (!(isset($_SESSION["username"]))){
	   
		header("Location: ../index.php");
		
	}else{

        $ussername =$_SESSION["username"];
		echo $ussername;

        if($ussername!="root123456"){
            header("Location: ../index.php");
        }

	}

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
				<li><a>Configuración</a></li>
				<li><form method="POST" action="cerrar_sesion.php">
                <button type="submit">Cerrar Sesión</button></form></li>
			</ul>
		</div>
	</header>




    <section class="creadorpelis">

        <img class="fondocine" src="../img/fondocine.jpg" />


        <div class="creadorpelisimg">

            <div class="creadorpelisimgs">
                <div style='background-image: url("../img/Animacion/beeMovie.jpg");' class='creadorpelisportada'></div>

                <div style='background-image: url("https://static.posters.cz/image/hp/80594.jpg");' class='creadorpelisbanner'></div>

            </div>


            <iframe class="creadorpelisvideo" width="600" height="400" src="//ok.ru/videoembed/1749288553149" frameborder="0" allow="autoplay" allowfullscreen></iframe>

        </div>



        <div class="formcreador">


            <form method="POST"  action="gestorVideos2.php">

                <select name="categoria">
                    <option value="Drama">Drama</option>
                    <option value="Acción">Acción</option>
                    <option value="Comedia">Comedia</option>
                    <option value="Documental">Documental</option>
                </select>

                <h2>Título</h2>
                <input name="titulo" class="creadorpelistit" placeholder="Título" type="text">
                <h2>URL imágen del banner</h2>
                <input name="banner" class="creadorpelisinputbanner" type="text" placeholder="Banner">
                <h2>URL imágen de la portada</h2>
                <input name="portada" class="creadorpelisinputportada" type="text" placeholder="Portada">
                <h2>URL a video de la película </h2>
                <input name="video" class="creadorpelisvidinput" type="text" placeholder="Enlace de pelicula">
                <h2>Sipnosis</h2>
                <textarea name="sipnosis" class="creadorpelisSipnosis" maxlength="300" placeholder="Sipnosis"></textarea>


                <button>Subir película</button>

            </form>
            
            <input type="button" onclick="actualizar()" value="actualizar">
            
            


        </div>






        <!--
        <h2>Elenco</h2>

        <div class="elenco">
            
            <div class="actorprincipal">
                <img class="actorprincipalimg" src="../img/Animacion/repartoBeeMovie/1.jpg"/>
                <input class="actorprincipalinputnombre" placeholder="nombre">
                <input class="actorprincipalinputimg" type="text" placeholder="enlace">
            </div>
            <div class="actorprincipal">
                <img class="actorprincipalimg" src="../img/Animacion/repartoBeeMovie/2.jpg"/>
                <input class="actorprincipalinputnombre" placeholder="nombre">
                <input class="actorprincipalinputimg" type="text" placeholder="enlace">
            </div>
            <div class="actorprincipal">
                <img class="actorprincipalimg" src="../img/Animacion/repartoBeeMovie/3.jpg"/>
                <input class="actorprincipalinputnombre" placeholder="nombre">
                <input class="actorprincipalinputimg" type="text" placeholder="enlace">
            </div>
            <div class="actorprincipal">
                <img class="actorprincipalimg" src="../img/Animacion/repartoBeeMovie/4.jpg"/>
                <input class="actorprincipalinputnombre" placeholder="nombre">
                <input class="actorprincipalinputimg" type="text" placeholder="enlace">
            </div>

            <input class="actorprincipalbutton"onclick="actualizarElenco()" type="button" value="Actualizar" />

        </div>

        -->

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

        function actualizar(){

            let inputportada = document.getElementsByClassName("creadorpelisinputportada")[0].value;
            let inputbanner = document.getElementsByClassName("creadorpelisinputbanner")[0].value;
            let pelisportada = document.getElementsByClassName("creadorpelisportada")[0];
            let pelisbanner = document.getElementsByClassName("creadorpelisbanner")[0];

            if(inputbanner.length>5){
                pelisbanner.style.backgroundImage = 'url('+inputbanner+')';
            }
            if(inputportada.length>5){
                pelisportada.style.backgroundImage = 'url('+inputportada+')';

            }

            actualizarVideo();
            
            

        }


        function actualizarVideo(){

            let pelicula = document.getElementsByClassName("creadorpelisvideo")[0];
            let inputvideo = document.getElementsByClassName("creadorpelisvidinput")[0];

            if(inputvideo.value.length>3){
                console.log(pelicula.src)
                pelicula.src = inputvideo.value ;
                console.log(pelicula.src)
            }

        }

        function subirPelicula(){
            let titulo = document.getElementsByClassName("creadorpelistit")[0].value;
            let portada = document.getElementsByClassName("creadorpelisportada")[0].style.backgroundImage;
            let banner = document.getElementsByClassName("creadorpelisbanner")[0].style.backgroundImage;
            let video = document.getElementsByClassName("creadorpelisvideo")[0].src;
            let sipnosis = document.getElementsByClassName("creadorpelisSipnosis")[0].value;
            
			
			let data = new FormData();
			data.append('titulo', titulo);
            data.append('portada', portada);
            data.append('banner', banner);
            data.append('video', video);
            data.append('sipnosis', sipnosis);

			var xhttp2 = new XMLHttpRequest();
			
			//xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp2.onreadystatechange = function() {
				if (this.readyState === 4 || this.status === 200){ 
					location.href = 'gestorVideos2.php';
				}       
			};
			xhttp2.open("POST", "gestorVideos2.php", true);
            xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp2.send(data);


		}



    </script>





    
</body>
</html>
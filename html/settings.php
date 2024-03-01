


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
		<a href="catalogo.php"><h2>QueVeo</h2></a>
		</div>

		<div class="cabecera-comp comp-usser ">
			<img class="headerfoto"  src="../img/usser.png">
			<ul>
					<?php

						if($ussername=="root123456"){
							echo "<li><a href='gestorVideos.php'>Añadir peli</a></li>";
						}
					
					?>
					<?php

						if($ussername=="root123456"){
							echo "<li><a href='inforoot.php'>Panel</a></li>";
						}

					?>
				<li><form method="POST" action="cerrar_sesion.php">
				<button type="submit">Cerrar Sesión</button></form></li>
			</ul>
		</div>
	</header>






    <section class="config">


		<div class="configdata">

			<h2 class="configdatauser">Joel Gutierrez</h2>

			<div class="configimg">

				<div class="configimgimg">

					<img class="imgfromuser" src="../img/usser.png">

				</div>

				<div class="changeimg">
					<button onclick="showPopUp()" class="changeupdate">Cambiar imagen</button>
					<button onclick="borrarImagen()" class="changedelete">Borrar imagen</button>
				</div>

				<div style="display: none;" class="pupupchangeimg">


					<div class="pupupchangeimginputs">
						<h2 onclick="closeContainer()" class="pupupchangeimgclose">X</h2>
						<input class="pupupchangeimginput" placeholder="URL imagen" type="text">
						<input onclick="UploadImg()" class="pupupchangeimgbutton" value="Actualizar" type="button">
						
					</div>



				</div>

				





			</div>


			<div class="configuser">
				
				<div class="configusername">
					<input class="configuserinput" type="text" placeholder="Nombre">
					<input class="configureuserinputuser" type="text" placeholder="Nombre de usuario">
				</div>

				<input class="configuserinputmail"  type="email" placeholder="email@">
				<input class="configuserinputpass"  type="password" placeholder="New password"> 
				<input class="configuserinputpass configureuserupload" onclick="filtroActualizar()"  type="button" value="Actualizar"> 


			</div>

				

			<div>
				


			</div>

				
			<h3 class="mensajeErrorSetting"></h3>			

			
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


		function showPopUp(){


			let container = document.getElementsByClassName("pupupchangeimg")[0];

			container.style.display="flex";




		}

		function UploadImg(){
			
			let foto = document.getElementsByClassName("imgfromuser")[0];
			let imageurl = document.getElementsByClassName("pupupchangeimginput")[0].value;
			console.log(imageurl)
			if(imageurl.length>5){
				console.log(foto.getAttribute("src"))
				foto.setAttribute("src",imageurl);

			}
		}

		function closeContainer(){
			let container = document.getElementsByClassName("pupupchangeimg")[0];

			container.style.display="none";
		}

			var timestamp = new Date().getTime();
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "../xml/usuariado.xml?timestamp=" + timestamp, true);

			xhttp.onreadystatechange = function() {
			if (this.readyState === 4 || this.status === 200){ 
				verPerfil(this)
			}       
			};
			xhttp.send();


			function filtroActualizar(){

				let xml = xhttp.responseXML
				let mensajeerr = document.getElementsByClassName("mensajeErrorSetting")[0];
				let ussers = xml.getElementsByTagName("usuario");
				let passwords = xml.getElementsByTagName("contrasenya");

				let repetido = false;
				let index = 0;
				let usuario = document.getElementsByClassName("configureuserinputuser")[0].value;

				do{
						
					let aux = ussers[index].childNodes[0].nodeValue;
										
					if(aux===usuario){
						repetido = true;
						mensajeerr.innerHTML="Usuario registrado!"
						
					}
					

					index++;


				}while(index<ussers.length && repetido==false);

				if(repetido==false){
					actualizarPerfil()
				}





			}
			




			//actualiza la pag


			function verPerfil(response){

				let foto = document.getElementsByClassName("imgfromuser")[0];
				let nombre = document.getElementsByClassName("configdatauser")[0];
				let fotoheader = document.getElementsByClassName("headerfoto")[0];

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
							nombre.innerHTML=perfil.childNodes[1].childNodes[0].nodeValue;
							foto.setAttribute("src",perfil.childNodes[9].getAttribute("src"));
							fotoheader.setAttribute("src",perfil.childNodes[9].getAttribute("src"));
						}
					}

					index++;


				}while(!entrado && index<ussers.length)



			}









			function actualizarPerfil(){

				let imageurl = document.getElementsByClassName("pupupchangeimginput")[0].value;
				let name = document.getElementsByClassName("configuserinput")[0].value;
				let password = document.getElementsByClassName("configuserinputpass")[0].value;
				let user = document.getElementsByClassName("configureuserinputuser")[0].value;
				let mail = document.getElementsByClassName("configuserinputmail")[0].value;
				let mensajeerr = document.getElementsByClassName("mensajeErrorSetting")[0];


				if(imageurl.length!=0 && imageurl.length<5||imageurl.length>1000){
					mensajeerr.innerHTML="Tamaño URL imagen incorrecto"
					return false;
				}
				if(name.length!=0 &&name.length<4||name.length>20){
					mensajeerr.innerHTML="Tamaño del nombre incorrecto"
					return false;
				}
				if(password.length!=0 &&password.length<5||password.length>10){
					mensajeerr.innerHTML="Tamaño de la contraseña incorrecto"
					return false;
				}
				if(mail.length!=0 &&mail.length<5||mail.length>50){
					mensajeerr.innerHTML="Tamaño del email incorrecto"
					return false;
				}
				if(user.length!=0 &&user.length<4||user.length>20){
					mensajeerr.innerHTML="Tamaño del usuario incorrecto"
					return false;
					
				}
				
								
				if(imageurl.length!=0 ||name.length!=0||password.length!=0||mail.length!=0||user.length!=0 ){
					mensajeerr.style.color="green";
					mensajeerr.innerHTML="Perfil actualizado !";
				}else{
					return false;
				}

				
				let xml = xhttp.responseXML;

				console.log(xml)


				let ussers = xml.getElementsByTagName("usuario");
				let passwords = xml.getElementsByTagName("contrasenya");




				


				let login = '<?php echo $ussername; ?>';

				let entrado = false;
				let index = 0;

				do{
					
					let aux = ussers[index].childNodes[0].nodeValue+passwords[index].childNodes[0].nodeValue;
					console.log( "Tamaño array: "+ussers.length)
					console.log( "Iteracion: "+index)
					if(aux===login){
						entrado=true;
						if(entrado){

							
							//la iteracion acertada es el id 
							let perfil = xml.getElementById(index)
							if(imageurl.length>5&&imageurl.length<1000){
								perfil.childNodes[9].setAttribute("src",imageurl)
							}
							if(name.length>3&&name.length<20){
								perfil.childNodes[1].childNodes[0].nodeValue=name;								
							}
							if(password.length>5&&password.length<10){
								perfil.childNodes[7].childNodes[0].nodeValue=password;
							}
							if(mail.length>5&&mail.length<50){
								perfil.childNodes[3].childNodes[0].nodeValue=mail;
							}
							if(user.length>3&&user.length<20){
								perfil.childNodes[5].childNodes[0].nodeValue=user;
							}

						

							let data = new FormData();

							if(password.length>5&&password.length<10&&user.length>3&&user.length<20){
								let nuevaSesion = user+password;
								data.append('usser', nuevaSesion);
								var xhttp3 = new XMLHttpRequest();
								xhttp3.open("POST", "login3.php", true);
								xhttp3.send(data);
							}
							else if(password.length<5&&user.length>3&&user.length<20){
								let nuevaSesion = user+perfil.childNodes[7].childNodes[0].nodeValue;
								data.append('usser', nuevaSesion);
								var xhttp3 = new XMLHttpRequest();
								xhttp3.open("POST", "login3.php", true);
								xhttp3.send(data);								
							}
							else if(password.length>5&&password.length<10&&user.length<3){
								let nuevaSesion = perfil.childNodes[5].childNodes[0].nodeValue+password;
								data.append('usser', nuevaSesion);
								var xhttp3 = new XMLHttpRequest();
								xhttp3.open("POST", "login3.php", true);
								xhttp3.send(data);		
							}


						}

						
					}

					index++;


				}while(!entrado && index<ussers.length)


				var xhttp2 = new XMLHttpRequest();
				xhttp2.open("POST", "modifica.php", true);
				xhttp2.setRequestHeader("Content-type", "application/xml");
				xhttp2.onreadystatechange = function() {
					if (this.readyState === 4 || this.status === 200){ 
						location.href = 'settings.php';
					}       
				};
				xhttp2.send(xml);




			
		}



		function borrarImagen(){

			let imageurl = document.getElementsByClassName("pupupchangeimginput")[0];
			imageurl.value="../img/usser.png"
			filtroActualizar();




		}

	</script>





    
</body>
</html>
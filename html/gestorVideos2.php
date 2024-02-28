<?php
session_start(); //indicamos que vamos a usar sesiones
// Acceder a los datos enviados desde JavaScript
$titulo = $_POST['titulo'];
$banner = $_POST['banner'];
$portada = $_POST['portada'];
$video = $_POST['video'] ;
$sipnosis = $_POST['sipnosis'];
$categoria = $_POST['categoria'];

// Hacer lo que necesites con los datos recibidos
// Por ejemplo, imprimirlos o guardarlos en una base de datos

// Ejemplo de impresión de los datos
echo "Título: $titulo<br>";
echo "Portada: $portada<br>";
echo "Banner: $banner<br>";
echo "Video: $video<br>";
echo "Sipnosis: $sipnosis<br>";
echo "Sipnosis: $categoria<br>";
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

xhttp.open("GET", "../xml/peliculas.xml", true);
xhttp.send();

function myFunction(response) {
    var categoria = "<?php echo $categoria; ?>";
	var titulo = "<?php echo $titulo; ?>";
    var portada = "<?php echo $portada; ?>";
	var banner = "<?php echo $banner; ?>";
    var video = "<?php echo $video; ?>";
    var sipnosis = "<?php echo $sipnosis; ?>";
    var anyo = "2024"
	var id = generarNumeroRandom();

    console.log(response.responseXML)




		
	uploadFilm(response,categoria,titulo,portada,banner,video,sipnosis,anyo,id)



}


	
	function uploadFilm(response,categoria,titulo,portada,banner,video,sipnosis,anyo,id){
		
		
		let xmlDoc = response.responseXML;

		// Obtener el elemento <usuariado>
		let categoriaElement = xmlDoc.getElementsByTagName("categoria");

		let indice = 0;
		let categoriaEncontrada = false;

		do{

			if(categoriaElement[indice].getAttribute("nombre")==categoria){
				categoriaElement = categoriaElement[indice];
				categoriaEncontrada=true;
			}

			indice++;

		}while(categoriaEncontrada==false && indice<categoriaElement.length)


		// Crear el nuevo perfil
		let newFilm = xmlDoc.createElement("pelicula");

		// Crear y configurar elementos para el nuevo perfil
		let bannerElement = xmlDoc.createElement("banner");
		bannerElement.setAttribute("src",banner)

		let portadaElement = xmlDoc.createElement("portada");
		portadaElement.setAttribute("src",portada)

        let videoElement = xmlDoc.createElement("video");
		videoElement.setAttribute("src",video)

		let anyoElement = xmlDoc.createElement("anyo");
		let anyoText = xmlDoc.createTextNode(anyo);
		anyoElement.appendChild(anyoText);

		let tituloElement = xmlDoc.createElement("titulo");
		let tituloText = xmlDoc.createTextNode(titulo);
		tituloElement.appendChild(tituloText);

        let sipnosisElement = xmlDoc.createElement("sipnosis");
		let sipnosisText = xmlDoc.createTextNode(sipnosis);
		sipnosisElement.appendChild(sipnosisText);

		let idElement = xmlDoc.createElement("id");
		let idText = xmlDoc.createTextNode(id);
		idElement.appendChild(idText);

		// Añadir elementos al nuevo perfil
		newFilm.appendChild(bannerElement);
        newFilm.appendChild(portadaElement);
        newFilm.appendChild(videoElement);
        newFilm.appendChild(anyoElement);
        newFilm.appendChild(tituloElement);
        newFilm.appendChild(sipnosisElement);
		newFilm.appendChild(idElement);


		if(categoriaEncontrada==false){
			let indice = xmlDoc.getElementsByTagName("categorias")[0];
			let categoriaNueva = xmlDoc.createElement("categoria");
			categoriaNueva.setAttribute("nombre",categoria)

			categoriaNueva.appendChild(newFilm);
			indice.appendChild(categoriaNueva);
			


		}else{
			categoriaElement.appendChild(newFilm);
		}

		// Añadir el nuevo perfil al elemento <usuariado>
		// Actualizar el XML
		refreshXml(xmlDoc);

		console.log(xmlDoc);


	}

	function refreshXml(response){

		var xhttp2 = new XMLHttpRequest();
		xhttp2.open("POST", "gestorVideos3.php", true);
		xhttp2.setRequestHeader("Content-type", "application/xml");
		xhttp2.onreadystatechange = function() {
			if (this.readyState === 4 || this.status === 200){ 
				location.href = 'catalogo.php';
			}       
		};
		xhttp2.send(response);
	}
	

	function generarNumeroRandom() {
    // Inicializar el número como una cadena vacía
    	let numero = '';

		// Generar 25 dígitos aleatorios
		for (let i = 0; i < 25; i++) {
			// Generar un dígito aleatorio entre 0 y 9
			let digito = Math.floor(Math.random() * 10);
			// Agregar el dígito generado al número
			numero += digito.toString();
		}

		return numero;
	}








	
  
    /* 
        aquí pones el código para insertar un nuevo nodo en el XML de usuariado con los datos que ha introducido, SIEMPRE Y CUANDO NO EXISTA EL MISMO USUARIO. 
		Si se repite el nombre de usuario, mostrarás un aviso y redirigirás a registro.php
		Si no se repite, debes hacer una petición XMLHttpRequest a registro3.php, por post, enviando el XML entero modificado, y una vez ejecutada redirigir a la página de login. Algo parecido a esto:"
    */




</script>

</body>
</html>

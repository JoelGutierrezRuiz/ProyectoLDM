<?php
//recogemos el XML que nos envía por post
$xml = new SimpleXMLElement(file_get_contents("php://input"));
//guardamos el xml en un fichero
$xml->asXML('../xml/peliculas.xml');
?>

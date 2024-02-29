<?php
$xml = new SimpleXMLElement(file_get_contents("php://input"));
$xml->asXML("../xml/usuariado.xml");
?>
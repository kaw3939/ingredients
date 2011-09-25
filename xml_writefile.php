<?php
$file = "./xml_example.xml";

// load file
$xml = simplexml_load_file($file) or die ("Unable to load XML file!");

$xml->movie[0]->characters->character[0]->name = 'Miss Code';


 
echo	$xml->saveXML('./uploads/test.xml');
?>
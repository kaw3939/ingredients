<?php

$file = "./xml_example.xml";

// load file
$xml = simplexml_load_file($file) or die ("Unable to load XML file!");


echo $xml->movie[0]->plot;
?>

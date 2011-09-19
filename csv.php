<?php
//this file will load the ingredients into an associative array

if (($handle = fopen("uploads/ABBREV.csv", "r")) !== FALSE) {
   
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $num = count($data);
        

        	$array[] = $data;

    
    }
    fclose($handle);
	
}
	unset($array[0][53]);
	
	$keys = $array[0];
	
	unset($array[0]);
	
	$i = 1;
	

	
$username = 'kwilliams';
$password = 'mongo1234';
$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));


$db = $connection->ingredients;
$collection = $db->load2;
	
		foreach($array as $ingredient) {
		$ingredients[$ingredient[1]]['info'] = array_combine($keys, $ingredient);
		unset($ingredients[$ingredient[1]]['info']['Shrt_Desc']);
	
	}
	
	
	
	
	
	print_r($ingredients);	
?>
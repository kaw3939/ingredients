<?php
//this file will load the ingredients into an associative array

if (($handle = fopen("uploads/ABBREV.csv", "r")) !== FALSE) {
   
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $num = count($data);
        

        	$array[] = $data;
			
    
    }
    fclose($handle);
	
}

	//unset($array[0][54]);
	
	$keys = $array[0];
	print_r($keys);	
	unset($array[0]);
	
	$i = 1;
	

	
$username = 'kwilliams';
$password = 'mongo1234';
$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));


$db = $connection->recipe;

$collection = $db->ingredients2;
$response = $collection->drop();
$collection = $db->ingredients2;
/*	
		foreach($array as $ingredient) {
		$ingredients[$ingredient[1]]['info'] = array_combine($keys, $ingredient);
		unset($ingredients[$ingredient[1]]['info']['Shrt_Desc']);
	
	}
	
*/	
	
	
	

	foreach($array as $ingredient) {
		
		$short_desc = explode(',',$ingredient[2]);
		print_r($short_desc);
		$title = $short_desc[0];
		unset($short_desc[0]);
		$options = $short_desc;
		
		$new_struct['title'] = $title;
		$new_struct['options'] = $short_desc;
		
		$ingredient[2] = $new_struct;
		$ingredient = array_combine($keys, $ingredient);
		$collection->insert($ingredient);
		print_r($ingredient);
		
	}
?>
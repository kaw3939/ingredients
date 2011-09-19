<?php
print_r($_REQUEST);
//some basic mongo commands

ini_set('display_errors', 'On');
print_r($_GET);
/*
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

/*
	foreach($array as $ing_data) {
		$ingredient = array_combine($keys, $ing_data);
		
		$collection->insert($ingredient);
		print_r($ingredient);
		//$ingredient[$ing_data[1]]['info'] = array_combine($keys, $ing_data);
		//unset($ingredients[$ing_data[1]]['info']['Shrt_Desc']);
		//$collection->insert($ingredients);
		//print_r($ingredient);
	}
*/

$username = 'kwilliams';
$password = 'mongo1234';
$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));


$db = $connection->ingredients;

$collection = $db->load3;
echo 'test';

	foreach($cursor as $row) {
		print_r($row);
	}

	if(isset($_GET['op'])) {
		$id = $_GET['op'];
		
		$cursor = $collection->findOne(array('_id' => new MongoId($id)));	

		print_r($cursor);
		
		
	}	else {
		echo ' not set';
		$cursor = $collection->find();
		
		foreach($cursor as $record) {	
			$output = json_encode($record);
			echo $output;
		}
	
	}
		
	
?>
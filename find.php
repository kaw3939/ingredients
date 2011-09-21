<?

	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));


	$db = $connection->recipe;
	$collection = $db->ingredients2;

	
	$cursor = $collection->findOne(array('_id' => new MongoId($_GET['_id'])));
	print_r($cursor);
	
	
	foreach($cursor as $key => $value) {
	
		if(!is_array($value)) {
			if(empty($value)) {
				$value = 0;
			}
			echo $key . ': ' . $value . '<br>';	
		} else {
			echo $key . ': ';
			echo $value['title'] . ' - ';
			foreach($value['options'] as $option) {
				echo $option . ' ';		
			}
			//print_r($value['options']);
			echo '<br>';
		}
	
	}
	/*
	
		if(!is_array($value)) {
			echo $key . ': ' . $value . '<br>';	
		} else {
			echo $key . ': ' . $value['title'] . '<br>';
			
			foreach($value as $option) {
				echo $option . '<br>';
			}
		}
		}
	*/
	
?>
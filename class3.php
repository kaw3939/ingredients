<?php
	
	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));
	//Selection of Datbase and Collection
	$db = $connection->recipe;
	$collection = $db->stuff;
	
	//find one
	//$cursor = $collection->findOne(array('_id' => new MongoId($_GET['_id'])));
	
	//Find all:
	//$cursor = $collection->find();
	
	//Find a pattern set of records
	//$cursor = $collection->find(array("Shrt_Desc.title" => "CHEESE"));
	
	//find distinct groups
	$cursor = $db->command(array("distinct" => "stuff", "key" => "Shrt_Desc.title"));
	
	foreach($cursor as $record) {
	
		foreach($record as $key => $value) {
			echo '<a href="">' . $value . '</a></br>';
		
		}
	}

	echo 'done';
?>
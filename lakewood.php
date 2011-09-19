<?php
	//print_r($_GET);
	//print_r($_SERVER);
	$request_method = $_SERVER['REQUEST_METHOD'];
	$op = $_GET['op'];
	$query = $_GET['query'];
	
	
	switch($request_method) {
	
		case 'GET':
			get($query);
			break;
		case 'POST':
			echo $request_method;
			break;
	}
	
	function get($query) {
			$mongo_collection = connection();
			$cursor = $mongo_collection->find();
			
			foreach($cursor as $record) {
				
				echo json_encode($record);
			}
	}
	
	function connection() {
		// Mongo Username, Password, and Connection
		$username = 'kwilliams';
		$password = 'mongo1234';
		$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));
		//Selection of Datbase and Collection
		$db = $connection->ingredients;
		$collection = $db->load3;
		return $collection;
	}
	
?>
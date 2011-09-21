

<?php

	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));


	$db = $connection->recipe;
	$collection = $db->ingredients2;
	print_r($collection->getIndexInfo());
	
	if(empty($_GET)) {
		echo 'nothing searched for';
		break;
	}
	
	$field_key = array_keys($_GET);
	
		
	if($field_key[0] == "_id") {
		$cursor = $collection->findOne(array('_id' => new MongoId($_GET['_id'])), array("_id","NDB_No","Shrt_Desc","GmWt_1","GmWt_Desc1","GmWt_2","GmWt_Desc2"));
		foreach($cursor as $label => $value) {
			echo $label . ': ' . $value ."</br>\r\n";
		}
	} else {
		$cursor = $collection->find($_GET,array("_id","NDB_No","Shrt_Desc","GmWt_1","GmWt_Desc1","GmWt_2","GmWt_Desc2"));
	}
	$i = 0;
	
	if($cursor->count() == 0) {
		echo 'nothing found';
		break;
	}
	
	
	echo '<table border="1" id="myTable" class="tablesorter">' ."\r\n";
	echo '<thead> <tr>' . "\r\n";
	
	foreach($cursor as $ingredient) {
	
		if($i == 0) {
			$table_header[] = array_keys($ingredient);
				foreach($table_header as $columns) {
					foreach($columns as $title) {
	        			echo '<th>' . $title . '</th>' . "\r\n";
					}
					echo '</tr>';
				}
		}
		$i = $i + 1;
		foreach($ingredient as $key => $value ) {
			if(!is_array($value)){
				if($key == '_id') {
					$mongo_id = $value;
					$value = '<a href="./search.php?_id=' . $mongo_id . '">' . $mongo_id . '</a>';
				}
				echo '<th>' . $value . '</th>'. "\r\n";
			}	else {
				echo '<th>' . $value['title'] . "\r\n";
				foreach($value['options'] as $opt => $val) {
					echo $val . '<br>';
				}
				echo '</th>' . "\r\n";
			}
		}
		echo '</tr>';
	}
		echo '</thead> <tbody> '."\r\n";
		


?>
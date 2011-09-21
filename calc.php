<?
	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));

	$db = $connection->recipe;
	$collection = $db->ingredients1;

	print_r($_GET);
	
	$cursor = $collection->findOne(array('_id' => new MongoId($_GET['mongo_id'])));
	
	switch($_GET['measure']) {
		case 'GmWt_1':
			$weight = $cursor['GmWt_1'];
			$ratio = $weight / 100;
			$desc = $cursor['GmWt_Desc1'];
			break;
		case 'GmWt_2':
			$weight = $cursor['GmWt_2'];
			$ratio = $weight / 100;
			$desc = $cursor['GmWt_Desc2'];
			break;
		case 'default':
			$ratio = 1;
			$desc = 'default';
			break;	
	}
	
	$ratio = round($ratio, 2);
	
	echo 'Gram(s): ' . ($ratio * $_GET['qty']) * 100 .  '<br>';
	

	
	foreach($cursor as $key => $value) {
		
		if(!is_array($value)) {
			if(empty($value)) {
				$value = 0;
			}
			if($key == 'Shrt_Desc' || $key == 'NDB_No' || $key == 'Shrt_Desc' || $key == '_id' || $key == 'GmWt_1' || $key == 'GmWt_2' || $key == 'GmWt_Desc1' || $key == 'GmWt_Desc2')  {
				$value;
			}
			else {
				$value = ($ratio * $value) * $_GET['qty'];
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
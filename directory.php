<?php

	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));


	$db = $connection->recipe;
	$collection = $db->ingredients2;
	$collection->ensureIndex(array('Category' => 1));
	//$cursor = $db->command(array("distinct" => "ingredients2", "key" => "Shrt_Desc.title"));	
	$cursor = $db->command(array("distinct" => "ingredients2", "key" => "Category"));		
	foreach($cursor as $title) {
		foreach($title as $key => $value) {
				
			echo '<a href="./search.php?Category=' . $value . '">' . category_label($value)  . '</a></br>';
		
		}
	}
	
	function category_label($category) {
		$value = $category;
		switch($category) {
		
			case '01':
				$value = 'Dairy and Egg Products';
				break;
			case '02':
				$value = 'Spices and Herbs';
				break;
				case '03':
				$value = 'Baby Foods';
				break;
			case '04':
				$value = 'Fats and Oils';
				break;
			case '05':
				$value = 'Poultry Products';
				break;
			case '06':
				$value = 'Soups, Sauces, and Gravies';
				break;
			case '07':
				$value = 'Sausages and Luncheon Meats';
				break;
			case '08':
				$value = 'Breakfast Cereals';
				break;
			case '09':
				$value = 'Fruits and Fruit Juices';
				break;
			case '10':
				$value = 'Pork Products';
				break;
			case '11':
				$value = 'Vegetables and Vegetable Products';
				break;
			case '12':
				$value = 'Nut and Seed Products';
				break;
			case '13':
				$value = 'Beef Products';
				break;
			case '14':
				$value = 'Beverages';
			case '15':
				$value = 'Finfish and Shellfish Products';
				break;
			case '16':
				$value = 'Legumes and Legume Products';
				break;
			case '17':
				$value = 'Lamb, Veal, and Game Products';
				break;
			case '18':
				$value = 'Baked Products';
				break;
			case '19':
				$value = 'Sweets';
				break;
			case '20':
				$value = 'Cereal Grains and Pasta';
				break;
			case '21':
				$value = 'Fast Foods';
				break;
			case '22':
				$value = 'Meals, Entrees, and Sidedishes';
				break;
			case '25':
				$value = 'Snacks';
				break;
			case '35':
				$value = 'Ethnic Foods';
				break;
			case '36':
				$value = 'Retaurant Foods';
				break;
			case '93':
				$value = 'Turtle';
				break;

		}
		return $value;
	}
	
	
	
?>
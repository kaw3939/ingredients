<?php
ini_set('display_errors', 'On');

$username = 'kwilliams';
$password = 'mongo1234';
$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));


$db = $connection->wha3f7sot;
$collection = $db->evendssss;


//print_r($obj);


//$somearray = array('name' => 'keith','Last Name' => 'Williams', 'address' => '58 Clark Ct', 'country' => 'Brazil');



$obj = new stdClass;
$obj->name = 'keith';
//$obj->color = 'black';
$obj->color->shade[] = 'royal2';
$obj->color->shade[] = 'ocean2';
//$obj->color->shade[] = 'sky2';
//$obj->color->shade[] = 'tur2';
$collection->insert($obj);

//$cursor = $collection->findOne(array('_id' => new MongoId('4ddbecc61ce31e340b000000')));
//print_r($cursor);

//$query = array("color" => array("shade" => "royal"));
//$query = array("color" => array("shade" => array("royal2")));
$query = array("name" => "keith23", "color.shade" => "sky2");
$cursor = $collection->find($query);

print_r($cursor);

$i = 1;
foreach($cursor as $object) {

	$o->{'record'.$i} = (object) $object;
	$i = $i + 1;
}
print_r($o);

echo $o->record1->name;
/*
foreach ($cursor as $id => $record) {
	echo $id . '</br>';
	     foreach ($record as $field => $value) { 
	     	if($field != '_id'){
	     		echo $field . ': ' . $value;
	     		echo '</br>';
	     	}
	     	if(is_array($value)){
	     		foreach($value as $subkey => $subvalue) {
	     			echo $subkey . ': ' . $subvalue;		
	     		}
	     	}
	     }

    echo '</p>';
}
*/
?>
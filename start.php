<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script type="text/javascript" src="http://www.mywebclass.org/~student/is690/jquery.js"></script> 
<script type="text/javascript" src="http://www.mywebclass.org/~student/is690/tablesorter.js"></script> 
<script>

$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 

</script>
<title>Conforming XHTML 1.1 Template</title>

</head>

<body>
<?php
//	print_r($_GET); 
// Mongo Username, Password, and Connection
	$username = 'kwilliams';
	$password = 'mongo1234';
	$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));

//Selection of Datbase and Collection
	$db = $connection->ingredients;
	$collection = $db->load3;
//Get parameters from URL	
	$op = $_GET['op'];
	$query = $_GET['query'];
	
// Determine action	
	switch ($op) {
		// Handles All OP
	    case 'all':
	        $cursor = $collection->find();
	       
	        echo '<table border="1" id="myTable" class="tablesorter">' ."\r\n";
	        echo '<thead> <tr>' ."\r\n";
	        echo '<th>Number</th>' ."\r\n";
	        echo '<th>Name</th>' ."\r\n";
	        echo '<th>Link</th>' ."\r\n";
	        echo '</tr></thead> <tbody> '."\r\n";
	        foreach($cursor as $record) {
				$i = $i + 1;
				foreach($record as $key => $value) {
					
					if($key == '_id') {
					
						$idnum = $value;
					}
					if($key == 'NDB_No') {
					
						$ndb = $value;
					}
					if($key == 'Shrt_Desc') {
					
						$name = $value;
						echo '<tr><td>' . $i . '</td><td> Ndb: ' . $ndb . '</td><td> Name: ' . '<a href="./find/'. $idnum . '/">' . $name . '</a>' ."</td></tr>\r\n";
					}
					
					
					
				}
			echo '</p>';
		}
			echo '</tbody></table>';
	        break;
	    //Finds a record and handles find op
	    case 'find':
	        $cursor = $collection->findOne(array('_id' => new MongoId($query)));
	        
	        foreach($cursor as $key => $value) {
	        	if($key <> '_id'){
	        	echo $key . ': ' . $value . '</br>';
	        	}
	        }
	        echo '</p>';
	        break;
	    }
?>

</body>

</html>

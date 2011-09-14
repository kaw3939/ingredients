<?php

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
	
	foreach($array as $ingredient) {
		$ingredients[$ingredient[1]]['info'] = array_combine($keys, $ingredient);
		unset($ingredients[$ingredient[1]]['info']['Shrt_Desc']);
	}
	
	print_r($ingredients);	
?>
<?php

$curl_object = curl_init();
$url = "http://www.mywebclass.org/~student/is690/lakewood.php";

curl_setopt($curl_object, CURLOPT_URL, $url);
curl_setopt($curl_object, CURLOPT_HEADER, 0);

$test = curl_exec($curl_object);
curl_close($curl_object);

 $ingredients = json_decode($test, TRUE); 
 
 print_r($ingredients);

?>
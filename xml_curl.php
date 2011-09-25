<?php

//$ch = curl_init("http://www.mywebclass.org/~student/is690/xml_example.xml");
$ch = curl_init("http://atwar.blogs.nytimes.com/feed/");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);


$doc = new SimpleXmlElement($data, LIBXML_NOCDATA);
//show what a simple xml object looks like - uncomment this line.

//print_r($doc);


if(isset($doc->channel))
{
    parseRSS($doc);
	
}
if(isset($doc->entry))
{
    parseAtom($doc);
	
}



function parseRSS($xml)
{
    echo "<h1>".$xml->channel->title."</h1>";
    $cnt = count($xml->channel->item);
    for($i=0; $i<$cnt; $i++)
    {
		$url 	= $xml->channel->item[$i]->link;
		$title 	= $xml->channel->item[$i]->title;
		$desc = $xml->channel->item[$i]->description;
 		echo '<a href="'.$url.'">'.$title.'</a>'.$desc.'</p>';
    }
}

function parseAtom($xml)
{
    echo "<h1>".$xml->author->name."</h1>";
    $cnt = count($xml->entry);
    for($i=0; $i<$cnt; $i++)
    {
		$urlAtt = $xml->entry->link[$i]->attributes();
		$url	= $urlAtt['href'];
		$title 	= $xml->entry->title;
		$desc	= strip_tags($xml->entry->content);
		echo '<a href="'.$url.'">'.$title.'</a>'.$desc.'</p>';
    }
}

?>
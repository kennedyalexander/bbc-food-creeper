#!/usr/bin/php


This my command line tool to collect all ingredients.
<?php

$myfile = file_get_contents('bbcingredients.html');


$parts = explode("=>", $myfile);

$countingthesize = count($parts);
echo $countingthesize;
$pieces = explode(">", $parts[10]);
//print_r($pieces);

$uglyName = uglyCutter($pieces[0]);
$extension = urlCutter($pieces[1]);
$imageLink = urlCutter($pieces[2]);
$prettifiedName = prettyNameCutter($pieces[3]);
$relatedUrl = relatedNameCutter($pieces[4]);

// $relatedTest =  $parts[10];
// $relatedTest = explode(">", $relatedTest);

// $numbers = range(1, 100);

// foreach ($numbers as $number) {
// echo $number;
// 	}

$stuffs = array();
array_push( $stuffs, $stuff = array(
    'ingredient' => array(
        array(
        	'uglyName' => $uglyName, 
        	'extension' => $extension,
        	'imageLink' => $imageLink,
        	'prettifiedName' => $prettifiedName,
        	'relatedUrl' => $relatedUrl
        	),
    )
    )
);
$pieces = explode(">", $parts[1]);

$uglyName = uglyCutter($pieces[0]);
$extension = urlCutter($pieces[1]);
$imageLink = urlCutter($pieces[2]);
$prettifiedName = prettyNameCutter($pieces[3]);
$relatedUrl = relatedNameCutter($pieces[4]);


array_push( $stuffs, $stuff = array(
    'ingredient' => array(
        array(
        	'uglyName' => $uglyName, 
        	'extension' => $extension,
        	'imageLink' => $imageLink,
        	'prettifiedName' => $prettifiedName,
        	'relatedUrl' => $relatedUrl
        	),
    )
    )
);

$realJson = json_encode($stuffs);
//"\n"
//print_r(json_decode($realJson));


//print_r($relatedTest);
//$result = end(explode('_delimiter_', 'bla-bla_delimiter_important_stuff'));
function uglyCutter ($ugly) {
$cutted = end(explode('id="', $ugly));
$cutted = strstr($cutted, '"', true);
return  $cutted;
}

function urlCutter ($longLine) {
if(($pos = strpos($longLine, '"')) !== false)
{
   $cutted = substr($longLine, $pos + 1);
}
$cutted = strstr($cutted, '"', true);

    return  $cutted;
}

function prettyNameCutter ($prettyName) {
	$prettyName = strstr($prettyName, '<', true);
	return trim($prettyName);
}

function relatedNameCutter ($relatedUrl) {
	if (strpos($relatedUrl, 'related-foods') !== false) {
		return urlCutter($relatedUrl);
	} else {
		return "";
	}
}

// $file = file_get_contents("json.txt");
// //echo($file);
// $json = json_decode($file);
// var_dump($json);

// libxml_use_internal_errors(true);
// $doc = new DomDocument();
// $doc->loadHTML($html);
// libxml_use_internal_errors(false);

// $xml = simplexml_import_dom($doc);

// $ingredients = $xml->xpath(" //*[@id='foods-by-letter']/li/ol");
// // foreach ($xml->li as $rl) {
// //*[@id="orb-modules"]/div[2]/div[3]/div/div[2]/div[1]/div/div[1]/div[2]/div[3]
// //     echo $rl->id . PHP_EOL;
// // }
// // foreach ($xml->children() as $ingredient) {
// //     echo $ingredient;
// // }
// $listing = list( , $node) = each($ingredients);
// $a=array();

// // var_dump($listing[1]->li[2]);
// foreach ($listing[1]->li as $single) {
//     array_push($a, $single->asXML());

// }
// var_dump($a);
// //echo $listing[1]->asXML();

// $ingredients->\$li
// $letters = range('A', 'Z');

// foreach ($letters as $letter) {

// if($letter !== 'X'){
// 	echo "Getting Letter:" . $letter;
// }
// }


?>

Well did it work?




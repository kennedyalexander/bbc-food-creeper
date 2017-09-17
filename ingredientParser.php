#!/usr/bin/php

This is my tool to assemble lovely JSON data of ingredients.
<?php
$theIngredients = explode("=>", file_get_contents('bbcingredients.html'));
$numbers = range(1, count($theIngredients) - 2);

$strippedIngredientList = array();

foreach ($numbers as $number) {
echo "Numbers: " . $number  . "\n"; 
$pieces = explode(">", $theIngredients[$number]);

$uglyName = uglyCutter($pieces[0]);
$extension = urlCutter($pieces[1]);
$imageLink = urlCutter($pieces[2]);
$prettifiedName = prettyNameCutter($pieces[3]);
$relatedUrl = relatedNameCutter($pieces[4]);

array_push( $strippedIngredientList, $stuff = array(
    $uglyName => array(
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
}

echo "JSON encoding started." . "\n";
$JsonList = json_encode($strippedIngredientList);

$file = fopen('newjson.txt', 'r+');
fwrite($file, var_export($JsonList, true));
echo "JSON encoding done.";

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
?>

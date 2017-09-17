#!/usr/bin/php

Start Digging!

<?php
$allIngredients=array();
$letters = range('a', 'z');

foreach ($letters as $letter) {

if($letter !== 'x'){
echo "Getting Letter:" . $letter;
$html = file_get_contents("http://www.bbc.co.uk/food/ingredients/by/letter/$letter");
libxml_use_internal_errors(true);
$doc = new DomDocument();
$doc->loadHTML($html);
libxml_use_internal_errors(false);
$xml = simplexml_import_dom($doc);
$ingredients = $xml->xpath(" //*[@id='foods-by-letter']/li/ol");

$listing = list( , $node) = each($ingredients);
foreach ($listing[1]->li as $single) {
    array_push($allIngredients, $single->asXML());
}
}
};

echo "Now we write.";

$jsonEncoded = json_encode($allIngredients);
$file = fopen('json.txt', 'r+');
fwrite($file, var_export($jsonEncoded, true));
echo "JSON encoding done.";


$serialised = serialize($allIngredients);
$file1 = fopen('serialised.txt', 'r+');
fwrite($file1, var_export($serialised, true));
echo "Serialisation done."


?>

Done
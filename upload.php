<?php
libxml_use_internal_errors(true);
$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])){
echo "Successfully Submitted Files";
        $firstFile = simplexml_load_file($_FILES['firstFileToUpload']['tmp_name']);
        $secondFile = simplexml_load_file($_FILES['secondFileToUpload']['tmp_name']);
       // print_r($myXMLData);
}
//echo $_FILES['firstFileToUpload']['tmp_name'];
//print_r($_FILES);
echo "<br>";
//$_categories = $myXMLData->categories;
//print_r($myXMLData);
echo "<br>Catagories:<br>";
// $test = $myXMLData->categories;
// print_r($test);
$catagoryTableRow = "<button name=\"newCatagory\" onclick=\"newCatagory()\" />+++</button>";
$counter = 1;
foreach($firstFile->categories->category as $catagory) {

    // $catagoryTableRow .= "
    // <tr>
    //     <td> <input type=\"text\" name=\"name\" value=\"$catagory->name\"> <td>
    //     <td> <input type=\"text\" name=\"description\" value=\"$catagory->description\"> <td>
    //     <td> <input type=\"text\" name=\"id\" value=\"$catagory->id\"> <td>
    // </tr>
    // ";
    $catagoryTableRow .= "
    <div>
    Catagory $counter. <br>
    Name: <input type=\"text\" name=\"name\" value=\"$catagory->name\">
    Description: <input type=\"text\" name=\"description\" value=\"$catagory->description\">
    Id: <input type=\"text\" name=\"id\" value=\"$catagory->id\">
    ";
  // print_r( $catagory);
   // echo "<br>";
   // echo($catagory->name);
   // echo "<br>";
   // echo($catagory->description);
   // echo "<br>";
   // echo($catagory->id);
   // echo "<br>";
   // echo("Permitted Values");
     $catagoryTableRow .= "<div id=\"$catagory->name".".permittedValues\">";
   foreach ($catagory->permittedValues->value as $value) {
    $catagoryTableRow .= "
    <br>
    PermittedValue: <input type=\"text\" name=\"permittedValue\" value=\"$value\">
    ";
        // echo "<br>";
        // echo ($value);
   }
   $counter++;
   $catagoryTableRow .= " <button name=\"$catagory\" onclick=\"addItem('$catagory->name".".permittedValues')\" />+</button></div></div> <br>";
   //  echo "<br>";
}
echo "";

echo json_encode($firstFile->categories->category);

echo "<br>Role Definitions:<br>";
foreach($firstFile->roleDefinitions->roleDefinition as $roleDefinition){
 //   print_r($roleDefinition);
    // echo "<br>";
    // echo ($roleDefinition->name);
    // echo "<br>";
    // echo ($roleDefinition->description);
    // echo "<br>";
    // echo ($roleDefinition->id);
    // echo "<br>";
    // echo (count($roleDefinition->securityAttributeValues->attributeValue));
    // echo "<br>";
}

echo "<br>Restrictions:<br>";
foreach($secondFile->restrictions->restriction as $restriction){
    // echo "<br>";
    // echo ($restriction->fqn);
    // echo "<br>";
    // # code...
}
// var doc = parser.parseFromString( fileAsString, "application/xml");
//echo $uploadOk;
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "xml" ) {
//     echo "Sorry, only XML files are allowed.";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

// if (isset($_FILES['fileToUpload']) && ($_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK)) {
//     $xml = simplexml_load_file($_FILES['fileToUpload']['tmp_name']);
// }


//$myXMLData = simplexml_load_file($_FILES["fileToUpload"]['tmp_name']);


// $xml = simplexml_load_string($myXMLData);
// if ($xml === false) {
//     echo "Failed loading XML: ";
//     foreach(libxml_get_errors() as $error) {
//         echo "<br>", $error->message;
//     }
// } else {
//     print_r($xml);
// }
?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
var js_Data_Categories = '<?php echo json_encode($firstFile->categories); ?>';
//var js_obj_data = JSON.parse(js_data );



function printData(){
  console.log(js_Data_Categories);
}
function newValue(){
console.log(hello);

}

function addItem(divheader){
        // var li = document.createElement("LI");
        // var input = document.getElementById("add");
        // li.innerHTML = input.value;
        // input.value = "";
    //    $(# + divheader).append("hello");
//        var newElement = document.createElement("elementTag");
//     newElement.setAttribute('id', "orange");
//     newElement.setAttribute()
// //    newElement.innerHTML = html;
//     document.getElementById(divheader).appendChild(newElement);

 var div = document.createElement('div');

    div.className = 'row';
 div.innerHTML = '<input type="text" name="name" value="" />\
        <input type="text" name="value" value="" />\
        <label> <input type="checkbox" name="check" value="1" /> Checked? </label>\
        <input type="button" value="-" onclick="removeRow(this)">';

     document.getElementById(divheader).appendChild(div);
console.log(divheader);
console.log(document.getElementById(divheader));
       // document.getElementById(divheader).appendChild(li);
    }
</script>

<html>
    <head>
        <title>Uploading Complete</title>
    </head>
    <body>
        <div style="float: left;" id="catagorys">
           <?php echo $catagoryTableRow; ?>

        </div>
        <div>
            <a href="/home.php">Home</a>
        </div>
    </body>
</html>

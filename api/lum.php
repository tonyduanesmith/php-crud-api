<?php
require('config.php');
require('error.php');

$connection = mysqli_connect($host,$username,$password,$database);
$sql = "SELECT * FROM colourLookup";
$result = mysqli_query($connection, $sql);

if(!$result){
    print 'error:' . mysqli_error($connection);
}

foreach ($result as $key => $row) {
    $lum = luminance($row['red'], $row['green'], $row['blue']);
    $id = $row['ID'];
    $sqlUpdate = "UPDATE colourLookup SET luminance=$lum WHERE ID LIKE $id";
    $resultUpdate = mysqli_query($connection, $sqlUpdate);
}



function luminance($red, $green, $blue){
    return (0.2126*$red) + (0.7152*$green) + (0.0722*$blue);
}


?>
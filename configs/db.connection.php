<?php

$hostName = "localhost";
$userName = "root";
$dbPass = "";
$dbName = "foodies";

$conn = mysqli_connect($hostName,$userName,$dbPass,$dbName);

if(!$conn){
    die("Something Went Worng");
}

?>
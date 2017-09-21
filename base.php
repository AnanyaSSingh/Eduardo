<?php
session_start();
 
$dbhost = "localhost"; 
$dbname = "eduardo"; 
$dbuser = "root"; 
$dbpass = "root";
 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected Successfully!";
?>
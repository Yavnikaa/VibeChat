<?php

$host = "localhost";
$user = "first_year";
$password = "first_year"; 
$dbname = "first_year"; 

$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>
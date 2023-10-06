<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajaxcrud";

$con = new mysqli($servername,$username,$password,$dbname);

if(!$con){
    die(mysqli_error($con));
}

// var_dump($_POST); // Check if the POST data is being received
// echo $sql; // Check if the SQL query is correct


?>
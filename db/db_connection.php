<?php
$localhost = "localhost";
$username = "root";//
$password = "";

$conn = new mysqli($servername, $username, $password);

if($conn-> connect_error){
    die("Error" . $con->connect_error);
}


?>
<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "#90!.20r@Mbj";
$dbname = "wellfit_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_username = $_SESSION['username'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $photo = $_POST['photo'];


    $sql ="UPDATE `users_profiles` SET `photo` = ?  WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$photo,$user_username);

    if($stmt->execute()){

    }else{
        echo "Error".$stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
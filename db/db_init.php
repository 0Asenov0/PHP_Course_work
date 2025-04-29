<?php

$localhost = "localhost";
$username = "root";




$conn = new mysqli($localhost, $username, $password);

if($conn-> connect_error){
    die("Error" . $conn->connect_error);
}


$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$dbname`";



if ($conn->query($sql_create_db) === TRUE) {
  echo "Database `$dbname` created or already exists successfully.\n";
} else {
  echo "Error creating database: " . $conn->error . "\n";

}

$conn->select_db($dbname);

$sql_create_USER_PROFILE_TABLE = "CREATE TABLE IF NOT EXISTS `users_profiles` (
 `user_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `name` VARCHAR(50) NOT NULL,
 `email` VARCHAR(50) NOT NULL UNIQUE,
 `phone_number` INT NOT NULL  UNIQUE,
 `username` VARCHAR(255) NOT NULL UNIQUE,
 `password` VARCHAR(255) NOT NULL,
 `photo` VARCHAR(2083)
);";

if($conn->query($sql_create_USER_PROFILE_TABLE) === FALSE){
  echo "DB_CREATE USER_PROFILE_TABLE:FAIL" . $conn->error;
}

$sql_create_USER_INFO ="CREATE TABLE IF NOT EXISTS `users_info`(
 `user_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `weight_goal` DOUBLE(3,2),
 `current_weight` DOUBLE(3,2),
 `fav_sport` VARCHAR(255),
 `max_squat` DOUBLE(4,0),
 `max_bench` DOUBLE (4,0),
 `max_deadlift` DOUBLE (4,0),

  FOREIGN KEY (`user_id`) REFERENCES users_profiles(`user_id`)
);";

if($conn->query($sql_create_USER_INFO) === FALSE){
    echo "DB_CREATE USER_INFO:FAIL" . $conn->error;
}

?>

<?php

session_start();

$servername = "localhost";
$username = "root";


$conn = new mysqli($servername,$username,$password,$dbname);

$sql_get_user = "SELECT * FROM `users_profiles`
WHERE username = ?";



if($conn->connect_error){
    die("Connection failed" . $con->connect_error);
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if (empty($username) || empty($password)) {
  
    $_SESSION['error'] = "Please fill in both the username and password.";
    $_SESSION['username'] = $username;  
    $_SESSION['password'] = $password;  
    
    header("Location: ../login.php");
    exit;
} 
else {
    
    $stmt = $conn->prepare($sql_get_user);
    $stmt->bind_param("s",$username);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
          $_SESSION['username'] = $user['username'];
          $_SESSION['password'] = null;
          header("Location: ../index.php");
          exit;

        }else{
            echo "Invalid password";
        }
    }else{
        echo "User not found";
    }
    $stmt->close();
}

 $conn->close();

?>

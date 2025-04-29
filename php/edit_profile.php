<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Connect to the database
$localhost = "localhost";
$username = "root";


$conn = new mysqli($localhost, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the current user's information
$user_username = $_SESSION['username'];
$sql = "SELECT * FROM users_profiles WHERE username = '$user_username'";

// Fetch user goals data
$sql_goals = "SELECT * FROM users_info WHERE user_id = (SELECT user_id FROM users_profiles WHERE username = '$user_username')";
$result = $conn->query($sql);
$result_goals = $conn->query($sql_goals);

// Initialize the user data and goals
$user = $user_goals = [];

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

if ($result_goals->num_rows > 0) {
    $user_goals = $result_goals->fetch_assoc();
} else {
    $user_goals = [
        'weight_goal' => NULL,
        'current_weight' => NULL,
        'fav_sport' => NULL,
        'max_squat' => NULL,
        'max_bench' => NULL,
        'max_deadlift' => NULL
    ];
}

// Update user profile when form is submitted
///if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['weight_goal'])) {
    // Profile update form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Update profile in the database
    $update_sql = "UPDATE users_profiles SET name = ?, email = ?, phone_number = ? WHERE username = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssss", $name, $email, $phone_number, $user_username);

    if ($stmt->execute()) {
        $_SESSION['profile_update_message'] = "Profile updated successfully!";
    } else {
        $_SESSION['profile_update_message'] = "Error updating profile: " . $stmt->error;
    }
}

// Update user goals when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['weight_goal'])) {
    // Goals update form
    $weight_goal = $_POST['weight_goal'];
    $current_weight = $_POST['current_weight'];
    $fav_sport = $_POST['fav_sport'];
    $max_squat = $_POST['max_squat'];
    $max_bench = $_POST['max_bench'];
    $max_deadlift = $_POST['max_deadlift'];

    // Check if a goals record exists
    $check_sql = "SELECT * FROM users_info WHERE user_id = (SELECT user_id FROM users_profiles WHERE username = '$user_username')";
    $result_check = $conn->query($check_sql);

    if ($result_check->num_rows > 0) {
        // Update existing goals
        $update_sql_goals = "UPDATE users_info SET weight_goal = ?, current_weight = ?, fav_sport = ?, max_squat = ?, max_bench = ?, max_deadlift = ? WHERE user_id = (SELECT user_id FROM users_profiles WHERE username = '$user_username')";
        $stmt_goals = $conn->prepare($update_sql_goals);
        $stmt_goals->bind_param("ddsddd", $weight_goal, $current_weight, $fav_sport, $max_squat, $max_bench, $max_deadlift);

        if ($stmt_goals->execute()) {
            $_SESSION['goals_update_message']  = "Goals updated successfully!";
        } else {
            $_SESSION['goals_update_message']  = "Error updating goals: " . $stmt_goals->error;
        }
    } else {
        // Insert new goals if none exists
        $insert_sql_goals = "INSERT INTO users_info (user_id, weight_goal, current_weight, fav_sport, max_squat, max_bench, max_deadlift) 
                             VALUES ((SELECT user_id FROM users_profiles WHERE username = '$user_username'), ?, ?, ?, ?, ?, ?)";
        $stmt_goals = $conn->prepare($insert_sql_goals);
        $stmt_goals->bind_param("ddsddd", $weight_goal, $current_weight, $fav_sport, $max_squat, $max_bench, $max_deadlift);

        if ($stmt_goals->execute()) {
            $_SESSION['goals_update_message'] = "Goals created successfully!";
        } else {
            $_SESSION['goals_update_message']  = "Error creating goals: " . $stmt_goals->error;
        }
    }

    header("Location: ../profile.php");
}
?>
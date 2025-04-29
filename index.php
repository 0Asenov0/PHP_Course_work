
<?php
// Start session to access stored session variables
session_start();

$localhost = "localhost";
$username = "root";



$conn = new mysqli($localhost, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_top_3 = "
    SELECT 
        up.username, 
        ui.max_squat, 
        ui.max_bench, 
        ui.max_deadlift,
        (ui.max_squat + ui.max_bench + ui.max_deadlift) AS total_lift
    FROM 
        users_profiles AS up
    JOIN 
        users_info AS ui ON up.user_id = ui.user_id
    ORDER BY 
        total_lift DESC  LIMIT 3;
";

$result_top_3 = $conn->query($sql_top_3);

$i=1;
if ($result_top_3->num_rows >= 0) {
 
    while ($row = $result_top_3->fetch_assoc()) {
      /*  echo "" . $row['username'] . "<br>";
        echo "Max Squat: " . $row['max_squat'] . "<br>";
        echo "Max Bench: " . $row['max_bench'] . "<br>";
        echo "Max Deadlift: " . $row['max_deadlift'] . "<br>";
        echo "Total Lift: " . $row['total_lift'] . "<br><br>";
        */
        $_SESSION['user'.$i] = $row['username'];
        $_SESSION['user'.$i.'_squat'] = $row['max_squat'];
        $_SESSION['user'.$i.'_bench'] = $row['max_bench'];
        $_SESSION['user'.$i.'_deadlift'] = $row['max_deadlift'];
        $_SESSION['user'.$i.'_total'] = $row['total_lift'];
        $i++;

    }
    $i=0;
} else {
     $_SESSION['user'.$i] = "No data available for top 3 users.";
}

// Close the connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

       <!-- Header Section -->
       <header>
        <nav>
            <div class="logo">
                <a href="">WellSport</a> <!-- Name or logo goes here -->
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
               <!-- <li><a href="#pricing">Pricing</a></li> -->
               <!-- <li><a href="#shop">Shop</a></li> -->
                <li><a href="about.php">About</a></li>
                <li><a href="javascript:void(0);" id="contact">Contact</a></li>
              
                <?php if(!isset($_SESSION['username'])): ?>
                <li><a href="login.php">Login</a></li>
                
                <?php else: ?>
                <li><a href="profile.php" >Profile</a></li>
                <li><a href="php/logout.php" >Log out</a></li>
                <li><h3 style="color:orange; font-weight:bold;">Welcome, <?php echo $_SESSION['username']; ?></h3></li>
                <?php endif; ?>
           
            </ul>
        </nav>
    </header>
    
    <div id="contactPanel" class="contact-panel">
        <h2>Contact Us</h2>
        <p>Phone:<a href="#">099 111 222</a></p>
        <p>Email:<a href="mailto:proba123@abc?subject=ping"> wellfit@mail.com</a></p>
        <P>Social:<a href="#"> wellfit</a></P>
        <button id="closeBtn">Close</button>
      </div>

    <div>
        <h1 style="text-align: center;margin-top: 2rem;
    margin-bottom: 2rem; color: rgb(201, 250, 1);">STRONGER EVERY DAY</h1>
    </div>

    <!-- Main Section with Image Cards -->
    <section class="main-content">
        <div class="content-item">
            <h3>Strength Training Class</h3>
            <img src="photos/squat.png" alt="Fitness Program 1">
            
            <p>Build your strength with our guided strength training classes.</p>
            <a href="#">Learn more</a>
        </div>
        <div class="content-item">
            <h3>Cardio Workout Class</h3>
            <img src="photos/crossfit.png" alt="Fitness Program 2">
            
            <p>High-energy cardio sessions to boost your endurance.</p>
            <a href="#">Learn more</a>
        </div>
        <div class="content-item">
            <h3>Personalised Programs</h3>
            <img src="photos/programs.png" alt="Fitness Program 2">
            <p>Fitness programs created specificaly for your needs and goals.</p>
            <a href="#">Learn more</a>
        </div>
        <div class="content-item">
            <h3>Martial Arts Class</h3>
            <img src="photos/martial.png" alt="Fitness Program 2">
            
            <p>High-energy cardio sessions to boost your endurance.</p>
            <a href="#">Learn more</a>
        </div>
        <div class="content-item">
            <h3>Yoga Class</h3>
            <img src="photos/yoga.png" alt="Fitness Program 3">
            <p>Improve flexibility and balance with our yoga classes.</p>
            <a href="#">Learn more</a>
        </div>
        <div class="content-item">
            <h3>Personal Training</h3>
            <img src="photos/trainer.png" alt="Fitness Program 4">
            <p>One-on-one sessions tailored to your d fitness goals.</p>
            <a href="#">Learn more</a>
        </div>
    </section>

    <section class="main-content">
    <div class="content-item">
    <h3>Scoreboard</h3>
              <?php if (isset($_SESSION['user1'])): ?>
            <h3 style="color:gold">1st</h3>
            <p><?php echo $_SESSION['user1']; ?></p>
            <p>BENCH PRESS: <?php echo $_SESSION['user1_bench']?></p>
            <p>SQUAT: <?php echo $_SESSION['user1_squat']?></p>
            <p>DEADLIFT: <?php echo $_SESSION['user1_deadlift']?></p>
            <p><b>TOTAL WEIGHT LIFTED:<?php echo $_SESSION['user1_total']?></b></p>
                           
            <?php endif 
               ?>
            <?php if (isset($_SESSION['user2'])): ?>
            <h3 style="color:silver;">2nd</h3>
            <p><?php echo $_SESSION['user2']; ?></p>
            <p>BENCH PRESS: <?php echo $_SESSION['user2_bench']?></p>
            <p>SQUAT: <?php echo $_SESSION['user2_squat']?></p>
            <p>DEADLIFT: <?php echo $_SESSION['user2_deadlift']?></p>
            <p><b>TOTAL WEIGHT LIFTED:<?php echo $_SESSION['user2_total']?></b></p>
            <?php endif 
               ?>

            <?php if (isset($_SESSION['user3'])): ?>
                <h3 style="color:brown">3rd</h3>
                <p><?php echo $_SESSION['user3']; ?></p>
                <p>BENCH PRESS: <?php echo $_SESSION['user3_bench']?></p>
            <p>SQUAT: <?php echo $_SESSION['user3_squat']?></p>
            <p>DEADLIFT: <?php echo $_SESSION['user3_deadlift']?></p>
            <p><b>TOTAL WEIGHT LIFTED:<?php echo $_SESSION['user3_total']?></b></p>
               <?php endif 
               ?>
           
             

       </div>

    </section>

    <!-- Client Feedback Section -->
    <section class="feedback-section">
        <h2>We Value Your Feedback!</h2>
        <textarea placeholder="Share your feedback here..."></textarea><br>
        <button>Submit Feedback</button>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Fitness Website</p>
        <div class="social-media-links">
            <a href="https://facebook.com">Facebook</a> |
            <a href="https://twitter.com">Twitter</a> |
            <a href="https://instagram.com">Instagram</a>
        </div>
        <p>123 Fitness St, Wellness City, Country</p>
        <p>Phone: (123) 456-7890 | Email: info@fitnesswebsite.com</p>
    </footer>
    
    <script src="script.js">    </script> 
</body>
</html>
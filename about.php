<?php
session_start();
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
                <a href="">WellSport</a> 
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
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

    <!-- About Section  -->
    <section class="about-section">
        <div class="container">
            <h1>Welcome to WellSport</h1>
            <p class="intro-text">
                At WellFit, we're more than just a fitness center – we're a community of people dedicated to living healthier, stronger lives. Whether you're here to crush your fitness goals, learn something new, or simply have fun while staying fit, we’ve got everything you need to succeed.
            </p>
            <div class="about-images">
                <img src="photos/gym_interior.png" alt="Personal Training" class="about-img">
                <img src="photos/martial.png" alt="Gym Interior" class="about-img">
                <img src="photos/gym_interior2.png" alt="Personal Training" class="about-img">
            </div>
            <p class="closing-text">
                From personalized training to exciting group classes and martial arts, our expert team is here to guide and motivate you every step of the way. Step into [Your Gym Name] today and start your journey towards a stronger, healthier version of yourself. Let’s make it happen – together.
            </p>
        
            <a href="#">Learn more about our fitness programs</a>
            <a href="#hours">Working Hours</a>
        
        </div>
    </section>
    <section class="working-hours">
        <div class="container" id="hours">
            <h2>Working Hours</h2>
            <ul>
                <li><strong>Monday - Friday:</strong> 6:00 AM - 9:00 PM</li>
                <li><strong>Saturday:</strong> 8:00 AM - 6:00 PM</li>
                <li><strong>Sunday:</strong> Closed</li>
            </ul>
        </div>
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
    
<script src="script.js">
</script> 
</body>
</html>
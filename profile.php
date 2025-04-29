<?php include 'php/edit_profile.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
    <style>
        
        .message {
            transition: opacity 1s ease-out;
        }
        .message.hidden {
            opacity: 0;
        }
    </style>
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
            <li><a href="about.php">About</a></li>
            <li><a href="javascript:void(0);" id="contact">Contact</a></li>

            <?php if (!isset($_SESSION['username'])): ?>
                <li><a href="login.php">Login</a></li>
            <?php else: ?>
                <li><a href="php/logout.php">Log out</a></li>
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

<section class="profile-section">
    <!-- Profile Update Form -->
    <div class="profile-card">
        <h2>Edit Profile</h2>
    
        <form method="POST" action="php/edit_profile.php">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>" required>

            <button type="submit" class="edit-button">Update Profile</button>
        </form>
    </div>
    <?php if (isset($_SESSION['profile_update_message'])): ?>
            <p class="message success"><?php echo $_SESSION['profile_update_message']; ?></p>
            <?php unset($_SESSION['profile_update_message']); ?>
        <?php elseif (isset($_SESSION['profile_update_error'])): ?>
            <p class="message error"><?php echo $_SESSION['profile_update_error']; ?></p>
            <?php unset($_SESSION['profile_update_error']); ?>
        <?php endif; ?>

    <?php if (isset($_SESSION['goals_update_message'])): ?>
            <p class="message success"><?php echo $_SESSION['goals_update_message']; ?></p>
            <?php unset($_SESSION['goals_update_message']); ?>
        <?php elseif (isset($_SESSION['goals_update_error'])): ?>
            <p class="message error"><?php echo $_SESSION['goals_update_error']; ?></p>
            <?php unset($_SESSION['goals_update_error']); ?>
        <?php elseif (isset($_SESSION['goals_create_message'])): ?>
            <p class="message success"><?php echo $_SESSION['goals_create_message']; ?></p>
            <?php unset($_SESSION['goals_create_message']); ?>
        <?php elseif (isset($_SESSION['goals_create_error'])): ?>
            <p class="message error"><?php echo $_SESSION['goals_create_error']; ?></p>
            <?php unset($_SESSION['goals_create_error']); ?>
        <?php endif; ?>
    <div class="profile-card">
        <h2>Edit Goals</h2>
       
        <form method="POST" action="php/edit_profile.php">
            <label for="weight_goal">Weight Goal</label>
            <input type="number" id="weight_goal" name="weight_goal" step="1" value="<?php echo htmlspecialchars($user_goals['weight_goal'] ?: ''); ?>">

            <label for="current_weight">Current Weight</label>
            <input type="number" id="current_weight" name="current_weight" step="1" value="<?php echo htmlspecialchars($user_goals['current_weight'] ?: ''); ?>">

            <label for="fav_sport">Favorite Sport</label>
            <input type="text" id="fav_sport" name="fav_sport" value="<?php echo htmlspecialchars($user_goals['fav_sport'] ?: ''); ?>">

            <label for="max_squat">Max Squat</label>
            <input type="number" id="max_squat" name="max_squat" step="1" value="<?php echo htmlspecialchars($user_goals['max_squat'] ?: ''); ?>">

            <label for="max_bench">Max Bench</label>
            <input type="number" id="max_bench" name="max_bench" step="1" value="<?php echo htmlspecialchars($user_goals['max_bench'] ?: ''); ?>">

            <label for="max_deadlift">Max Deadlift</label>
            <input type="number" id="max_deadlift" name="max_deadlift" step="1" value="<?php echo htmlspecialchars($user_goals['max_deadlift'] ?: ''); ?>">

            <button type="submit" class="edit-button">Update Goals</button>
        </form>
    </div>
</section>

<!-- Footer Section -->
<footer>
    <p>&copy; 2023 wellFit</p>
    <div class="social-media-links">
        <a href="https://facebook.com">Facebook</a> |
        <a href="https://twitter.com">Twitter</a> |
        <a href="https://instagram.com">Instagram</a>
    </div>
</footer>
<script src="script.js"></script> 
<script>
document.addEventListener('DOMContentLoaded', function () {
 var messages = document.querySelectorAll('.message');

        messages.forEach(function (message) {
            setTimeout(function () {
                message.classList.add('hidden');
            }, 2000); 
     
        setTimeout(function() {
            message.style.display = 'none'; 
        }, 3000);
    });
    })
</script>

</body>
</html>

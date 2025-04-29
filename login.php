<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles_login.css">
</head>
<body>
    <div class="login-container">
        <div class="card">
            <h2>Login</h2>

         
             <?php if (isset($_SESSION['error'])): ?>
                <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']);?>
            <?php endif; ?>

           
            <?php if (isset($_SESSION['success'])): ?>
                <p style="color: green;"><?php echo $_SESSION['success']; ?></p>
                <?php unset($_SESSION['success']);  ?>
                <?php unset($_SESSION['username']);?>
                <?php unset($_SESSION['password']);?>
            <?php endif; ?>

            <form action="php/login_proces.php" method="POST" class="login-form">
                <div class="input-group">
                    <label for="username"></label>
                    <input type="text" id="username" name="username" 
                    value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"
                    placeholder="Name">
                </div>
                <div class="input-group">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" 
                    value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>"
                    placeholder="Password"
                    require d>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <div class="signup-link">
                    <p>Don't have an account? <a href="register.php">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

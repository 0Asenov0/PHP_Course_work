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
            <h2>Sign up</h2>
            <form action="php/sign_up.php" method="POST" class="login-form">
                <div class="input-group">
                    <label for="firstname"></label>
                    <input type="text" id="name" name="name"
                    placeholder="Name" 
                    pattern="^([A-Z]{1}[a-z]*)|([А-Я]{1}[а-я]*)$"
                    title="Cyrilic or Latin letters with One capital letter at the begining"
                    required>
                </div>
              
                <div class="input-group">
                    <label for="phone"></label>
                    <input type="text" id="phone" name="phone" 
                    placeholder="Phone"
                    pattern="^(\+359|0)(8[8-9])\d{7}$" 
                    title="Phone number starting with +359/089/088" 
                    required>
                </div>
                <div class="input-group">
                <label for="email"></label>   
                <input type="email" name="email" id="email" 
                placeholder="Email"
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" 
                title="Please enter a valid email address" required>
               </div>
                <div class="input-group">
                    <label for="username"></label>
                    <input type="text" id="username" name="username" 
                    placeholder="Username"

                    pattern="^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{5,10}$"
                    title="No symbols allowed, only lating letters and numbers allowed (Name length must be between 5-10)"
                    required>
                </div>
                <div class="input-group">
                    <label for="password"></label>
                    <input type="password" id="password" name="password"
                    placeholder="Password"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$"
                    title="Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character"
                    required>
                </div>
                <button type="submit" class="login-btn">Sign up</button>
               
            </form>
        </div>
    </div>
</body>
</html>

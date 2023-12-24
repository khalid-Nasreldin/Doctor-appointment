<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <form action="signup-process.php" method="post">
            <h1>signup</h1>

            <?php if(isset($_SESSION["check_email"])): ?>
                <p class="message">user alredy exist</p>
            <?php unset($_SESSION["check_email"]); ?>
            <?php endif; ?>

            <div>
                <label for="full-name">Full Name</label>
                <input type="text" name="full_name" id="full-name" placeholder="Full Name" required>
            </div>

            <div>
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="example.com" required>
            </div>    

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <div>
                <label for="c-password">Confirm</label>
                <input type="password" name="c_password" id="c-password" placeholder="Confrim Password" required>
            </div>

            <div>
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="" selected disabled>select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <p class="link-1">already have an account? <a href="login.php">login</a></p>
            <button type="submit">submit</button>
        </form>
    </div>
</body>
</html>
<?php

$valid_login = TRUE;

$mysqli = require __DIR__ . "/connection.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql = sprintf("SELECT * FROM users WHERE email='%s'", $mysqli->real_escape_string($_POST["email"]));
    $res = $mysqli->query($sql);
    $user = $res->fetch_assoc();
    
    if($user){
        if(password_verify($_POST["password"], $user["password_hash"])){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("location: index.php");
            exit;
        };
        $valid_login = FALSE;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./FontAwesome/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>login</h1>
            
            <?php if(!$valid_login): ?>
                <p class="message">check your email and password</p>
            <?php endif; ?>
            
            <div>
                <label for="email"><i class="fa fa-envelope"></i> E-Mail</label>
                <input type="email" name="email" value="<?php if(!$valid_login) echo $_POST["email"] ?>" id="email" placeholder="example.com" required>
            </div>    

            <div>
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <p class="link-1">dont't have an account? <a href="signup.php">signup</a></p>
            <button type="submit">login</button>
        </form>
    </div>
</body>
</html>
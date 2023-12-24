<?php
session_start();
if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/connection.php";
    $sql = "SELECT * FROM users WHERE id={$_SESSION['user_id']}";
    $query = $mysqli->query($sql);
    $user = $query->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./FontAwesome/css/all.min.css">
</head>
<body>
    <header>
        <h1><i class="fa fa-home"></i> hospital</h1>
        <ul>
            <li><a href="index.php">home</a></li>
            <?php if(isset($_SESSION["user_id"])): ?>
                <li><a href="status.php">appointemt status</a></li>
                <?php endif; ?>
            <li><a href="about.php">about us</a></li>
            <li><a href="#contact_us">contact</a></li>
        </ul>
        <span>
            <?php if (isset($_SESSION["user_id"])) : ?>
                <p class="username"><?php echo $user["full_name"] ?></p>
                <a href="logout.php" class="link">logout</a>
            <?php else : ?>
                <p><a href="signup.php" class="link"><i class="fa fa-sign-in"></i> signup</a> <a href="login.php"><i class="fa fa-sign-in"></i> login</a></p>
            <?php endif; ?>
        </span>
    </header>
    
    <section class="about_us">
        <article>
            <h2>about us</h2>
            <p>we understand that entrusting your health to our care is a significant decision. That's why we're committed to providing you with the highest quality medical care, delivered by a team of exceptional doctors who are not only experts in their fields but also compassionate and dedicated to your well-being.</p>
            <a href="index.php#appointment">make an appointemt</a>
        </article>
        <aside>
            <img src="images/pic-3.svg" alt="img">
        </aside>
    </section>
    <footer class="contact_us" id="contact_us">
        <div class="box">
            <p>social</p>
            <a href="#"><i class="fa-brands fa-twitter"></i> X (tiwtter)</a>
            <a href="#"><i class="fa-brands fa-instagram"></i> instagram</a>
            <a href="#"><i class="fa-brands fa-facebook"></i> facebook</a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i> whatsapp</a>
        </div>
        <div class="box">
            <p>contact us</p>
            <a href="#"><i class="fa fa-envelope"></i> example@gmail.com</a>
            <a href="#"><i class="fa fa-phone"></i> phone: xxx xxx xxx</a>
            <a href="#"><i class="fa fa-earth"></i> website</a>
            <a href="#"><i class="fa fa-location-dot"></i> address</a>
        </div>
        <div class="box">
            <p>links</p>
            <a href="#">home</a>
            <a href="#">about us</a>
            <a href="#">appointemt</a>
        </div>
    </footer>
</body>
</html>
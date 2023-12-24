<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/connection.php";
    $sql = "SELECT * FROM users WHERE id={$_SESSION["user_id"]}";
    $query = $mysqli->query($sql);
    $user = $query->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                <p class="username"><i class="fa fa-user"></i> <?php echo $user["full_name"] ?></p>
                <a href="logout.php" class="link"><i class="fa fa-sign-out"></i> logout</a>
            <?php else : ?>
                <p><a href="signup.php" class="link">signup</a> <a href="login.php">login</a></p>
            <?php endif; ?>
        </span>
    </header>
    <?php if(isset($_SESSION["user_id"])): ?>
        <section class="home_page">
            <article>
                <h2>welcome <?php echo $user["full_name"] ?></h2>
                <p>
                    we're dedicated to providing you with the highest quality care in a warm and friendly environment. Our team of experienced professionals is here to help you achieve your health goals. browse our webiste to learn <a href="about.php">about us</a>
                </p>
                <a href="#appointment" class="link">make an appointemt</a>
            </article>
            <aside>
                <div class="image">
                    <img src="images/pic-2.svg" alt="images">
                </div>
            </aside>
        </section>
        <section id="appointment" class="appointmet_wrapper">
            <h3>make you'r appointment</h3>
            <form action="appointment-process.php" method="post">
                <label for="first_name">First Name : <br><input type="text" name="first_name" id="first_name" required></label>
                <label for="last_name">Last Name : <br><input type="text" name="last_name" id="last_name" required></label>
                <label for="phone">Phone : <br><input type="text" name="phone" id="phone" placeholder="xxx xxx xxx" required></label>
                <label for="date">Date : <br><input type="date" name="date" id="date" required></label>
                <label for="address">Address : <br><input type="text" name="address" placeholder="Country / state" id="address" required></label>
                <label for="email"><br><input type="email" name="email" value="<?php if(isset($_SESSION["user_id"])) echo $user["email"] ?>" id="email" hidden required></label>
                <label for="message">Describe the sector you are interested in :<br><textarea name="message" placeholder="symptoms, headache etc.." id="message" cols="30" rows="10" required></textarea></label>
                <img src="images/pic-4.svg" alt="img">
                <button type="submit">submit</button>
            </form>
        </section>
    <?php else: ?>
        <section class="home_page">
            <article>
                <h2>welcome, glad you'ur here</h2>
                <p>
                    we're dedicated to providing you with the highest quality care in a warm and friendly environment. Our team of experienced professionals is here to help you achieve your health goals. browse our webiste to learn <a href="about.php">about us</a>
                </p>
                <a href="login.php" class="link">loign to make an appointemt</a>
            </article>
            <aside>
                <div class="image">
                    <img src="images/pic-2.svg" alt="imgae">
                </div>
            </aside>
        </section>
    <?php endif; ?>
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
<?php
session_start();
if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/connection.php";
    $sql = "SELECT * FROM users WHERE id={$_SESSION["user_id"]}";
    $query = $mysqli->query($sql);
    $user = $query->fetch_assoc();
    $user_email = $user["email"];

    $sql_appointment = "SELECT * FROM appointments WHERE email='$user_email'";
    $query_appointment = $mysqli->query($sql_appointment);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./FontAwesome/css/all.min.css">
</head>
<body>
    <header>
        <h1><i class="fa fa-home"></i> hospital</h1>
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="status.php">appointemt status</a></li>
            <li><a href="about.php">about us</a></li>
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
    <section class="table_wrapper">
        <h1>track you'r appointment status</h1>
        <table>
            <thead>
                <tr>
                    <th>first name</th>
                    <th>last name</th>
                    <th>email</th>
                    <th>date</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php while( $data = $query_appointment->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $data["first_name"] ?></td>
                        <td><?php echo $data["last_name"] ?></td>
                        <td><?php echo $data["email"] ?></td>
                        <td><?php echo $data["date"] ?></td>
                        <td class="status"><?php echo $data["status"] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</body>
</html>
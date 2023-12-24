<?php
$mysqli = require __DIR__ . "/connection.php";
$sql = "SELECT * FROM appointments";
$query = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./FontAwesome/css/all.min.css">
</head>
<body>
    <header class="admin_header">
        <h1>dashboard</h1>
    </header>
    <section class="admin_dashboard">
        <table>
            <thead>
                <tr>
                    <th>first name</th>
                    <th>last name</th>
                    <th><i class="fa fa-envelope"></i> email</th>
                    <th><i class="fa fa-phone"></i> phone</th>
                    <th><i class="fa fa-clock"></i> date</th>
                    <th><i class="fa fa-location-dot"></i> address</th>
                    <th><i class="fa fa-circle-info"></i> description</th>
                    <th>status</th>
                    <th><i class="fa fa-pen"></i> action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($appointment = $query->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $appointment["first_name"] ?></td>
                        <td><?php echo $appointment["last_name"] ?></td>
                        <td><?php echo $appointment["email"] ?></td>
                        <td><?php echo $appointment["phone"] ?></td>
                        <td><?php echo $appointment["date"] ?></td>
                        <td><?php echo $appointment["address"] ?></td>
                        <td><?php echo $appointment["feedback"] ?></td>
                        <td><?php echo $appointment["status"] ?></td>
                        <td><a href="confirm.php?id=<?php echo $appointment["id"] ?>" class="confirm">confirm</a><a href="cancel.php?id=<?php echo $appointment["id"] ?>" class="cancel">Cancel</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </section>
</body>
</html>
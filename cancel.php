<?php
$mysqli = require __DIR__ . "/connection.php";
$id = $_GET["id"];
$sql = "UPDATE appointments SET status='canceled' WHERE id=$id";
$query = $mysqli->query($sql);
header("location: admin_dashboard.php");
exit;
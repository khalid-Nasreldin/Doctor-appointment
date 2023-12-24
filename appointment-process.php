<?php

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date_ = $_POST["date"];
$address = $_POST["address"];
$textarean = $_POST["message"];
$status = "Pending";

$mysqli = require __DIR__ . "/connection.php";
$sql = "INSERT INTO appointments(first_name, last_name, email, phone, date, address, feedback, status) VALUES(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->stmt_init();
if(!$stmt->prepare($sql)){
    die("SQL ERROR : " . $mysqli->error);
}
$stmt->bind_param("ssssssss", $first_name, $last_name, $email, $phone, $date_, $address, $textarean, $status);
if($stmt->execute()){
    header("location: status.php");
    exit;
}
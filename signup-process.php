<?php
session_start();

$full_name = $_POST["full_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$c_password = $_POST["c_password"];
$gender = $_POST["gender"];

if(empty($full_name)){
    die("Full Name is required");
}
if( ! filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Valid email is requird");
}
if(strlen($password) < 6){
    die("Password must be more than 6");
}
if(!preg_match("/[a-z]/", $password)){
    die("Password must contain letters");
}
if(!preg_match("/[0-9]/", $password)){
    die("Passwod must contain numbers");
}
if($password !== $c_password){
    die("Password must Match");
}
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/connection.php";

// check if the user already exist
$check_email_sql = sprintf("SELECT * FROM users WHERE email='%s'", $mysqli->real_escape_string($_POST["email"]));
$check_result = $mysqli->query($check_email_sql);
$check_email = $check_result->fetch_assoc();
if($check_email){
    $_SESSION["check_email"] = TRUE;
    header("location: signup.php");
    exit;
}

// inserting the data
$sql = "INSERT INTO users(full_name, email, password_hash, gender) VALUES(?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();
if(!$stmt->prepare($sql)){
    die("SQL ERROR : " . $mysqli->error);
}
$stmt->bind_param("ssss", $full_name, $email, $password_hash, $gender);
if($stmt->execute()){
    header("location: login.php");
    exit;
}
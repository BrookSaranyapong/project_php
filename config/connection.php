<?php
// ini_set('session.cookie_httponly', 1);
// ini_set('session.use_only_cookies', 1);
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_two_hand";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
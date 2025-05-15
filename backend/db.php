<?php
$host = "localhost";
$user = "root";
$password = "your_new_password"; // default is blank in WAMP
$dbname = "businessmeet";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

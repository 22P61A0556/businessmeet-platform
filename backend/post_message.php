<?php
include 'db.php';
session_start();

$user_id = $_SESSION['user_id'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (user_id, message) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $user_id, $message);
$stmt->execute();
?>

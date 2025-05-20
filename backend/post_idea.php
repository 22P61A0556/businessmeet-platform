<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
    $idea = $_POST['idea'];

    $stmt = $conn->prepare("INSERT INTO posts (name, idea) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $idea);
    $stmt->execute();
}

header("Location: dashboard.php");
exit();
?>

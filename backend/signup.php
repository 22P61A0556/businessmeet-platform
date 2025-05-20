<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $category = $_POST['category'];

    // Check if email or phone already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "User already exists!";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, phone, email, password, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $phone, $email, $password, $category);
        if ($stmt->execute()) {
            $_SESSION['username'] = $name;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Signup failed.";
        }
    }
}
?>

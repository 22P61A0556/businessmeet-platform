<?php
session_start();
require_once 'db.php'; // Update this if your DB connection file has a different name

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Access denied. Please submit the form.";
    exit;
}

// Collect and validate form inputs
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$category = $_POST['category'];

if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($category)) {
    echo "All fields are required.";
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user into the database
$sql = "INSERT INTO users (name, phone, email, password, category) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $name, $phone, $email, $hashedPassword, $category);
    $signupSuccess = $stmt->execute();

    if ($signupSuccess) {
        // Redirect to login.html in the parent folder
        header("Location: ../login.html");
        exit;
    } else {
        echo "Signup failed. Please try again.";
    }

    $stmt->close();
} else {
    echo "Database error. Please try again.";
}

$conn->close();
?>

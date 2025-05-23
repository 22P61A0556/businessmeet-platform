<?php
session_start();
require_once("db.php"); // your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usernameOrEmail = trim($_POST['username_or_email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($usernameOrEmail) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Query to find user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR name = ?");
    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Access denied. Please submit the form.";
}
?>

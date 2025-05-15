<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['user_id'] = $row['id'];
        echo "Login successful";
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}
?>

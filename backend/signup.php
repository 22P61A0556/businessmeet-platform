<?php
require_once 'db.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$category = $_POST['category'];

$sql = "INSERT INTO users (name, phone, email, password, category) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $phone, $email, $password, $category);

if ($stmt->execute()) {
  echo "<h3>Hello, $name! Welcome to BusinessMeet.</h3>";
} else {
  echo "Error: " . $stmt->error;
}

$conn->close();
?>

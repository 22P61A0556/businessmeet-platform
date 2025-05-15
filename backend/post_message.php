<?php
require_once 'db.php';

$sender = $_POST['sender'];
$message = $_POST['message'];

$sql = "INSERT INTO chat_messages (sender, message) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $sender, $message);

if ($stmt->execute()) {
  echo "Message sent successfully.";
} else {
  echo "Error: " . $stmt->error;
}

$conn->close();
?>

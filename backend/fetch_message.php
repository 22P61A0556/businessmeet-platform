<?php
require_once 'db.php';

$sql = "SELECT * FROM chat_messages ORDER BY timestamp DESC LIMIT 20";
$result = $conn->query($sql);

$messages = [];
while ($row = $result->fetch_assoc()) {
  $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode(array_reverse($messages)); // To show latest at the bottom

$conn->close();
?>

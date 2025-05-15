<?php
include 'db.php';

$sql = "SELECT users.username, messages.message, messages.timestamp 
        FROM messages 
        JOIN users ON messages.user_id = users.id 
        ORDER BY messages.timestamp DESC LIMIT 20";

$result = $conn->query($sql);
$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);
?>

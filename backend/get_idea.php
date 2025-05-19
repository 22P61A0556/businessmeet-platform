<?php
// backend/get_idea.php
include 'db.php';

$sql = "SELECT name, message, timestamp FROM posts ORDER BY timestamp DESC";
$result = $conn->query($sql);

$ideas = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ideas[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($ideas);
$conn->close();
?>

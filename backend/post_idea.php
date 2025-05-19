// post_idea.php
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit("Not logged in.");
}

$user_id = $_SESSION['user_id'];
$idea = trim($_POST['idea']);

if ($idea) {
    $stmt = $conn->prepare("INSERT INTO ideas (user_id, content, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $user_id, $idea);
    $stmt->execute();
    $stmt->close();
    echo "Idea posted successfully.";
} else {
    echo "Please enter a business idea.";
}
?>
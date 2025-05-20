<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - BusinessMeet</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    
    <form action="post_idea.php" method="POST">
        <textarea name="idea" rows="4" cols="50" placeholder="Share your business idea..."></textarea><br>
        <button type="submit">Post</button>
    </form>

    <h3>All Business Ideas:</h3>
    <div style="max-height: 300px; overflow-y: auto;">
        <?php
        require 'db.php';
        $result = $conn->query("SELECT name, idea FROM posts ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row['name']) . ":</strong> " . htmlspecialchars($row['idea']) . "</p>";
        }
        ?>
    </div>
</body>
</html>

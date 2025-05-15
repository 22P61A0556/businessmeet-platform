<?php
require_once 'db.php';

$identifier = $_POST['identifier'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE name=? OR email=? OR phone=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $identifier, $identifier, $identifier);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  if (password_verify($password, $row['password'])) {
    echo "<h3>Welcome back, " . $row['name'] . "!</h3>";
  } else {
    echo "Invalid password.";
  }
} else {
  echo "User not found.";
}

$conn->close();
?>

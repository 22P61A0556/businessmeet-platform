// get_username.php
<?php
session_start();
if (isset($_SESSION['name'])) {
    echo $_SESSION['name'];
} else {
    echo "Guest";
}
?>
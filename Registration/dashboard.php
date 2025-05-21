<?php
session_start();
include('dbconnection.php');

if (!isset($_SESSION['uid'])) {
    header('Location: signin.php'); // Redirect if not logged in
} else {
    echo "Welcome, " . $_SESSION['name'] . "!";
    echo "<p>You are logged in as: " . $_SESSION['email'] . "</p>";
    echo '<a href="logout.php">Logout</a>';
}
?>

<?php
include("session.php");
$valid_email = array(
    "admin@gmail.com" => "admin",
    "user1@gmail.com" => "user1",
    "user2@gmail.com " => "user2"
);
if (!empty($_POST)) 
{
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if (empty($email) || empty($password)) {
        echo "Both fields are required.";
    } else {
        if (isset($valid_email[$email]) && $valid_email[$email] === $password) {
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid email or password.<br>";
            echo "Please try again.<br>";
            echo "<a href='index.php'>Go back to login</a>";
        }
    }
}
?>


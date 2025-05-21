<?php
include_once("session.php");
echo session_name();
echo "The session id is: ".session_id();
echo "<br/> The session id is:".session_status();
header("x-powered-by: application/json");
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome</h1><br/>
    <p>You are logged in as: <?php echo $_SESSION['email']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
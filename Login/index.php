<?php
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login1.php" method="POST">
        <label>Email:</label>
        <input type="email" name="aemail" required><br><br>
        <label>Password:</label>
        <input type="password" name="apassword" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
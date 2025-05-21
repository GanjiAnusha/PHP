<?php
include("session.php");
$valid_email = [
    ['admin@gmail.com', 'admin'],
    ['user1@gmail.com', 'user1'],
    ['user2@gmail.com', 'user2']
];
if (!empty($_POST)) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if (empty($email) || empty($password)) 
    {
        echo "Both fields are required.";
    } 
    else 
    {   
         foreach ($valid_email as $user) 
        {
            if ($email == $user[0] && $password == $user[1]) {
                $_SESSION['email'] = $email;
                header("Location: dashboard.php");
                exit();
            }
            else 
            {
            echo "Invalid email or password.";
            print("Please try again.");
            echo "<br><a href='index.php'>Go back to login</a>";      
            }
        }
    }
}
?>


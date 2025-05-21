<?php
 include("session.php");
 $valid_email = 'admin@gmail.com';
 $valid_password = '1234'; 
 if (!empty($_POST)) {
     $email = $_POST['email'] ?? '';
     $password = $_POST['password'] ?? '';
     if (empty($email) || empty($password)) 
     {
         echo "Both fields are required.";
     } 
     else 
     {
         if ($email == $valid_email && $password == $valid_password) 
         {
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
?> 
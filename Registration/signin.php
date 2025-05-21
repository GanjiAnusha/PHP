<?php
session_start();
include('dbconnection.php');
if(isset($_POST['login']))
{
  $emailcon=$_POST['emailcont'];
  $password=md5($_POST['password']);
  $sql = "select * from users where  Email='$emailcon' OR Password='$password' ";
  $query=mysqli_query($conn,$sql);
  $ret=mysqli_fetch_assoc($query);
  if($ret>0){
    $_SESSION['uid']=$ret['ID'];
    $_SESSION['name']=$ret['FullName'];
    $_SESSION['email']=$ret['Email'];
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  }
  else
  {
  echo "<script>alert('Invalid Details');</script>";
  }
}
?>
<html>
  <style>
body {
  background: #f7f8fa;
  font-family: 'Segoe UI', Arial, sans-serif, Italic;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
}
.form-container {
  background: #fff;
  padding: 40px 30px 30px 30px;
  border-radius: 12px;
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
  max-width: 400px;  
  width: 100%;
  margin: 0 auto; 
  box-sizing: border-box; 
}
h2 {
  color: #2d3e50;
  margin-bottom: 24px;
  letter-spacing: 1px;
  font-size: 24px;
  font-weight: 600;
  text-align: center; 
}
label {
  display: block;
  margin-bottom: 6px;
  color: #333;
  font-weight: 500;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 12px 15px; 
  margin-bottom: 18px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 15px;
  box-sizing: border-box;
  transition: border 0.2s;
}
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
  border: 1.5px solid #0066ff;
  outline: none;
}
button[type="submit"] {
  background: #0066ff;
  color: #fff;
  border: none;
  padding: 12px 0;
  width: 100%;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
  margin-bottom: 10px;
}
button[type="submit"]:hover {
  background: #004bb5;
}
a {
  display: block;
  text-align: center;
  margin-top: 10px;
  color:rgb(7, 7, 7);
  text-decoration: none;
  font-size: 15px;
}

a:hover {
  text-decoration: underline;
}
@media (max-width: 500px) {
  .form-container {
    padding: 25px 20px;  
    width: 90%;  
  }
}

</style>
<body>
  <h2>Sign In Your  Account</h2>
  <form method="POST">
          <input type="text" placeholder="Registered Email or Contact Number" required="true" name="emailcont">
          <input type="password" placeholder="Password" name="password" required="true">
          <button type="submit" name="login">Sign IN</button>
      <br>
      <a href="index.php">Don't have an account ? CREATE AN ACCOUNT</a>
  </form>
</body>
</html>


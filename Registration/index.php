<?php 
session_start();
if (file_exists('dbconnection.php')) {
    include('dbconnection.php');
} else {
    die("Something Went wrong Please Try Again.");
}
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($conn, "SELECT * FROM users WHERE Email = '$email' OR MobileNumber = '$contno'");
    $result=mysqli_fetch_assoc($ret);
    if($result>0)
    {
      echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else
    {
      if(isset($_FILES['image']))
      {
        extract($_FILES['image']);
        if($error == 0)
        {
          $imgArr = ['jpeg', 'jpg', 'png'];
          // $imgExt = pathinfo($name, PATHINFO_EXTENSION);
          $extType = explode('/', $type);
          $ext = end($extType);
          if(in_array($ext,$imgArr))
          {
            $uniq = uniqid("Avatar_", true);
            $filename = "image/{$uniq}.{$ext}";
            move_uploaded_file($tmp_name, $filename);
            exit;
          }
          else
          {
            exit('This file type is not allowed');
          }
        }
        else
        {
          exit('File is not uploaded');
        }
      }
      $query=mysqli_query($conn, "insert into users(FullName, MobileNumber, Email, image, Password) value('$fname', '$contno', '$email','$filename', '$password' )");
      if ($query) 
      {
        echo "<script type='text/javascript'> alert('You have successfully registered');</script>";
        echo "<script>window.location.href ='signin.php'</script>";
      }
      else
      {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script>window.location.href ='index.php'</script>";
      }
    }
  }
?>
<html>
<head>
 <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="form-container">
    <h2>Registration Form</h2>
    <form method="POST" enctype="multipart/form-data">
      <label>Name:</label>
      <input type="text" placeholder="NAME" name="fname" required>
      <label>Mobile Number:</label>
      <input type="text" placeholder="Mobile Number" name="contactno" required maxlength="10" pattern="[0-9]+">
      <label>Email:</label>
      <input type="email" placeholder="Email Address" name="email" required>
      <label>Upload Image:</label>
      <input type="file" name="image" required>
      <label>Password:</label>
      <input type="password" name="password" required placeholder="Password">
      <button type="submit" name="submit">Submit</button>
      <a href="signin.php">Already have an account? Signin</a>
    </form>
  </div>
</body>
</html>


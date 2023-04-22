<?php
  session_start();
  require('../database.php');
  
  if (isset($_POST['submit'])) {
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn , $sql);

    if (mysqli_num_rows($res) > 0) {
      
      $_SESSION['admin'] = $username;
      
      header("Location:http://localhost/Restaurant-Management-System/admin/index.php");

    }else{
      echo "<script>alert('Username or password doesnt match');</script>";

    }

  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="../images/translogo-alt.png" type="image/x-icon">
      <link rel="stylesheet" href="login.css">
      <title>Log-In</title>
</head>
<body>
      <div class="form">
          <form action="login.php" method="post">
            <div class="title">Admin Log-In</div>
            <div class="content">
              <div class="input">
                <span>Username</span>
                <input
                  type="text"
                  placeholder="Username"
                  id="username"
                  name="username"
                  required
                />
              </div>
              <div class="input">
                <span>Password</span>
                <input
                  type="password"
                  placeholder="Password"
                  id="password"
                  name="password"
                  required
                />
              </div>
              <div class="input submit">
                <input type="submit" value="Sign In" name="submit" />
              </div>
              
            </div>
          </form>
        </div>
</body>
</html>


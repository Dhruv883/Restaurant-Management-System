<?php
  require('./database.php');
  if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn , $sql);
    $rows = mysqli_num_rows($res);
    if ($rows == 1) {
      $_SESSION['customer'] = $username;
      
      header("Location:http://localhost/Restaurant-Management-System/CustomerDashboard.php");

    }else{
      echo "<script>alert('Username or password doesnt match');</script>";

    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../images/translogo-alt.png"
      type="image/x-icon"
    />
    <title>Sign In</title>
    <link rel="stylesheet" href="SignIn.css" />
  </head>

  <body>
    <header>
      <img src="images/translogo.png" alt="Docplus" />
    </header>

    <main class="main">
      <div class="img">
        <img src="./images/6413870.jpg" alt="" srcset="" />
      </div>
      <div class="container">
        <div class="form">
          <form action="SignIn.php" method="post">
            <div class="title">Sign In</div>
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
              <div class="signUp input">
                <p>New User? <a href="./SignUp.php">Sign up</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>

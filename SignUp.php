<?php

if (isset($_POST['submitbtn'])) {
     
      require 'database.php';
     
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $phonenum = $_POST['phonenum'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

      $exists = false;
      $usercopy = "SELECT * FROM customer WHERE username='$username'";
      if (mysqli_num_rows(mysqli_query($conn, $usercopy)) > 0) {
        $exists = true;
        echo "<script>alert('Username Already Exists!');</script>";
      }
      $emailcopy = "SELECT * FROM customer WHERE email='$email'";
      if (mysqli_num_rows(mysqli_query($conn, $emailcopy)) > 0) {
        $exists = true;
        echo "<script>alert('Email Already Exists!');</script>";
      }


      if (!$exists) {

       if($password != $cpassword ){
            echo "<script>alert('Passwords are not same!');</script>";
        }else{

          $sql = "INSERT INTO customer (fname, lname, phonenum, age, email, username, password) VALUES ('$fname', '$lname', '$phonenum',  $age, '$email', '$username', '$password')";

          $result = mysqli_query($conn, $sql);

          if(!$result){
          echo 'Failed to connect';
          }else{
            header("Location:http://localhost/Restaurant-Management-System/SignIn.php");
          }

        }
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="./SignUp.css" />
  </head>

  <body>
    <main>
      <header>
        <img src="images/translogo.png" alt="Docplus" />
      </header>
      <form action="SignUp.php" method="post">
        <div class="mainContent">
          <div class="content-1">
            <div class="content">
              <div class="input">
                <span>First name</span>
                <input
                  type="text"
                  placeholder="First name"
                  id="fname"
                  name="fname"
                  max="15"
                  required
                />
              </div>
              <div class="input">
                <span>Last name</span>
                <input
                  type="text"
                  placeholder="Last name"
                  id="lname"
                  name="lname"
                  max="15"
                  required
                />
              </div>
              <div class="input">
                <span>Phone Number</span>
                <input
                  type="number"
                  placeholder="Phone No."
                  id="phonenum"
                  name="phonenum"
                  required
                />
              </div>
              <div class="input">
                <span>Age</span>
                <input
                  type="number"
                  placeholder="Age"
                  id="age"
                  name="age"
                  required
                />
              </div>
              <div class="input">
                <span>Email ID</span>
                <input
                  type="email"
                  placeholder="Email-Id"
                  id="email"
                  name="email"
                  required
                />
              </div>
            </div>
          </div>
          <div class="content-2">
            <div class="title">Sign Up</div>
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
              <div class="input">
                <span>Confirm Password</span>
                <input
                  type="password"
                  placeholder="Password"
                  id="cpassword"
                  name="cpassword"
                  required
                />
              </div>
              <div class="input submit">
                <input type="submit" value="Sign Up" name="submitbtn" />
              </div>
              <div class="signUp input">
                <p>
                  Already have an account?
                  <a href="./SignIn.php" class="a">Sign In</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </form>
    </main>
  </body>
</html>

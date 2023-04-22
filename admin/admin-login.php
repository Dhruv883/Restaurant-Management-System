<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="login.css">
      <link rel="shortcut icon" href="../images/translogo-alt.png" type="image/x-icon">
      <title>Log-In</title>
</head>
<body>
      <div class="form">
          <form action="admin-login.php" method="post">
            <div class="title">Admin Log-In</div>
            <div class="content">
              <div class="input">
                <span>Username</span>
                <input
                  type="text"
                  placeholder="Username"
                  id="name"
                  name="name"
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
                <input type="submit" value="Sign In" name="" />
              </div>
              <div class="signUp input">
                <p>New User? <a href="./SignUp.html">Sign up</a></p>
              </div>
            </div>
          </form>
        </div>
</body>
</html>
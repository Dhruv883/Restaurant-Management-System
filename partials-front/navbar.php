<?php 
  require('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <title>Document</title>
</head>
<body>
      <nav>
      <div class="logo">
        <span><img src="images/translogo.png" alt="" /></span>
      </div>

      <div class="navContent">
        <span><a href="index.php">Home</a></span>
        <span><a href="Menu.php?id=1">Food</a></span>
        <span><a href="index.php#aboutUs">About</a></span>
        <span><a href="index.php#contactUs">Contact us</a></span>
      </div>

      <?php 
        if (!isset($_SESSION['customer'])) {
          echo '
            <div class="logsign">
              <button><a href="SignIn.php">Register / Log-in</a></button>
            </div>
          ';
        }else{
          echo '
            <div class ="cartImg">
              <a href="order.php"><img src="./images/shopping-line-cart-svgrepo-com.svg" alt="" srcset=""></a>
              <a href="customerDashboard.php"><img src="./images/user.svg" alt="" srcset=""></a>
            </div>
          ';
        }
      ?>

      
    </nav>

</body>
</html>
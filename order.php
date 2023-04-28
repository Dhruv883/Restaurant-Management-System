<?php
  include('./database.php');
  if (isset($_GET['id'])) {
    $food_id = $_GET['id'];
    $sql = "SELECT * FROM food where food_id = '$food_id'";
    $res = mysqli_query($conn , $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
      $row = mysqli_fetch_assoc($res);

      $title = $row['foodname'];
      $price = $row['food_price'];
      $img = $row['food_img'];

    }else{
      // header("Location:http://localhost/Restaurant-Management-System/Menu.php?id=1");
    }
  }

  



  // $max=sizeof($_SESSION['cart']);
  // for($i=0; $i<$max; $i++) { 

  // while (list ($key, $val) = each ($_SESSION['cart'][$i])) { 
  // echo "$key -> $val ,"; 
  // } 
  // echo "<br>";
  // } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="order.css" />

    <title>Order</title>
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

      <div class="logsign">
        <button><a href="SignIn.php">Register / Log-in</a></button>
      </div>
    </nav>
    <main>
      <div class="title">Cart</div>
      <form action="order.php" method = "post">
      <div>
        <div class="order-item">
          <div class="foodimg"><img src="./images/food-img/burger.jpg" alt="" srcset=""></div>
          <div class="items">
            <div class="foodtitle">Farm Villa Pizza</div>
            <div class="foodprice">₹ 200</div>
            <div class="foodqty">
              <div>Quantity:</div>
              <input type="number" value="1" name="qty" min="1" />
            </div>
          </div>
        </div>
      </div>
      <div>
       <div class="address input">
            <textarea
              name="address"
              id="address"
              placeholder="Address"
              required
            ></textarea>
        </div>
        <div class="input submit">
            <input type="submit" value="Order" name="order" />
        </div>
      </form>
    </div>
    </main>
   
  </body>
</html>

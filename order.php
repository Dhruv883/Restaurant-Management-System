<?php
  include('./database.php');
  // $_SESSION['orderid'] = 4 ;
 
if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'remove'){
  $id = $_GET['id'];
  unset($_SESSION['cart'][$id]);
  header("Location:http://localhost/Restaurant-Management-System/order.php");
} 


if (isset($_POST['order'])) {
    if (!isset($_SESSION['customer'])) {

      header("Location:http://localhost/Restaurant-Management-System/SignIn.php");

    }else{

      $customer = $_SESSION['customer'];
      $sql = "SELECT * FROM customer WHERE username = '$customer'";
      $res = mysqli_query($conn , $sql);
      $row = mysqli_fetch_assoc($res);
      $cart = $_SESSION['cart'];
      
      foreach($cart as $key => $item) {
        $food_name = $item['name'];
        $food_price = $item['price'];
        $food_qty = $_POST['qty'][$key];
        $address = $_POST['address'];
        $customer_name = $row['fname']." ".$row['lname'];
        $customer_id = $row['customerid'];

        $sql = "INSERT INTO orders (food_name, food_price, food_qty, address, customer_name, customer_id, time, order_id) VALUES ('$food_name', $food_price, $food_qty, '$address', '$customer_name', $customer_id,  CURRENT_TIMESTAMP(), ".$_SESSION['orderid'].")";
        $res = mysqli_query($conn, $sql);

      }  
      $sql1 = "INSERT INTO order_det (order_id, customer_id, status) VALUES (".$_SESSION['orderid']." , $customer_id, 'Active')";
      $res = mysqli_query($conn, $sql1);


      $_SESSION['orderid']++;
      unset($_SESSION['cart']);
      // header("Location:http://localhost/Restaurant-Management-System/CustomerDashboard.php");
    }
   
  }
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
              <a href="customerDashboard.php"><img src="./images/user.svg" alt="" srcset=""></a>
            </div>
          ';
        }
      ?>
    </nav>

    <main>
      <div class="title">Cart</div>
      <form action="order.php" method = "POST">
          <div class="list">
      <?php 
        if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        foreach($cart as $key => $item) {
            
            echo '
            <div class="order-item">
            <div class="foodimg"><img src="./images/food-img/'.$item['name'].'.jpg" alt="" srcset=""></div>
            <div class="items">
            <div class="foodtitle">'.$item['name'].'</div>
            <div class="foodprice">₹ '.$item['price'].'</div>
            <div class="foodqty">
            <span>Quantity:</span>
            <input type="number" value="1" name="qty['.$key.']" min="1" />
            </div>
            <div class="remove"><a href="order.php?id='.$key.'&action=remove">Remove</a></div>
            </div>
            </div>
            ';
        }   
    }
    ?>
    </div>
      <div class="details">
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

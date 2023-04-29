<?php
include('./database.php');
// session_unset();
?>

<?php 

  if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'remove'){
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        header("Location:http://localhost/Restaurant-Management-System/order.php");
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

      <div class="logsign">
        <button><a href="SignIn.php">Register / Log-in</a></button>
      </div>
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
            <div class="foodimg"><img src="./images/food-img/burger.jpg" alt="" srcset=""></div>
            <div class="items">
            <div class="foodtitle">'.$item['name'].'</div>
            <div class="foodprice">₹ '.$item['price'].'</div>
            <div class="foodqty">
            <span>Quantity:</span>
            <input type="number" value="1" name="qty" min="1" />
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

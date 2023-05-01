<?php 
  require('./database.php');
  include('./userAuth.php'); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CustomerDashboard.css" />
    <title>Document</title>
  </head>
  <body>
    <main>
      <div class="sidebar" id="sidebar">
        <div class="hambtn">
          <img
            src="images/hamburger.svg"
            alt=""
            srcset=""
            class="hamburger"
            id="hamburger"
          />
        </div>
        <div class="logo">
          <span>
            <img src="images/translogo-alt.png" alt="Docplus" />
            <span class="text">DOM'S Kitchen</span>
          </span>
        </div>

        <div class="menu-item">
          <a href="CustomerDashboard.php">
          <span
            ><img src="images/shopping-bag-svgrepo-com.svg" alt="" srcset=""
          /></span>
          <span class="text">Orders</span>
           </a>
        </div>

        <div class="menu-item">
          <a href="Menu.php?id=1"> 
          <span
            ><img src="images/order-food-svgrepo-com.svg" alt="" srcset=""
          /></span>
          <span class="text">Order Food</span>
           </a>
        </div>

        <div class="menu-item">
          <a href="Order.php">
          <span
            ><img
              src="images/shopping-line-cart-svgrepo-com.svg"
              alt=""
              srcset=""
          /></span>
          <span class="text">Cart</span>
           </a>
        </div>

        <div class="menu-item">
          <a href="logout.php">
          <span
            ><img src="images/logout-svgrepo-com.svg" alt="" srcset=""
          /></span>
          <span class="text">Log Out</span>
        </a>
        </div>
      </div>

      <div class="main">
        <div class="header" id="header">
          <span>
            <span><img src="images/user.svg" alt="" srcset="" /></span>
            <span><?php  echo $_SESSION['customer']?></span>
          </span>
        </div>
        <div class="content">
          <h1>Orders</h1>


          <div class="orderlist">
            <?php 

            $customer  = $_SESSION['customer'];
            $sql = "SELECT * FROM customer where username = '$customer'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);

            $id = $row['customerid'];

            $sql = "SELECT DISTINCT order_id FROM orders WHERE customer_id = $id ORDER BY order_id DESC";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
              echo  '<div class="orderid">';
              
              $orderQuery = "SELECT * FROM orders WHERE customer_id = $id AND order_id = $row[order_id]";
              $result = mysqli_query($conn, $orderQuery);
              $total = 0;
              while ($order = mysqli_fetch_assoc($result)) {
                
                echo '
                <div class="orderitem">
                <div class="oimg"><img src="images/food-img/'.$order['food_name'].'.jpg" alt="" srcset=""></div>
                <div class="ofood">'.$order['food_name'].'</div>
                <div class="oqty">Qty: '.$order['food_qty'].'</div>
                <div class="oprice">₹ '.$order['food_price'].'</div>
                </div>';
                $total += $order['food_price']* $order['food_qty'];
                $time = $order['time'];
                  
                }
                $query = "SELECT status from order_det WHERE customer_id = $id AND order_id = $row[order_id]";
                $res1 = mysqli_query($conn, $query);
                $order = mysqli_fetch_assoc($res1);
                echo '
                   <div class="amount">
                  <h2>Total : ₹ '.$total.'</h2>
                  <h2>'.$order['status'].'</h2>
                  </div>


              </div>';
            }
              
              
              ?>
          </div>
        </div>
      </div>
    </main>

    <script src="dashboard.js"></script>
  </body>
</html>

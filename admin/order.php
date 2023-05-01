<?php 
  include ('menu.php');
  if (isset($_POST['status'])) {
    $status = $_POST['status'];
    $order_id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $sql = "UPDATE order_det SET status = '$status' WHERE order_id = $order_id AND customer_id =$customer_id";
    $res = mysqli_query($conn, $sql);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="../images/translogo-alt.png" type="image/x-icon">
      <link rel="stylesheet" href="./admin.css">
      <title>Orders</title>
</head>
<body>
      <div class="p">
      <?php 
    $sql = "SELECT * FROM order_det";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $query = "SELECT * FROM orders WHERE customer_id = ".$row['customer_id']." AND order_id = ".$row['order_id']."";
        $exec = mysqli_query($conn, $query);
        $order = mysqli_fetch_assoc($exec);
        $total = 0;
        
        $food_query = "SELECT * FROM orders WHERE customer_id = ".$row['customer_id']." AND order_id = ".$row['order_id']."";
        $food_exec = mysqli_query($conn, $food_query);

        echo '
        <div class="ord">
        <div class="order_id">O-ID : '.$row['order_id'].'</div>
        <div class="customer_name">'.$order['customer_name'].'</div>
        <div class="customer_id">C-ID : '.$row['customer_id'].'</div>
        <div class="order-items-list">';
        
        while ($order1 = mysqli_fetch_assoc($food_exec)) {
            echo '
            <div>'.$order1['food_name'].' x '.$order1['food_qty'].'</div>';
            $total += $order1['food_price']* $order1['food_qty'];
        }
        
        echo '</div>
        <div class="totalPrice">₹ '.$total.'</div>
        <div class="order_status">'.$row['status'].'</div>
        <div>
       
         <form id = "order-form" action="order.php" method="post" onchange="submit()">
        <input type="hidden" name="order_id" value="'.$row['order_id'].'">
        <input type="hidden" name="customer_id" value="'.$row['customer_id'].'">
        <select name="status" id="status">
        <option value="" selected disabled hidden>
        Update Status
        </option>
        <option value="Active">Active</option>
        <option value="Out For Delivery">Out For Delivery</option>
        <option value="Delivered">Delivered</option>
        </select>
        </form>
        </div>
        </div>';
    }
?>
</div>

</body>
</html>



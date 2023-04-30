<?php  
  include ('menu.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="../images/translogo-alt.png" type="image/x-icon">
      <link rel="stylesheet" href="./admin.css">
      <title>Document</title>
</head>
<body>
      <div class="homecontent">
      <?php 

        $sql = "SELECT * FROM category";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        $sql1 = "SELECT * FROM food";
        $res1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($res1);

        $orders = 0;
        $sql2 = "SELECT DISTINCT customer_id FROM orders";
        $res2 = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($res2)) {
          $query = "SELECT DISTINCT order_id FROM orders WHERE customer_id = $row[customer_id]";
          $re  =mysqli_query($conn, $query);
          $orders+= mysqli_num_rows($re);
        }
        echo '
        <div class="categories card">
        <span>'.$count.'</span>
        <span>Categories</span>
        </div>
        
        <div class="categories card">
        <span>'.$count1.'</span>
        <span>Food Items</span>
        </div>
        
        <div class="categories card">
        <span>'.$orders.'</span>
        <span>Orders</span>
      </div>
      ';
      ?>
      </div>
     
</body>
</html>
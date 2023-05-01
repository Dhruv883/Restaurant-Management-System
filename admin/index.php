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

        $sql2 = "SELECT * FROM order_det WHERE status ='Active'";
        $res2 = mysqli_query($conn, $sql2);
        $orders = mysqli_num_rows($res2);
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
        <span>Active Orders</span>
      </div>
      ';
      ?>
      </div>
     
</body>
</html>
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

        $sql1 = "SELECT * FROM category";
        $res1 = mysqli_query($conn, $sql);
        $count1 = mysqli_num_rows($res);
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
        <span>0</span>
        <span>Orders</span>
      </div>
      ';
      ?>
      </div>
     
</body>
</html>
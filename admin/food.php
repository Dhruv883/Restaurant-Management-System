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
      <title>Food</title>
</head>
<body>
      <div class="categoryPage">
            <div class="add">
                  <a href="addFood.php"><button>Add Food Item</button></a>
            </div>
            <div class="display">
                  <h1>Food Items</h1>
            <?php
                  $sql = "SELECT * FROM food";
                  $res = mysqli_query($conn, $sql);
                  $count =  mysqli_num_rows($res); 
                  if($count > 0){
                        while($row = mysqli_fetch_assoc($res)){
                              $name = $row['foodname'];
                              $id = $row['food_id'];
                              $img = $row['food_img'];
                              $cat_id = $row['food_cat_id'];
                              $catq = "SELECT catname FROM category WHERE catid = $cat_id";
                              $result = mysqli_query($conn, $catq);
                              $catname = mysqli_fetch_assoc($result)['catname'];
                              $price = $row['food_price'];
                  
                              echo '
                              <div class="foodcard">
                              <div class="foodid">'.$id.'</div>
                              <div class="foodimg"><img src="../images/food-img/burger.jpg" alt="'.$name.'" srcset=""></div>
                              <div class="foodname">'.$name.'</div>
                              <div class="foodcat">'.$catname.'</div>
                              <div class="foodprice">₹ '.$price.'</div>
                              <div class="btns2"> 
                                    <div class="update"><a href=""><button>Update Food</button></a></div>
                                    <div class="delete"><a href=""><button>Delete Food</button></a></div>
                              </div>
                              </div>
                              ';
                        }
                  } 
            ?>
                  
            </div>
      </div>
      
</body>
</html>
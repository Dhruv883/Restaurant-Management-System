<?php 
  include('./partials-front/navbar.php');

 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Menu</title>
    <link rel="stylesheet" href="Menu.css" />
  </head>

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Management</title>
    <link rel="stylesheet" href="Menu.css" />
  </head>

  <body>

    <div class="title">
      <div class="name">
        <span>Food</span>
      </div>
      <div class="searchbar">
        <input type="text" placeholder="Search.." />
        <img src="images/magnifying-glass-solid.svg" alt="" />
      </div>
    </div>

    <hr />
    
    <div class="foodicons">
      <?php 
        $sql = "SELECT * FROM category";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['catid'];
          $name = $row['catname'];
          $img = $row['catimg'];
          if ($id == $_GET['id']) { $class = 'active'; } else {
            $class = '';
          }
          echo '
          <div class="item">
            <a href="Menu.php?id='.$id.'">
            <button>
            <div class="all '.$class.'">
            <img src="images/category-img/'.$img.'" alt="'.$name.'" />
            </div>
            </button>
            </a>
          </div>
          ';
        }
      ?>

    </div> 

    <div class="menuitems">
      <?php 

        if(isset($_GET['id'])){

          $id = $_GET['id'];
          if($id == 1){
            $sql = "SELECT * FROM food";
          }else{
            $sql = "SELECT * FROM food WHERE food_cat_id = '$id'";
          }
          $res = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($res)) {
           
            echo '
            <div class="fooditem">
            <div class="foodimg"><img src="images/food-img/burger.jpg" alt="" srcset=""></div>
            <div class="info">
            <div class="foodtitle">'.$row['foodname'].'</div>
            <div class="foodprice">₹ '.$row['food_price'].' </div>
            <div class="addtocart"><button>Add</button></div>
            </div>
            </div>
            ';
          }
        }
      ?>
    </div>
  </body>
</html>

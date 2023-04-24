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
      <div class="categoryPage">
            <div class="add">
                  <a href="addCategory.php"><button>Add Category</button></a>
            </div>
            <div class="display">
                  <h1>Categories</h1>
            <?php
                  $sql = "SELECT * FROM category";
                  $res = mysqli_query($conn, $sql);
                  $count =  mysqli_num_rows($res); 
                  if($count > 0){
                        while($row = mysqli_fetch_assoc($res)){
                              $name = $row['catname'];
                              $id = $row['catid'];
                              $img = $row['catimg'];
                  
                              echo '
                              <div class="catcard">
                              <div class="id">'.$id.'</div>
                              <div class="img"><img src="../images/category-img/'.$img.'" alt="'.$name.'" srcset=""></div>
                              <div class="name">'.$name.'</div>
                              <div class="btns"> 
                                    <div class="update"><a href="update-category.php?id='.$id.'&img='.$img.'&name='.$name.'"><button>Update Category</button></a></div>
                                    <div class="delete"><a href="delete-category.php?id='.$id.'&img='.$img.'"><button>Delete Category</button></a></div>
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
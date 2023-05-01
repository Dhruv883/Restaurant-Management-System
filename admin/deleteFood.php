<?php

      include('menu.php');
      if(isset($_GET['id']) AND isset($_GET['img'])){

            $id = $_GET['id'];
            $img = $_GET['img'];
            if($img != ""){
                  $path = "../images/food-img/$img";
                  $remove = unlink($path);
            }
            $sql = "DELETE FROM food WHERE food_id = $id";
            $res = mysqli_query($conn, $sql);

            if(!$res){
                  echo "<script>alert('Couldn't delete category');</script>";
            }
      }
      header("Location:http://localhost/Restaurant-Management-System/admin/food.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="admin.css">
      <title>Delete Category</title>
</head>
<body>
      
</body>
</html>
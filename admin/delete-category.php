<?php

      include('menu.php');
      if(isset($_GET['id']) AND isset($_GET['img'])){

            $id = $_GET['id'];
            $img = $_GET['img'];
            if($img != ""){
                  $path = "../images/category-img/$img";
                  $remove = unlink($path);
            }
            $sql = "DELETE FROM category WHERE catid = $id";
            $res = mysqli_query($conn, $sql);

            if(!$res){
                  echo "<script>alert('Couldn't delete category');</script>";
            }
      }
      header("Location:http://localhost/Restaurant-Management-System/admin/category.php");
?>


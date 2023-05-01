<?php

      include('menu.php');
      if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM food WHERE food_id = $id";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);

            $foodname = $row['foodname'];
            $foodprice = $row['food_price'];
            $foodimg = $row['food_img'];

            $catid = $row['food_cat_id'];
            $catq = "SELECT * FROM category WHERE catid = $catid";
            $result = mysqli_query($conn, $catq);
            $cat = mysqli_fetch_assoc($result);
      }

      if (isset($_POST['submit'])) {
            $sql = "SELECT * FROM food WHERE food_id = $_POST[foodid]";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);

            $newfoodname = $_POST['foodname'];
            $newfoodprice = $_POST['foodprice'];
            $newfoodcategory = $_POST['foodcat'];
            $foodid = $_POST['foodid'];
            $img = $row['food_img'];

            $catsql = "SELECT * FROM category WHERE catname = '$newfoodcategory'";
            $res1 = mysqli_query($conn, $catsql);
            $row1 = mysqli_fetch_assoc($res1);
            $catid = $row1['catid'];

            if(isset($_FILES['foodimg']['name'])){

                  $path = "../images/food-img/$img";
                  $remove = unlink($path);

                  $foodimg = $_FILES['foodimg']['name'];
                  
                  if($foodimg != ""){
                        $temp = explode('.', $foodimg);
                        $ext = end($temp);
                        $foodimg = $newfoodname.'.'.$ext;

                        $src_path = $_FILES['foodimg']['tmp_name'];
                        $dest_path = "../images/food-img/".$foodimg;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if(!$upload){
                              echo "<script>alert('Couldn't upload image');</script>";
                        
                        }
                  }

                  
            }else{
                  $foodimg = $row['foodimg'];
            }

            $sqlx = "UPDATE food SET foodname = '$newfoodname', food_cat_id = '$catid', food_price = '$newfoodprice', food_img = '$foodimg' WHERE food_id = $foodid";
            $resx = mysqli_query($conn, $sqlx);

            header("Location:http://localhost/Restaurant-Management-System/admin/food.php");
      }
?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="admin.css">
      <title>Update Food</title>
</head>
<body>
      <div class="addCatpage">
      <div><h1>UPDATE FOOD</h1></div>
      <div class="addForm">
      <form action="updateFood.php" method="post" enctype = "multipart/form-data">
           <div class="name input">
            <input
              type="text"
              name="foodname"
              id="foodname"
              placeholder="New Food name"
              value = "<?php echo $foodname; ?>"
              
            />
            </div>


           <div class="name input">
            <input
              type="text"
              name="foodprice"
              id="foodprice"
              placeholder="New Food Price"
              value = "<?php echo $foodprice; ?>"
              
            />
            </div>


           <div class="name input">
            <input
              type="text"
              name="foodcat"
              id="foodcat"
              placeholder="New Food Category"
              value = "<?php echo $cat['catname']; ?>"
              
            />
            </div>

            <div class="name input">
            <input
              type="hidden"
              
            />
            </div>


           <div class="">
            <label class="custom-file-upload fu2">
            <input type="file"  name="foodimg"/>
            Upload Food Image
            </label>
            </div>


            <div class="name input">
            <input
              type="hidden"
              
            />
            </div>

            <input type="number" name="foodid" id="foodid" class="hidden" value="<?php echo $_GET['id']; ?>">

            <div class="addbtn"><input type="submit" value="ADD" name="submit" /></div>
      </form>
      </div>
      </div>
</body>
</html>

<?php 
      include('./menu.php');

      if (isset($_POST['submit'])) {
           
            $foodname = $_POST['foodname'];
            $foodprice = $_POST['foodprice'];
            $foodcategory = $_POST['foodcategory'];
            $foodimg = "";
            $catsql = "SELECT * FROM category WHERE catname = '$foodcategory'";
            $res = mysqli_query($conn, $catsql);
            if (mysqli_num_rows($res)<=0) {
                   echo "<script>alert('Category Doesnt Exist!');</script>";
            }else{
                  $row = mysqli_fetch_assoc($res);
                  $catid = $row['catid'];

                  if(isset($_FILES['foodimg']['name'])){
                        
                  $foodimg = $_FILES['foodimg']['name'];
                  
                  if($foodimg != ""){
                        
                        $ext = end(explode('.', $foodimg));
                        $foodimg = $foodname.'.'.$ext;
                        
                        $src_path = $_FILES['foodimg']['tmp_name'];
                        $dest_path = "../images/food-img/".$foodimg;
                        
                        $upload = move_uploaded_file($src_path, $dest_path);

                        if(!$upload){
                              echo "<script>alert('Couldn't upload image');</script>";
                              
                        }
                  }
                  
                  
                  }

                  $sql = "INSERT INTO food (foodname, food_cat_id, food_price, food_img) VALUES ('$foodname', '$catid', '$foodprice', '$foodimg')";

                  $result = mysqli_query($conn, $sql);
            
                  if(!$result){
                              echo 'Failed to add category';
                  }
                  else{
                              header("Location:http://localhost/Restaurant-Management-System/admin/food.php");
                  }
            }
      }

      
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="admin.css">
      <title>Food</title>
</head>
<body>
    <div class="addCatpage">
      <div><h1>ADD Food</h1></div>
      <div class="addForm">
      <form action="addFood.php" method="post" enctype = "multipart/form-data">
            <div class="name input">
            <input
              type="text"
              name="foodname"
              id="foodname"
              placeholder="Food name"
              required
            />
            </div>
            <div class="name input">
            <input
              type="number"
              name="foodprice"
              id="foodprice"
              placeholder="Food Price"
              required
            />
            </div>
            <div class="name input">
            <input
              type="text"
              name="foodcategory"
              id="foodcategory"
              placeholder="Food Category"
              required
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

            <div class="addbtn "><input type="submit" value="ADD" name="submit" /></div>
      </form>
      </div>
      </div>
</body>
</html>
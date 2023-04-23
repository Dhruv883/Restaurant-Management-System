<?php 
      include('./menu.php');

      if (isset($_POST['submit'])) {
           
            $catname = $_POST['catname'];
            $catimg = "";
            if(isset($_FILES['catimg']['name'])){

                  $catimg = $_FILES['catimg']['name'];
                  
                  if($catimg != ""){
                        
                        $ext = end(explode('.', $catimg));
                        $catimg = $catname.'.'.$ext;

                        $src_path = $_FILES['catimg']['tmp_name'];
                        $dest_path = "../images/category/".$catimg;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if(!$upload){
                              echo "<script>alert('Couldn't upload image');</script>";
                        
                        }
                  }else  {
                        $catimg = "Default.jpg";
                  }

                  
            }else{
                  $catimg = "../images/category/Default.jpg";
            }

            $sql = "INSERT INTO category (catname, catimg) VALUES ('$catname' , '$catimg')";

            $result = mysqli_query($conn, $sql);

            if(!$result){
                  echo 'Failed to add category';
            }
            else{
                  header("Location:http://localhost/Restaurant-Management-System/admin/category.php");
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
      <title>Category</title>
</head>
<body>
    <div class="addCatpage">
      <div><h1>ADD CATEGORY</h1></div>
      <div class="addForm">
      <form action="addCategory.php" method="post" enctype = "multipart/form-data">
            <div class="name input">
            <input
              type="text"
              name="catname"
              id="catname"
              placeholder="Category name"
              required
            />
            </div>

            <div class="">
            <label class="custom-file-upload">
            <input type="file"  name="catimg"/>
            Upload Category Image
            </label>
            </div>

            <div class="addbtn"><input type="submit" value="ADD" name="submit" /></div>
      </form>
      </div>
      </div>
</body>
</html>
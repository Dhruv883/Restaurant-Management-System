<?php

      include('menu.php');

      if (isset($_POST['submit'])) {
            $id = $_POST['catid'];
            $name = $_POST['catname'];
            $catimg = "";

            $sql1 = "SELECT * FROM category WHERE catid = '$id'";
            $res1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($res1);
            $curr_img = $row['catimg'];

            $remove_path = "../images/category/".$curr_img;
            $remove = unlink($remove_path);

            if(isset($_FILES['catimg']['name'])){

                  $catimg = $_FILES['catimg']['name'];
                  
                  if($catimg != ""){
                        $tmp = explode('.', $catimg);
                        $ext = end($tmp);
                        $catimg = $name.'.'.$ext;

                        $src_path = $_FILES['catimg']['tmp_name'];
                        $dest_path = "../images/category/".$catimg;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if(!$upload){
                              echo "<script>alert('Couldn't upload image');</script>";
                        
                        }

                  }
            }

            $sql = "UPDATE category SET catname = '$name' WHERE catid = '$id'";
            $res = mysqli_query($conn, $sql);
            header("Location:http://localhost/Restaurant-Management-System/admin/category.php");
            // die();
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="admin.css">
      <title>Update Category</title>
</head>
<body>
      <div class="addCatpage">
      <div><h1>UPDATE CATEGORY</h1></div>
      <div class="addForm">
      <form action="update-category.php" method="post" enctype = "multipart/form-data">
            <div class="name input">
            <input
              type="text"
              name="catname"
              id="catname"
              placeholder="New Category name"
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
            <input type="number" name="catid" id="catid" class="hidden" value="<?php echo $_GET['id']; ?>">
      </form>
      </div>
      </div>
</body>
</html>
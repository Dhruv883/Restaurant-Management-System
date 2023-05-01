<?php

      include('menu.php');
      if (isset($_POST['submit'])) {
           $catname = $_POST['catname'];
           $catid = $_POST['catid'];
           $catimg = "";

           $sql = "SELECT catimg FROM category WHERE catid = $catid";
           $res = mysqli_query($conn, $sql);
           $row = mysqli_fetch_assoc($res);
           $img = $row['catimg'];

            if(isset($_FILES['catimg']['name'])){

                  $path = "../images/category-img/$img";
                  $remove = unlink($path);

                  $catimg = $_FILES['catimg']['name'];
                  
                  if($catimg != ""){
                        $temp = explode('.', $catimg);
                        $ext = end($temp);
                        $catimg = $catname.'.'.$ext;

                        $src_path = $_FILES['catimg']['tmp_name'];
                        $dest_path = "../images/category-img/".$catimg;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if(!$upload){
                              echo "<script>alert('Couldn't upload image');</script>";
                        
                        }
                  }

                  
            }else{
                  $catimg = $row['catimg'];
            }
            $sql1 = "UPDATE category SET catname = '$catname', catimg = '$catimg' WHERE  catid = $catid";
            $res1 = mysqli_query($conn, $sql1);

            header("Location:http://localhost/Restaurant-Management-System/admin/category.php");
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
              value = "<?php echo $_GET['name']; ?>"
              
            />
            </div>

            <div class="name input">
            <input
              type="hidden"
              
            />
            </div>

            <div class="">
            <label class="custom-file-upload">
            <input type="file"  name="catimg"/>
            Upload Category Image
            </label>
            </div>

            <div class="name input">
            <input
              type="hidden"
              
            />
            </div>
            <input type="number" name="catid" id="catid" class="hidden" value="<?php echo $_GET['id']; ?>">
            <div class="addbtn"><input type="submit" value="ADD" name="submit" /></div>
      </form>
      </div>
      </div>
</body>
</html>
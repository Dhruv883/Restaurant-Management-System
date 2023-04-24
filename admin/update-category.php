<?php

      include('menu.php');

      if (isset($_POST['submit'])) {
           

       
            die();
            
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
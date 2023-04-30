<?php
      require('./database.php');
      unset($_SESSION['customer']);
      // session_destroy();
      header("Location:http://localhost/Restaurant-Management-System/SignIn.php");
?>
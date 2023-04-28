<?php
      require('./database.php');
      session_unset();
      session_destroy();
      header("Location:http://localhost/Restaurant-Management-System/SignIn.php");
?>
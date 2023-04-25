<?php 

      if (!isset($_SESSION['customer'])) {
            header("Location:http://localhost/Restaurant-Management-System/SignIn.php");
      }
      
?>
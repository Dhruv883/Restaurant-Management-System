<?php 
  require('../database.php');
  include('auth.php'); 
  
?>

      <nav>
      <div class="logo">
        <span><img src="../images/translogo.png" alt="" /></span>
      </div>

      <div class="navContent">
        <span><a href="index.php">Home</a></span>
        <span><a href="category.php">Category</a></span>
        <span><a href="food.php">Food</a></span>
        <span><a href="order.php">Order</a></span>
      </div>

       <div class="logsign">
        <button><a href="logout.php">Log-Out</a></button>
      </div>
      
    </nav>

<?php 
  include('./partials-front/navbar.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Menu</title>
    <link rel="stylesheet" href="Menu.css" />
  </head>

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Management</title>
    <link rel="stylesheet" href="Menu.css" />
  </head>

  <body>

    <div class="title">
      <div class="name">
        <span>Food</span>
      </div>
      <div class="searchbar">
        <input type="text" placeholder="Search.." />
        <img src="images/magnifying-glass-solid.svg" alt="" />
      </div>
    </div>

    <hr />

    <div class="foodicons">
      <div class="all">
        <img src="images/all.svg" alt="all" />
      </div>

      <div class="drinks category">
        <img src="images/drinks.svg" alt="drinks" />
      </div>
      <div class="italian category">
        <img src="images/pizza.svg" alt="Italian" />
      </div>
      <div class="mexican category">
        <img src="images/mexican.svg" alt="Mexican" />
      </div>
      <div class="kebabs category">
        <img src="images/kebab.svg" alt="kebabs" />
      </div>
      <div class="indian category">
        <img src="images/indian.svg" alt="kebabs" />
      </div>
    </div>

    <div class="menuitems"></div>
  </body>
</html>

<?php 
  include('./partials-front/navbar.php');
  if (isset($_POST['submit'])) {
    if (!isset($_SESSION['customer'])) {
      header("Location:http://localhost/Restaurant-Management-System/SignIn.php");
    }else{
      $bookingname = $_POST['bookingname'];
      $bookingphone = $_POST['bookingphone'];
      $bookingdate = $_POST['bookingdate'];
      $bookingtime = $_POST['bookingtime'];
      $bookingmessage = $_POST['bookingmessage'];
      $bookingspace = $_POST['bookingspace'];

        if(isset($_SESSION['table'])){
            $table = $_SESSION['table'];
          }else{
            $table = array();
          }
          $table[] = array(
            'bookingname' => $bookingname,
            'bookingphone' => $bookingphone,
            'bookingdate' => $bookingdate,
            'bookingtime' => $bookingtime,
            'bookingmessage' => $bookingmessage,
            'bookingspace' => $bookingspace,
          );
          $_SESSION['table'] = $table;
        
          header("Location:http://localhost/Restaurant-Management-System/payment.php");
      
    }
  }

   
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="booking.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="booking" id="booking">
      <div class="bookingImg"><img src="images/restaurant.jpg" alt="" /></div>
      <div class="bookingForm">
        <form action="booking.php" method="post" class="bookingForm">
          <div class="title">Online Reservation</div>

          <div class="name input">
            <input
              type="text"
              name="bookingname"
              id="bookingname"
              placeholder="Full Name"
              required
            />
          </div>

          <div class="phone input">
            <input
              type="number"
              name="bookingphone"
              id="bookingphone"
              placeholder="Phone Number"
              required
            />
          </div>

          <div class="date input">
            <input
              type="date"
              name="bookingdate"
              id="bookingdate"
              placeholder="Date"
              required
            />
          </div>

          <div class="time input" id="date">
            <select name="bookingtime" id="bookingtime" required>
              <option value="none" selected disabled hidden>
                Select a Time
              </option>
              <option value="09">09 : 00 AM</option>
              <option value="10">10 : 00 AM</option>
              <option value="11">11 : 00 AM</option>
              <option value="12">12 : 00 PM</option>
              <option value="13">01 : 00 PM</option>
              <option value="14">02 : 00 PM</option>
              <option value="15">03 : 00 PM</option>
              <option value="16">04 : 00 PM</option>
              <option value="17">05 : 00 PM</option>
              <option value="18">06 : 00 PM</option>
              <option value="19">07 : 00 PM</option>
              <option value="20">08 : 00 PM</option>
              <option value="21">09 : 00 PM</option>
              <option value="22">10 : 00 PM</option>
              <option value="23">11 : 00 PM</option>
            </select>
          </div>

          <div class="message input">
            <textarea
              name="bookingmessage"
              id="bookingmessage"
              placeholder="Message"
            ></textarea>
          </div>

          <div class="people input">
            <select name="bookingspace" id="bookingspace" required>
              <option value="" required>
                Select Your Dining Space
              </option>
              <option value="2">2 People</option>
              <option value="4">4 People</option>
              <option value="6">6 People</option>
              <option value="8">8 People</option>
              <option value="10">10 People</option>
            </select>
          </div>

          <div class="bookbtn input submit">
                <input type="submit" class="submit" value="Book Now" name="submit" />
          </div>
        </form>
      </div>
    </div>


  </body>
</html>

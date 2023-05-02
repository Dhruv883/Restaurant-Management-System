<?php 
  require('./database.php');
  if (isset($_POST['submit'])) {
    if (isset($_SESSION['table'])) {
      $table = $_SESSION['table'];
  
      foreach($table as $key => $item) {
        $bookingname = $item['bookingname'];
        $bookingphone = $item['bookingphone'];
        $bookingdate = $item['bookingdate'];
        $bookingtime = $item['bookingtime'];
        $bookingmessage = $item['bookingmessage'];
        $bookingspace = $item['bookingspace'];
        } 
   
        $sql = "INSERT INTO reservation (full_name, phone_num, date, time, message, dining_space) VALUES (
          '$bookingname', '$bookingphone', $bookingdate, '$bookingtime', '$bookingmessage', $bookingspace)";
        $result = mysqli_query($conn, $sql);
        unset($_SESSION['table']);
        header("Location:http://localhost/Restaurant-Management-System/customerDashboard.php");
      }

     
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Responsive Payment getway form design in Hindi</title>
    <link rel="stylesheet" type="text/css" href="payment.css" />
  </head>

  <body>
    <header>
      <div class="container">
        <div class="left">
          <h3>BILLING ADDRESS</h3>
          <form action="payment.php" method ="post">
            Full name
            <input type="text" name="fullname" placeholder="Enter name" required />
            Email
            <input type="text" name="email" placeholder="Enter email" required/>

            Address
            <input type="text" name="address" placeholder="Enter address" required/>

            City
            <input type="text" name="city" placeholder="Enter City" required/>
            <div id="zip">
              <label>
                State
                <select name="state" required>
                  <option>Choose State..</option>
                  <option>Maharashtra</option>
                  <option>Rajasthan</option>
                  <option>Gujarat</option>
                  <option>Uttar Pradesh</option>
                  <option>Madhya Pradesh</option>
                </select>
              </label>
              <label>
                Zip code
                <input type="number" name="zipcode" placeholder="Zip code" />
              </label>
            </div>
          </form>
        </div>
        <div class="right">
          <h3>PAYMENT</h3>
          <form action="payment.php" method = "post">
            Accepted Cards <br />
            <img src="images/card1.png" width="100" />
            <img src="images/card2.png" width="50" />
            <br /><br />

            Credit card number
            <input type="text" name="credit-card-no" placeholder="Enter card number" required/>

            Exp month
            <input type="text" name="exp-month" placeholder="Enter Month" required/>
            <div id="zip">
              <label>
                Exp year
                <select required>
                  <option value="">Choose Year..</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select>
              </label>
              <label>
                CVV
                <input type="number" name="" placeholder="CVV" required/>
              </label>
            </div>
            <input type="submit" name="submit" value="Proceed to Checkout" />
          </form>
        </div>
      </div>
    </header>
  </body>
</html>

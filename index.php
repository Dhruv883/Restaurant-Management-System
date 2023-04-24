<?php 
    include('./partials-front/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../images/translogo-alt.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="style.css" />
    <title>DOM's Kitchen</title>
  </head>

  <body>

    <main>
      <section class="home" id="home">
        <div class="img">
          <img src="./images/2659587.jpg" alt="" srcset="" />
        </div>
        <div class="content">
          <div>
            <h2>A fusion of flavors that will leave you wanting more</h2>
            <p>
              Welcome to DOM's Kitchen, where we take pride in serving you the
              best food made with the freshest ingredients.We are dedicated to
              providing you with an unforgettable dining experience that
              combines exceptional food with a comfortable ambiance.
            </p>
          </div>
          <button><a href="booking.php"> Book a Table </a></button>
        </div>
      </section>

      <section class="aboutUs" id="aboutUs">
        <div class="aboutImg"><img src="images/food1.jpg" alt="food" /></div>
        <div class="about_details">
          <span> About Us</span>
          <h2>We Provide Good Quality Food!</h2>
          <div>
            <p>
              Once upon a time, in a bustling city, there were young chefs named
              Dhruv, Om And Manas who had a passion for cooking. They dreamed of
              opening their own restaurant where they could share their love for
              food with the world.After years of hard work and dedication, Their
              dream finally came true.
            </p>
            <br />
            <p>
              "DOM's Kitchen", opened its doors in a small corner of the city.
              They put all their heart and soul into creating a warm and
              inviting atmosphere where customers could relax and enjoy a
              delicious meal.
            </p>
            <br />
            <p>
              At "DOM's" Kitchen, the focus was on using only the freshest and
              highest quality ingredients. They believed that the key to
              creating a great meal was in the ingredients themselves, and so
              they sourced their produce from local farms and markets.
            </p>
          </div>
        </div>
      </section>

      <section class="contactUs" id="contactUs">
        <div class="contactImg">
          <img src="images/restaurant2.jpg" alt="food" />
        </div>
        <div class="contact_details">
          <div class="contactContent">
            <div class="contactTitle">Contact Us</div>
            <div>
              <h3>OPENING HOURS</h3>
              <p>Monday - Sunday</p>
              <p>09.00 am TO 11.00 pm</p>
            </div>
          </div>

          <form class="contactForm">
            <div class="form-group">
              <input
                type="text"
                name="Full Name"
                placeholder="Full Name"
                required
              />
            </div>

            <div class="form-group">
              <input type="text" name="Email" placeholder="Email" required />
            </div>

            <div class="form-group">
              <textarea
                id="Message"
                name="Message"
                placeholder="Message"
                required
              ></textarea>
            </div>

            <button type="submit" class="contactBtn">Send</button>
          </form>
        </div>
      </section>
    </main>
  </body>
</html>

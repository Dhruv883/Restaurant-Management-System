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
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum doloribus, officiis, libero excepturi distinctio dicta voluptatem et explicabo est ratione facere nostrum esse nihil! A, aspernatur officia! Ullam odit natus quis minima! Magnam obcaecati, hic distinctio dolorum voluptatum quae adipisci!
            </p>
            <br />
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo assumenda porro aut nesciunt veniam ut? Eos atque molestiae asperiores numquam at, laborum earum debitis ex nulla quia voluptate magni nisi.
            </p>
            <br />
            <p>
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, ducimus itaque? Explicabo vitae recusandae autem enim accusamus eveniet sint? Harum voluptas aperiam, laboriosam corrupti perferendis ad iure quis culpa sit.
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

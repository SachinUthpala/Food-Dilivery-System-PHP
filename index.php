<?php 
  //session start
  session_start();
  //db connection
  require_once "./configs/db.connection.php";

  // Turn off all error reporting
  error_reporting(0);

  
  if($_SESSION["GenaralSucess"] != null){
    print '<script>swal("Success!", "You are Sucessfully deleted!", "success");</script>';
    $_SESSION["GenaralSucess"] = null;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--upper image-->
    <link rel="icon" type="image/svg+xml" href="/imgs/Web-img/pre.jpeg" />
    <!--style sheets-->
    <link rel="stylesheet" href="./Styles/index.css" />
    <script
      src="https://kit.fontawesome.com/f096ac9546.js"
      crossorigin="anonymous"
    ></script>
    <title>Foodies</title>
    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>

    <script src="./script/index.js"></script>
  </head>
  <body>
    <div class="sec01 flexBetween">
      <div class="left flexGap">
        <div class="child01 flexGap">
          <i class="fa-solid fa-phone-volume" style="color: #0d0d0d"></i>
          <div>
            <span class="secondaryText"> 0762712200 </span><br />
            <span class="secondaryText"> CONTACT US </span>
          </div>
        </div>
        <div class="child02 flexGap">
          <i class="fa-solid fa-car" style="color: #000000"></i>
          <div>
            <span class="secondaryText"> PERSONALISED </span><br />
            <span class="secondaryText"> DELIVERY </span>
          </div>
        </div>
      </div>
      <div class="middle">
        <span class="primaryText"> Foodies Mania </span><br />
        <span class="secondaryText"> Colombo , Sri Lanka </span>
      </div>
      <div class="right flexGap">
        <i class="fa-regular fa-clock"></i>
        <div>
          <span class="secondaryText"> DAILY DELIVERY FROM (MON - SUN) </span
          ><br />
          <span class="secondaryText"> 10.30 AM - 10.30 PM </span>
        </div>
      </div>
    </div>

    <!--navigation section-->
    <nav>
      <div class="nav1">
        <ul class="flexGap menues">
          <li><a href="">Home</a></li>
          <li><a href="#starters">About Us</a></li>
          <li><a href="#mains">Our Outlets</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
        <i
          class="fa-solid fa-bars"
          id="menuIcon"
          style="color: #000000"
          onclick="openMenu()"
        ></i>
      </div>
      <div class="nav2 flexGap">
        <i class="fa-regular fa-user" style="color: #000000"  onclick="openLogin()"></i>
        <span class="login" onclick="openLogin()">SIGN IN / SIGN UP</span>
      </div>
    </nav>

    <div class="sideMenu" id="sideMenu">
      <ul>
        <li>
          <i
            class="fa-solid fa-x"
            style="color: #000000; margin: 0 90px"
            onclick="closeMenu()"
          ></i>
        </li>
        <li><a href="">Home</a></li>
        <li><a href="#starters" onclick="closeMenu()">About Us</a></li>
        <li><a href="#mains" onclick="closeMenu()">Our Outlets</a></li>
        <li><a href="">Contact Us</a></li>
      </ul>
    </div>
    <!--end of navigation section-->

    <!--raming email alert-->
   <?php
    if($_SESSION["RemainingEmail"] != null){
      $_SESSION["RemainingEmail"] = null;
      print '<script>swal("Sorry!", "Opps, User Aleready EXsist. Use diffrant email.", "error");;</script>';
    }else if($_SESSION["worngMAil"] != null){
      $_SESSION["worngMAil"] = null;
      print '<script>swal("Sorry!", "Opps, Wrong Email Use diffrant email.", "error");;</script>';
    }else if($_SESSION["worngPassword"] != null){
      $_SESSION["worngPassword"] = null;
      print '<script>swal("Sorry!", "Opps, Wrong Password. Try Again.", "error");;</script>';
    }else if($_SESSION["wrongMailAndPassword"] != null){
      $_SESSION["worngPassword"] = null;
      print '<script>swal("Sorry!", "Opps, Wrong Password and Email. Try Again.", "error");;</script>';
    }
   ?>

    <!--popup login & registrations-->
    <!--registration form-->
    <div class="loginss" id="loginnss">
      <div class="container hiddenx" id="container">
        <div class="form-container sign-up">
            <form action="./configs/logins&registrations/registration.module.php" method="post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required> 
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" name="register">Sign Up</button>
                <button onclick="closeLogin()">Cancel</button>
            </form>
        </div>
        <!--login form-->
        <div class="form-container sign-in">
            <form action="./configs/logins&registrations/login.php" method="post" >
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="login">Sign In</button>
                <button onclick="closeLogin()">Cancel</button>
            </form>
        </div>
        <!--side menu-->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back Foodies!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Foodies!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--end of popup login-->

    <!--seconf section-->
    <div class="sec02">
      <div class="left hiddenx">
        <div class="left01">
          <span class="primaryText">
            <i class="fa-regular fa-clock" style="color: #000000;"></i>
          </span><br>
          <span class="secondaryText">
            fast delivery
          </span>
        </div>
        <div class="left02">
          <span class="primaryText">
            <i class="fas fa-hamburger" style="color: #000000;"></i>
          </span><br>
          <span class="secondaryText">
            100% healthy
          </span>
        </div>
      </div>
      <div class="middle">
        <img src="./imgs/Web-img/bg.png" class="hiddeny" alt="">
      </div>

      <div class="right hiddenx">
        <div class="right01">
          <span class="primaryText">
            <i class="fa-regular fa-star" style="color: #000000;"></i>
          </span><br>
          <span class="secondaryText">
            5 star ratings
          </span>
        </div>
        <div class="right02">
          <span class="primaryText">
            <i class="fa-solid fa-utensils" style="color: #000000;"></i>
          </span><br>
          <span class="secondaryText">
            Dine In / Takeaway
          </span>
        </div>
      </div>
    </div>
    <!--end os 2nd section-->
    

    <!--inquery section-->
    
    <section class="inquery"  id = "contact">
      <span class="topic">
        FIND YOUR OWN TASTE
      </span>
      <h1>
        <span style="font-family: 'Playfair Display', serif;">Find </span>Now
      </h1>

      <div class="inqureDetails">
        <div class="i-dt">
          <span class="i-dt-topic">
            Talk
          </span>
          <p>+94 76 271 2200</p>
          <p>+94 75 086 0861</p>
          <p>+94 75 086 0862</p>
          <br>
          <span class="i-dt-topic">
            Mail Now
          </span>
          <p>river'sEdge@yahoo.com</p>
          <p>river'sEdge@gmail.com</p>
          <p>SjdsSamarawers@gmail.com</p>
        </div>
        <div class="i-form">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41830.996262991655!2d80.38422371126055!3d5.992127998129937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae16b18fd149cf5%3A0x51e8715a6bd36414!2sVilla%20Hillcrest!5e0!3m2!1ssi!2slk!4v1698246501197!5m2!1ssi!2slk"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>

    <!--end of inquerys section-->


    <!--footer-->
    <div class="footer flexBetween">
        <div class="left">
            <span class="primaryText">
                Foodies
            </span><br>
            <span class="secondaryText">
                Colombo , Sri Lanka
            </span>
        </div>
        <div class="middle">
            <ul>
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Terms & Conditions</a></li>
                <li><a href="">Reviews & Ratings</a></li>
            </ul>
        </div>
        <div class="middle2">
            <span class="secondaryText">
                Follow Us
            </span>
            <br><br>
            <div class="flexGap icon-group">
                <i class="fa-brands fa-facebook-f" style="color: #0a0a0a;"></i>
                <i class="fa-brands fa-instagram" style="color: #000000;"></i>
                <i class="fa-brands fa-twitter" style="color: #090a0b;"></i>
            </div>
        </div>
        <div class="right">
            <span class="secondaryText">
                Customer Care
            </span><br>
            <span class="secondaryText">
                076 27 12200
            </span><br><br>
            <span class="secondaryText">
                Email 
            </span><br>
            <span class="secondaryText">
                foodies @ yahoo . com
            </span>
        </div>
    </div>
    <!--end of the footer-->
    <script src="./script/app.js"></script>
    <script src="./script/login.js"></script>
  </body>
</html>

<?php 
  //session start
  session_start();
  //db connection
  require_once "../configs/db.connection.php";
  
  //if unsussfull login redirect to login
  if($_SESSION["userName"]  == null){
    header("Location: http://localhost/Food-Dilivery-System");
  }

  // Turn off all error reporting
  error_reporting(0);

  //getting data from databse about user
  $mailsA = $_SESSION["usrEmail"];

  $sqlForAdmin = "SELECT isAdmin FROM customers WHERE email = '$mailsA' ";
  $result = $conn->query($sqlForAdmin);
  $rowAdmin = $result->fetch_assoc();

  //getting profile img
  $sqlImg = "SELECT image FROM customers WHERE email = '$mailsA' ";
  $resultImg = $conn->query($sqlImg);
  $ImgRow = $resultImg->fetch_assoc()
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--upper image-->
    <link rel="icon" type="image/svg+xml" href="/imgs/Web-img/pre.jpeg" />
    <!--style sheets-->
    <link rel="stylesheet" href="./home.css">
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

    <script src="../script/index.js"></script>
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
    
    <!--sweet alert-->
    <?php
      if($_SESSION["userName"] != null && $_SESSION["LoginOnce"] != null){
        print '<script>swal("Success!", "You are Sucessfully registed!", "success");</script>';
        $_SESSION["LoginOnce"] = null;
      }

      if($_SESSION["logedIn"] == 1 && $_SESSION["usrEmail"] != null){
        print '<script>swal("Success!", "You are Sucessfully logedin!", "success");</script>';
        $_SESSION["LoginOnce"] = null;
        $_SESSION["logedIn"] = null;
      }

      if($_SESSION["AddStarter"] != null){
        print '<script>swal("Success!", "Your Starters Add to the Cart!", "success");</script>';
        $_SESSION["AddStarter"] = null;

      }else if($_SESSION["AddMain"] != null){
        print '<script>swal("Success!", "Your Mains Add to the Cart!", "success");</script>';
        $_SESSION["AddMain"] = null;
        
      }else if($_SESSION["AddDessert"] != null){
        print '<script>swal("Success!", "Your Dessert Add to the Cart!", "success");</script>';
        $_SESSION["AddDessert"] = null;

      }
    ?>
  <!--end of sweet alert-->

    <!--navigation section-->
    <nav>
      <div class="nav1">
        <ul class="flexGap menues">
          <li><a href="">Home</a></li>
          <li><a href="#starters">Starters</a></li>
          <li><a href="#mains">Mains</a></li>
          <li><a href="#desserts">Desserts</a></li>
          <li><a href="#pckages">Packages</a></li>
        </ul>
        <i
          class="fa-solid fa-bars"
          id="menuIcon"
          style="color: #000000"
          onclick="openMenu()"
        ></i>
      </div>
      <div class="nav2 flexGap">
        <span style="text-transform: uppercase;cursor:pointer;color:red;" class="namess" onclick="function6()">
          <?php
            if ($rowAdmin["isAdmin"] == 1){
              echo "ADMIN ACCESS";
            }else{
              
            }
          ?>        
        </span>
        <img src="<?php echo "../imgs/UploadImg/Users/".$ImgRow['image']  ?>" alt="" class="profile-img" onclick="location.href = '../profile/profile.php';" >
        <span style="text-transform: uppercase;cursor:pointer;" class="namess" onclick="function5()">
          <?php
            if (empty($_SESSION["userName"])){
              echo "ERR";
            }else{
              echo "".$_SESSION["userName"] ;
            }
          ?>        
        </span>
        <i class="fas fa-cart-plus" style="cursor:pointer;" class="namess" onclick="location.href='./cart/cart.php'"></i>
        <i class="fas fa-power-off" style="cursor:pointer;" class="namess" onclick="function5()"></i>
        
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
        <li><a href="#starters" onclick="closeMenu()">Starters</a></li>
        <li><a href="#mains" onclick="closeMenu()">Mains</a></li>
        <li><a href="">Desserts</a></li>
        <li><a href="">Packages</a></li>
      </ul>
    </div>
    <!--end of navigation section-->


    <!--second section-->
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
        <img src="../imgs/Web-img/bg.png" class="hiddeny" alt="">
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

    <?php 
      $sqlStarter = "SELECT * FROM products WHERE p_catogary = 'Starter'";
      $starterResult = $conn -> query($sqlStarter); 

      
    ?>
    <!--3 section section-->
    <div class="sec03" id="starters">
      <div class="headdings">
        <span class="primaryText"> Starters </span><br /><br />
        <span class="secondaryText">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, vel!
        </span>
      </div>
      <br /><br />
      <div class="items">
        
      <?php
        while ($Starterrow = $starterResult->fetch_assoc()) {
      ?>
        <div class="product">
          <div class="product-img">
            <img src="<?php  echo "../imgs/UploadImg/Foods/".$Starterrow['p_img']; ?>" alt="" />
          </div>
          <div class="product-name">
            <span class="secondaryText"><?php echo $Starterrow['p_name']; ?></span><br />
            <span style="line-height: 25px">
              <?php echo $Starterrow['p_discription']; ?>
            </span>
          </div>
          <span class="secondaryText"><?php echo "Rs ".$Starterrow['p_price'].".00"; ?></span>
          <div class="addToCart">
            <form action="../configs/cart/addCart.php" method="post">
              <input type="hidden" name="userMail"  value="<?php echo $mailsA; ?>">
              <input type="hidden" name="userName"  value="<?php echo $_SESSION["userName"]; ?>">
              <input type="hidden" name="foodName"  value="<?php echo $Starterrow['p_name'];?>">
              <input type="hidden" name="foodPrice" value="<?php echo $Starterrow['p_price']; ?>">
              <input type="hidden" name="foodImg"  value="<?php echo $Starterrow['p_img'];?>">
              <div class="container">
                <p>Qun</p>
                <p>:</p>
                <input type="number" min="0" max="100" step="1" value="1" id="my-input" name="fcount">
              </div><br>
              <button type="submit" name="AddStarter" class="shoping-btn">
                 ADD TO CART - <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </form>
          </div>
        </div>
        <?php
        }
        ?>        
      </div>
    </div>
    <!--3 end section section-->
    

    <!--fecting mains data-->
    <?php 
      $sqlMain = "SELECT * FROM products WHERE p_catogary = 'Mains'";
      $mainResult = $conn -> query($sqlMain);
    ?>
    <!--4 section section-->
    <div class="sec03" id="mains">
      <div class="headdings">
        <span class="primaryText"> Mains </span><br /><br />
        <span class="secondaryText">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, vel!
        </span>
      </div>

      <div class="items">
      <?php 
        while( $mainRow = $mainResult->fetch_assoc()) {
      ?>
        <div class="product">
          <div class="product-img">
            <img src="<?php echo "../imgs/UploadImg/Foods/".$mainRow['p_img'];  ?>" alt="" />
          </div>
          <div class="product-name">
            <span class="secondaryText"> <?php echo $mainRow['p_name']; ?> </span>
            <span style="line-height: 25px">
              <?php echo $mainRow['p_discription']; ?>
            </span>
          </div>
          <span class="secondaryText"><?php echo "Rs ".$mainRow['p_price'].".00"; ?></span>
          <div class="addToCart">
            <form action="../configs/cart/addCart.php" method="post">
              <input type="hidden" name="userMail"  value="<?php echo $mailsA; ?>">
              <input type="hidden" name="userName"  value="<?php echo $_SESSION["userName"]; ?>">
              <input type="hidden" name="foodName"  value="<?php echo $mainRow['p_name'];?>">
              <input type="hidden" name="foodPrice" value="<?php echo $mainRow['p_price']; ?>">
              <input type="hidden" name="foodImg"  value="<?php echo $mainRow['p_img'];?>">
              <div class="container">
                <p>Qun</p>
                <p>:</p>
                <input type="number" min="0" max="100" step="1" value="1" id="my-input" name="fcount">
              </div><br>
              <button type="submit" name="AddMain" class="shoping-btn">
                 ADD TO CART - <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </form>
          </div>
        </div>
      <?php 
        }
      ?>
      </div>

    </div>
    <!--4 end section section-->
    <!--fecting dessert data -->
    <?php
      $sqlDessert = "SELECT * FROM products WHERE p_catogary = 'Desserts'";
      $dessertResult = $conn -> query($sqlDessert);
    ?>
    <!--section 5-->
    <div class="sec03" id="desserts">
      <div class="headdings">
        <span class="primaryText"> Desserts </span><br /><br />
        <span class="secondaryText">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, vel!
        </span>
      </div>
      <div class="items">
        
      <?php
        while($DessertRow = $dessertResult->fetch_assoc()) {
      ?>

        <div class="product">
          <div class="product-img">
            <img src="<?php echo "../imgs/UploadImg/Foods/".$DessertRow['p_img'];  ?>" alt="" />
          </div>
          <div class="product-name">
            <span class="secondaryText"> <?php echo $DessertRow['p_name']; ?></span>
            <span style="line-height: 25px">
              <?php echo $DessertRow['p_discription']; ?>
            </span>
          </div>
          <span class="secondaryText"><?php echo "Rs ".$DessertRow['p_price'].".00"; ?></span>
          <div class="addToCart">
            <form action="../configs/cart/addCart.php" method="post">
              <input type="hidden" name="userMail"  value="<?php echo $mailsA; ?>">
              <input type="hidden" name="userName"  value="<?php echo $_SESSION["userName"]; ?>">
              <input type="hidden" name="foodName"  value="<?php echo $DessertRow['p_name'];?>">
              <input type="hidden" name="foodPrice" value="<?php echo $DessertRow['p_price']; ?>">
              <input type="hidden" name="foodImg"  value="<?php echo $DessertRow['p_img']?>">
              <div class="container">
                <p>Qun</p>
                <p>:</p>
                <input type="number" min="0" max="100" step="1" value="1" name="fcount" id="my-input" >
              </div><br>
              <button type="submit" name="AddDessert" class="shoping-btn">
                 ADD TO CART - <i class="fa-solid fa-cart-shopping"></i>
              </button>
            </form>
          </div>
        </div>
        <?php 
        }
        ?>
      </div>
    </div>
    <!--end of section 5-->

    <!--section 6-->
    <div class="sec03" id="pckages">
      <div class="headdings">
        <span class="primaryText"> Packages </span><br /><br />
        <span class="secondaryText">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, vel!
        </span>
      </div>
      <div class="items">
        
        <div class="product">
          <div class="product-img">
            <img src="../imgs/Web-img/BackGround.jpg" alt="" />
          </div>
          <div class="product-name">
            <span class="secondaryText"> Food Item </span><br /><br />
            <span style="line-height: 25px">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat,
              expedita.
            </span>
          </div>
          <div class="addToCart">
            <button type="button">
              ADD TO CART - <i class="fa-solid fa-cart-shopping"></i>
            </button>
          </div>
        </div>

      </div>
    </div>
    <!--end of section 6-->

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
    <script src="../script/app.js"></script>
    <script src="../script/login.js"></script>





     <!--sweet alert-->
    <script>
            function function5() {
                swal({
                title: "Are you sure?",
                text: "Do you want to exsit?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    location.href = "../configs/logins&registrations/logOut.php";
                } else {
                    swal("YYOu are safe!");
                }
                });
            }

            function function6() {
                swal({
                title: "Are you sure?",
                text: "Do you want to switch Admin Panel?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    location.href = "../AdminPanel/AdminPanel.php";
                } else {
                    swal("OK");
                }
                });
            }
    </script>

    <script>
      const myInput = document.getElementById("my-input");
        function stepper(btn){
            let id = btn.getAttribute("id");
            let min = myInput.getAttribute("min");
            let max = myInput.getAttribute("max");
            let step = myInput.getAttribute("step");
            let val = myInput.getAttribute("value");
            let calcStep = (id == "increment") ? (step*1) : (step * -1);
            let newValue = parseInt(val) + calcStep;

            if(newValue >= min && newValue <= max){
                myInput.setAttribute("value", newValue);
            }
        }
    </script>


  </body>
</html>

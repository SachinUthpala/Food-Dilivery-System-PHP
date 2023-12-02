<?php 
  //session start
  session_start();
  //db connection
  require_once "../../configs/db.connection.php";
  
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

?>

<!--php for data fetching -->
<?php 

  $sqlCart = "SELECT * FROM cart WHERE umail = '$mailsA'";
  $resultCart = $conn->query($sqlCart);
  //$rowCart = $resultCart->fetch_assoc();
  $totalAmount = 0;
  $totalPaidAmount = 0;
  $totalPendingAmount = 0;


  $sqlStatus = "SELECT status,TotalPrice FROM cart WHERE umail = '$mailsA'";
  $resultStatus = $conn->query($sqlStatus);

  while($rowStatus = mysqli_fetch_assoc($resultStatus)){

    if($rowStatus["status"] == 1){
      $totalPaidAmount = $totalPaidAmount + (int)$rowStatus["TotalPrice"];
    }else{
      $totalPendingAmount = $totalPendingAmount + (int)$rowStatus["TotalPrice"]; 
    }

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
    <link rel="stylesheet" href="../home.css" />
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

    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="../script/index.js"></script>

    <link rel="stylesheet" href="./cart.css" />
  </head>
  <body>
    <!--sweet alert -->
  <?php

    if($_SESSION["CHEACKOUT"] != null){
        print '<script>swal("Success!", "Your Payment Resived Sucessfully!", "success");</script>';
        $_SESSION["CHEACKOUT"] = null;
    }


  ?>


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
          <li><a href="../home.php">Home</a></li>
          <li><a href="../home.php#starters">Starters</a></li>
          <li><a href="../home.php#mains">Mains</a></li>
          <li><a href="../home.php#desserts">Desserts</a></li>
          <li><a href="../home.php#pckages">Packages</a></li>
        </ul>
        <i
          class="fa-solid fa-bars"
          id="menuIcon"
          style="color: #000000"
          onclick="openMenu()"
        ></i>
      </div>
      <div class="nav2 flexGap">
        <span
          style="text-transform: uppercase; cursor: pointer; color: red"
          class="namess"
          onclick="function6()"
        >
          <?php
                if ($rowAdmin["isAdmin"] == 1){
                  echo "ADMIN ACCESS";
                }else{
                  
                }
              ?>
        </span>
        <img
          src="../../imgs/Web-img/img01.jpg"
          alt=""
          class="profile-img"
          onclick="location.href = '../../profile/profile.php';"
        />
        <span
          style="text-transform: uppercase; cursor: pointer"
          class="namess"
          onclick="function5()"
        >
          <?php
                if (empty($_SESSION["userName"])){
                  echo "ERR";
                }else{
                  echo "".$_SESSION["userName"] ;
                }
              ?>
        </span>
        <i class="fas fa-cart-plus" style="cursor: pointer" class="namess"></i>
        <i
          class="fas fa-power-off"
          style="cursor: pointer"
          class="namess"
          onclick="function5()"
        ></i>
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

    <h1 class="main-text">Your Orders</h1>



    <!--c  art-->
    <div class="small-container cart-page">
      <table class="main-table">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Food Details</th>
                <th>Food Quntity</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Cheackout</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            while($cartRow = mysqli_fetch_assoc($resultCart)){
              $totalAmount = $totalAmount + (int)$cartRow["TotalPrice"];
          ?>
            <tr>
                <td><?php echo $cartRow["uname"]  ?> </td>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo "../../imgs/UploadImg/Foods/".$cartRow["f_img"];  ?>" alt="" width="70" height="70">
                        <div>
                            <p><?php echo $cartRow["f_name"];  ?></p>
                            <small><?php echo "Rs ".$cartRow["f_price"].".00"  ?></small><br><br>
                        </div>
                    </div>
                </td>
                <td><?php echo $cartRow["quntity"];  ?></td>
                <td><?php echo $cartRow["TotalPrice"];  ?></td>
                <td><?php
                  if($cartRow["status"] == 0){
                    echo '<span class="status-p">pending</span>';
                  }else if($cartRow["status"]){
                    echo '<span class="status-s">paid</span>';
                  }
                ?></td>
                <td>
                    <form action="../../configs/cart/cheackout.php" method="post">
                      <input type="hidden" name="cartid" value="<?php echo $cartRow["cid"] ?>">
                        <input type="submit" value="Cheackout" name="cheackout">
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="submit" value="Remove">
                    </form>
                </td>
            </tr>

            <?php }?>
        </tbody>
      </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Paid Amount</td>
                    <td><?php echo $totalPaidAmount.".00"; ?></td>
                </tr>
                <tr>
                    <td>Pending Amount </td>
                    <td><?php echo $totalPendingAmount.".00"; ?></td>
                </tr>
                <tr style="border-top: 1px solid orangered;border-bottom: 3px solid orangered;">
                    <td>Total Amount</td>
                    <td><?php echo $totalAmount.".00"; ?></td>
                </tr>
            </table>
        </div>
    </div>





























    <div class="footer flexBetween">
      <div class="left">
        <span class="primaryText"> Foodies </span><br />
        <span class="secondaryText"> Colombo , Sri Lanka </span>
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
        <span class="secondaryText"> Follow Us </span>
        <br /><br />
        <div class="flexGap icon-group">
          <i class="fa-brands fa-facebook-f" style="color: #0a0a0a"></i>
          <i class="fa-brands fa-instagram" style="color: #000000"></i>
          <i class="fa-brands fa-twitter" style="color: #090a0b"></i>
        </div>
      </div>
      <div class="right">
        <span class="secondaryText"> Customer Care </span><br />
        <span class="secondaryText"> 076 27 12200 </span><br /><br />
        <span class="secondaryText"> Email </span><br />
        <span class="secondaryText"> foodies @ yahoo . com </span>
      </div>
    </div>

    <!--scripts-->
    <script>
      function function5() {
        swal({
          title: "Are you sure?",
          text: "Do you want to exsit?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            location.href = "../../configs/logins&registrations/logOut.php";
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
                    location.href = "../../AdminPanel/AdminPanel.php";
                } else {
                    swal("OK");
                }
            });
        }
    </script>
  </body>
</html>

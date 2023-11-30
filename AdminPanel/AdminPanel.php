<?php

  //get db connection
  require_once '../configs/db.connection.php';
  session_start();

  //select all data  from cusers
  $sqlUser = "SELECT * FROM customers";
  $resultUser = $conn->query($sqlUser);

  $numofUserRows = mysqli_num_rows($resultUser);

    // Turn off all error reporting
  error_reporting(0);

  $n =0;
  $f = 0;
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <!--sweet alert links-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span style="font-size:20px;text-transform:uppercase;color:orangered;"><?php echo "Admin Name : ".$_SESSION["userName"]; ?></span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined" style="padding-right:20px;cursor:pointer;">account_circle</span>
          <span class="material-icons-outlined" style="cursor:pointer;" onclick="function5()">power_settings_new</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span>FOODIES
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="#main" onclick="openMain(1)">
              <span class="material-icons-outlined">dashboard</span> DASHBORD
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#main2" onclick="openMain(2)">
              <span class="material-icons-outlined">person</span> USERS
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" onclick="openMain(3)">
              <span class="material-icons-outlined">fact_check</span> FOODS
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">add_shopping_cart</span> Purchase Orders
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">shopping_cart</span> Sales Orders
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">poll</span> Reports
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->
      <?php

      //for sweet alert
        if($_SESSION["RemoveAccess"] != null){
          print '<script>swal("Success!", "Now User Does Not Have Admin Access", "success");</script>';
          $_SESSION["RemoveAccess"] = null;
        }else if($_SESSION["GiveAccess"] != null){
          print '<script>swal("Success!", "Now User Have Admin Access", "success");</script>';
          $_SESSION["GiveAccess"]=null;
        }else if($_SESSION["userDeleted"] != null){
          print '<script>swal("Success!", "USER DELETED !", "success");</script>';
          $_SESSION["userDeleted"] = null;
        }else if($_SESSION["FoodAdded"] != null){
          print '<script>swal("Success!", "Food Added !", "success");</script>';
          $_SESSION["FoodAdded"] = null;
        }
      ?>

      <!--php for main -->
      <?php
      //to get total product
        $sqlForProducts = "SELECT * FROM products";
        $prResult = $conn ->  query($sqlForProducts);

        $totalProducts = mysqli_num_rows($prResult);
    

      ?>
      <!--end php for main -->
      <!-- Main -->
      <main class="main-container" id="main">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">NO FOOD ITEMS</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $totalProducts; ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">TOTAL SALES</p>
              <span class="material-icons-outlined text-orange">monetization_on</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">TOTAL USERS</p>
              <span class="material-icons-outlined text-green">sperson</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $numofUserRows; ?></span>
          </div>

        </div>

        <div class="charts">

          

        </div>
      </main>
      <!-- End Main1 -->

      <!--php for get user count-->
      <?php
        $adSql = "SELECT * FROM customers WHERE isAdmin = 1";
        $adCresult = $conn -> query($adSql);
        $adNumRows = mysqli_num_rows($adCresult);

        $CuSql = "SELECT * FROM customers WHERE isAdmin = 0";
        $CuCresult = $conn -> query($CuSql);
        $CuNumRows = mysqli_num_rows($CuCresult);
      ?>

      <main class="main-container" id="main2">
        <div class="main-title">
          <p class="font-weight-bold">USERS</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">TOTAL ADMINS</p>
              <span class="material-icons-outlined text-blue">support_agent</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $adNumRows; ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">TOTAL CUSTOMERS</p>
              <span class="material-icons-outlined text-orange">person</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $CuNumRows ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">TOTAL USERS</p>
              <span class="material-icons-outlined text-red">group</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $numofUserRows; ?></span>
          </div>

        </div>

        <div class="charts">

          <table class="content-table">
            <thead>
              <tr>
                <th>NO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>PASSWORD</th>
                <th>IS ADMIN</th>
                <th>DELETE</th>
                <th>ADMIN ACCESS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                  while($row = mysqli_fetch_assoc($resultUser)){
                    $n = $n+1;
                ?>
                <td><?php echo ($n); ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php 
                  if($row['isAdmin'] == 0){
                    echo "Customer"; 
                  }else if($row['isAdmin'] == 1){
                    echo "Admin";
                  }
                ?></td>
                <td>
                  <form action="../configs/AdminChanges/deleteUser.php" method="post">
                    <input type="email" name="deleteUser" value="<?php echo $row['email'];?>" hidden>
                    <input type="submit" 
                    name="delete"
                    style="padding: 5px 10px; color:#000000;background:#FF004F;border:1px solid #FF004F;border-radius:5px;cursor:pointer;"
                    value="Delete">
                  </form>
                </td>
                <td>
                  <!--for change admin-->
                  <form action="../configs/AdminChanges/changeAdmin.php" method="post">
                    <input type="email" name="usermails" value="<?php echo $row['email'];?>" hidden>
                    <input type="submit" 
                    
                    value="<?php
                      if($row['isAdmin'] == 1){
                        echo "FALSE";
                      }else{
                        echo "TRUE";
                      }
                    ?>"
                    
                    style ="
                    <?php
                      if($row['isAdmin'] == 1){
                        echo "padding: 5px 10px; color:#000000;background:#FF004F;border:1px solid #FF004F;border-radius:5px;cursor:pointer;";
                      }else{
                        echo "padding: 5px 10px; color:#000000;background:greenyellow;border:1px solid greenyellow;border-radius:5px;cursor:pointer;";
                      }
                    ?>
                    "
                
                    name = "<?php
                    
                      if($row['isAdmin'] == 1){
                        echo "Admin";
                      }else{
                        echo "NotAdmin";
                      }
                    ?>"
                    >

                  </form>
                  
                </td>
              </tr>
              <?php
                  }
              ?>

            </tbody>
          </table>

        </div>
      </main>
      <!-- End Main2 -->
      <!--php for main3-->

      <?php
        //feacting data from product table
        $Foodquery = "SELECT * FROM products";
        $starterQuery = "SELECT * FROM products WHERE p_catogary  = 'Starter' ";
        $mainsQuery = "SELECT * FROM products WHERE p_catogary = 'Mains' ";
        $dessertQuery = "SELECT * FROM products WHERE p_catogary = 'Desserts' ";
        
        $FoodResult = $conn -> query($Foodquery);
        $starterResult = $conn -> query($starterQuery);
        $mainResult = $conn -> query($mainsQuery);
        $deResult = $conn -> query($dessertQuery);
      ?>
      <main class="main-container" id="main3">
        <div class="main-title">
          <p class="font-weight-bold">FOODS</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">STARTERS</p>
              <span class="material-icons-outlined text-blue">soup_kitchen</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo mysqli_num_rows($starterResult); ?> ITEMS</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">MAINS</p>
              <span class="material-icons-outlined text-orange">lunch_dining</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo mysqli_num_rows($mainResult); ?> ITEMS</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">DESSERTS</p>
              <span class="material-icons-outlined text-green">icecream</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo mysqli_num_rows($deResult); ?> ITEMS</span>
          </div>

          <div class="card add-card"   style="cursor: pointer;"   onclick="location.href='./Add&UpdateFood/Add_Update_Food.php'" >    
            <div class="card-inner">
              <p class="text-primary">ADD FOOD</p>
              <span class="material-icons-outlined text-green">icecream</span>
            </div>
            <span class="text-primary font-weight-bold">+</span>
          </div>

        </div>

        <div class="charts">

          <table class="content-table">
            <thead>
              <tr>
                <th>NO</th>
                <th>NAME</th>
                <th>CATOGARY</th>
                <th>DISCRIPTION</th>
                <th>PRICE</th>
                <th>UPDATE</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <?php 
                  while($Frows = mysqli_fetch_assoc($FoodResult)){
                    $f = $f + 1;
                  ?>
                  <td><?php echo $f; ?></td>
                  <td><?php echo $Frows["p_name"]?></td>
                  <td><?php echo $Frows["p_catogary"]?></td>
                  <td><?php echo $Frows["p_discription"]?></td>
                  <td><?php echo $Frows["p_price"]?></td>
                  <td>
                      <form action="./Add&UpdateFood/Add_Update_Food.php" method="post">
                        <input type="text" name="f_ids" value="<?php echo $Frows["p_id"];?>" hidden>
                        <input type="submit" name="updateFood"
                        style="padding: 5px 10px; color:#000000;background:lawngreen;border:1px solid lawngreen;border-radius:5px;cursor:pointer;"
                        value="Update">
                        
                      </form>
                  </td>
                  <td>
                      <form action="" method="post">
                        <input type="text" value="<?php echo $Frows['p_id'];?>" hidden>
                        <input type="submit" 
                        style="padding: 5px 10px; color:#000000;background:#FF004F;border:1px solid #FF004F;border-radius:5px;cursor:pointer;"
                        value="Update">
                      </form>
                  </td>
              </tr>
              <?php
                  }
              ?>
            </tbody>
          </table>

        </div>
      </main>
      <!-- End Main 3 -->

      <main class="main-container" id="main4">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>
      
        <div class="main-cards">
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">AAAAA</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">249</span>
          </div>
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">AAAAA</p>
              <span class="material-icons-outlined text-orange">monetization_on</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ACCCC</p>
              <span class="material-icons-outlined text-green">sperson</span>
            </div>
            <span class="text-primary font-weight-bold">79</span>
          </div>
      
        </div>
      
        <div class="charts">
      
      
      
        </div>
      </main>
      <!-- End Main 4 -->

      <main class="main-container" id="main5">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>
      
        <div class="main-cards">
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">AAAAA</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">249</span>
          </div>
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">AAAAA</p>
              <span class="material-icons-outlined text-orange">monetization_on</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ACCCC</p>
              <span class="material-icons-outlined text-green">sperson</span>
            </div>
            <span class="text-primary font-weight-bold">79</span>
          </div>
      
        </div>
      
        <div class="charts">
      
      
      
        </div>
      </main>
      <!-- End Main 5 -->

      <main class="main-container" id="main6">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>
      
        <div class="main-cards">
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">AAAAA</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">249</span>
          </div>
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">AAAAA</p>
              <span class="material-icons-outlined text-orange">monetization_on</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>
      
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ACCCC</p>
              <span class="material-icons-outlined text-green">sperson</span>
            </div>
            <span class="text-primary font-weight-bold">79</span>
          </div>
      
        </div>
      
        <div class="charts">
      
      
      
        </div>
      </main>
      <!-- End Main 6 -->

    </div>



























    <!-- Scripts -->
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>

    <script>
      function openMain(params) {
        if(params == 1){
          document.getElementById("main").style.display = "block";
          document.getElementById("main2").style.display = "none";
          document.getElementById("main3").style.display = "none";
          document.getElementById("main4").style.display = "none";
          document.getElementById("main5").style.display = "none";
          document.getElementById("main6").style.display = "none";
        }else if(params == 2){
          document.getElementById("main").style.display = "none";
          document.getElementById("main3").style.display = "none";
          document.getElementById("main4").style.display = "none";
          document.getElementById("main5").style.display = "none";
          document.getElementById("main6").style.display = "none";
          document.getElementById("main2").style.display = "block";
        }else if(params == 3){
          document.getElementById("main").style.display = "none";
          document.getElementById("main2").style.display = "none";
          document.getElementById("main4").style.display = "none";
          document.getElementById("main5").style.display = "none";
          document.getElementById("main6").style.display = "none";
          document.getElementById("main3").style.display = "block";
        }else if(params == 4){
          document.getElementById("main").style.display = "none";
          document.getElementById("main3").style.display = "none";
          document.getElementById("main2").style.display = "none";
          document.getElementById("main5").style.display = "none";
          document.getElementById("main6").style.display = "none";
          document.getElementById("main4").style.display = "block";
        }else if(params == 5){
          document.getElementById("main").style.display = "none";
          document.getElementById("main3").style.display = "none";
          document.getElementById("main2").style.display = "none";
          document.getElementById("main4").style.display = "none";
          document.getElementById("main6").style.display = "none";
          document.getElementById("main5").style.display = "block";
        }else if(params ==6){
          document.getElementById("main").style.display = "none";
          document.getElementById("main3").style.display = "none";
          document.getElementById("main2").style.display = "none";
          document.getElementById("main4").style.display = "none";
          document.getElementById("main5").style.display = "none";
          document.getElementById("main6").style.display = "block";
        }
      }


      function function5() {
                swal({
                title: "Are you Want Exsit?",
                text: "Do you want to exsit?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    location.href = "../Home/home.php";
                } else {
                    swal("You are safe!");
                }
                });
            }   
    </script>
  </body>
</html>
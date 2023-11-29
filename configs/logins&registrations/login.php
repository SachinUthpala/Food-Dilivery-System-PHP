<?php
//starting session
session_start();
//getting db connection
require_once "../db.connection.php";


//getting data
if(isset($_POST["login"])){

    //grttign data from html form
    $email = $_POST["email"];
    $password = $_POST["password"];

    //query for mail cheack
    $queryForMail = "SELECT * FROM customers WHERE email = '$email'";
    $resultMail = $conn->query($queryForMail);

    echo $resultMail->num_rows;

    //query for password cheack
    $queryForpassword = "SELECT * FROM customers WHERE password = '$password' && email = '$email' ";
    $resultpasswor_main = $conn->query($queryForpassword);

    echo $resultpasswor_main->num_rows;

    if($resultMail->num_rows == 1 && $resultpasswor_main ->num_rows ==1){//vallied login

        //query for getting name
        $usernameQuery = "SELECT name FROM customers WHERE email = '$email'" ;
        $nameResult = $conn->query($usernameQuery);
        $row = $nameResult->fetch_assoc();//feacting data
        echo $row["name"];
    
        $_SESSION["userName"] = $nameResult;

        //redirecting page
        header("Location: http://localhost/Food-Dilivery-System/Home/home.php");
        $_SESSION["usrEmail"] = $email;
        $_SESSION["logedIn"] = 1;
        $_SESSION["userName"] = $row["name"];//store the name to user name session
        exit();

    }else if($resultMail != 1){//invallied login
        header("Location: http://localhost/Food-Dilivery-System");
        $_SESSION["worngMAil"] = 1;
        exit();
    }else if($resultpasswor_main != 1){//invallied login
        header("Location: http://localhost/Food-Dilivery-System");
        $_SESSION["worngPassword"] = 1;
        exit();
    }else{//invallied login
        header("Location: http://localhost/Food-Dilivery-System");
        $_SESSION["wrongMailAndPassword"] = 1;
        exit();
    }

}



?>
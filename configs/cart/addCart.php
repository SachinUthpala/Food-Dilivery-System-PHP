<?php

require_once '../db.connection.php';
session_start();


if(isset($_POST["AddStarter"])){

    $umail = $_POST["userMail"];
    $uname = $_POST["userName"];
    $fname = $_POST["foodName"];
    $fprice = $_POST["foodPrice"];
    $quntity = $_POST["fcount"];
    $f_img = $_POST["foodImg"];

    $quntity = (int)$quntity;

    $totalPrice = (int)$fprice * $quntity;
    $totalPrice = (string)$totalPrice;

    echo $umail." - ".$uname." - ".$fname." - ".$fprice." - ".$quntity." - ".$totalPrice;

    $sql = "INSERT INTO cart(umail, uname, f_name, f_price,  quntity, TotalPrice,f_img) 
    VALUES ('$umail','$uname','$fname','$fprice',$quntity,'$totalPrice','$f_img') ";

    $result = $conn -> query($sql);

    if($result){
        $_SESSION["AddStarter"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/Home/home.php#starters");
    }

}else if(isset($_POST["AddMain"])){

    $umail = $_POST["userMail"];
    $uname = $_POST["userName"];
    $fname = $_POST["foodName"];
    $fprice = $_POST["foodPrice"];
    $quntity = $_POST["fcount"];
    $f_img = $_POST["foodImg"];

    $quntity = (int)$quntity;

    $totalPrice = (int)$fprice * $quntity;
    $totalPrice = (string)$totalPrice;

    echo $umail." - ".$uname." - ".$fname." - ".$fprice." - ".$quntity." - ".$totalPrice;

    $sql = "INSERT INTO cart(umail, uname, f_name, f_price,  quntity, TotalPrice,f_img) 
    VALUES ('$umail','$uname','$fname','$fprice',$quntity,'$totalPrice','$f_img') ";

    $result = $conn -> query($sql);

    if($result){
        $_SESSION["AddMain"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/Home/home.php#mains");
    }

}else if(isset($_POST["AddDessert"])){

    $umail = $_POST["userMail"];
    $uname = $_POST["userName"];
    $fname = $_POST["foodName"];
    $fprice = $_POST["foodPrice"];
    $quntity = $_POST["fcount"];
    $f_img = $_POST["foodImg"];

    $quntity = (int)$quntity;

    $totalPrice = (int)$fprice * $quntity;
    $totalPrice = (string)$totalPrice;

    echo $umail." - ".$uname." - ".$fname." - ".$fprice." - ".$quntity." - ".$totalPrice;

    $sql = "INSERT INTO cart(umail, uname, f_name, f_price,  quntity, TotalPrice,f_img) 
    VALUES ('$umail','$uname','$fname','$fprice',$quntity,'$totalPrice','$f_img') ";

    $result = $conn -> query($sql);

    if($result){
        $_SESSION["AddDessert"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/Home/home.php#desserts");
    }
}




?>
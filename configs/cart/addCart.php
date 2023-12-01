<?php

require_once '../db.connection.php';
session_start();


if(isset($_POST["AddStarter"])){

    $umail = $_POST["userMail"];
    $uname = $_POST["userName"];
    $fname = $_POST["foodName"];
    $fprice = $_POST["foodPrice"];
    $quntity = $_POST["fcount"];

    $quntity = (int)$quntity;

    $totalPrice = (int)$fprice * $quntity;
    $totalPrice = (string)$totalPrice;

    echo $umail." - ".$uname." - ".$fname." - ".$fprice." - ".$quntity." - ".$totalPrice;

    $sql = "INSERT INTO cart(umail, uname, f_name, f_price,  quntity, TotalPrice) 
    VALUES ('$umail','$uname','$fname','$fprice',$quntity,'$totalPrice') ";

    $result = $conn -> query($sql);

    if($result){
        $_SESSION["AddStarter"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/Home/home.php");
    }

}else if(isset($_POST["AddMain"])){

    $umail = $_POST["userMail"];
    $uname = $_POST["userName"];
    $fname = $_POST["foodName"];
    $fprice = $_POST["foodPrice"];
    $quntity = $_POST["fcount"];

    $quntity = (int)$quntity;

    $totalPrice = (int)$fprice * $quntity;
    $totalPrice = (string)$totalPrice;

    echo $umail." - ".$uname." - ".$fname." - ".$fprice." - ".$quntity." - ".$totalPrice;

    $sql = "INSERT INTO cart(umail, uname, f_name, f_price,  quntity, TotalPrice) 
    VALUES ('$umail','$uname','$fname','$fprice',$quntity,'$totalPrice') ";

    $result = $conn -> query($sql);

    if($result){
        $_SESSION["AddMain"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/Home/home.php");
    }

}else if(isset($_POST["AddDessert"])){

    $umail = $_POST["userMail"];
    $uname = $_POST["userName"];
    $fname = $_POST["foodName"];
    $fprice = $_POST["foodPrice"];
    $quntity = $_POST["fcount"];

    $quntity = (int)$quntity;

    $totalPrice = (int)$fprice * $quntity;
    $totalPrice = (string)$totalPrice;

    echo $umail." - ".$uname." - ".$fname." - ".$fprice." - ".$quntity." - ".$totalPrice;

    $sql = "INSERT INTO cart(umail, uname, f_name, f_price,  quntity, TotalPrice) 
    VALUES ('$umail','$uname','$fname','$fprice',$quntity,'$totalPrice') ";

    $result = $conn -> query($sql);

    if($result){
        $_SESSION["AddDessert"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/Home/home.php");
    }
}




?>
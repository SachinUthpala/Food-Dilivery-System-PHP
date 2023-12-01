<?php

    require_once '../db.connection.php';
    session_start();

    $id = (int)$_POST["cartid"];
    $sql = "UPDATE cart SET status=1 WHERE cid = $id ";

    $result = $conn -> query($sql);

    if($result){
        $_SESSION["CHEACKOUT"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/Home/cart/cart.php");
    }






?>
<?php
require_once '../db.connection.php';
session_start();

if(isset($_POST["addFood"])){
    $foodName = $_POST["food-name"];
    $foodDiscription = $_POST["food-discription"];
    $foodPrice = $_POST["food-price"];
    $foodType = $_POST["food-type"];

    echo $foodName."__==__".$foodDiscription."__=__".$foodPrice."____".$foodType;

    $sql = "INSERT INTO products (p_name,p_catogary,p_discription,p_price) 
            VALUES ('$foodName','$foodType','$foodDiscription','$foodPrice')";

    $result = $conn->query($sql);
    
    if($result){
        $_SESSION["FoodAdded"] = $foodName;
        header("Location:http://localhost/Food-Dilivery-System/AdminPanel/AdminPanel.php");
    }
}else if(isset($_POST["updateFood"])){

    $pid = (int)$_POST["pid"];

    $foodName = $_POST["food-name"];
    $foodDiscription = $_POST["food-discription"];
    $foodPrice = $_POST["food-price"];
    $foodType = $_POST["food-type"];

    echo $foodName."__==__".$foodDiscription."__=__".$foodPrice."____".$foodType;

    $sql = "UPDATE products SET p_name='$foodName' , p_catogary = '$foodType' , p_discription = '$foodDiscription',
    p_price = '$foodPrice' WHERE p_id = $pid ";

    $result = $conn->query($sql);

    if($result){
        $_SESSION["FoodUpdated"] = $foodName;
        header("Location:http://localhost/Food-Dilivery-System/AdminPanel/AdminPanel.php");
    }
}else if(isset($_POST['deleteFood'])){
    $fid = (int)$_POST['fId'];

    $sql = "DELETE FROM products WHERE p_id = $fid";
    $result = $conn->query($sql);

    if($result){
        $_SESSION["deleteFood"] = $fid;
        header("Location:http://localhost/Food-Dilivery-System/AdminPanel/AdminPanel.php");
    }
}

?>
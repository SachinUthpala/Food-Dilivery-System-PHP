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
}

?>
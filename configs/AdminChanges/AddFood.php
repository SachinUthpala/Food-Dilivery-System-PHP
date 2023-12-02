<?php
require_once '../db.connection.php';
session_start();

if(isset($_POST["addFood"])){
    $foodName = $_POST["food-name"];
    $foodDiscription = $_POST["food-discription"];
    $foodPrice = $_POST["food-price"];
    $foodType = $_POST["food-type"];

    //upload img
    $img_name = $_FILES["food-img"]['name'];
    $img_size = $_FILES["food-img"]['size'];
    $temp_name = $_FILES["food-img"]['tmp_name'];
    $error = $_FILES["food-img"]['error'];

    //--//
   
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_cl = strtolower($img_ex);
        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_cl;
        $img_upload_path = "../../imgs/UploadImg/Foods/".$new_img_name;
        move_uploaded_file($temp_name,$img_upload_path);

    //upload img

    echo $foodName."__==__".$foodDiscription."__=__".$foodPrice."____".$foodType;

    $sql = "INSERT INTO products (p_name,p_catogary,p_discription,p_price,p_img) 
            VALUES ('$foodName','$foodType','$foodDiscription','$foodPrice','$new_img_name')";

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
    

    //upload img
    $img_name = $_FILES["food-img"]['name'];
    $img_size = $_FILES["food-img"]['size'];
    $temp_name = $_FILES["food-img"]['tmp_name'];
    $error = $_FILES["food-img"]['error'];

    //--//
   
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_cl = strtolower($img_ex);
        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_cl;
        $img_upload_path = "../../imgs/UploadImg/Foods/".$new_img_name;
        move_uploaded_file($temp_name,$img_upload_path);

    //upload img

    echo $foodName."__==__".$foodDiscription."__=__".$foodPrice."____".$foodType;

    $sql = "UPDATE products SET p_name='$foodName' , p_catogary = '$foodType' , p_discription = '$foodDiscription',
    p_price = '$foodPrice' , p_img = '$new_img_name' WHERE p_id = $pid ";

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
<?php
require_once '../db.connection.php';
session_start();

if(isset($_POST['delete'])){
    $email = $_POST['deleteUser'];

    $sql = "DELETE FROM customers WHERE email = '$email'";
    $result = $conn -> query($sql);

    if($result){
        $_SESSION["userDeleted"] = $email;
        header("Location:http://localhost/Food-Dilivery-System/AdminPanel/AdminPanel.php");
    }
}


?>
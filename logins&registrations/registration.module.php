<?php 

//starting session
session_start();
//getting db connection
require_once "../configs/db.connection.php";

//register the customer
if(isset($_POST["register"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    print $name;
    print $email;
    print $pass;

    $password_Hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customers( name, email, password) VALUES ('$name','$email','$password_Hash')";

    $result = $conn->query($sql);

    if($result == 1){
        header("Location: http://localhost/Food-Dilivery-System/");
        $_SESSION["userName"] = $name;
        exit();
    }
}


?>
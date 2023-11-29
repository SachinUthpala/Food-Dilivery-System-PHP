<?php
//starting session
session_start();
//getting db connection
require_once "../db.connection.php";


//getting data
if(isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    $queryForMail = "SELECT * FROM customers WHERE email = '$email'";
    $resultMail = $conn->query($queryForMail);

    echo $resultMail->num_rows;

    $queryForpassword = "SELECT * FROM customers WHERE password = '$hasedPassword'";
    $resultpassword = $conn->query($queryForpassword);

    echo $resultpassword->num_rows;

}



?>
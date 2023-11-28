<?php 

require_once "../configs/db.connection.php";

if(isset($_POST["register"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    print $name;
    print $email;
    print $pass;

    $password_Hash = password_hash($pass, PASSWORD_DEFAULT);

    

}
?>
<?php 

//starting session
session_start();
//getting db connection
require_once "../db.connection.php";

//register the customer
if(isset($_POST["register"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    print $name;
    print $email;
    print $pass;

    //we can not duplicate the email again and again. because user must unique

    $mailQuery = "SELECT * FROM customers WHERE email = '$email'";
    $mailResult = $conn->query($mailQuery);

    if($mailResult->num_rows > 0){
        header("Location: http://localhost/Food-Dilivery-System");
        $_SESSION["RemainingEmail"] = 1;
        $_SESSION["emailRemaingCheack"] = 0;
        exit();
    }else{

       
        //query for data insert
        $sql = "INSERT INTO customers( name, email, password) VALUES ('$name','$email','$pass')";

        $result = $conn->query($sql);
        //result
        if($result == 1){
            header("Location: http://localhost/Food-Dilivery-System/Home/home.php");
            $_SESSION["usrEmail"] = $email;
            $_SESSION["userName"] = $name;
            exit();
        }
    }


}


?>
<?php
    require_once './../db.connection.php';
    session_start();


    if(isset($_POST['Admin'])){
        $usermail = $_POST["usermails"];

        $sql = "UPDATE customers SET isAdmin = 0 WHERE email = '$usermail'";
        $result = $conn->query($sql);
        
        if($result){
            $_SESSION["RemoveAccess"] = $usermail;
            header("Location:http://localhost/Food-Dilivery-System/AdminPanel/AdminPanel.php");
        }

    } else if(isset($_POST['NotAdmin'])){
        $usermail = $_POST["usermails"];
        echo "is not a admin".$usermail;

        $sql = "UPDATE customers SET isAdmin = 1 WHERE email = '$usermail'";
        $result = $conn->query($sql);
        $_SESSION["GiveAccess"] = $usermail;

        if($result){
            header("Location:http://localhost/Food-Dilivery-System/AdminPanel/AdminPanel.php");
        }
    }
?>
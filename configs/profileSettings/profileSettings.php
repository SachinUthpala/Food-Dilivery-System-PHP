<?php
//starting session
session_start();
//getting db connection
require_once "../db.connection.php";

if(isset($_POST["genaral-submit"])){
    $upname =  $_POST["updatedName"];
    $uppass = $_POST["updatedEmail"];
    $id = $_POST["id"];



        $sql = "UPDATE customers SET name='$upname' , email = '$uppass' WHERE id = $id";
        $result = $conn->query($sql);
        
        if($result){
            $_SESSION["GenaralSucess"] = 1;
            header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");

        }else{
            $_SESSION["GenaralUnSucess"] = 1;
            header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");

        }
    
    

}else if(isset($_POST["password-change"])){
    $id = $_POST["id"];
    $pc = $_POST["cp"];
    $currentPass = $_POST["currentPass"];
    $newPass = $_POST["newPass"];
    $repetNewPass = $_POST["repeatNewPass"];

    //cheackings
    
    if($pc == $currentPass){

        if($newPass == $repetNewPass){
            $sql = "UPDATE customers SET password = '$newPass' WHERE id = $id";
            $result = $conn->query($sql);

                if($result){
                    $_SESSION["GenaralSucess"] = 1;
                    header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");

                }else{
                    $_SESSION["GenaralUnSucess"] = 1;
                    header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");

                }

        }else{
            $_SESSION["GenaralUnSucess"] = 1;
            header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");
        }

    }else{
        $_SESSION["GenaralUnSucess"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");
    }

}else if(isset($_POST["account-change"])){
    $id = $_POST["id"];
    $bank = $_POST["bankname"];
    $aNum = $_POST["accountNum"];
    $cvv = $_POST["cvv"];
    $bDay = $_POST["bday"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "UPDATE customers SET bank='$bank ' , cvv = '$cvv' , account_number = '$aNum' , birthday = '$bDay' , phone = '$phone' , address = '$address' WHERE id = $id";
    $result = $conn->query($sql);

    //print $id . "----" . $cvv . "----" . $bank . "----" . $aNum . "----". $bDay . "----" . $phone . "----" . $address . "----" . $bDay;

    if($result){
        $_SESSION["GenaralSucess"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");

    }else{
        $_SESSION["GenaralUnSucess"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");

    }

}else if(isset($_POST["delete"])){
    
    $pc = $_POST["cp"];
    $id = $_POST["id"];
    $entP = $_POST["password"];
    
    if($pc == $entP){
        $sql = "DELETE FROM customers WHERE id = $id";
        $result = $conn->query($sql);

        if($result){
            $_SESSION["GenaralSucess"] = 1;
            header("Location: http://localhost/Food-Dilivery-System");
        }else{
            $_SESSION["GenaralUnSucess"] = 1;
            header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");
        }
    }else{
        $_SESSION["GenaralUnSucess"] = 1;
        header("Location: http://localhost/Food-Dilivery-System/profile/profile.php"); 
    }
}else if(isset($_POST["ImgUpload"])){

    if(isset($_FILES["profileImg"])){

        $img_name = $_FILES["profileImg"]['name'];
        $img_size = $_FILES["profileImg"]['size'];
        $temp_name = $_FILES["profileImg"]['tmp_name'];
        $error = $_FILES["profileImg"]['error'];
        $id = $_POST["id"];

        if($error ===0){
            if($img_size > 200000){
                header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");
                $_SESSION['imgUnsucess'] = 1;
            }else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_cl = strtolower($img_ex);
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_cl;
                $img_upload_path = "../../imgs/UploadImg/Users/".$new_img_name;
                move_uploaded_file($temp_name,$img_upload_path);

                $sql = "UPDATE customers SET image = '$new_img_name' WHERE id = $id";
                $results = $conn -> query($sql);

                if($results){
                    $_SESSION['imgSucess'] = 1;
                    header("Location: http://localhost/Food-Dilivery-System/profile/profile.php"); 
                }

            }
        }else{
            $_SESSION['imgUnsucess'] = 1;
            header("Location: http://localhost/Food-Dilivery-System/profile/profile.php");
        }
}}

?>



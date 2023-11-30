<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodies</title>
    <link rel="stylesheet" href="profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
</head>

<body>

    <?php 

        require_once "../configs/db.connection.php";
        session_start();
        $mail =  $_SESSION["usrEmail"];

        //getting user data from the database

        $sql = "SELECT * FROM `customers` WHERE email = '$mail'";
        $resqlt = $conn ->query($sql);
        $row = $resqlt -> fetch_array();

        // Turn off all error reporting    !not important to code (to avoid warnings)
        error_reporting(0);

        //sucess update massages

        if($_SESSION["GenaralSucess"] != null){
            print '<script>swal("Success!", "You are Sucessfully registed!", "success");</script>';
            $_SESSION["GenaralSucess"] = null;
        }else if($_SESSION["GenaralUnSucess"] != null){
            print '<script>swal("Sorry!", "Opps, something went wrong. Please try again later.", "error")</script>';
            $_SESSION["GenaralUnSucess"] = null;
        }
    ?>    


    <form action="../configs/profileSettings/profileSettings.php" method="post">
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Profile settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#delete">Delete My Account</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <!--genaral content-->
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label>
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">

                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">User ID</label>
                                    <input type="text" class="form-control" value="<?php echo $row["id"] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $row["id"] ?>" hidden name="id">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $row["name"] ?>" name="updatedName">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control" value="<?php echo $row["email"] ?>" name="updatedEmail">
                                </div>
                                <button type="submit" class="btn btn-primary" name="genaral-submit">Save changes</button>
                                <button type="button" class="btn btn-default" onclick="function5()">Cancel</button>
                            </div>
                        </div>
                        <!--password change-->
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">

                                <div class="form-group">
                                    <input type="password" class="form-control" value="<?php echo $row["password"] ?>" name="cp" hidden>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control"  name="currentPass">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control" name="newPass">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control" name="repeatNewPass">
                                </div>
                                <button type="submit" class="btn btn-primary" name="password-change">Save changes</button>&nbsp;
                                <button type="button" class="btn btn-default" onclick="function5()">Cancel</button>
                            </div>
                        </div>
                        <!--account information-->
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control"  value="<?php echo $row["bank"] ?>" name="bankname">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control" value="<?php echo $row["account_number"] ?>" name="accountNum">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">CVV</label>
                                    <input type="text" class="form-control" value="<?php echo $row["cvv"] ?>" name="cvv">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" class="form-control" value="<?php echo $row["birthday"] ?>" name="bday">
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="<?php echo $row["phone"] ?>" name="phone">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" value="<?php echo $row["address"] ?>" name="address">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="account-change">Save changes</button>&nbsp;
                            <button type="button" class="btn btn-default" onclick="function5()">Cancel</button>
                        </div>

                        <!--account information-->
                        <form action="" method="post">
                                <div class="tab-pane fade" id="delete">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Account Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="delete" style="background:red;border:1px solid red">Delete My Account</button>&nbsp;
                                        <button type="button" class="btn btn-default" onclick="function5()">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>
























    <!--sweet alert-->
    <script>
            function function5() {
                swal({
                title: "Are you sure?",
                text: "Do you want to exsit?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    location.href = "../Home/home.php";
                } else {
                    swal("Your file is safe!");
                }
                });
            }
    </script>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
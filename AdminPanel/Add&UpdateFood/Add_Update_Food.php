<?php

use function PHPSTORM_META\type;

require_once '../../configs/db.connection.php';

if(isset($_POST['updateFood'])) {
    $f_id = (int)$_POST['f_ids'];

    $fQuery = "SELECT * FROM products WHERE p_id = $f_id ";
    $fresult = $conn -> query($fQuery);
    $frows = mysqli_fetch_assoc($fresult);
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <title>FOODIES</title>

    <!---Custom CSS File--->
    <link rel="stylesheet" href="Style.css" />
</head>

<body>
    <section class="container">
        <header>ADD FOOD</header>
        <form action="../../configs/AdminChanges//AddFood.php" class="form" method="post" enctype="multipart/form-data">

            <input type="text" name="pid" value="<?php echo $f_id;  ?>" hidden>

            <div class="input-box">
                <label>Food Name</label>
                <input type="text" name="food-name" value="<?php 
                
                if(isset($_POST['updateFood'])){
                    echo $frows["p_name"];
                }
                
                ?>"  required />
            </div>

            <div class="input-box">
                <label>Food Discription</label>
                <input type="text" name="food-discription" value="<?php
                
                if(isset($_POST['updateFood'])){
                    echo $frows["p_discription"];
                }
                
                ?>" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Food Price</label>
                    <input type="text" name="food-price" value="
                    <?php
                    
                    if(isset($_POST['updateFood'])){
                        echo (int)$frows["p_price"];
                    }

                    ?>
                    "  required />
                </div>
                <div class="input-box">
                    <label>Food Img</label>
                    <input type="file" name="food-img" />
                </div>
            </div>
            <div class="gender-box">
                <h3>Food Catogary</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="food-type"  value="Starter"  
                        
                        <?php
                        if(isset($_POST['updateFood'])){
                            if($frows["p_catogary"] == "Starter"){
                                echo "checked";
                            }
                        }
                        ?>
                        
                        />
                        <label for="check-male">Starter</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="food-type" value="Mains"
                        
                        <?php
                        if(isset($_POST['updateFood'])){
                            if($frows["p_catogary"] == "Mains"){
                                echo "checked";
                            }
                        }
                        ?>
                        
                        />
                        <label for="check-female">Mains</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="food-type" value="Desserts"
                        
                        <?php
                        if(isset($_POST['updateFood'])){
                            if($frows["p_catogary"] == "Desserts"){
                                echo "checked";
                            }
                        }
                        ?>
                        
                        />
                        <label for="check-other">Desserts</label>
                    </div>
                </div>
            </div>
            <?php 
                if(isset($_POST['updateFood'])){
                    echo '<button type="submit" name="updateFood">Update Food</button>';
                    
                }else{
                    
                    echo '<button type="submit" name="addFood">Add Food</button>';
                }
            ?>
        </form>
        <button style="background: red;padding:10px 30px;margin-top:30px;border:1px solid red;cursor:pointer;color:aliceblue;" onclick="location.href='../AdminPanel.php'">Cancel</button>
    </section>
</body>

</html>



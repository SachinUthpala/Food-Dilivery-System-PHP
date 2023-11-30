<?php

require_once '../../configs/db.connection.php';

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
        <form action="../../configs/AdminChanges//AddFood.php" class="form" method="post">
            <div class="input-box">
                <label>Food Name</label>
                <input type="text" name="food-name"  required />
            </div>

            <div class="input-box">
                <label>Food Discription</label>
                <input type="text" name="food-discription" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Food Price</label>
                    <input type="text" name="food-price"  required />
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
                        <input type="radio" id="check-male" name="food-type"  value="Starter" checked/>
                        <label for="check-male">Starter</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="food-type" value="Mains"/>
                        <label for="check-female">Mains</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="food-type" value="Desserts"/>
                        <label for="check-other">Desserts</label>
                    </div>
                </div>
            </div>
            <button type="submit" name="addFood">Add Food</button>
            <button style="background: red;" onclick="location.href='../AdminPanel.php'">Cancel</button>
        </form>
    </section>
</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_POST["delete"];
        if(!$con = mysqli_connect("localhost","root","12345678","menu")){
            echo "con error";
        }
        if(!$sql  = "DELETE from `product` WHERE `product`.`product_id` = $id"){
            echo "sql error";
        }
        if( !$result = mysqli_query($con,$sql) ){
            echo "query error";
        }
       
        mysqli_close($con);
    ?>
    <div class="center-row">
        <h1 class="white-card">item deleted</h1>
        <form action="pos.php">
            <input type="submit" value="done" class="submit-ed">
        </form>
    </div>
</body>
</html>
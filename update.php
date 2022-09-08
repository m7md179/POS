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
        $idIn=$_POST["idIn"];
        $newIdIn=$_POST["newIdIn"];
        $nameIn=$_POST["nameIn"];
        $priceIn=$_POST["priceIn"];
        $typeIn= isset( $_POST["typeIn"]) ? $_POST["typeIn"]:false;
        echo $typeIn;
        if(!$typeIn){  
            echo "didnt get typeIn";
        } 
        if(!$con = mysqli_connect("localhost","root","12345678","menu")){
            echo "con error";
        }
        if(!$sql  = "UPDATE `menu`.`product` SET `product_id` = '$newIdIn',
        `product_name` = '$nameIn',
        `product_category` = '$typeIn',
        `product_price` = '$priceIn' WHERE `product`.`product_id` =$idIn LIMIT 1 
            "){
            echo "sql error";
        }
        if( !$result = mysqli_query($con,$sql) ){
            echo "query error";
        }

        mysqli_close($con);
    ?>
    <div class="center-row">
        <h1 class="white-card">item updated</h1>
        <form action="pos.php">
            <input type="submit" value="done" class="submit-ed">
        </form>
    </div>
</body>
</html>
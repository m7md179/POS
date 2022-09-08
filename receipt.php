<?php

    $Id = array();
    $num = array();
    $type =array();
    $index = 0;
    $drinkId = array();
    $drink = array();
    $drinkIndex = 0;
    $desId = array();
    $desIndex = 0;
    $sdId = array();
    $sdIndex = 0;
    if(!$con = mysqli_connect("localhost","root","12345678","menu")){
        echo "connection error";
    }
    if(!$sql = "SELECT * FROM product "){
        echo "sql error";
    }
    if( !$result = mysqli_query($con,$sql) ){
        echo "query error";
    }

    if (mysqli_num_rows($result) > 0) {
       
        while($row = mysqli_fetch_assoc($result)) {

            if($type[$index]=$row["product_category"] == "food"){
            
            $Id[$index] = $row["product_id"];
            $price[$index] = $row["product_price"];
            $name[$index] = $row["product_name"];
            
            $index++;
        }else if($type[$index]=$row["product_category"] == "drink"){
            $drinkId[$drinkIndex]= $row["product_id"];
            $drinkprice [$drinkIndex] = $row["product_price"];
            $drinkname [$drinkIndex] = $row["product_name"];
            $drinkIndex++;
        }else if($type[$index]=$row["product_category"] == "dessert"){
            $desId[$desIndex]= $row["product_id"];
            $desprice [$desIndex] = $row["product_price"];
            $desname [$desIndex] = $row["product_name"];
            $desIndex++;
        }else if($type[$index]=$row["product_category"] == "side dish"){
            $sdId[$sdIndex]= $row["product_id"];
            $sdprice [$sdIndex] = $row["product_price"];
            $sdname [$sdIndex] = $row["product_name"];
            $sdIndex++;
        }            
        }
       
    } else {
        echo "0 results";
    }

    $totel = 0;
    
    if(!$drink = $_POST["drink"]){
        echo "drink error";
    }
    if(!$num = $_POST["num"]){
        echo "num post error";
    }
    if(!$dessert = $_POST["dessert"]){
        echo "dessert post error";
    }
    if(!$sd = $_POST["sd"]){
        echo "sd post error";
    }
    
    // print_r($drinkId);
    // print_r($drinkprice);
    // print_r($drinkname);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="center">
        <div class="edit-box">
            <div>
                <h1 class="center type-title">receipt</h1>
                
            </div>
            <table>
                
                <tr>
                    <th class="th">DESCRIPTION</th>
                    <th class="th">UNIT PRICE</th>
                    <th class="th">AMOUNT</th>
                </tr>
                <?php 
        for ($i=0; $i <$index ; $i++) {
            if($num[$i]!=0) {?>
                <tr>
                    <th class="td"><?php echo $name[$i]?></th>
                    <th class="td"><?php echo $price[$i]?></th>
                    <th class="td"><?php echo $num[$i]?></th>
                </tr>            
                <?php   
                $totel+= $price[$i]*$num[$i];
            }
        }?>
        <?php
        for ($j=0; $j <$drinkIndex ; $j++) {
            if($drink[$j]!=0) {?>
                <tr>
                    <th class="td"><?php echo $drinkname[$j]?></th>
                    <th class="td"><?php echo $drinkprice[$j]?></th>
                    <th class="td"><?php echo $drink[$j]?></th>
                </tr>  
                <?php
                $totel+= $drinkprice[$j]*$drink[$j];
            }
        }?>
        <?php
        for ($k=0; $k <$desIndex ; $k++) {
            if($dessert[$k]!=0) {?>
                <tr>
                    <th class="td"><?php echo $desname[$k]?></th>
                    <th class="td"><?php echo $desprice[$k]?></th>
                    <th class="td"><?php echo $dessert[$k]?></th>
                </tr>  
                <?php 
                $totel+= $desprice[$k]*$dessert[$k];
            }
        }?>
        <?php
        for ($l=0; $l <$desIndex ; $l++) {
            if($sd[$l]!=0) {?>
                <tr>
                    <th class="td"><?php echo $sdname[$l]?></th>
                    <th class="td"><?php echo $sdprice[$l]?></th>
                    <th class="td"><?php echo $sd[$l]?></th>
                </tr>  
                <?php
                $totel+= $sdprice[$l]*$sd[$l];
            }
        }?>
            <tr>
                <th></th>
                <th></th>
                <th class="tf">
                    <?php echo "totel price: ". $totel ."JD";?>
                </th>
            </tr>
            
        </table>
        <form action="pos.php">
            <input type="submit" value="done" class="submit-ac">
        </form>
    </div>        
</div>
</body>
</html>
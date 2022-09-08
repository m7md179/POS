<?php 

$names = array();
$prices = array();
$id= array();
$type= array();
$index=0;
if(!$con = mysqli_connect("localhost","root","12345678","menu")){
    echo "con error";
}
if(!$sql  = "SELECT * FROM product "){
    echo "sql error";
}
if( !$result = mysqli_query($con,$sql) ){
    echo "query error";
}

if (mysqli_num_rows($result) > 0) {
    // OUTPUT DATA OF EACH ROW
    while($row = mysqli_fetch_assoc($result)) {
        $id[$index] = $row["product_id"];
        $names[$index] = $row["product_name"];
        $prices[$index]= $row["product_price"];
        $type[$index] = $row["product_category"];
        $index++;
    }
} else {
    echo "0 results";
}


mysqli_close($con)
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="space-between head-label">
    <h2 id="title"></h2>
    <img src="https://bit.ly/3cux4zy" alt="restaurant logo" width="75px" height="75px" id="logo" style="margin-left: 70px"/>
        <form action="edit.html">
            <div id="edit" class="margin-top">
                <input type="submit" value="edit" class="edit">
            </div>
        </form>
    </div>
<div class="contaner" >
    <form action="receipt.php" method="post">
        <h3 class="text-center type-title"> FOOD </h3>
        <div class="grid">
            <?php for($j=0; $j<$index;$j++){ ?>
                <?php if($type[$j] == "food"){?>
                    
                        <div class="item"> 
                            <label>
                                <div class="item-title"><?php echo htmlspecialchars($names[$j]); ?></div>
                                <div><?php echo htmlspecialchars($prices[$j]."JD"); ?></div>
                                <input  type="number" name="num[]" min="0" max="20" value="0" >
                            </label>
                        </div>
                    
                <?php }?>                                    
            <?php }
            ?>
        </div>    
            
        <h3 class="text-center type-title"> DRINKS </h3>
        <div class="grid">
            <?php for($k=0; $k<$index;$k++){ ?>
                <?php if($type[$k] == "drink"){?>
                    <div class="item">
                        <label>
                            <div class="item-title"><?php echo htmlspecialchars($names[$k]); ?></div>
                            <div><?php echo htmlspecialchars($prices[$k]."JD"); ?></div>
                            <input type="number" name="drink[]" min="0" max="20" value="0">
                        </label>    
                    </div>
                <?php }?>                        
            <?php }
            ?>    
        </div>
        <h3 class="text-center type-title"> DESSERT </h3>
        <div class="grid">
            <?php for($l=0; $l<$index;$l++){ ?>
                <?php if($type[$l] == "dessert"){?>                
                    <div class="item">
                        <label>
                            <div class="item-title"><?php echo htmlspecialchars($names[$l]); ?></div>
                            <div><?php echo htmlspecialchars($prices[$l]."JD"); ?></div>
                            <input type="number" name="dessert[]" min="0" max="20" value="0">
                        </label>
                    </div>            
                <?php }?>       
            <?php }
            ?>
        </div>
        
        <h3 class="text-center type-title"> SIDE DISH </h3>
        <div class="grid">
            <?php for($m=0; $m<$index;$m++){ ?>
                <?php if($type[$m] == "side dish"){?>
                    <div class="item">
                        <label>
                            <div class="item-title"><?php echo htmlspecialchars($names[$m]); ?></div>
                            <div class="price-title"><?php echo htmlspecialchars($prices[$m]."JD"); ?></div>
                            <input type="number" name="sd[]" min="0" max="20" value="0" >
                        </label>
                    </div>
                <?php }?>                
            <?php }
            ?>
        </div>                
        
        <input type="submit" class="submit-button">
    </form>
</div>
</body>
</html>
<?php include('./config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dbCon = new mysqli($DBServer,$username,$password,$dbName);
        if($dbCon->connect_error){
            die("DB error: ".$dbCon->connect_error);
        }else{
            if(isset($_POST['productName']) && isset($_POST['productPrice'])){
                $newProductName = $_POST['productName'];
                $newProductPrice = $_POST['productPrice'];
                $productID = $_POST['productID'];
                $updateQuery = "UPDATE product_tb SET productName='$newProductName', productPrice='$newProductPrice' WHERE productID=$productID";
                if($dbCon->query($updateQuery)===true){
                    echo "<h2>Record updated</h2>";
                }else{
                    echo "<h2>Record not updated. error:".$dbCon->error."</h2>";
                }
            }
            if(isset($_GET['id'])){
                $deleteQuery = "DELETE FROM product_tb WHERE productID=".$_GET['id'];
                if($dbCon->query($deleteQuery)===true){
                    echo "<h2>Record been deleted</h2>";
                }else{
                    echo "<h2>Record has not been deleted due to: ".$dbCon->error."</h2>";
                }
            }
            $selectQuery = "SELECT * FROM product_tb ORDER BY productPrice";
            //if you want ot order the output in decending use DESC keyword at the end.
            $products_list = $dbCon->query($selectQuery);
            if($products_list->num_rows>0){
                echo "<table><tr><th>ID</th><th>Product Name</th><th>product Price</th></tr>";
                while($product = $products_list->fetch_assoc()){
                    echo "<tr><td>".$product['productID']."</td><td>".$product['productName']."</td><td>$".$product['productPrice'].
                    "</td><td><a href='editproduct.php?id=".$product['productID']."'>Edit</a></td>".
                    "<td><a href='".$_SERVER['PHP_SELF']."?id=".$product['productID']."'>Delete</a></td></tr>";
                }
                echo "</table>";
            }
            $dbCon->close();
        }
    ?>
</body>
</html>
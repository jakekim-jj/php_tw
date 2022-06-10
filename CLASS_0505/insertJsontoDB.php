<?php include('./config.php');?>
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
        $handler = fopen('./MOCK_DATA.json','r');
        $jsonData = fread($handler,filesize('./MOCK_DATA.json'));
        $jsonArray = json_decode($jsonData,true);
        $dbCon = new mysqli($DBServer,$username,$password,$dbName);
        if($dbCon->connect_error){
            die("Database connection er ror: ".$dbCon->connect_error);
        }else{
            $insertQuery = $dbCon->prepare("INSERT INTO product_tb (productName, productPrice) VALUES(?,?)");
            $insertQuery->bind_param("sd",$productName,$productPrice);
            foreach($jsonArray as $row){
                $productName = $row['productName'];
                $productPrice = $row['price'];
                $insertQuery->execute();
            }
            echo "<h2>Data has been stored</h2>";
            $insertQuery->close();
            $dbCon->close();
        }
    ?>
</body>
</html>
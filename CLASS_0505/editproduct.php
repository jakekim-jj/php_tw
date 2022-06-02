<?php 
include("./config.php"); 
if(isset($_GET['id'])){
    $dbcon = new mysqli($DBServer,$username,$password,$dbName);
    if($dbcon->connect_error){
        echo "DB ERROR";
    }else{
        $id = $_GET['id'];
        $select = "SELECT * FROM product_tb WHERE productID=$id";
        $result = $dbcon->query($select);
        if($result->num_rows>0){
            $product = $result->fetch_assoc();
            $productName = $product['productName'];
            $productPrice = $product['productPrice'];
        }
        $dbcon->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="displayproduct.php">
        <input type="text" name="productID" value="<?php echo $id; ?>" readonly/>
        <br/><input type="text" name="productName" value="<?php echo $productName; ?>"/>
        <br/><input type="text" name="productPrice" value="<?php echo $productPrice ?>"/>
        <br/><button type="submit">Edit</button>
    </form>

</body>
</html>
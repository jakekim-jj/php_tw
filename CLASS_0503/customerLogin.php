<?php include("./config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <input type="email" name="customerEmail" placeholder="Write your email address"/>
        <br/><input type="password" name="customerpass" placeholder="write your password"/>
        <button type="submit">Login</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $dbcon = new mysqli($DBServer,$username,$password,$dbName);
            if($dbcon->connect_error){
                die("Connection error:".$dbcon->connect_error);
            }
            $email = $_POST['customerEmail'];
            $pass = $_POST['customerpass'];
            $selectQuery = "SELECT * FROM customers_tb WHERE 
            email='$email' AND password='$pass'";
            $result = $dbcon->query($selectQuery);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo "id".$row['customer_id']." Name:".$row['customerName']." Email:".$row['email']." address:".$row['customerAddress'];
                }
            }else{
                echo "wrong username/password";
            }
            $dbcon->close();
        }
    ?>
</body>
</html>
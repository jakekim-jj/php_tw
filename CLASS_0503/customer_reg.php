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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="email" name="customerEmail" placeholder="Write you email address"/><br/>
        <input type="password" name="customerPsw" placeholder="Write your password here"/><br/>
        <input type="text" name="customerName" placeholder="Write your name"/><br/>
        <textarea name="customerAddr" placeholder="Write your postal address"></textarea><br/>
        <button type="submit">Register</button>
    </form>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $dbCon = new mysqli($DBServer,$username,$password,$dbName);
            //create a connection to the DB
            if($dbCon->connect_error){
                die("Connection failed:".$dbCon->connect_error);
            }
            $userEmail = $_POST['customerEmail'];
            $userPass = $_POST['customerPsw'];
            $name = $_POST['customerName'];
            $addr = $_POST['customerAddr'];
            $insertQuery = "INSERT INTO customers_tb 
            (customerName,email,password,customerAddress)
            VALUES('$name','$userEmail','$userPass','$addr')";
            if($dbCon->query($insertQuery)===true){
                echo "<h2>Information registered successfully</h2>";
            }else{
                echo "Error:".$dbCon->error;
            }
            $dbCon->close();//close the database connection
        }
    ?>
</body>
</html>
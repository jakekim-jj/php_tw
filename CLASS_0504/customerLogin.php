<?php 
    session_start();
    include("./config.php");
    if(isset($_COOKIE['username'])){
        $loginusername = $_COOKIE['username'];
        $bgcolor = $_COOKIE['txt_bg'];
    }else{
        $loginusername = "";
        $bgcolor = "white";
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
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <input type="email" name="customerEmail" placeholder="Write your email address"
        style="background-color: <?php echo $bgcolor; ?>"
        value="<?php echo $loginusername; ?>"/>
        <br/><input type="password" name="customerpass" placeholder="write your password"/>
        <br/><input type="color" name="bgcolor"/>choose a color
        <br/><input type="checkbox" name="rem_user"/>Remember me
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
            email='$email'";
            $result = $dbcon->query($selectQuery);
            if($result->num_rows>0){
                $cookieValue = "";
                while($row = $result->fetch_assoc()){
                    //echo "id".$row['customer_id']." Name:".$row['customerName']." Email:".$row['email']." address:".$row['customerAddress'];
                    $salt = $row['salt'];
                    $hashedPass = $row['password'];
                    if(password_verify($pass.$salt,$hashedPass)){
                        $cookieValue = $row['email'];
                        $_SESSION['customerName'] = $row['customerName'];
                        if($_POST['rem_user']=="on"){
                            $cookieName = "username";
                            $cookieExp = time()+(86400+3);
                            $colorcookie_key = "txt_bg";
                            $colorcookie_value = $_POST["bgcolor"];
                            setcookie($cookieName,$cookieValue,$cookieExp,"/");
                            setcookie($colorcookie_key,$colorcookie_value,$cookieExp,"/");
                        }
                        header('Location:welcome.php');
                        exit;
                    }else{
                        echo "wrong username/password";
                    }
                }
            }else{
                echo "wrong username/password";
            }
            $dbcon->close();
        }
    ?>
</body>
</html>
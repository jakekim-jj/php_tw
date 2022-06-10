<?php 
session_start();
include('./config.php');
include('./employeeClass.php');
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        username<input type="email" name="username" />
        password<input type="password" name="pass" />
        <button type="submit">Login</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $user = $_POST['username'];
            $pass = $_POST['pass'];
            $dbcon = new mysqli($DBServer,$username,$password,$dbName);
            if($dbcon->connect_error){
                die("DB connection error: ".$dbcon->connect_error);
            }else{
                $selectQuery = "SELECT * FROM userinfo_tb WHERE email='$user'";
                $result = $dbcon->query($selectQuery);
                if($result->num_rows>0){
                    $user = $result->fetch_assoc();
                    $salt = $user['salt'];
                    $hashedPass = $user['password'];
                    if(password_verify($pass.$salt,$hashedPass)){
                        $empObj = new Employee_Obj($user['employeeId'],$user['firstName'],$user['lastName'],$user['email'],$user['telephone'],$user['address'],$user['dob'],$user['ed'],$user['positionId'],$user['departmentId']);
                        $_SESSION['employee']=serialize($empObj);
                        $_SESSION['timeout']=time();
                        header('Location:userEdit.php');
                        exit();
                    }else{
                        echo "username/password invalid";
                    }
                }else{
                    echo "username/password invalid";
                }
                $dbcon->close();
            }
        }
    ?>
</body>
</html>
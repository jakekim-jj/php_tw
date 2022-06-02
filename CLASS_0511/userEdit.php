<?php 
    session_start();
    include('./config.php');
    include('./employeeClass.php');
    $departments = [];
    $positions = [];
    if(isset($_SESSION['timeout'])){
        if(timeout_checker($_SESSION['timeout'],600)){
            session_unset();
            session_destroy();
            header('Location:login.php');
            exit();
        }else{
            $_SESSION['timeout']=time();
        }
    }else{
        session_destroy();
        header('Location:login.php');
        exit();
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
<?php
        $empObj = unserialize($_SESSION['employee']);
        $dbcon = new mysqli($DBServer,$username,$password,$dbName);
        $selectQuery = "SELECT departmentId,departmentName FROM department_tb";
        $selectPositions = "SELECT positionId,positionName FROM position_tb";
        $result = $dbcon->query($selectQuery);
        $result2 = $dbcon->query($selectPositions);
        while($row = $result->fetch_assoc()){
            $departments[$row['departmentId']]=$row['departmentName'];
        }
        while($row = $result2->fetch_assoc()){
            $positions[$row['positionId']]=$row['positionName'];
        }
        $dbcon->close();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $dob = $_POST['dob'];
            if(!empty($_POST['pass'])){
                $salt = time();
                $pass = $_POST['pass'];
                $hashedPass = password_hash($pass.$salt,PASSWORD_DEFAULT);
                $updateQuery = "UPDATE userinfo_tb SET firstName='$fname',lastName='$lname',
                email='$email',telephone='$telephone',dob='$dob',password='$hashedPass',salt='$salt' WHERE employeeId=".$empObj->getEmployeeID();
            }else{
                $updateQuery = "UPDATE userinfo_tb SET firstName='$fname',lastName='$lname',
                email='$email',telephone='$telephone',dob='$dob' WHERE employeeId=".$empObj->getEmployeeID();
            }
            $dbcon = new mysqli($DBServer,$username,$password,$dbName);
            if($dbcon->connect_error){
                die("DB error");
            }else{
                
                if($dbcon->query($updateQuery)===true){
                    echo "Information Updated";
                    $empObj->setFirstName($fname);
                    $empObj->setLastName($lname);
                    $empObj->setEmail($email);
                    $empObj->setTelephone($telephone);
                    $empObj->setDob($dob);
                    $_SESSION['employee']=serialize($empObj);
                }else{
                    echo "Problem";
                }
                $dbcon->close();
            }
        }
        
    ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="fname" value="<?php echo $empObj->getFirstName(); ?>"/><br/>
        <input type="text" name="lname" value="<?php echo $empObj->getLastName(); ?>"/><br/>
        <input type="email" name="email" value="<?php echo $empObj->getEmail(); ?>"/><br/>
        <input type="text" name="telephone" value="<?php echo $empObj->getTelephone(); ?>"/><br/>
        <input type="date" name="dob" value="<?php echo $empObj->getDob(); ?>"/><br/>
        <input type="date" name="ed" readonly value="<?php echo $empObj->getEd(); ?>"/><br/>
        <select name="dep">
            <?php
                foreach($departments as $depID=>$depName){
                    if($depID==$empObj->getDepartmentID()){
                        echo "<option value='$depID' selected>$depName</option>";
                    }else{
                        echo "<option value='$depID'>$depName</option>";
                    }
                    
                }
            ?>
        </select><br/>
        <select name="pos">
            <?php
                foreach($positions as $posID=>$posName){
                    if($posID==$empObj->getPositionID()){
                        echo "<option value='$posID' selected>$posName</option>";
                    }else{
                        echo "<option value='$posID'>$posName</option>";
                    }
                }
            ?>
        </select><br/>
        <input type="password" name="pass" /><br/>
        <button type="submit">Update</button>
    </form>
    
</body>
</html>
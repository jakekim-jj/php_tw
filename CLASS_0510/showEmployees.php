<?php
    include('./config.php');
    include('./employeeClass.php');
    session_start();
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
    if(isset($_GET['id'])){
        $dbcon = new mysqli($DBServer,$username,$password,$dbName);
        $selectQuery = "SELECT * FROM userinfo_tb WHERE employeeId=".$_GET['id'];
        $employeeList = $dbcon->query($selectQuery);
        if($employeeList->num_rows>0){
            $employee = $employeeList->fetch_assoc();
            $employeeObj = new Employee_Obj($employee['employeeId'],$employee['firstName'],$employee['lastName'],$employee['email'],$employee['telephone'],$employee['address'],$employee['dob'],$employee['ed']);
            $dbcon->close();
            $_SESSION['selected_emp']=serialize($employeeObj);
            header('Location:employeeimg.php');
            exit();
        }
    }
        $dbcon = new mysqli($DBServer,$username,$password,$dbName);
        if($dbcon->connect_error){
            die("DB error");
        }else{
            $selectQuery = "SELECT * FROM userinfo_tb";
            $employeeList = $dbcon->query($selectQuery);
            if($employeeList->num_rows>0){
                echo "<table><tr><th>FirstName</th><th>LastName</th></tr>";
                while($employee = $employeeList->fetch_assoc()){
                    echo "<tr><td>".$employee['firstName']."</td><td>".$employee['lastName']."</td>
                    <td><a href='".$_SERVER['PHP_SELF']."?id=".$employee['employeeId']."'>Select</a></td></tr>";
                }
                echo "</table>";
                $dbcon->close();
            }else{
                echo "no employees founded";
            }
        }
    ?>
</body>
</html>
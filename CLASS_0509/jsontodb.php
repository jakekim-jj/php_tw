<?php
    include('./config.php');
    // $fileHandler_position = fopen('./position.json','r');
    // $jsonData_position = fread($fileHandler_position,filesize('./position.json'));
    // $filehandler_dep = fopen('./dep.json','r');
    // $jsonData_dep = fread($filehandler_dep,filesize('./dep.json'));
    $filehandler_user = fopen('./user_info.json','r');
    $jsonData_user = fread($filehandler_user,filesize('./user_info.json'));
    $dbcon = new mysqli($DBServer,$username,$password,$dbName);
    if($dbcon->connect_error){
        die('Connection Error');
    }else{
        // $positions = json_decode($jsonData_position,true);
        // $departments = json_decode($jsonData_dep,true);
        $users = json_decode($jsonData_user,true);
        // $insertPositions = $dbcon->prepare("INSERT INTO position_tb (positionName,salary) VALUES(?,?)");
        // $insertPositions->bind_param('sd',$positionName,$salary);
        // $insertDep = $dbcon->prepare("INSERT INTO department_tb (departmentName,departmentAddress) VALUES(?,?)");
        // $insertDep->bind_param('ss',$depName,$depAddress);
        $insertUser = $dbcon->prepare("INSERT INTO userInfo_tb (firstName,lastName,email,password,
        salt,telephone,address,dob,ed,departmentId,positionId) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $insertUser->bind_param('sssssssssii',$firstName,$lastName,$email,$password,$salt,$telephone,$address,$dob,$ed,$depId,$posId);
        // foreach($positions as $value){
        //     $positionName = $value['positionName'];
        //     $salary = $value['salary'];
        //     $insertPositions->execute();
        // }
        // echo 'Positions been added<br/>';
        // $insertPositions->close();
        // foreach($departments as $value){
        //     $depName = $value['depName'];
        //     $depAddress = $value['depAddress'];
        //     $insertDep->execute();
        // }
        
        // echo 'Departments been added<br/>';
        // $insertDep->close();
        foreach($users as $value){
            $firstName = $value['firstName'];
            $lastName = $value['lastName'];
            $email = $value['email'];
            $salt = time();
            $password = password_hash($value['password'].$salt,PASSWORD_DEFAULT);
            $telephone = $value['telephone'];
            $address = $value['address'];
            $dob = $value['dob'];
            $ed = $value['ed'];
            $depId = $value['departmentId'];
            $posId = $value['positionId'];
            $insertUser->execute();
        }
        echo "user has been added<br/>";
        $insertUser->close();
        $dbcon->close();       

    }

?>
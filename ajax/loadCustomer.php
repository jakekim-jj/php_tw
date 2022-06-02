<?php
    require('./config.php');
    $sqlCon = new mysqli($servername,$username,$password,$dbname);
    if($sqlCon->connect_error){
        exit('DB Error');
    }
    $selectCommand = "SELECT username,customername FROM customer_tb";
    $result = $sqlCon->query($selectCommand);
    $output = "";
    while($row = $result->fetch_assoc()){
        $output .= "<option value='".$row['username']."'>".$row['customername']."</option>";
    }
    $sqlCon->close();
    echo $output;
?>
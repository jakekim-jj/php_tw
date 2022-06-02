<?php
    require('./config.php');
    $sqlCon = new mysqli($servername,$username,$password,$dbname);
    if($sqlCon->connect_error){
        exit('DB Error');
    }
    $selectCommand = "SELECT * FROM customer_tb WHERE username=?";
    $customer = $sqlCon->prepare($selectCommand);
    $customer->bind_param("s",$_GET['uname']);
    $customer->execute();
    $customer->store_result();
    $customer->bind_result($customerid,$C_username,$C_name,$phone,$email);
    $customer->fetch();
    $customer->close();
    $sqlCon->close();
    echo "<table>".
        "<tr><th>Customer ID</th>".
        "<td>".$customerid."</td></tr>".
        "<tr><th>Username</th>".
        "<td>".$C_username."</td></tr>".
        "<tr><th>Customer Name</th>".
        "<td>".$C_name."</td></tr>".
        "<tr><th>Phone</th>".
        "<td>".$phone."</td></tr>".
        "<tr><th>Email</th>".
        "<td>".$email."</td></tr></table>";

?>
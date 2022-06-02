<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    echo ("result is ".$num1+$num2);
?>
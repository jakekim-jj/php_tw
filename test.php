<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    $name = $_POST['name'];
    $family = $_POST['family'];
    $country = $_POST['country'];
    echo("$name $family from $country Welcome to Canada");
?>
<?php
    header('Access-Control-Allow-Origin: *');
    $name = $_POST['name'];
    $family = $_POST['family'];
    $country = $_POST['country'];
    echo("$name $family from $country Welcome to Canada");
?>
<?php
$DBServer = 'localhost';
$username = 'root';
$password = '';
$dbName = 'hr_db';
function timeout_checker($currentTimeValue,$maxTime){
    if((time()-$currentTimeValue)>$maxTime){
        return true; //time has passed the maximum timeout
    }
    return false; //time has not passed the maximum timeout
}
?>
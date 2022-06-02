<?php
    session_start();
    if(isset($_SESSION['timeout_value']) && (time() - $_SESSION['timeout_value']>30)){
        //setting the time out to be 1 minute
        session_unset();
        session_destroy();
        header("Location:timeoutsession1.php");
        exit();
    }
    $_SESSION['timeout_value']=time();
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
    echo $_SESSION['username'];
    ?>
</body>
</html>
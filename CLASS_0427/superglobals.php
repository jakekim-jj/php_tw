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
        echo $_SERVER['PHP_SELF']."<br/>";
        ECHO $_SERVER['SERVER_NAME']."<br/>";
        echo $_SERVER['HTTP_HOST']."<br/>";
        echo $_SERVER['REMOTE_PORT']."<br/>";
        // echo $_SERVER['SCRIPT_URI']."<br/>";
    ?>
</body>
</html>
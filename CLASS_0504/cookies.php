<?php
    $cookie_key = "username";
    $cookie_value = "Milad Torabi";
    $cookie_exp = time()+(86400*1);
    setcookie($cookie_key,$cookie_value,$cookie_exp,"/");
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
        if(isset($_COOKIE[$cookie_key])){
            echo "cookie has been set value is:".$_COOKIE[$cookie_key];
        }else{
            echo "cookie is not defined.";
        }
    ?>
</body>
</html>
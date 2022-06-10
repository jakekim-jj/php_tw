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
        echo hash("sha512","test")."<br/>";
        echo hash("sha512","test".time())."<br/>";
        echo "test".time()."<br/>";
        echo password_hash("test".time(),PASSWORD_DEFAULT);
    ?>
</body>
</html>
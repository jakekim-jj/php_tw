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
        echo(max(10,25,5,4,3));
        echo "<br>";
        echo(abs(-15.12));
        echo "<br>";
        echo(round(0.40));
        echo "<br>";
        echo(rand(10,100));
        echo "<br>";
        echo(random_bytes(10));
        $price = 250;
        $discount = 15;
        echo "<br>";
        echo $price - $price*($discount/100);
        echo "<br>";
        $a = 5;
        echo $a--;
        echo "<br>";
        echo $a;

    ?>
</body>
</html>
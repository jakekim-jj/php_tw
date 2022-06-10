<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php
    $a = 5;
    $b = 6.5;
    $c = "I'm the next line";
    echo $a + $b;
    echo "Hello World!";
    echo "<b>test bold</b><br/>";
    ?></p>
    <h1>Flag of my country</h1>
    <img src="
    <?php
        $src = "./img/Flag-Canada.jpg";
        echo $src;
    ?>
    " style="height: 30%; width: 30%;"/>
    <?php
        $src = "./img/Flag-Canada.jpg";
        echo "<img src='",$src,"' style='height:30%; width:30%;'/>";
    ?>
</body>
</html>
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
        $favList = [
            ["volvo","benz","Ford"],
            ["Pizza","Pasta","Fish&Chips"],
            ["Red","Blue","Black"]
        ];
        echo "<ul>";
            for($row=0;$row<3;$row++){
                echo "<li>";
                for($col=0;$col<3;$col++){
                    echo $favList[$row][$col],", ";
                }
                echo "</li>";
            }
        echo "</ul>";
    ?>
</body>
</html>
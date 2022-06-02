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
        $a = 0;
        $b = 5;
        if($b == 0){
            echo "Not possible";
        }else{
            $c = $a/$b;
        }

        $markGrade = "C";
        switch($markGrade){
            case "A":
                $academic = "Perfect";
            break;
            case "B+":
                $academic = "Good";
            break;
            case "B":
                $academic = "Not Bad";
            break;
            case "C":
                $academic = "Try Harder";
            break;
            default:
                $academic = "REALLY??!";
        }      
        $color = "red";
        echo "<h1 style='background-color:$color'>$academic</h1>";
    ?>
    
</body>
</html>
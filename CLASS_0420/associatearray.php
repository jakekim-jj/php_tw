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
        $students = ["Miguel"=>50,"Roy"=>80,"Juan"=>85,"Milad"=>45,"Jose"=>70];
        $max = 0;
        $nameMax = "";
        $min = 100;
        $nameMin = "";
        foreach($students as $key => $value){
            if($value>$max){
                $max = $value;
                $nameMax = $key;
            }
            if($value<$min){
                $min = $value;
                $nameMin = $key;
            }
        }
        echo "Highest Score:$nameMax:$max<br/>";
        echo "Lowest Score:$nameMin:$min<br/>";
        
    ?>
</body>
</html>
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
        $key = "Tesla";
        $car1 = "BMW";
        $cars = array($car1,"landrover","Benz","Tesla","Lamborgini","Porsche");
        //show the value of this array variable
        $idx = 0;
        $keyIndex=-1;
        while($idx<count($cars)){
            if($cars[$idx]==$key){
                $keyIndex = $idx;
                break; //will stop the loop from going forward
            }
            //echo $cars[$idx],"<br/>";
            $idx++;
        }
        echo $keyIndex;
    ?>
</body>
</html>
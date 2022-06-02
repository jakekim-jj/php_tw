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
        $a = 10;
        $b = 20;
        $tmp = $a;
        $a = $b;
        $b = $tmp;
        $marks = [80,65,55.7,70,95,95.4,55.4];
        
        $max = $marks[0];
        $min = $marks[0];
        for($idx=0;$idx<count($marks);$idx++){
            if($max<$marks[$idx]){
                $max = $marks[$idx];
            }
            if($min>$marks[$idx]){
                $min = $marks[$idx];
            }
        }
        echo $max," ",$min,"<br/>";
        ////////SORTING
        for($idx1=0;$idx1<count($marks);$idx1++){
            for($idx2=$idx1+1;$idx2<count($marks);$idx2++){
                if($marks[$idx1]<$marks[$idx2]){
                    $tmp = $marks[$idx1];
                    $marks[$idx1] = $marks[$idx2];
                    $marks[$idx2] = $tmp;
                }
            }
        }
        for($idx=0;$idx<count($marks);$idx++){
            echo "$marks[$idx], ";
        }
    ?>
</body>
</html>
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

        $students = [
            "Emma"=>["green","skyblue","black"],
            "Juan"=>["black","green","orange"],
            "Matheus"=>["red","black","blue"]
        ];
        echo "<table><tr><th>Name</th><th>Color1</th><th>Color2</th><th>Color3</th></tr>";
        foreach($students as $studentName => $colors){
            echo "<tr><td>$studentName</td>";
            for($idx=0;$idx<count($colors);$idx++){
                echo "<td>",$colors[$idx],"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        associateArray_CMP($students);

        function associateArray_CMP($associateArray){
            foreach($associateArray as $selectedStu => $selectedColors){
                foreach($associateArray as $nextStu => $nextColors){
                    $commonColor = "";
                    if($selectedStu==$nextStu){
                        continue;
                    }
                    foreach($selectedColors as $selectedCol){
                        foreach($nextColors as $nextCol){
                            if($selectedCol==$nextCol){
                                $commonColor = $commonColor.",".$selectedCol;
                            }
                        }
                    }
                    if($commonColor!=""){
                        echo "$selectedStu has common colors with $nextStu: $commonColor<br/>";
                    }
                }
            }
        }
       
    ?>
</body>
</html>
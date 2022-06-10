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
        $student = ["10"=>["Name"=>"Miguel","Grade1"=>56,"Grade2"=>60],
                    "11"=>["Name"=>"Juan","Grade1"=>80,"Grade2"=>70]];
        $json_data = json_encode($student);
        //json_encode will convert the array into json format
        $json_handler = fopen("./files/student.json","w");
        fwrite($json_handler,$json_data);
        echo "File created.";
        fclose($json_handler);
    ?>
</body>
</html>
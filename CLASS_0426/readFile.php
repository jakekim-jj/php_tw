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
        $file_handler = fopen("./files/test.txt","r");
        //echo fread($file_handler,filesize("./files/test.txt"));
        //fread will read the entire file using the filesize as its second parameter.
        //filesize will return the size of the file.
        while(!feof($file_handler)){
            //feof will chech if it's the end of the file or not.
            //this loop will read from file line by line until it reaches to the end of the file
            echo fgets($file_handler)."<br/>";
            // fgets will only read one single line at a time
        }
        fclose($file_handler);
    ?>
</body>
</html>
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
        $file_pointer = fopen("./fhhg.txt","a") or die("Unable to open the file");
        //to open a file and create a pointer inside the file.
        //r => open file in read only mode
        //w => open the file in write only mode. If file doesn't exists, it will creat it.
        //a => open the file in appending mode. Meaning the new data will be added to the end of the file. Create a file if doesn't exists
        //w+ => open the file in read/write mode. Create a new file if doens't exists. 
        //a+ => open the file in read/append mode. Create a new file if doesn't exists or add to the end of the file if exists.

        $sen = "I Like Programming\n";
        fwrite($file_pointer,$sen);
        $sen = "I Don't Like Margarita Pizza weather\n";
        fwrite($file_pointer,$sen);
        fclose($file_pointer);

    ?>
</body>
</html>
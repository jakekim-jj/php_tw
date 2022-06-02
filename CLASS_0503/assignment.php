<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="studentDirName" placeholder="Write a name for student directory"/>
    <button type="submit">Create</button>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $dirName = $_POST['studentDirName'].'/';
        if(file_exists('./student_files/'.$dirName)){
            echo "<h1>Directory name already exists</h1>";
        }else{
            mkdir('./student_files/'.$dirName,0777);
            echo "<h1>Directory has been created.</h1>";
        }
    }
    ?>
</body>
</html>
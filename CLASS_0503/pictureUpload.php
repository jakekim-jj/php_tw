<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <select name="dirName">
        <?php
            $directories = scandir('./student_files/');
            foreach($directories as $dir){
                if($dir=='.' || $dir=='..'){
                    continue;
                }
                echo "<option>$dir</option>";
            }
        ?>
    </select>
    <input type="file" name="studentImg"/>
    <button type="submit">Upload</button>
    </form>
</body>
<?php
    function check_file($directory){ //check to see if the file exists
        if(file_exists($directory)){
            return true;
        }
        return false;
    }
    function check_file_size($fileSize,$sizeLimit){
        //check the file not to be above 500KB
        if($fileSize<$sizeLimit){
            return true;
        }
        return false;
    }
    function check_file_extension($fileType,$typeRange){
        foreach($typeRange as $type){
            if($fileType!=$type){
                continue;
            }
            return true;
        }
        return false;
    }
    function upload_file1($tmpAddress,$destAddress){
        if(move_uploaded_file($tmpAddress,$destAddress)){
            return "the file ".basename($destAddress)." has been uploaded.";
        }else{
            return "Sorry, problem when uploading your file. Try again!!!";
        }
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $destDir = './student_files/'.$_POST['dirName']."/";
        $originalFileName = basename($_FILES['studentImg']['name']);
        $tmp_address = $_FILES['studentImg']['tmp_name'];
        if(!check_file($destDir.$originalFileName)){
            $imgDetails = getimagesize($tmp_address);
            if(check_file_size($_FILES['studentImg']['size'],750000)){
                $filetype = basename($imgDetails['mime']);
                if(check_file_extension($filetype,['jpg','jpeg'])){
                    echo upload_file1($tmp_address,$destDir.$originalFileName);
                }else{
                    echo "<h2>File is not jpg/jpeg</h2>";
                }
            }else{
                echo "<h2>file is bigger than 750KB</h2>";
            }
        }else{
            echo "<h2>File already exists</h2>";
        }
    }
?>
</html>
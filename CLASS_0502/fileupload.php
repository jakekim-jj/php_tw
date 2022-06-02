<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" 
    method="POST"
    enctype="multipart/form-data">
    Please enter your name:
    <input type="text" name="username"/>
    Select an image to upload:
    <input type="file" name="upload"/>
    <button type="submit">Upload</button>
    </form>
    <?php
    function chk_file($directory){ //check to see if the file exists
        if(file_exists($directory)){
            return true;
        }
        return false;
    }
    function chk_file_size($fileSize,$sizeLimit){
        //check the file not to be above 500KB
        if($fileSize<$sizeLimit){
            return true;
        }
        return false;
    }
    function chk_file_extension($fileType,$typeRange){
        foreach($typeRange as $type){
            if($fileType!=$type){
                continue;
            }
            return true;
        }
        return false;
    }
    function upload_file($tmpAddress,$destAddress){
        if(move_uploaded_file($tmpAddress,$destAddress)){
            return "the file ".basename($destAddress)." has been uploaded.";
        }else{
            return "Sorry, problem when uploading your file. Try again!!!";
        }
    }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username = $_POST['username'];
            $dest_dir = "./files/";
            $userdir = $username."_images";
            if(!file_exists($dest_dir.$userdir)){
                mkdir($dest_dir.$userdir."/",0777);
                //i will create a directory with all permissions
                //./files/username_images/
            }
            $upload_target = $dest_dir.$userdir."/".basename($_FILES['upload']['name']);
            //the above line will add the name of the original uploaded file to the dest directory.
            $check = getimagesize($_FILES['upload']['tmp_name']);
            if($check!==false){ //check if the file is an image type or not
                if(chk_file($upload_target)){
                    echo "Sorry, same file has been uploaded. Try another!";
                }elseif(chk_file_size($_FILES['upload']['size'],500000)){
                    $fileType = basename($check['mime']);
                    if(chk_file_extension($fileType,["png","gif","jpg","jpeg"])){
                        echo upload_file($_FILES['upload']['tmp_name'],$upload_target);
                    }else{
                        echo "File type is not correct.";
                    }
                }
            }else{
                echo "file is not an image. Try again!";
                $uploadFlag = 0;
            }
            
            // echo "width:".$check[0]."<br/>";
            // echo "height:".$check[1]."<br/>";
            // echo "img type#:".$check[2]."<br/>";
            // echo "width&height:".$check[3]."<br/>";
            // echo "bits:".$check['bits']."<br/>";
            // echo "img type name:".$check['mime']."<br/>";
            // echo $_FILES['upload']['name']."<br/>"; show the original name of the file
            // echo $_FILES['upload']['tmp_name']."<br/>"; show the temporary address of the file
            // echo $_FILES['upload']['type']."<br/>"; show the type of the file 
            // echo $_FILES['upload']['size']."<br/>"; show the size in bytes.
        }
        
    ?>
</body>
</html>
<?php
    include('./config.php');
    include('./employeeClass.php');
    session_start();
?>
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
        if(isset($_SESSION['selected_emp'])){
            $employeeObj = unserialize($_SESSION['selected_emp']);
            echo $employeeObj->getFirstName()."<br/>";
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        Select an image for employee
        <input type="file" name="emp_img"/>
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
            //check the file not to be above the sizeLimit
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
                return true;
            }else{
                return false;
            }
        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $destDir = './empImg/';
            $empImg_destenation = $destDir.basename($_FILES['emp_img']['name']);
            $ImgChecker = getimagesize($_FILES['emp_img']['tmp_name']);
            if($ImgChecker!==false){
                if(chk_file($empImg_destenation)){
                    echo "<h3>Image already exists</h3>";
                }elseif(chk_file_size($_FILES['emp_img']['size'],300000)){
                    $imgType = basename($ImgChecker['mime']);
                    if(chk_file_extension($imgType,['png','jpg','jpeg','bmp'])){
                        $dbCon = new mysqli($DBServer,$username,$password,$dbName);
                        if($dbCon->connect_error){
                            die("<h3>Database connection error.</h3>");
                        }else{
                            if(upload_file($_FILES['emp_img']['tmp_name'],$empImg_destenation)){
                                $insertQuery = "INSERT INTO pictures_tb(pictureAddress) VALUES ('$empImg_destenation')";
                                if($dbCon->query($insertQuery)===true){
                                    echo "<h3>File uploaded</h3>";
                                }else{
                                    echo "<h3>insert problem</h3>";
                                }
                                $dbCon->close();
                            }
                        }
                    }else{
                        echo "<h3>Image type is not correct.</h3>";    
                    }
                }else{
                    echo "<h3>Image is bigger than 300KB</h3>";
                }
            }else{
                echo "<h3>File is not an image.</h3>";
            }
        }
    ?>
</body>
</html>
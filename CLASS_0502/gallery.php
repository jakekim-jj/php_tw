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
        $files_dir = scandir("./files/");
        $options = [];
        foreach($files_dir as $key=>$filename){
            if($filename=="." || $filename==".."){
                continue;
            }
            $options[$key]=$filename;
        }
    ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <select name="foldername">
        <?php
            foreach($options as $filename){
                echo "<option>$filename</option>";
            }
        ?>
    </select>
    <button type="submit">Display Images</button>
    </form>
    <?php
        function load_contents($destDir){
            $images = scandir($destDir);
            $imagesArray = [];
            foreach($images as $image){
                if($image == "." || $image==".."){
                    continue;
                }
                array_push($imagesArray,$destDir.$image);
            }
            return $imagesArray;
        }
        function display_images_inTable($imgarray){
            echo "<table>";
            $localaddr = $_SERVER["PHP_SELF"];
            foreach($imgarray as $img){
                echo "<tr><td><img src='$img' width='250px' height='300px'/></td>
                <td><a href=$localaddr?d=$img>Click me</a></td></tr>";
            }
            echo "</table>";
        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $foldername = $_POST['foldername']."/";
            $imgarray = load_contents('./files/'.$foldername);
            display_images_inTable($imgarray);
        }
        if(isset($_GET['d'])){
               unlink($_GET['d']);
        }
    ?>
</body>
</html>
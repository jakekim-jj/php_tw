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
        Name:<input type="text" name="student_name" placeholder="Write the student's full name"/>
        Program:<input type="password" name="student_program" placeholder="write the program name"/>
        <button type="submit">Submit the form</button>
    </form>
    <?php
        // if(isset($_GET["student_name"]) && isset($_GET["student_program"])){
        //     echo "Student name is: ".$_GET["student_name"]."<br/>";
        //     echo "Enrolled in ".$_GET["student_program"]."<br/>";
        // }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            echo "Student name is: ".test_input($_POST["student_name"])."<br/>";
            echo "Enrolled in ".test_input($_POST["student_program"])."<br/>";
        }
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
</body>
</html>
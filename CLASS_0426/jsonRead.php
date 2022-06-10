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
        class student {
            private $id;
            private $name;
            private $grade1;
            private $grade2;
            function __construct($id,$name,$grade1,$grade2)
            {
                $this->id = $id;
                $this->name = $name;
                $this->grade1 = $grade1;
                $this->grade2 = $grade2;
            }
            function get_ID(){
                return $this->id;
            }
            function get_Name(){
                return $this->name;
            }
            function get_Grade1(){
                return $this->grade1;
            }
            function get_Grade2(){
                return $this->grade2;
            }
            function Display_info(){
                echo "<br/>StudentID:".$this->id."<br/>Name:".$this->name."<br/>Grade1:".$this->grade1."<br/>Grade2:".$this->grade2;
            }
        }
        $student_list=[];
        $json_handler = fopen("./files/student.json","r");
        $json_data = fread($json_handler,filesize('./files/student.json'));
        fclose($json_handler);
        $student_data = json_decode($json_data,true);
        foreach($student_data as $studentID=>$studentInfo){
            $student_obj = new student($studentID,$studentInfo["Name"],$studentInfo["Grade1"],$studentInfo["Grade2"]);
            $student_list[$student_obj->get_ID()]=$student_obj;
        }
        echo "<table><tr><th>ID</th><th>Name</th><th>Grade1</th><th>Grade2</th></tr>";
        foreach($student_list as $studentID=>$studentInfo){
            echo "<tr><td>$studentID</td><td>".$studentInfo->get_Name()."</td><td>".$studentInfo->get_Grade1()."</td><td>".
            $studentInfo->get_Grade2()."</td></tr>";
        }
        echo "</table>";
        //print_r($student_data);
        // echo "<ul>";
        // foreach($student_data as $student_code=>$student_information){
        //     echo "<li>$student_code: ".$student_information["Name"];
        //     foreach($student_information as $name=>$value){
        //         echo "$name:$value/ ";
        //     }
        //     echo "</li>";
        // }
        // echo "</ul>";
    ?>
</body>
</html>
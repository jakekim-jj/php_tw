<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php

use student as GlobalStudent;

 echo $_SERVER['PHP_SELF'] ?>">
        <input type="number" name="studentID" placeholder="enter student number"/>
        <input type="text" name="studentName" placeholder="enter student name"/>
        <select name="course">
            <option>HTML</option>
            <option>CSS</option>
            <option>JS</option>
            <option>PHP</option>
            <option>CMS</option>
        </select>
        <input type="number" name="course_grade" placeholder="Enter the grade"/>
        <input type="text" name="country" placeholder="Enter the country"/>
        <button type="submit">Submit</button>
    </form>
    <?php
        class student_obj{
            private $studentID;
            private $name;
            private $course;
            private $grade;
            private $country;
            function __construct($studentID,$name,$course,$grade,$country){
                $this->studentID = $studentID;
                $this->name = $name;
                $this->course = $course;
                $this->grade = $grade;
                $this->country = $country;
            }
            function display_info(){
                echo "Student ID:".$this->studentID."<br/>";
                echo "Student Name:".$this->name."<br/>";
                echo "Student Course:".$this->course."<br/>";
                echo "Student grade:".$this->grade."<br/>";
                echo "Student Country:".$this->country."<br/>";
            }
            function return_array(){
                return ["studentID"=>$this->studentID,"name"=>$this->name,"course"=>$this->course,"grade"=>$this->grade,
                "country"=>$this->country];
            }
        }
        $studentList = [];
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $studentID = Input_check($_POST['studentID']);
            $studentName = Input_check($_POST['studentName']);
            $course = Input_check($_POST['course']);
            $grade = Input_check($_POST['course_grade']);
            $country = Input_check($_POST['country']);
            $st1 = new student_obj($studentID,$studentName,$course,$grade,$country);
            $studentList[$studentID] = $st1->return_array();
            Write_JSON($studentList,'./files/studentList.json');
        }
        function Write_JSON($data,$json_addr){
            print_r($data);
            $studentTmp_list = [];
            if(file_exists($json_addr)){
                $json_handler = fopen($json_addr,"r");
                $json_data = fread($json_handler,filesize($json_addr));
                fclose($json_handler);
                $studentTmp_list = json_decode($json_data,true);
                print_r($studentTmp_list);
                foreach($data as $key=>$value){
                    $studentTmp_list[$key]=$value;
                }
                $newStudentList = $studentTmp_list;
            }else{
                $newStudentList = $data;
            }
            $json_data = json_encode($newStudentList);
            $json_handler = fopen($json_addr,"w");
            fwrite($json_handler,$json_data);
            fclose($json_handler);
        }
        function Input_check($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
</body>
</html>
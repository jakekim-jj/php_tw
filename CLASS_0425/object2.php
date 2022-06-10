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
        class Employee {
            private $Emp_ID;
            private $name;
            private $age;
            private $position;
            private $salary;
            private $shifts = [];
            private $gender;
            private $startDate;
            function __construct($Emp_ID,$name,$age,$position,$salary,$shifts,$gender,$startDate)
            {
                $this->Emp_ID = $Emp_ID;
                $this->name = $name;
                $this->age = $age;
                $this->position = $position;
                $this->salary = $salary;
                $this->shifts = $shifts;
                $this->gender = $gender;
                $this->startDate = $startDate;
            }
            function displayInfo(){
                echo "Name: ".$this->name."<br/>Age: ".$this->age."<br/>Position: ".$this->position.
                    "<br/>Salary: ".$this->salary."<br/>Gender: ".$this->gender;
            }
            function get_EmpID(){
                return $this->Emp_ID;
            }
            function get_Shifts(){
                echo "<br/>Shifts Are:<ul>";
                foreach($this->shifts as $shift){
                    echo "<li>$shift</li>";
                }
                echo "</ul>";
            }
            function SalaryPerYer(){
                return $this->salary * 12;
            }
            function set_Shifts($shifts){
                $this->shifts = $shifts;
            }
            function set_position($position){
                $this->position = $position;
            }
            function employment_Length(){
                $today = date_create(date("Y-m-d"));
                $target = date_create($this->startDate);
                $diff = date_diff($target,$today);
                return $diff->format('%R%a days');
            }
            function calculateTax(){
                if($this->salary<=5000){
                    $tax = 10;
                }elseif($this->salary>5000 && $this->salary<=8000){
                    $tax = 15;
                }elseif($this->salary>8000){
                    $tax = 20;
                }
                return $this->salary * ($tax/100);
            }
            function cal_Benefits(){
                $emp_Length = intval($this->employment_Length());
                if($emp_Length>1000 && $emp_Length<=2000){
                    $this->salary += 500;
                }elseif($emp_Length>2000 && $emp_Length<=3000){
                    $this->salary += 700;
                }elseif($emp_Length>3000){
                    $this->salary += 800;
                }
                echo "<br/>Salary with benefits: ".$this->salary."<br/>";
            }
        }
        $employeeList = [];
        $Empolyee = new Employee("12","Crist",45,"Manager",7000,["Morning","Night"],"Male","2010-02-10");
        $employeeList[$Empolyee->get_EmpID()]=$Empolyee;
        $Empolyee = new Employee("13","Emma",58,"Senior Manager",8000,["Morning","Evening"],"Female","2015-02-10");
        $employeeList[$Empolyee->get_EmpID()]=$Empolyee;
        foreach($employeeList as $employeeID=>$employeeDetails){
            echo "ID: $employeeID<br/>";
            $employeeDetails->displayInfo();
            echo "<br/>";
        }
        // echo "<br/>Yearly Salary is:".$Crist->SalaryPerYer();
        // echo "<br/>Employment Length is: ".$Crist->employment_Length();
        // echo "<br/>Mothly Tax is: ".$Crist->calculateTax();
        

    ?>
</body>
</html>
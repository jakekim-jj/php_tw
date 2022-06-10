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
        class computers{
            //properties
            private $screenSize;
            private $model;
            private $serial;
            private $brand;
            private $os;
            private $specification;
            //constructor
            function __construct($model,$brand,$serial,$screenSize,$os,$specification)
            {
                $this->model = $model;
                $this->brand = $brand;
                $this->serial = $serial;
                $this->screenSize = $screenSize;
                $this->os = $os;
                $this->specification = $specification;
            }
            //methods
            function set_ScreenSize($screenSize){
                $this->screenSize = $screenSize;
            }
            function get_ScreenSize(){
                return $this->screenSize;
            }
            function to_String(){
                echo "Computer Specification is:<br/>Model: ".$this->model."<br/> Brand: ".$this->brand.
                "<br/>OS: ".$this->os."<br/>Specification: ".$this->specification;
            }
        }
        $EmmaApple = new computers("Apple somthing","Apple","12345SN","13","Mac OS","HDD:512GB, RAM:16GB");
        $EmmaApple->to_String();
    ?>
</body>
</html>
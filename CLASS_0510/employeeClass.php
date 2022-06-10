<?php
    class Employee_Obj{
        private $employeeID;
        private $firstName;
        private $lastName;
        private $email;
        private $telephone;
        private $address;
        private $dob;
        private $ed;
        function __construct($employeeID,$firstName,$lastName,$email,$telephone,$address,$dob,$ed)
        {
            $this->employeeID = $employeeID;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->telephone = $telephone;
            $this->address = $address;
            $this->dob = $dob;
            $this->ed = $ed;
        }

        /**
         * Get the value of employeeID
         */ 
        public function getEmployeeID()
        {
                return $this->employeeID;
        }

        /**
         * Get the value of firstName
         */ 
        public function getFirstName()
        {
                return $this->firstName;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
                return $this->lastName;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Get the value of telephone
         */ 
        public function getTelephone()
        {
                return $this->telephone;
        }

        /**
         * Get the value of address
         */ 
        public function getAddress()
        {
                return $this->address;
        }

        /**
         * Get the value of dob
         */ 
        public function getDob()
        {
                return $this->dob;
        }

        /**
         * Get the value of ed
         */ 
        public function getEd()
        {
                return $this->ed;
        }
    }
?>
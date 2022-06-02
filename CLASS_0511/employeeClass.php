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
        private $positionID;
        private $departmentID;
        function __construct($employeeID,$firstName,$lastName,$email,$telephone,$address,$dob,$ed,$posID,$depID)
        {
            $this->employeeID = $employeeID;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->telephone = $telephone;
            $this->address = $address;
            $this->dob = $dob;
            $this->ed = $ed;
            $this->positionID = $posID;
            $this->departmentID = $depID;
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


        /**
         * Set the value of firstName
         *
         * @return  self
         */ 
        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Set the value of telephone
         *
         * @return  self
         */ 
        public function setTelephone($telephone)
        {
                $this->telephone = $telephone;

                return $this;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }

        /**
         * Set the value of dob
         *
         * @return  self
         */ 
        public function setDob($dob)
        {
                $this->dob = $dob;

                return $this;
        }

        /**
         * Set the value of ed
         *
         * @return  self
         */ 
        public function setEd($ed)
        {
                $this->ed = $ed;

                return $this;
        }

        /**
         * Get the value of positionID
         */ 
        public function getPositionID()
        {
                return $this->positionID;
        }

        /**
         * Set the value of positionID
         *
         * @return  self
         */ 
        public function setPositionID($positionID)
        {
                $this->positionID = $positionID;

                return $this;
        }

        /**
         * Get the value of departmentID
         */ 
        public function getDepartmentID()
        {
                return $this->departmentID;
        }

        /**
         * Set the value of departmentID
         *
         * @return  self
         */ 
        public function setDepartmentID($departmentID)
        {
                $this->departmentID = $departmentID;

                return $this;
        }
    }
?>
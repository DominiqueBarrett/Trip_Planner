<?php

    class Visitor {
        private $employeeID;
        private $firstName;
        private $lastName;
        private $emailAddress;
        private $phoneNumber;
        private $visitorID;
        public function __construct($employeeID, $firstName, $lastName, $emailAddress, $phoneNumber, $visitorID) {
            $this->employeeID = $employeeID;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->emailAddress = $emailAddress;
            $this->phoneNumber = $phoneNumber;
            $this->visitorID = $visitorID;
            }

        public function getID() {
            return $this->employeeID;
        }

        public function setID($value) {
            $this->employeeID = $value;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($value) {
            $this->firstName = $value;
        }
        public function getLastName() {
            return $this->lastName;
        }

        public function setLastName($value) {
            $this->lastName = $value;
        }
                public function getEmailAddress() {
            return $this->emailAddress;
        }

        public function setEmailAddress($value) {
            $this->emailAddress = $value;
        }

        public function getPhoneNumber() {
            return $this->phoneNumber;
        }

        public function setPhoneNumber($value) {
            $this->phoneNumber = $value;
        }
        public function getVisitorID() {
            return $this->visitorID;
        }

        public function setVisitorID($value) {
            $this->visitorID = $value;
        }
    }
?>
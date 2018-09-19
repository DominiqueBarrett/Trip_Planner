<?php
/*this is the function that will add the data inputed by a user to the database into the visitor table. 
 * It gets the first name, last name, email address, and phone number to insert*/
function add_visitor($firstName, $lastName, $emailAddress, $phoneNumber) {
    $min=1;
    $max=5;
    $employeeID = rand($min,$max);
    
    global $db;
    $query = 'INSERT INTO visitor (employeeID, firstName, lastName, emailAddress, phoneNumber)
              VALUES (:employeeID, :firstName, :lastName, :emailAddress, :phoneNumber)';
    $statement = $db->prepare($query);
    $statement->bindValue(':employeeID', $employeeID);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':emailAddress', $emailAddress);
    $statement->bindValue(':phoneNumber', $phoneNumber);
    $statement->execute();
    $statement->closeCursor();    
}
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
    class VisitorDB {
        public static function getVisitors() {
            $db = Database::getDB();
            $query = 'SELECT * FROM visitor
                      ORDER BY EmployeeID';
            $statement = $db->prepare($query);
            $statement->execute();

            $visitors = array();
            foreach ($statement as $row) {
                $visitor = new Visitor($row['employeeID'],
                                        $row['firstName'],
                                        $row['lastName'],
                                        $row['emailAddress'],
                                        $row['phoneNumber'],
                                        $row['visitorID']);
                $visitors[] = $visitor;
            }
            return $visitors;
        }
        public function getVisitorByID($visitorID) {
            $db = Database::getDB();

            $query = 'SELECT * FROM visitor
                      WHERE visitor.visitorID = :visitorID';
            $statement = $db->prepare($query);
            $statement->bindValue(":visitorID", $visitorID);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            foreach ($rows as $row) {
                $visitor = new Visitor($row['employeeID'],
                                        $row['firstName'],
                                        $row['lastName'],
                                        $row['emailAddress'],
                                        $row['phoneNumber'],
                                        $row['visitorID']);
                $visitors[] = $visitor;
            }
            return $visitors;
        }
        public function deleteVisitorByID($visitorID) {
        $db = Database::getDB();
        $query = "DELETE FROM visitor
                  WHERE visitorID = '$visitorID'";
        $statement = $db->prepare($query);
        $statement->bindValue(':visitorID', $visitorID);
        $statement->execute();
        $statement->closeCursor();
    }
    }
?>
<?php

/**********************************************
 * Modified By: Dominique Barrett             *
 * Latest Modified Date: 9-20-2018            *
 * Added an empty array list so it doesn't    *
 * error later on.                            *
 *********************************************/ 


class Employee {
        private $id;
        private $firstName;
        private $lastName;

        public function __construct($id, $firstName, $lastName) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }

        public function getID() {
            return $this->id;
        }

        public function setID($value) {
            $this->id = $value;
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
    }
    class EmployeeDB {//selecting all the employees so they can be viewed.
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employees
                  ORDER BY EmployeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                                     $row['firstName'],
                                     $row['lastName']);
            $employees[] = $employee;
        }
        return $employees;
        }

        
        
        
        public static function getVisitorsByEmployeeID($employeeID) {
        $db = Database::getDB();

        //$employee = EmployeeDB::getEmployees($employeeID);

        $query = 'SELECT * FROM visitor
                  WHERE visitor.employeeID = :employeeID';
        $statement = $db->prepare($query);
        $statement->bindValue(":employeeID", $employeeID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $visitors = [];//empty array is being set so if there are no visitors I can use that to error check the page it is being called from
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
        
        //try {
            //if($visitors !== NULL) {
                
            //}
            //else
            //      throw new Exception($visitors);
            //  }
            //  catch(Exception $visitors) {
                //re-throw exception
            //      echo "This Employee is not currently helping any visitors. Please check back later";
            //    throw new customException($visitors);
            //  }
            //}
            
        }
    }
?>

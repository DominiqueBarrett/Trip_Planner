<?php

/**********************************************
 * Modified By: Dominique Barrett             *
 * Latest Modified Date: 9-20-2018            *
 * Added try catches to database calls        *
 *********************************************/ 


/*this calls the database trip_planner and allows us to use it as mgs_user and if there is an issue connecting to the database it will error*/
    $dsn = 'mysql:host=localhost;dbname=trip_planner';
    $username = 'mgs_user';
    $password = 'Pa$$w0rd';
    //try catch checks to see if there is a connection to the database, if not it loads error an page
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('error_pages/database_error.php');
        exit();
    }
    class Database {
        private static $dsn = 'mysql:host=localhost;dbname=trip_planner';
        private static $username = 'mgs_user';
        private static $password = 'Pa$$w0rd';
        private static $db;

        private function __construct() {}
//try catch checks to see if there is a connection to the database, if not it loads error an page
        public static function getDB () {
            if (!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn,
                                         self::$username,
                                         self::$password);
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('error_pages/database_error.php');
                    exit();
                }
            }
            return self::$db;
        }
    }
?>
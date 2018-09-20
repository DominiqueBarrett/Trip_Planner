<?php
/*this calls the database trip_planner and allows us to use it as mgs_user and if there is an issue connecting to the database it will error*/
    $dsn = 'mysql:host=localhost;dbname=trip_planner';
    $username = 'mgs_user';
    $password = 'Pa$$w0rd';

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
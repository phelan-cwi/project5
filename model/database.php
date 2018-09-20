<?php
/*Changed the database into it's on file some files aren't functioning without including connection per page*/
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=contact_list';
    private static $username = 'root';
    private static $password = 'Something0!';
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
                echo 'Unable to connect please try again';
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}

?>

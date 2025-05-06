<?php
class connect {
    public static $db_host = "localhost";
    public static $db_user = "root";
    public static $db_pass = "";
    public static $db_name = "db_rushb";

    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch(Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
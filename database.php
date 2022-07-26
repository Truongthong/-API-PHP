<?php
// POO
class Database
{
    private $shost = "127.0.0.1";
    private $database_name = "stu_crud";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . "; 
        dbname=" . $this->database_name, $this->username, this->password);
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>


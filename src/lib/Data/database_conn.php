<?php
class Database{
 
    //Tania's localhost data
    //To be modified
    private $host = "localhost";
    private $db_name = "NotesApp";
    private $username = "tanja";
    private $password = "2201";
    public $conn;
 
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>
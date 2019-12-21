<?php //namespace Models;
include_once __DIR__."/AModel.php";
include_once __DIR__."/../Data/database_conn.php";

/**
 * Task model.
 */
class Task extends AModel
{
    static public function init()
    {
        self::$dbConnection = getConnection();
    }

    static public function Create($task)
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare
                ("INSERT INTO Tasks(title, username, deadline, notes) 
                VALUES (?, ?, ?, ?)");
            $query->bindParam(1, $task['title'], PDO::PARAM_STR);
            $query->bindParam(2, $task['username'], PDO::PARAM_STR);
            $query->bindParam(3, $task['deadline'], PDO::PARAM_STR);
            $query->bindParam(4, $task['notes'], PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e){
            print "Failed to add a task: ".$e->getMessage()."\n";
            return false;
        }

        return true;
    }

    static public function Read(string $username)
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("SELECT * FROM Tasks WHERE username = ?");
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            $num_rows = $query->rowCount();
        } catch (PDOException $e){
            print "Failed to retrieve user data: ".$e->getMessage()."\n";
        }

        if (!$num_rows) {
            return false;
        } else {
            $result = $query->fetchAll();
            return $result;
        }

    }

    static public function ReadPending(string $username)
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("SELECT * FROM Tasks WHERE deadline > now() and username = ?");
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            $num_rows = $query->rowCount();
        } catch (PDOException $e){
            print "Failed to retrieve user data: ".$e->getMessage()."\n";
        }

        if (!$num_rows) {
            return false;
        } else {
            $result = $query->fetchAll();
            return $result;
        }

    }

    static public function ReadCompleted(string $username)
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("SELECT * FROM Tasks WHERE deadline < now() and username = ?");
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            $num_rows = $query->rowCount();
        } catch (PDOException $e){
            print "Failed to retrieve user data: ".$e->getMessage()."\n";
            exit();
        }

        if (!$num_rows) {
            return false;
        } else {
            $result = $query->fetchAll();
            return $result;
        }

    }

    static public function Update_task(string $username, $column, $new_data) : bool
    {
        $dbConnection = getConnection();
        if ($column == "created"){
            print "Column 'created' cannot be modified";
            return false;
        }
        try {
            $stmt = "UPDATE Tasks set $column = ? WHERE username = ?";
            $query = $dbConnection->prepare($stmt);
            $query->bindParam(1, $new_data, PDO::PARAM_STR);
            $query->bindParam(2, $username, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e){
            print "Failed to update the task: ".$e->getMessage()."\n";
            return false;
        }
    }

    static public function Delete($title, $username) : bool
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("DELETE FROM Tasks WHERE title = ? and username = ?");
            $query->bindParam(1, $title, PDO::PARAM_STR);
            $query->bindParam(2, $username, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e){
            print "Failed to delete the task: ".$e->getMessage()."\n";
            return false;
        }
    }
}

$task = new Task();

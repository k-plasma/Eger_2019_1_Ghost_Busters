<?php //namespace Models;
include_once "AModel.php";
include_once "../Data/database_conn.php";

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

    static public function Read(string $title, $username)
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("SELECT * FROM Tasks WHERE title = ? and username = ?");
            $query->bindParam(1, $title, PDO::PARAM_STR);
            $query->bindParam(2, $username, PDO::PARAM_STR);
            $query->execute();
            $num_rows = $query->rowCount();
        } catch (PDOException $e){
            print "Failed to retrieve user data: ".$e->getMessage()."\n";
        }

        if (!$num_rows) {
            return false;
        } else {
            $result = $query->fetch(PDO::FETCH_ASSOC);
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



//_____________TESTING CODE___________________
//$task = new Task();

/*$task_input = array("title" => "Drink water", "username" =>"Tania", "deadline" =>"2019-12-31", "notes" => null);
if ($task->Create($task_input)){     
    print "task was created\n";
} else {
    print "task was not created\n";
} 

$task_data = $task->Read("Drink water", "Tania");
if ($task_data){     
    print var_dump($task_data)."\n";
} else {
    print "task does not exist\n";
}

if ($task->Update_task("Tania", "deadline", "2019-12-30")){   
    print "Task was modified\n";
} else {
    print "Task was not modified\n";
}

if ($task->Delete("Drink water", "Tania")){   
    print "task was deleted\n";
} else {
    print "task was not deleted\n";
}*/

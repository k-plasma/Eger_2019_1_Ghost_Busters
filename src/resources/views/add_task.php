<?php session_start(); ?>
<?php
//include_once "AModel.php";
//include_once "../Data/database_conn.php";

function getConnection($host = "localhost", $db_name = "NotesApp", $username = "tanja", $password = "2201"){
 
    try{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $conn->exec("set names utf8");
    }catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage();
    } 
    return $conn;
}


abstract class AModel
{
    /** @var object $dbProvider The database connection for the model. */
    protected $dbConnection = null;
    
    public function __construct() {}

    /** @var string $id The id of the model. This should usually be unique. */
    public $id = null;
}

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
?>


<?php include_once "fh/header.html"; ?>
  
  <?php
    /*FOR SOME UNKNOWN REASON THIS DOES NOT WORK
    PHP Warning:  include_once(/var/www/html/Eger_2019_1_Ghost_Busters/src/resources/views../../../src/lib/Models/Task.php): 
    failed to open stream: 
    No such file or directory in /var/www/html/Eger_2019_1_Ghost_Busters/src/resources/views/task.php on line 59
    include_once(__DIR__."../../../src/lib/Models/Task.php");*/ 

    if (isset($_POST["add"])){

        
        $errors = [];
        if (empty($_POST['title'])){
            $errors[] = "Title must be set";
        }
        if (empty($_POST['deadline'])){
            $errors[] = "Deadline musbe set";
        }
        if (empty($_SESSION['username'])){
            throw new Exception("You did some stupid stuff. Username in session was not set.");
        }

        $new_task = array("title" => $_POST['title'], "username" => $_SESSION['username'], 
        "deadline" => $_POST['deadline'], "notes" => $_POST['notes']);
        
        $task = new Task();
        
        if (!empty($errors)){
            foreach ($errors as $error){
                print "<h1>".$error."</h1>";
            }
        }
        
        if ($task->Create($new_task)) {
            print "<h1>Task ".$_POST['title']." was successfully added</h1>";
        } else {
            print "<h1>Failed to create task".$_POST['title']."</h1>";
        }

    }   
?>
  
  
  <div>
    <form method = "post" action = "add_task.php" id = "taskform"><pre>
        <h3>Task Title:               </h3><input type = "text" name = "title" required>
        <h3>Task Deadline(yyyy-mm-dd:)</h3><input type = "text" name = "deadline" required>
        <h3>Notes:                    </h3>
<textarea name = "notes" rows="4" cols="50">

</textarea>
<input type = "submit" name = "add" value = "Add task">
    </pre></form>      
  </div>


  <?php include_once "fh/footer.html"; ?>


 
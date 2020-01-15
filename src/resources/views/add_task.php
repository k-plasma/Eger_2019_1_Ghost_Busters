<?php session_start(); ?>

<?php include_once "fh/header.html"; ?>
  
  <?php

    include_once(__DIR__."/../../../src/lib/Models/Task.php");

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
        
        //___________USEFUL FOR TESTING____________
        /*if (!empty($errors)){
            foreach ($errors as $error){
                print "<h1>".$error."</h1>";
            }
        }*/
        //________________________________________
        
        if ($task->Create($new_task)) {
            echo '<script type="text/javascript"> alert("Task was successfully added") </script>';;
        } else {
            echo '<script type="text/javascript"> alert("Failed to create task") </script>';
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


 
<?php 
require_once __DIR__."/../../src/lib/Models/Task.php"; 

//_____________TESTING CODE___________________
$task = new Task();

$task_input = array("title" => "Drink water", "username" =>"Tania", "deadline" =>"2019-12-31", "notes" => null);
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
}
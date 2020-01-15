<?php 
    //Tania's localhost data
    //To be modified 

function getConnection($host = "localhost", $db_name = "NotesApp", $username = "tania", $password = "2201"){
 
    try{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $conn->exec("set names utf8");
    }catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage();
    } 
    return $conn;
}


function get_mysqli_conn(){
    $con = mysqli_connect("localhost","tania","2201", "NotesApp") or die("Unable to connect");
    return $con;
}
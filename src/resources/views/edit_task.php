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


<!DOCTYPE html>
<html>

<head>
  <!-- BASICS -->
  <meta charset="utf-8">
  <title>EKE - Application Lab Group 2</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../../public/css/settings.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/isotope.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/animate.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/overwrite.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/css/flexslider.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../../public/js/fancybox/jquery.fancybox.css" media="screen">
  <link rel="stylesheet" href="../../public/css/bootstrap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="../../public/css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="../../skin/default.css">
  

</head>

<body>
  <section id="header" class="appear"></section>
  <div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(5, 42, 62, 1);">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      	  <span class="fa fa-bars color-white"></span>
        </button>
        <div class="navbar-logo">
          <a href="index.html"><img data-0="width:155px;" data-300=" width:120px;" src="../..//public/img/logo.png" alt=""></a>
        </div>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
          <li class="active"><a href="userhomepage.php">Home</a></li>
          <li><a href="#section-about">About</a></li>
          <li><a href="#section-works">Portfolio</a></li>
          <li><a href="#section-contact">Contact</a></li>
          <li><a href="index.php">Logout</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </div>
  <section id="intro">
    <div class="intro-content">
      <h2>Welcome to E.K.E Task Manager!</h2>
    </div>
  </section>
  
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
        $task->Delete($_POST['title'], $_SESSION['username']);
        
        if (!empty($errors)){
            foreach ($errors as $error){
                print "<h1>".$error."</h1>";
            }
        }
        
        if ($task->Create($new_task)) {
            print "<h1>Task ".$_POST['title']." was successfully edited</h1>";
        } else {
            print "<h1>Failed to create task".$_POST['title']."</h1>";
        }

    }   
?>
  
  
  <div>
    <form method = "post" action = "edit_task.php" id = "taskform"><pre>
        <h3>Task Title:               </h3><input type = "text" name = "title" required default =<?php echo $_SESSION['title'];?>>
        <h3>Task Deadline(yyyy-mm-dd:)</h3><input type = "text" name = "deadline" required default =<?php echo $_SESSION['deadline'];?>>
        <h3>Notes:                    </h3>
<textarea name = "notes" rows="4" cols="50">
<?php echo $_SESSION['notes'];?>
</textarea>
<input type = "submit" name = "add" value = "Edit task">
    </pre></form>      
  </div>




  <section id="footer" class="section footer">
    <div class="container">
      <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
        <div class="col-sm-12 align-center">
          <ul class="social-network social-circle">
            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="row align-center mar-bot20">
        <ul class="footer-menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Privacy policy</a></li>
          <li><a href="#">Get in touch</a></li>
        </ul>
      </div>
      <div class="row align-center copyright">
        <div class="col-sm-12">
          <p>Copyright &copy; All rights reserved</p>
        </div>
      </div>
      <div class="credits">
        
        Designed by <a href="https://uni-eszterhazy.hu/">ApplicationLab-EKE.com</a>
      </div>
    </div>

  </section>
  <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

  <!-- Javascript Library Files -->
  <script src="../../../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  <script src="../../../js/jquery.js"></script>
  <script src="../../../js/jquery.easing.1.3.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/jquery.isotope.min.js"></script>
  <script src="../../../js/jquery.nicescroll.min.js"></script>
  <script src="../../../js/fancybox/jquery.fancybox.pack.js"></script>
  <script src="../../../js/skrollr.min.js"></script>
  <script src="../../../js/jquery.scrollTo.min.js"></script>
  <script src="../../../js/jquery.localScroll.min.js"></script>
  <script src="../../../js/stellar.js"></script>
  <script src="../../../js/jquery.appear.js"></script>
  <script src="../../../js/jquery.flexslider-min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../../../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../../js/main.js"></script>

</body>

</html>


 
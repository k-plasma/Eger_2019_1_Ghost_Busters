<?php session_start(); 
include_once(__DIR__."/../../../src/lib/Models/Task.php");
?>


<!DOCTYPE html>
<html>

<head>
  <!-- BASICS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    $task = new Task();

    if (isset($_POST['delete']) && isset($_POST['deltitle'])){
        $temp_title = preg_replace("/_/", " ", $_POST['deltitle']);
        $task->Delete($temp_title, $_SESSION['username']);
    }

    if (isset($_POST['edit']) && isset($_POST['edittitle'])){
        $temp_title = preg_replace("/_/", " ", $_POST['edittitle']);
        $_SESSION['title'] = $temp_title;
        $_SESSION['deadline'] = $_POST['deadline'];
        $temp_notes = preg_replace("/_/", " ", $_POST['notes']);
        $_SESSION['notes'] = $temp_notes;
        header('Location:  edit_task.php');
        exit();
    }

    $tasks=$task->ReadPending($_SESSION['username']);
    foreach($tasks as $t){

        print '<div class="card">
        <div class="card-header">
          <strong>'.$t['title'].'</strong>
        </div>
        <div class="card-body">
        <p class="card-text">Deadline: '.$t['deadline'].' </p>  
          <p class="card-text">Notes: '.$t['notes'].' </p>
          <form action = "task_list.php" method = "post">          
          <input type = "hidden" name = "deltitle" value = '.preg_replace("/ /", "_", $t['title']).'>
          <input type = "hidden" name = "delete" value = "yes">
          <input type = "submit" name = "submit" value = "Delete task" class="btn btn-primary">
          </form>
          
          <form action = "task_list.php" method = "post">
          <input type = "hidden" name = "edittitle" value = '.preg_replace("/ /", "_", $t['title']).'>
          <input type = "hidden" name = "deadline" value = '.$t['deadline'].'>
          <input type = "hidden" name = "notes" value = '.preg_replace("/ /", "_", $t['notes']).'>
          <input type = "hidden" name = "edit" value = "yes">
          <a href="edit_task.php"><input type = "submit" name = "submit_edit" value = "Edit task" class="btn btn-primary"></a>
          </form>
          
        </div>
      </div>';
    }

  
?>


  

  <section id="footer" class="section footer">
    <div class="container">
      <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">

      </div>
      <div class="row align-center mar-bot20">
        <ul class="footer-menu">
          <li><a href="#userhomepage.php">Home</a></li>
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
<?php
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>University Home Page</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
        <body style="background-color:#48dbfb">

            <div id="main-wrapper">
                <center>
                    <h2>E.K.E Home Page</h2>
                    <h3>Welcome
                      <?php echo $_SESSION['username']  ?>
                    </h3>                 
                    
                    <img src="imgs/eke.png" class="eke"/>
                </center>
            

                <form class="myform" action="homepage.php" method="post">

                    
                    <input name="logout" type="submit" id="logout_btn" value="Log Out"/>               

                </form>

                <?php
                    if(isset($_POST['logout']))
                    {
                        session_destroy();
                        header('location:index.php');
                    }
                    
                ?>

            </div>


        </body>
</html>

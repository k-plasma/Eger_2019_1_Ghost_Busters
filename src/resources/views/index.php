<?php
    session_start();
    require_once '../../lib/Data/database_conn.php';
    $con = get_mysqli_conn();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Login Page</title>
        <link rel="stylesheet" href="../../public/css/style1.css">

    </head>
        <body style="background-color:#48dbfb">

            <div id="main-wrapper">
                <center>
                    <h2>E.K.E Login Form</h2>
                    <img src="../../public/img/eke.png" class="eke"/>
                </center>
            

                <form class="myform" action="index.php" method="post">

                    <label><b>NEPTUN:</label><br>
                    <input name="username" type="text" class="inputvalues" placeholder="Type your NEPTUN code" required/><br>
                    <label><b>Password:</label><br>
                    <input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
                    <input name="login" type="submit" id="login_btn" value="Login"/><br>
                    <a href= "register.php"><input type="button" id="register_btn" value="Register"/>               

                </form>

                <?php
                    if(isset($_POST['login']))
                    {
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        
                        //empty fields check
                        if( trim($username) == "" || trim($password) == "" ){
                            echo '<script type="text/javascript"> alert("All fields are required.") </script>';
                            return;
                        }

                        $password = md5($password);
                        $query="select * from user WHERE neptun='$username' AND password='$password'";

                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0)
                        {
                            //valid
                            $_SESSION['username']= $username;
                            header('location:userhomepage.php');
                        }
                        else
                        {
                            //invalid
                            echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
                        }
                    }
                ?>

            </div>


        </body>
</html>

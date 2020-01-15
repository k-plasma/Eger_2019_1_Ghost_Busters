<?php
    require_once '../../lib/Data/database_conn.php';
    $con = get_mysqli_conn();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Registration Page</title>
        <link rel="stylesheet" href="../../public/css/style.css">

    </head>
        <body style="background-color:#48dbfb">

            <div id="main-wrapper">
                <center>
                    <h2>E.K.E Registration Form</h2>
                    <img src="../../public/img/eke.png" class="eke"/>
                </center>
            

                <form class="myform" action="register.php" method="post">
                    
                    <label><b>NEPTUN:</label><br>
                    <input name="username" type="text" class="inputvalues" placeholder="Type your NEPTUN code" required/><br>
                    
                    <label><b>Password:</label><br>
                    <input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
                    
                    <label><b>Confirm Password:</label><br>
                    <input name="cpassword" type="password" class="inputvalues" placeholder="Retype your password" required/><br>
                    
                    <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
                    
                    <a href="index.php"><input type="button" id="back_btn" value="Back"/>               

                </form>

                <?php
                    if(isset($_POST['submit_btn']))
                    {
                        //check if the sign_up button works or not
                        //echo '<script type="text/javascript"> alert("Sign Up button Clicked") </script>';

                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $cpassword = $_POST['cpassword'];


                        //empty fields check
                        if( trim($username) == "" || trim($password) == "" || trim($cpassword) == ""){
                            echo '<script type="text/javascript"> alert("All fields are required.") </script>';
                            return;
                        }

                        if($password==$cpassword)
                        {
                            $query= "select * from user WHERE neptun='$username'";

                            $query_run = mysqli_query($con, $query);
                        
                            if(mysqli_num_rows($query_run)>0)
                            {
                                echo '<script type="text/javascript"> alert("User already exits...Try another username") </script>';
                            }
                            else
                            {
                                //TODO encrypt password
                                //TODO sanitize input
                                $password = md5($password);

                                $query= "insert into user(neptun, password) values('$username','$password')";
                                
                                $query_run = mysqli_query($con, $query);

                                if($query_run)
                                {                                    
                                    session_start();
                                    $_SESSION['username']  = $username;
                                    header('location:userhomepage.php');                                
                                }
                                else
                                {   
                                    echo("Error description: ".$con->error);
                                    echo '<script type="text/javascript"> alert("Error!!") </script>';
                                }
                            }
                        }
                        else{
                            echo '<script type="text/javascript"> alert("Ooops!!! Non-matching password") </script>';
                        }
                    }

                ?>

            </div>


        </body>
</html>

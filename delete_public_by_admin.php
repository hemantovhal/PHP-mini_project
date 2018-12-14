<?php

        session_start();
        if(!isset($_SESSION['uid']))
        {
            header("location: index.php");
        }

        if(isset($_SESSION['delete_success']))
        {
            $del_msg=$_SESSION['delete_success'];
            unset($_SESSION['delete_success']);
        }
        else
            $del_msg="";

        $uid = $_SESSION["uid"];


        if(isset($_POST['delete']))
        {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = @mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn )
            {
                die('Could not connect: ' . mysql_error());
            }
            $fname = $_POST['txtfname'];
            $lname=$_POST['txtlname'];
            $sql = "DELETE FROM _public WHERE fname = '$fname' AND lname='$lname'" ;
            mysql_select_db('byteme');
            $retval = mysql_query( $sql, $conn );

            if(!$retval)
            {
                $_SESSION['delete_success']="Could Not Find Contact !";
                header("Location: delete_public_by_admin.php ");
            }
            else
            {
                $_SESSION['delete_success']="Contact Successfully Deleted !";
                header("Location: delete_public_by_admin.php ");
            }
            mysql_close($conn);
        }else
        {
?>
<html>
<head>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap/js/jquery-1.12.2.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title> Delete Contact From Public Directory By Admin </title>
</head>
<body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Logo -->
                <div class="navbar-header">
                    <a hre="#" class="navbar-brand" /> ByteMe Directory </a>
                </div>
                <!-- Menu on Left -->
                <div>
                    <ul class="nav navbar-nav">
                        <li> <a href="admin_home.php"> Home </a> </li>
                        <li> <a href="signup_by_admin.php"> Create User </a> </li>
                        <li> <a href="delete_user_by_admin.php"> Delete User </a> </li>
                        <li> <a href="delete_public_by_admin.php"> Delete From Public Directory </a> </li>
                        <li> <a href="search_by_admin.php"> Search </a> </li>
                    </ul>
                    <!-- Menu on the right -->
                    <ul class ="nav navbar-nav navbar-right">
                        <li>  <a href="search_by_admin.php"><i class="material-icons">notifications_active</i></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo "Hello ".$uid ; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="admin_login.php">Log-Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4" > </div>
                    <div class="col-xs-4" style="background-color:white" align="center">
                        <h1> Delete Contact From Public Directory By Admin </h1> <br/><br/>
                        <form method="post" action="?php $_PHP_SELF ?>" >
                                <div class="input-group" >
                                    <input type="text" class="form-control" required name="txtfname" placeholder="Enter First Name " >
                                    <input type="text" class="form-control" required name="txtlname" placeholder="Enter Last Name ">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="submit" name="delete" id="delete">Delete</button>
                        			</span>
                                    <!-- Indicate Success -->
                                </div><!-- /input-group -->
                        </form>
                        <br/><br/>
                        <h3 class="text-success" align="center"> <?php echo $del_msg ?> </h3>
                    </div>
                    <div class="col-xs-4" > </div>
            </div>
        </div>
        <?php
                }
        ?>
</body>
</html>
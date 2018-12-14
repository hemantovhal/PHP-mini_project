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
?>
<html>

<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="bootstrap/js/jquery-1.12.2.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title> Delete User By Admin </title>
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
                        <li>  <a href="search_by_admin.php"><i class="material-icons">&#xe7f5;</i></a></li>
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

        <div class="col-xs-4" >

        </div>

        <div class="col-xs-4" style="background-color:white">
            <h1 align="center"> Delete User </h1> <br/><br/>
            <form method="post" action="php/delete_user_by_admin.php" >

                <div class="input-group">

                    <input type="text" class="form-control" required name="txtdelete" placeholder="Enter Mail-Id to Delete">
        	  			<span class="input-group-btn">
                            <button class="btn btn-danger" type="submit">Delete</button>
            			</span>
                      <!-- Indicate Success -->

                </div><!-- /input-group -->
            </form>

            <br/><br/>
                      <h3 class="text-success" align="center"> <?php echo $del_msg ?> </h3>

        </div>

        <div class="col-xs-4" >

        </div>

    </div>

</div>


</body>

</html>
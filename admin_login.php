<?php
    session_start();
    unset($_SESSION['uid']);
    $login_error= null;
    $recover_error_var=null;
    $recover_success_var=null;
    if(isset($_SESSION['login_error']))
    {
        $login_error = " Invalid Username / Password ! " ;
        session_unset();
        session_destroy();
    }
    if(isset($_SESSION['recover_error']))
    {
        $recover_error_var = "Error: Try Again !";
        unset($_SESSION['recover_error']);
    }
    if(isset($_SESSION['recover_success']))
    {
        $recover_success_var= " Password Successfully Reset !";
        unset($_SESSION['recover_success']);
    }

?>
<html>

<head>

        <link href="bootstrap/global.css" rel="stylesheet" >
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link  href="bootstrap/css/datepicker.css" rel="stylesheet">
        <script src="bootstrap/js/jquery-1.12.2.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <title> Admin Log-In </title>

</head>

<body >

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="navbar-header">
                <a hre="#" class="navbar-brand" /> ByteMe Directory </a>
            </div>
            <!-- Menu on the right -->
                <ul class="nav navbar-nav navbar-right">

                    <li> <a href="public_search.php"> <strong> SEARCH &nbsp;<span class="glyphicon glyphicon-search"></span></strong> </a> </li>
                    <li> <a href="signup.php"> SIGN-UP </a> </li>
                    <li><a href="index.php"> LOG-IN </a> </li>
                    <li> <a href="admin_login.php"> ADMIN LOG-IN </a> </li>
                </ul>
        </div>
    </nav>

   <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4" >
                <p></p>
            </div>
            <div class="col-xs-4" style="background-color:rgba(202, 205, 205, 0.100) " id="menu">
                <div align="center" class="mylogin">
                    <br/><span class="text-danger" ><?php echo $login_error; ?> </span>
                    <br/>
                    <h1> <strong>ADMIN LOG-IN </strong></h1>
                    <form method="post" action="php/admin_login.php" role="form">
                        <br/><br/>
                        <input type="text" class="form-control" name="txtuname" placeholder="Username" required> <br/><br/>
                        <input type="password" class="form-control" name="txtpass" placeholder="Password" aria-describedby="basic-addon1" required><br/><br/> <br/>
                        <input class="btn btn-primary btn-lg" type="submit" name="btnsub" value="Login"  style=" width:100%"/><br/><br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
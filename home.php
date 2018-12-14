<?php
    session_start();

    if(!isset($_SESSION['uid']))
    {
        header("location: index.php");
    }
    $uid = $_SESSION["uid"];
    if(isset($_SESSION['update_success']))
    {
        if($_SESSION['update_success']==1)
            $cs = " Details Updated Successfully !";
        else
            $cs = " Details Not Updated !";

        unset($_SESSION['update_success']);
    }
    else
    {
        $cs="";
    }
?>
<html>
    <!--
    <form oninput="txtFullName.value = txtFirstName.value +' '+ txtLastName.value">
        First name : <input type="text" name="txtFirstName" /> <br><br>
        Last name : <input type="text" name="txtLastName" /> <br><br>
        Full name : <input type="text" name="txtFullName"  > <br><br>
    </form>
-->
<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="bootstrap/js/jquery-1.12.2.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>  Dashboard </title>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <!-- Logo -->
            <div class="navbar-header">
                <a hre="#" class="navbar-brand" /> Online Directory </a>
            </div>
            <!-- Menu on Left -->
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"> <a href="home.php"> Home </a> </li>
                    <li> <a href="create.php"> Create </a> </li>
                    <li> <a href="delete.php"> Delete </a> </li>
                    <li> <a href="request.php"> Delete From Public </a> </li>
                    <li> <a href="search.php"> Search </a> </li>
                </ul>
                <!-- Menu on the right -->
                <ul class ="nav navbar-nav navbar-right">
                    <li>  <a href=""><i class="material-icons">notifications_active</i></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo "Hello ".$uid; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="php/logout.php">Log-Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2" > </div>
            <div class="col-xs-8" style="background-color:white ">
                <div class="jumbotron">
                    <h1>Online Telephone Directory</h1>
                    <p>Online offers users an easy way to create new contacts, manage existing and search for contacts based on criteria</p>
                </div>

                <br/><br/>
                <h3 align="center" class="text-success"><?php echo $cs ?> </h3>
            </div>
            <div class="col-xs-4" style="background-color:white">
                <form role="form" method="POST" action="php/additional.php">
                    <div class="form">
                        <h2> <strong Add Another Details </strong> </h2>
                        <br/><br/>
                        <h3>Current Location</h3>
                        <select class="form-control" id="sel1" name="txtcity" data-toggle="tooltip">
                            <option value="Pune">Pune</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Nashik">Nashik</option>
                            <option value="Thane">Thane</option>
                        </select><br/><br/>
                        <h3>Office Address</h3>
                        <input type="text" class="form-control" name="txtadd"  placeholder="Enter Full Addresss" aria-describedby="basic-addon1" required ><br/><br/>
                        <input type="text" class="form-control" name="txtpostal"  placeholder="Postal Code"  aria-describedby="basic-addon1" maxlength="6" required > <br/><br/>
                        <input type="text" class="form-control" name="txtlandline"  placeholder="Enter Landline Number" aria-describedby="basic-addon1" maxlength="11" required > <br/><br/>
                        <h3>Alternate Mobile Number</h3>
                        <input type="text" class="form-control" name="txtaltmob" placeholder="Enter Mobile Number" aria-describedby="basic-addon1" maxlength="10" required > <br/><br/>
                        <h3>Designation</h3>
                        <input type="text" class="form-control" name="txtdes" placeholder="Doctor, Plumber, etc" aria-describedby="basic-addon1" required > <br/><br/>
                        <input class="btn btn-primary btn-lg" type="submit" name="btnsubmit" value="Save"  style=" width:auto"/>
                        <a href="update_home.php"><input class="btn btn-primary btn-lg" type="button" name="btnedit" value="Edit"  style=" width:auto"/></a><br/>
                    </div>
                </form>
            </div>
            <div class="col-xs-2"> </div>
        </div>
    </div>

</body>   
</html>
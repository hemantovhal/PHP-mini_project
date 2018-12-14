<?php
	$user_taken  = "";
    session_start();
    $update_msg="";
    if(!isset($_SESSION['uid']))
    {
        header("location: index.php");
    }
    if(isset($_SESSION['update_success']))
    {
        $update_msg="Contact Successfully Updated !";
        unset($_SESSION['update_success']);
    }
    $uid = $_SESSION["uid"];
?>
<html>

<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="bootstrap/js/jquery-1.12.2.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- Date time picker attachement -->
	<link rel="stylesheet" href="bootstrap/css/datepicker.css">
	<!--<script src="bootstrap/js/jquery-1.9.1.min.js"></script>-->
	<script src="bootstrap/js/bootstrap-datepicker.js"></script>
	<title> Sign-Up By Admin</title>
	<script type="text/javascript">
		// When the document is ready
		$(document).ready(function ()
        {
			$('#txtdatepicker').datepicker(
            {
				format: "dd/mm/yyyy"
			});
		});

		function validatePassword()
		{

		    var x = document.getElementById('pwd1').value;
			var y = document.getElementById('pwd2').value;

			if(x == y)
			{
				return true;
			}
			else
			{
				alert(" Passwords Do Not Match !");
				return false;
			}
		}
	</script>
</head>

<body>
        <nav class="navbar navbar-inverse">
		    <div class="container-fluid">
			    <!-- Logo -->
			    <div class="navbar-header">
				    <a href="index.php" class="navbar-brand" /> ByteMe Directory </a>
			    </div>
			    <!-- Menu on the right -->
                <ul class="nav navbar-nav ">
                    <li> <a href="admin_home.php"> Home </a> </li>
                    <li> <a href="signup_by_admin.php"> Create User </a> </li>
                    <li> <a href="delete_user_by_admin.php"> Delete User </a> </li>
                    <li> <a href="delete_public_by_admin.php"> Delete From Public Directory </a> </li>
                    <li> <a href="search_by_admin.php"> Search </a> </li>
				</ul>
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
	    </nav>
        <div class="container-fluid">
            <div class="row">
		        <div class="col-xs-4" >
                    <p></p>
                </div>
		    <div class="col-xs-4" style="background-color:rgba(202, 205, 205, 0.100) ">
		        <?php
				    if(isset($_SESSION['success']))
                    {
            	?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" hide="true" id="xxx">&times;</a>
                    <strong text-align="center">Success: Admin have been successfully created new user !</strong>
                </div>
                <?php
                    session_destroy();
               	}
                ?>
			    <!-- Sign up form -->
			    <form role="form" method="post" action="php/signup.php" onsubmit="return validatePassword()">
			        <div class="form" align="center">
			        <h2> <strong> Create User </strong> </h2>
			        <br/><br/>
			        <input type="text" class="form-control" name="txtfname"  placeholder="Enter First Name" aria-describedby="basic-addon1" required ><br/><br/>
			        <input type="text" class="form-control" name="txtlname"  placeholder="Enter Last Name" aria-describedby="basic-addon1" required > <br/><br/>
			        <input  type="text" class="form-control" name="txtdob"  Placeholder="Select DOB"  id="txtdatepicker" required > <br/><br/>
			        <input type="text" class="form-control" name="txtmobile"  placeholder="Enter Mobile Number" aria-describedby="basic-addon1" maxlength="10" required > <br/><br/>
			        <input type="email" class="form-control" name="txtemail"  placeholder="Enter Your Email Address" aria-describedby="basic-addon1" required > <span class="text-danger"><?php echo $user_taken; ?> </span> <br/><br/>
			        <input type="password" class="form-control" name="txtpassword" id="pwd1" placeholder="Enter Password" aria-describedby="basic-addon1"  required > <br/><br/>
			        <input type="password" class="form-control" placeholder="Confirm Password" id="pwd2" aria-describedby="basic-addon1"  required > <br/><br/>

			        <select class="form-control" id="sel1" name="txtq" data-toggle="tooltip" title="Select a Security Question" >
				        <option>Whats your mothers maiden name?</option>
				        <option>What is your nickname?</option>
				        <option>Whats your favorite hobby?</option>
				        <option>Whats was your first gift ever?</option>
				        <option>Your best friends name?</option>
			        </select><br/><br/>
			        <input type="text" name="txta" class="form-control" placeholder="Your Answer"  required  /> <br/><br/>
			        <input class="btn btn-primary btn-lg" type="submit" name="btnsubmit" value="Register"  style=" width:auto"/><br/>
			        </div>
			    </form>
		    </div>
		    <div class="col-xs-4" >
			    <!-- Empty Column -->
		    </div>
        </div>
    </div>
</body>
</html>
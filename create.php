<?php
    session_start();

    if(!isset($_SESSION['uid']))
    {
        header("location: index.php");
    }
    $uid = $_SESSION["uid"];
	if(isset($_SESSION['insert_success']))
	{
		if($_SESSION['insert_success']==1)
			$cs = " Contact Successfully Created !";
		else
			$cs = " Contact Already Exists !";

		unset($_SESSION['insert_success']);
	}
	else
	{
		$cs="";
	}
?>
<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="bootstrap/js/jquery-1.12.2.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom Script
	<script type="text/javascript">
        function generateFullName()
        {
            document.getElementById('txtFullName').value = document.getElementById('txtfname').value + ' ' + document.getElementById('txtlname').value;
        }
	</script> -->
	<title> Create Contact </title>
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
                <li  > <a href="home.php"> Home </a> </li>
                <li class="active" > <a href="create.php"> Create </a> </li>
                <li > <a href="delete.php"> Delete </a> </li>
                <li > <a href="request.php"> Delete From Public </a> </li>
                <li > <a href="search.php"> Search </a> </li>
            </ul>
            <!-- Menu on the right -->
            <ul class ="nav navbar-nav navbar-right">
                <li> <a href=""><i class="material-icons">notifications_active</i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo "Hello ".$uid ; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="php/logout.php">Log-Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
		</div>
	</nav>
    <!--
        <form oninput="txtFullName.value = txtFirstName.value +' '+ txtLastName.value">
            First name : <input type="text" name="txtFirstName" /> <br><br>
            Last name : <input type="text" name="txtLastName" /> <br><br>
            Full name : <input type="text" name="txtFullName"  > <br><br>
        </form>
    -->

   <div class="container-fluid">
    <div class="row">
		<div class="col-xs-4" >
		</div>
		<div class="col-xs-4" style="background-color:white ">
			<form method="post" action="php/create.php"  >
			<table class="table table-hover"  width="100%" >
				<tr>
					<th colspan="3" > <h2 align="center"> Enter Contact Details </h2> </th>
				</tr>

				<tr>
					<td> <input type="text" name="txtfname"  class="form-control" placeholder="First Name" id="txtfname" required /> </td>
					<td> <input type="text" name="txtlname" class="form-control" placeholder="Last Name" id="txtlname" required/> </td>
                    <td></td>
				</tr>

				<tr>
					<td> <input type="text" maxlength="10" name="txtmobile" class="form-control" placeholder="Mobile Number" required/>  </td>
		            <td>
                        <select class="form-control" id="sel1" name="txtq" data-toggle="tooltip">
                            <option>Select Designation</option>
                            <option>Doctor</option>
                            <option>Plumber</option>
                            <option>Agent</option>
                        </select>
                    </td>
					<td></td>
				</tr>

				<tr>
					<td> <input type="text" name="txtLandline" class="form-control" placeholder="Landline Number" maxlength="12" required /> </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td> <input type="email" name="txtemail" class="form-control" placeholder="Email Address" required/> </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td> Public </td>
					<td><label class="radio-inline"><input type="radio" name="txtpublic" value="yes" checked="true">Yes</label> </td>
					<td><label class="radio-inline"><input type="radio" name="txtpublic" value="no" >No</label> </td>
				</tr>

				<tr>
					<td></td>
					<td> <br/> <input type="submit" class="btn btn-primary" value="Save Contact"/></td>
					<td></td>
				</tr>
			</table>
			</form>

			<br/><br/>
			<h3 align="center" class="text-success"><?php echo $cs ?> </h3>
		</div>
		<div class="col-xs-4" >
		</div>
    </div>
    </div>
</body>
</html>
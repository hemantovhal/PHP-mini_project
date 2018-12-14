<?php
	session_start();
	require_once("connect.php");
	$uid = $_SESSION['uid'];
	# Extract Form values
	$fname = $_POST['txtfname'];
	$lname = $_POST['txtlname'];
	$mobile = $_POST['txtmobile'];
    $designation = $_POST['txtq'];
	$landline = $_POST['txtLandline'];
	$email = $_POST['txtemail'];
	$public = $_POST['txtpublic'];

    #echo $fname . $lname . $mobile . $landline . $email . $public;
	
	if( mysqli_query($con,"INSERT INTO `$uid` VALUES('$fname','$lname',$mobile,'$designation',$landline,'$email','$public')"))
	{
		if($public == "yes")
			mysqli_query($con," INSERT INTO _public VALUES('$fname','$lname',$mobile,'$designation',$landline,'$email') ") or die(" Error in insertion of public");
			
		$_SESSION['insert_success']=1;
		header("Location: ..\create.php");
	}
	else
	{
		$_SESSION['insert_success']=0;
		header("Location: ..\create.php");
	}

    $result=mysql_query("SELECT * FROM `$uid`");
    while($row=mysql_fetch_array($result))
    {
        if($row["username"]==$f_usr && $row["password"]==$f_pswd)
            header('Location: selectdata.php');
        else
            echo"Sorry : $f_usr";
    }


	mysqli_close($con);
?>
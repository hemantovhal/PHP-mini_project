<?php
	session_start();
	require_once("connect.php");
	$uid = $_SESSION['uid'];
	
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$mobile=$_SESSION['btn'];
    $designation=$_POST['txtq'];
	$landline=$_POST['txtlandline'];
	$email=$_POST['txtemail'];
	
	$uid1=mysqli_query($con," update `$uid` set fname='$fname',lname='$lname', designation='$designation', email='$email', landline=$landline where mobile=$mobile ") or die("Update failed"+mysql_error($con));
   	$public=mysqli_query($con," update `_public` set fname='$fname',lname='$lname', designation='$designation', email='$email', landline=$landline where mobile=$mobile ") or die("Update failed"+mysql_error($con));

	if($uid1!=0)
	{
	    if($public!=0)
        {
		    $_SESSION['update_success']=1;
		    header("location:../search.php");
		    mysqli_close($con);
        }
	}
	else
		echo "Update Failed : Error in query";
	
?>
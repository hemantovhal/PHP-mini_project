<?php
    session_start();
    require_once("connect.php");
    $uid = $_SESSION['uid'];
    # Extract Form values
    $city = $_POST['txtcity'];
    $address = $_POST['txtadd'];
    $postal = $_POST['txtpostal'];
    $landline1 = $_POST['txtlandline'];
    $altmobile = $_POST['txtaltmob'];
    $designation = $_POST['txtdes'];

    if( mysqli_query($con,"INSERT INTO _users_add VALUES('$uid','$city','$address','$postal','$landline1','$altmobile','$designation')") or die(mysqli_error($con)))
    {
        $_SESSION['update_success']=1;
        header("Location: ..\home.php");
    }
    else
    {
        $_SESSION['update_success']=0;
        header("Location: ..\home.php");
    }
    mysqli_close($con);
?>
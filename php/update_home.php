<?php
    session_start();
    require_once("connect.php");
    $uid = $_SESSION['uid'];

    $city = $_POST['txtcity'];
    $address = $_POST['txtadd'];
    $postal = $_POST['txtpostal'];
    $landline1 = $_POST['txtlandline'];
    $altmobile = $_POST['txtaltmob'];
    $designation = $_POST['txtdes'];

    $result = mysqli_query($con," UPDATE `_users_add` SET city='$city', address='$address', postal='$postal', landline1='$landline1', altmobile='$altmobile', designation='$designation' WHERE email='$uid' ") or die("Error: " . mysqli_error($con));

    if($result!=0)
    {
        $_SESSION['update_success']=1;
        header("location:../home.php");
        mysqli_close($con);
    }
    else
        echo "Update Failed : Error in query"; 
?>
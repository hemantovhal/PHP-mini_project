<?php
    session_start();
    require_once("connect.php");

    $email =$_POST['txtdelete'];
    $uid = $_SESSION['uid'];

    $table="DROP TABLE `$email`";
    $deletetable=mysqli_query($con,$table);

    $login="DELETE FROM _login WHERE email ='$email'";
    $deletelogin=mysqli_query($con,$login);

    $users="DELETE FROM _users WHERE email='$email'";
    $deleteusers=mysqli_query($con,$users);

    if(!$deletetable)
    {
        if(!$deleteusers)
        {
            if(!$deletelogin)
            {
                $_SESSION['delete_success']="Could Not Find or Delete Mail-ID !";
                header("Location:../delete_user_by_admin.php ");
            }
        }
    }
    else
    {
        $_SESSION['delete_success']="User Successfully Deleted !";
        header("Location:../delete_user_by_admin.php ");
    }
    mysqli_close($con);
?>
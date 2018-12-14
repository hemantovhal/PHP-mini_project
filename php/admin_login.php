<?php
    session_start();

   require_once("connect.php");

    $uname = $_POST['txtuname'];
    $pass = $_POST['txtpass'];

    # Validate login credentials

    $result = mysqli_query($con," select * from _admin where uname='$uname';") or die(" Error ");
    $data = mysqli_fetch_array($result);

    if( $data['uname']==$uname )
    {
        if($data['password']==$pass)
        {
            $_SESSION['uid']=$uname;
            header('Location: ..\admin_home.php') or die(" Error ");
        }

    }
        $_SESSION['login_error']=true;
        header("Location: ..\admin_login.php") or die(" Error ");
    mysqli_close($con);


?>
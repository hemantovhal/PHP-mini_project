<?php
    session_start();
    require_once("connect.php");
    $email = $_POST['txtuname'];
    $pass = $_POST['txtpass'];

    /*$query = mysqli_query($con," SELECT * FROM _login WHERE email ='$email'; ") or die("Error");
    $row = mysql_fetch_array($query);

    if($row['email']==$email)
    {
        $fname = $row['fname'];
        $lname = $row['lname'];
    }
    $fullname=$fname.' '.$lname;
    $_SESSION['fullname']=$fullname; */
    # Validate login credentials
    $result = mysqli_query($con," select * from _login where email='$email';") or die(" Error ");
    $data = mysqli_fetch_array($result);

    if( $data['email']==$email )
    {
        if($data['password']==md5($pass))
        {
            $_SESSION['uid']=$email;
            //$_SESSION['uid']=$fname;
            header('Location: ..\home.php') or die(" Error ");
        }
    }
    $_SESSION['login_error']=true;
    header("Location: ..\index.php") or die(" Error ");
    mysqli_close($con);
?>
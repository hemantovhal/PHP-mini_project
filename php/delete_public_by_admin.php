<?php
    session_start();
    require_once("connect.php");

    $fname = $_POST['txtfname'];
    $lname = $_POST['txtlname'];
    $uid = $_SESSION['uid'];

    if(mysqli_query($con," DELETE FROM `_public` WHERE `fname`=$fname AND `lname`=$lname ") && mysqli_affected_rows()!=0)
    {
        $_SESSION['delete_success']="Contact Successfully Deleted !";
        header("Location: ..\delete_public_by_admin.php ");
    }
    else
    {
        $_SESSION['delete_success']="Could Not Find Contact !";
        header("Location: ..\delete_public_by_admin.php ");
    }
    mysqli_close($con);

    /*

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "byteme";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to delete a record
    $sql = "DELETE FROM _public WHERE fname='" . $_REQUEST[$fname] . "'";

    if (mysqli_query($conn, $sql))
    {
        echo "Record deleted successfully";
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);

    /////////////////////////////////////////////////////////////////////////////

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to delete a record
    $sql = "DELETE FROM _public WHERE fname=$fname";

    if ($conn->query($sql) === TRUE)
    {
        echo "Record deleted successfully";
    }
    else
    {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    */
?>
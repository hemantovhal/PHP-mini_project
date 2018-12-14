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

    $result = mysqli_query($con," SELECT city, address, postal, landline1, altmobile, designation FROM _users_add WHERE email='$uid' ") or die("Error: " . mysql_error($con));

        if(!$result || mysqli_num_rows($result)==0)
        {
        ?>
            <div class="text-danger"> No Results Found !</div>
        <?php
        }
        else
        {
        ?>

        <?php
    while($data=mysqli_fetch_Array($result))
    {
        $data[1];
        $data[2];
        $data[3];
        $data[4];
        $data[5];
        $data[6];
        echo "<form  method='post' action='update_home.php'>
                <button class='btn btn-default' name='btn' type='submit'></button>
              </form>";
    }
    ?><?php
}
mysqli_close($con);
?>
</body>
</html>
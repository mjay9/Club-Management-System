<?php
session_start();

if(isset($_SESSION["loggedin"])){
    include '_dbconnect.php';
    $username = $_SESSION['username'];
    $sql1 = "UPDATE `tfc` SET `login_status` = '0' WHERE `tfc`.`username` = '$username'";
    $result1 = mysqli_query($conn, $sql1);
}

session_unset();
session_destroy();

header("location: https://uca-srmu.000webhostapp.com/sess_exp.php?sess_exp=true");
exit;

?>
<?php
include ('_dbconnect.php');

$sql = "UPDATE `tfc` SET `login_status` = '0' WHERE `login_status` = '1'";
$result = mysqli_query($conn, $sql);


?>
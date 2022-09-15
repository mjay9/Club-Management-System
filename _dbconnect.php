<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "techfusion";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn){
  die("Sorry!! We are unable to connect...".mysqli_connect_error());
}
?>
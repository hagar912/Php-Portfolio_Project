<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "login-form";

$conn = mysqli_connect($server,$user,$pass,$database);
if(mysqli_connect_error()){
    die("Error with connection :".mysqli_connect_error());
}
?>
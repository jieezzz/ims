<?php
$server="localhost";
$username="root";
$password="";
$database="ims";

$con = mysqli_connect($server, $username, $password, $database);
if(mysqli_connect_errno()){
    echo "Connection Error" . mysqli_connect_error();
}
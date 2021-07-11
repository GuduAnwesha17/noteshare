<?php

error_reporting(0);
$server = "localhost";
$username = "root";
$password = "";
$dbname = "demo";


$conn = mysqli_connect($server,$username,$password,$dbname);


if(!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}

?>
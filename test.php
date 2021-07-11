<?php 
session_start();

include "connection.php";
$e_mail = $_SESSION["email"] ;
$ur = "SELECT `uid` from users WHERE email='$e_mail'";
$rre = mysqli_query($conn, $ur);
if(mysqli_num_rows($rre) > 0 ){
    while($row = mysqli_fetch_assoc($rre)){
       
        $value = $row["uid"];
    $_SESSION['u_id'] = $value;
    }
} 


$id = $_SESSION['u_id'];
echo $id;

$re = "SELECT `gid` from groups WHERE user_id= '$id'";
$res = mysqli_query($conn,$re);
if(mysqli_num_rows($res) > 0 ){
   
    while($row = mysqli_fetch_assoc($res)){
       
        $val = $row["gid"];
       
       

  
    }
} 

echo $val;
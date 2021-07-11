<?php 
session_start();

include "connection.php";
$e_mail = $_SESSION["email"] ;
$ur = "SELECT `uid` from users WHERE email='$e_mail'";
$rre = mysqli_query($conn, $ur);
if(mysqli_num_rows($rre) > 0 ){
$row = mysqli_fetch_assoc($rre);
$u_id = $row["uid"];
} 
$re = "SELECT `gid` from groups WHERE user_id= '$u_id'";
$res = mysqli_query($conn,$re);
if(mysqli_num_rows($res) > 0 ){
   $row = mysqli_fetch_assoc($res);
       $g_id = $row["gid"];
} 

if(isset($_POST['upload']))
  {
       $title = $_POST['title'];
       $descr = $_POST['descr'];
       $file = $_FILES['file'];
       $group_name = $_POST['newgroup'];
       $exist_group_name = $_POST['lists'];
       $fileName =  $_FILES['file']['name'];
       $file_tmp =  $_FILES['file']['tmp_name'];
       $timestamp = date('Y-m-d H:i:s');

       $img_dir = "uploadfiles/".$fileName;
      



       move_uploaded_file($file_tmp,"uploadfiles/".$fileName);
       
       $sql = "INSERT INTO uploads(title,description,file_name,group_id	,user_id,date) VALUES ('$title', '$descr', '$fileName',' $g_id','$u_id','$timestamp')";
     
       $result = mysqli_query($conn,$sql);

       if(!($exist_group_name == "Select groups")){
        $qr = "INSERT INTO groups(group_name,description,user_id,date) VALUES ('$exist_group_name','$descr','$u_id','$timestamp')";
        $rss = mysqli_query($conn,$qr);
       }else if($group_name){
        $query = "INSERT INTO groups(group_name,description,user_id,date) VALUES ('$group_name','$descr','$u_id','$timestamp')";
        $results  = mysqli_query($conn,$query);
       }
       
      
   
    }

    if($result and ($rss or $results)){
        $_SESSION['uploadmessage'] = "File uploaded";
        $_SESSION['alert_bg'] = 'alert-success';
        header("location: userownprofile.php?status=upload-success");
        exit();
    }else{
        $_SESSION['uploaderrormessage'] = "Failed to upload";
        $_SESSION['alert_bg'] = 'alert-warning';
        header("location: userownprofile.php?error=upload-failed");
        exit();
    }






?>
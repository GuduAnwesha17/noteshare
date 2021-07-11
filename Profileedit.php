


<?php

session_start();
$c_email = $_SESSION["email"];
include "connection.php";

if(isset($_POST['save'])){

   
    $dob = $_POST['dob'];
    $gender = $_POST['sex'];
    $field = $_POST['field'];
    $newfield = mysqli_real_escape_string($conn,$_POST['newfield']);
    $file = $_FILES['file'];
    $image_name = $_FILES['file']['name'];
    $img_tmp = $_FILES['file']['tmp_name'];

    $profile_img_dir = "userprofileimage/".$image_name;
    move_uploaded_file($img_tmp,"userprofileimage/".$image_name);
     $sql = "UPDATE users
           SET profile_img='$image_name', gender= '$gender' ,field='$field', dob='$dob'
            WHERE email='$c_email' ";
    $result = mysqli_query($conn, $sql);
    
    $query = "INSERT INTO category (cat_name,date) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$query)){
        echo "SQL error";
    }else{
       mysqli_stmt_bind_param($stmt,"ss",$newfield,$timestamp);
       $rss = mysqli_stmt_execute($stmt);
    }

    if($result){
        echo "Updated successfully";
    }else{
        echo "failed";
    }
   


}




?>
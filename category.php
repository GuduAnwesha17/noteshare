<?php
    session_start();

    $category = htmlspecialchars($_GET["category"], ENT_QUOTES);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Category</title>
</head>
<body>
   <?php include 'header.php'; ?>
   <main>
       <div class="container category_container"> 

       <h1 class="mt-5"><?php echo ucfirst($category); ?></h1><hr>
           
           <div class="category_result d-flex flex-wrap">
               <?php
                  $sql = "SELECT * FROM users WHERE field='".$category."'";
                  $res = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($res) > 0) {
                     while ($row = mysqli_fetch_assoc($res)) { 
                        echo '
                           <div class="profile d-flex">
                              <div class="avtar">
                                 <img class="img-fluid" src="images/'.$row['profile_img'].'">
                              </div>
                              <div class="content_p ml-3">
                                 <span>Note By: </span><a href="profile.php?user='.$row['uid'].'">'.$row['firstname']. " ".$row['lastname'].'</a>
                                 <br />
                                 <strong>'.ucfirst($row['field']).'</strong> 
                                 <p>ASSISSTANT professor at CET,BBSR</p>
                              </div>
                           </div>
                        ';
                     }
                  } else {
                     echo 'No result found!';
                  }
               ?>












           <!--<h1 class="ml-4">Physics</h1><hr>
           <div class="category_result ">
               <div class="profile d-flex">
                   <div class="avtar">
                       <img class="img-fluid" src="images/avatar.jpg">
               </div>
               <div class="content_p ml-3">
                   <span>Note By</span><a href="profile.php">William Shah</a>
                   <p>ASSISSTANT professor at CET,BBSR</p>
               </div>
              </div>
              <div class="profile d-flex">
                   <div class="avtar">
                       <img class="img-fluid" src="images/girl.svg">
               </div>
               <div class="content_p ml-3">
                   <span>Note By</span><a href="#">Ravindra singh</a>
                   <p>ASSISSTANT professor at CET,BBSR</p>
               </div>
              </div>
             
              <div class="profile d-flex">
                   <div class="avtar">
                       <img class="img-fluid" src="images/boys.svg">
               </div>
               <div class="content_p ml-3">
                   <span>Note By</span><a href="#">Ravindra singh</a>
                   <p>ASSISSTANT professor at CET,BBSR</p>
               </div>
              </div>


              <div class="profile d-flex">
                   <div class="avtar">
                       <img class="img-fluid" src="images/avatar.jpg">
               </div>
               <div class="content_p ml-3">
                   <span>Note By</span><a href="profile.php">William Shah</a>
                   <p>ASSISSTANT professor at CET,BBSR</p>
               </div>
              </div>
             
           </div>-->
      </div>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
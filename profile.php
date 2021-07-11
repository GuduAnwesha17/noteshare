
<?php
    session_start();
    include 'connection.php';

    if(!isset($_GET["user"])) {
      header("location: index.php");
    } else {
      $user = htmlspecialchars($_GET["user"], ENT_QUOTES);

      $sql = "SELECT * FROM users WHERE uid='".$user."'";
      $res = mysqli_query($conn, $sql);
      $userRow = mysqli_fetch_assoc($res);
    }
?>
<?php echo $userRow['name']; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profile</title>
</head>
<body>
    <?php include 'header.php'?>
    <main class="container-fluid tabs ">
    <div class="row">
    <div class="col-md-3 col-12 sidebar border p-5">
       <div class="d-flex justify-content-center align-items-center flex-column ">
       <div class="profile_image p-2 border">
       <img src="images/<?php echo $userRow['profile_img']; ?>">
       </div>
       <p ><?php echo $userRow['firstname']. " ".$userRow['lastname']; ?></p>
       </div>
      
      
      <hr>
    <div class="btn_container">
     <ul class= "btn_lists d-md-block d-flex flex-sm-nowrap justify-content-around tab_btns">
         <li class="mt-3 p-2" data-tab-target='#first' ><a>
             <span><img src="images/upload.png"></span>
             <span class="ml-md-3">Uploads</span>
          </a></li>

        <li class="mt-3 p-2" data-tab-target='#second'> <a>
             <span><img src="images/document.png"></span>
             <span class="ml-md-3 w-100">Notelists</span>
         </a></li>

         <li class="mt-3 p-2" data-tab-target='#third'><a>
             <span><img src="images/about.png"></span>
             <span class="ml-md-3">About</span>
         </a></li>

    </ul>
    <hr>
    </div>
    </div>
    

    <div class="col-md-9 col-12 tab_content" >
       <div id="first" class="active" data-tab-content>
       <div class="p-5">
        
   <?php
    include "connection.php";
    $sql = "SELECT * from uploads WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    ?>
    <?php if(!mysqli_stmt_prepare($stmt,$sql)) :?>
     <?php echo "Failed";?>
     <?php else:?>
      <?php
        mysqli_stmt_bind_param($stmt,"i",$user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        ?>
        <?php endif; ?>
        
        <?php if(mysqli_num_rows($result)) :?>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
           <?php
            echo 
            '
            <table class="table table-dark table-striped">
           <thead>
             <tr>
            <th scope="col">Title</th>
           <th scope="col">Description</th>
           <th scope="col">File</th>
           </tr>
          </thead>
            <tbody>
            <tr>
            <td>'.$row['title'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['file_name'].'<a href="filedownload.php?file_id='.$row['fid'].'"><img src="images/download.png" class="ml-3"></a></td>
            </tr>
            </tbody>
           </table>';
            
            ?>
               <?php endwhile; ?>
          <?php else: ?>

          <?php echo '<div class="d-flex justify-content-center align-items-center text-center p-5">
          <div style="height:300px; width:330px;">
          <img class="img-fluid"src="images/upload_files.svg"/>
          <p style="font-size:20px; color:#151B54;">No File uploaded yet</p>
          </div>
          </div>';
           ?>
          <?php endif; ?>
        
</div>
       </div>
       
       <div id="second" data-tab-content>
       <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas eos fugiat esse laborum sint! Consequatur nihil nesciunt doloremque, rem ex neque dolores
            eius distinctio, quae necessitatibus, provident dicta sit?</h1>
       </div>


       <div id="third" data-tab-content>
        <?php include_once "connection.php"; 
             $sql = "SELECT * FROM users WHERE uid=?;";
             $stmt = mysqli_stmt_init($conn);
             
             if(!mysqli_stmt_prepare($stmt,$sql)){
               echo "Error";
             }else{
               mysqli_stmt_bind_param($stmt,"i",$user);
               mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
             }
        
        
        ?>
        
         <div style="height:75vh;">
         <hr/>
           <div class="p-5" >
             <span>Name:</span><span style="color:blue;"> Anwesha sahoo</span><br/>
             <span>Field:</span><span style="color:blue;"> Computer Science</span><br/>
             <span>Date of birth: </span> <span style="color:blue;">17/12/1998</span><br/>
             <span>Gender :</span> <span style="color:blue;"> Female</span>
          </div>
          <hr/>
          </div>
         
       

       
    </div>
</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="js/showtabprofile.js"></script>
</body>


</html>
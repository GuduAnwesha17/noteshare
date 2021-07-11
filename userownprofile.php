<?php
    session_start();
    

    if(isset($_SESSION['uploadmessage'])){
        echo '<div class="alert '.$_SESSION['alert_bg'].' alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>'.$_SESSION['uploadmessage'].'</strong>
              </div>';
    }
    if(isset($_SESSION['uploaderrormessage'])){
        echo '<div class="alert '. $_SESSION['alert_bg'].' alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>'.$_SESSION['uploaderrormessage'].'</strong>
      </div>';

    }

  
    

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userownprofile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profile</title>
</head>

<body>
<?php include "header.php"?>

    <main class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12 sidebar shadow-sm p-5">

            <div class="d-flex justify-content-center align-items-center flex-column  p-2">
                
          
              
                      <?php include "connection.php"; ?>
                      <?php 
                        $c_mail = $_SESSION['email'] ;
                        $query  = "SELECT `profile_img`,firstname,lastname  from users where email= '$c_mail'";
                        $result = mysqli_query($conn,$query);
                        
                        ?>
                        <?php if(mysqli_num_rows($result) >0 ) :?>
                        <?php $row = mysqli_fetch_assoc($result) ?>
                        <?php endif; ?>
                            <?php if($row['profile_image'] != "NULL") :?>
                            <?php echo '
                            <div class="own_profile">
                            <img  src="userprofileimage/'.$row['profile_img'].'" >
                            </div>
                            <div>
                            <p>'. $row['firstname']." ".$row['lastname'].'</p>
                            </div> '; ?>
                            <?php else: ?>
                            <?php echo ' <div id="profile" class=" d-flex justify-content-center align-items-center img_upload" 
                            style="height:95px; width:95px;  border-radius:50%;background-color:#eee; font-size:20px;">
                           '.strtoupper(substr($_SESSION['email'],0,1)).'</div>'; ?>
                            <?php endif; ?>
            </div>  
            <hr/>
                <div class="btn_container">
                    <ul class="btn_lists d-md-block d-flex flex-sm-nowrap justify-content-around">

                        <li class="mt-3 p-2 tab_item ml-sm-2 px-sm-4  " data-tab-target='#first'> <a>
                                <span><img src="images/document.png"></span>
                                <span class="ml-md-3">Edit profile</span>
                            </a></li>


                        <li class="mt-3 p-2 tab_item ml-sm-2 px-sm-4" data-tab-target='#second'><a>
                             
                                <span ><img src="images/upload.png"></span>
                                <span class="ml-md-3  ">Upload</span>
                            
                            </a></li>


                        <li class="mt-3 p-2 tab_item ml-sm-2 px-sm-4 " data-tab-target='#third'> <a>
                                <span><img src="images/document.png"></span>
                                <span class="ml-md-3">Notelists</span>
                            </a></li>

                        <li class="mt-3 p-2 tab_item ml-sm-2 px-sm-4 " data-tab-target='#fourth'><a>
                                <span><img src="images/about.png"></span>
                                <span class="ml-md-3">About</span>
                            </a></li>
                        <li class="mt-3 p-2 tab_item ml-sm-2  px-sm-4" data-tab-target='#fifth'><a>
                                <span><img src="images/upload.png"></span>
                                <span class="ml-md-3">My Files</span>
                            </a></li>

                    </ul>
                    <hr>
                </div>

            </div>


            <div class="col-md-9 col-12 tab_content">

                <div class="edit_container border mx-auto  d-flex justify-content-around flex-wrap p-5 active" id="first" data-tab-content>
                    
                     
               <form action="Profileedit.php" method="post" enctype="multipart/form-data" class="d-flex">
                        <div class="border-right p-5">
                    <?php if(isset($_SESSION['email'])): ?>
                      <div id="profile" class=" d-flex justify-content-center align-items-center img_upload" style="height:110px; width:110px; border:1px solid #000; border-radius:50%; background-color:#eee;">
                    <?php echo strtoupper(substr($_SESSION['email'],0,1)) ; ?>
                    </div>
                    <div>
                        <label for="file" class="mt-2">Choose Profile photo</label>
                        <input type="file" id="file" name="file"/>
                    </div>
                    <?php endif; ?>
                    </div> 
                        
                        <div class="p-5">
                        <?php include_once "connection.php" ; ?>
                           
                           <?php
                            $currentemail =   $_SESSION["email"];
                           $sql =  "SELECT * FROM users WHERE email = '$currentemail'";
                             $result = mysqli_query($conn, $sql);
                            ?>
                            <?php if(mysqli_num_rows($result) > 0 ) : ?>
                              <?php while($row = mysqli_fetch_array($result)) : ?>
                              <span>Name:<span>
                              <span> <?php echo $row["firstname"] ." ". $row["lastname"] ; ?> </span><br/><br/>
                              <span>Email:</span>
                              <span> <?php echo $row["email"] ; ?> </span><br/>
                              
                               <?php endwhile; ?>
                           <?php endif; ?>
                           <div class="form-group">
                                <label for="DOB">DOB:</label>
                                <input type="date" class="form-control"  id="DOB" name="dob">
                            </div>

                            <label for="customRadio">Gender:</label><br>
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" class="custom-control-input" id="customRadio" name="example"
                                    value="male" name="sex">
                                <label class="custom-control-label" for="customRadio">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio2" name="example"
                                    value="female" name="sex">
                                <label class="custom-control-label" for="customRadio2">Female</label>
                            </div>

                            <br><br>
                            <label for="cateogry">Select your field: </label>
                             <select  class="custom-select" id="cateogry" name="field">
                            <?php include_once "connection.php"; 
                                $sql = "SELECT * FROM category";
                                $res = mysqli_query($conn,$sql);
                            ?>
                                <?php if(mysqli_num_rows($res) > 0) :?> 
                                <?php  while($row = mysqli_fetch_assoc($res)) :?>
                                  <option><?php echo $row["cat_name"] ;?></option>
                                      <?php endwhile; ?>
                                    <?php endif; ?>
                            </select>
                            <br/><br/>
                            <div class="form-group">
                                <label for="another_field" style="color:red; font-weight:bold;">*Do not find your Field?</label>
                                <input type="text" class="form-control"  id="another_field" name="newfield" placeholder="Enter your own field">
                            </div>
                            <button type="submit" class="btn btn-primary mt-5" name="save">Save</button>
                            </div>
                        </form>
         
                </div>




                <div class="upload_container  mx-auto   justify-content-around  p-5" id="second" data-tab-content>
                

                     
                    <form action="Fileupload.php" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label for="title"  class="form_label">Title:</label>
                            <input type="text" class="form-control custom_input" name="title" placeholder="title of your file" id="title">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description:</label>
                            <textarea class="form-control" rows="5" id="desc" name="descr"></textarea>
                        </div>
                        <div class="input_files">
                            <label for="file-upload" class="custom-file-upload ">

                            </label>
                            <input id="file-upload" class="custom_input" type="file" name="file"/>
                        </div>
                        <br />
                        <div class="border p-3">
                        <p style="color:blue;">*Optional</p>
                        <label for="list">Lists: </label>
                        <select name="lists" class="custom-select" id="list">
                        <option>Select groups</option>
                        <?php 
                             include_once "connection.php";
                             $queryy = "SELECT DISTINCT group_name from groups";
                             $rs = mysqli_query($conn,$queryy);
                       ?>

                       <?php if($rs) :?>
                       <?php while($row = mysqli_fetch_array($rs)) :?>
                        
                       <option><?php echo $row["group_name"] ;?></option>
                    
                       <?php endwhile; ?>
                       <?php endif; ?>    
                    </select>
                        <br><br>
                        <div class="form-group">
                            <label style="color:red;" for="list"  class="form_label">Create new List?</label>
                            <input type="text" class="form-control custom_input" placeholder="Name of ur new List" id="list" name="newgroup">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" name="upload">Upload</button>
                    </form>
                    </div>
                

                <div id="third" data-tab-content>
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas eos fugiat esse laborum
                        sint! Consequatur nihil nesciunt doloremque, rem ex neque dolores
                        eius distinctio, quae necessitatibus, provident dicta sit?</h1>
                </div>



                <div id="fourth" data-tab-content>
               
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas eos fugiat esse laborum
                        sint! Consequatur nihil nesciunt doloremque, rem ex neque dolores
                        eius distinctio, quae necessitatibus</h1>
                </div>
                <div id="fifth" data-tab-content>
                <div class="p-5">
                <table class="table table-dark">
    <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  <tbody>
   <?php
    
    include "connection.php";
    $e_mail = $_SESSION["email"] ;
    $ur = "SELECT `uid` from users WHERE email='$e_mail'";
    $rre = mysqli_query($conn, $ur);
    if(mysqli_num_rows($rre) > 0 ){
    $row = mysqli_fetch_assoc($rre);
    $value = $row["uid"];
    } 
    $sql = "SELECT * from uploads WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    ?>
    <?php if(!mysqli_stmt_prepare($stmt,$sql)) :?>
     <?php echo "Failed";?>
     <?php else:?>
      <?php
        mysqli_stmt_bind_param($stmt,"i",$value);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        ?>
        <?php endif; ?>
        
        <?php if(mysqli_num_rows($result)) :?>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
           <?php
            echo 
            '
            <tr>
            <td>'.$row['title'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['file_name'].'</td>
            </tr>';
            
            ?>
               <?php endwhile; ?>
          <?php endif; ?>
        </tbody>
</table>
</div>
                </div>
            </div>
        </div>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/userownprofile.js"></script>

</body>


</html>
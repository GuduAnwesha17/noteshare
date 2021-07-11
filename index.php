<?php
    session_start();

    if(isset($_SESSION['message'])){
      echo '<div class="alert '.$_SESSION['alert_bg'].' alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>'.$_SESSION['message'].'</strong>
            </div>';
    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notyshare</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Raleway:wght@100&family=Rouge+Script&display=swap" rel="stylesheet">
  
</head>
</head>
<body>
    
    <?php include 'header.php'; ?>
     <header class="p-5">
         <div class="container main-content d-flex justify-content-between align-items-center flex-wrap-reverse">
             <div class="content  p-2  text-center text-md-left  ">
               <h1>
                   FIND PERFECT NOTES RICH NEW <br>HEIGHTS
               </h1>
           <!--    <button class="sign mt-4" >Sign in</button> -->
           <form class="form-inline mt-4 mx-auto d-block " action="/action_page.php">
          <input class="form-control mr-sm-2 " type="text" placeholder="Search by teacher name you know">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>

             </div>


             <div class="img-container ml-md-4">
                 <img src="images/undraw_book_lover_mkck.svg" alt="education">
             </div>
         </div>
     </header>




     <section class="offer">
      <div class="container  p-5">
        <h2 class="text-center">What We Offer</h2>
           <div class="row mt-5">
             <div class="col-md-4 col-sm-4 col-12 ">
               <div class="box  mx-auto d-block ">
               <img src="images/calculator.png" class="img-fluid"  alt="math">
               <h4 class="text-md-center">Math</h4>
              </div>
              
             </div>
             <div class="col-md-4 col-sm-4 col-12">
               <div class="box  mx-auto d-block">
              <img src="images/atom.png" class="img-fluid"  alt="physics">
              <h4 class="text-md-center">Physics</h4>
            </div>
             
            </div>
            <div class="col-md-4 col-sm-4 col-12">
              <div class="box  mx-auto d-block">
              <img src="images/experiments.svg" class="img-fluid"  alt="chemistry">
              <h4 class="text-md-center">Chemistry</h4>
            </div>
              

            </div>
           
           </div>

           <div class="row mt-5">
            <div class="col-md-4 col-sm-4 col-12">
              <div class="box  mx-auto d-block">
              <img src="images/computer-science.svg" class="img-fluid" alt="cs">
              <h4 class="text-md-center">CS</h4>
            </div>
             
            </div>
             
            <div class="col-md-4 col-sm-4 col-12">
              <div class="box   mx-auto d-block">
              <img src="images/english.svg" class="img-fluid"  alt="english">
              <h4 class="text-md-center">English</h4>
            </div>
              
            </div>
            <div class="col-md-4 col-sm-4 col-12">
              <div class="box   mx-auto d-block">
              <img src="images/planet.svg" class="img-fluid"  alt="geography">
              <h4 class="text-md-center">Geography</h4>
            </div>
              
            </div>
 
           </div>
       </div>
     </section>


     <section class="about_section  p-4" id="about">
       <div class="container-fluid d-flex justify-content-around flex-wrap">
         <div class="about_text text-center text-md-left p-4">
       

         <h3> Welcome to Notyshare </h3>


        <p>If you would like to find  best notes, you are at the right place.

        Notyshare is the perfect destination for students where they can find their notes from world's best teachers.</P>



        <h3>How Notyshare different?</h3>
        
        
          <p>Teacher share their notes at Notyshare.</p>
        <p>Students can access the notes from different teachers, compare them and refer to the one that suits their requirements.</p>

         

      <p> We're dedicated to providing you the very best of Notes, with an emphasis on uploading notes,
        downloading notes,search by teacher they know.</p>

      <p>We hope you get help of our notes as much as we enjoy offering them to you.
         If you have any questions or comments, please don't hesitate to contact us.</p>


       </div>

        <div class="aboutus_image p-5">
          <img class="img-fluid" src="images/undraw.svg">
          </div> 

       </div>
     </section>
 <?php include 'fooer.php'; ?>  
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>